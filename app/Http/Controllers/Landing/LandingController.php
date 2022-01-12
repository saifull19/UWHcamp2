<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Laravel\Socialite\Facades\Socialite;

use Mail;
use App\Mail\Checkout\AfterCheckout;

use Str;
// MENAMBAHKAN LIBRARY MIDTRANS NYA
use Midtrans;

use App\Models\Order;
use App\Models\Service;
use App\Models\AdvantageService;
use App\Models\AdvantageUser;
use App\Models\Tagline;
use App\Models\ThumbnailService;

class LandingController extends Controller
{

    public function __construct()
    {
        // mendifinisikan si midtrans
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->get();
        

        return view('pages.landing.index', ["active" => "home"], compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.landing.about');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort('404');
    }

    // custom function
    public function explore()
    {
        $services = Service::orderBy('created_at', 'desc')->get();

        return view('pages.landing.explore', ["active" => "explore"], compact('services'));
    }

    public function detail($id)
    {
        $service = Service::where('id', $id)->first();

        $thumbnail = ThumbnailService::where('service_id', $id)->get();
        $advantage_user = AdvantageUser::where('service_id', $id)->get();
        $advantage_service = AdvantageService::where('service_id', $id)->get();
        $tagline = Tagline::where('service_id', $id)->get();

        return view('pages.landing.detail', ["active" => "explore"], compact('service', 'thumbnail', 'advantage_user', 'advantage_service', 'tagline'));
    }

    public function booking($id)
    {
        $service = Service::where('id', $id)->first();
        $user_buyer = Auth::user()->id;

        // validation booking
        if ($service->users_id == $user_buyer) {
            toast()->warning('Sorry, members cannot book their on service!');
            return back();
        }

        $order = new Order;
        $order->buyer_id = $user_buyer;
        $order->freelancer_id = $service->user->id;
        $order->service_id = $service->id;
        $order->file = NULL;
        $order->note = NULL;
        $order->expired = Date('y-m-d', strtotime('+3 days'));
        $order->order_status_id = 4;
        // $order->payment_status = 'Waiting';
        $order->save();

        $order_detail = Order::where('id', $order->id)->first();

        // redirect untuk midtrans
        $this->getSnapRedirect($order_detail);

        // send email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($order_detail));

        return redirect()->route('detail.booking.landing', $order->id);
    }

    public function detail_booking($id)
    {
        $order = Order::where('id', $id)->first();
        
        return view('pages.landing.booking', ["active" => "explore"], compact('order')); 
    }

    public function profesional()
    {
        
        return view('pages.landing.profesional', ["active" => "profesional"]); 
    }

    // midtrans handler
    public function getSnapRedirect(Order $order)
    {
        // membuat variabel
        $orderId = $order->id.'-'.Str::random(5);
        $price = $order->Service->price;

        // mengirimkan id di tambah string 5 huruf atau angka pada field midtrans_booking_code
        $order->midtrans_booking_code = $orderId;

        // membuat transaction
        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $price
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $price,
            'quantity' => 1,
            'name' => "Payment for {$order->Service->title} Camp"
        ]; 

        $userData = [
            "first_name" => $order->user_buyer->name,
            "last_name" => "",
            "address" => $order->user_buyer->detail_user->address,
            "city" => "",
            "postal_code" => "",
            "phone" => $order->user_buyer->detail_user->contact_number,
            "country_code" => "IDN"
        ];

        $customer_details = [
            "first_name" => $order->user_buyer->name,
            "last_name" => "",
            "email" => $order->user_buyer->email,
            "phone" => $order->user_buyer->detail_user->contact_number,
            "billing_address" => $userData,
            "shipping_address" => $userData
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details 
        ];

        // membuat try catch untuk menghit dari sisi midtransnya
        try {
            //code get snap payment page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $order->midtrans_url = $paymentUrl;
            $order->save();

            return $paymentUrl;
        } catch (Exception $e) {
            return false;
        }
    }

    // membuat condition untuk callback midtrans
    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = explode('-', $notif->order_id)[0];
        $checkout = Order::find($checkout_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $checkout->payment_status = 'pending';
            }
            else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $checkout->payment_status = 'paid';
            }
        }
        else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
            else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
        }
        else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status= 'failed';
        }
        else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status= 'paid';
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'pending';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'failed';
        }

        $checkout->save();
        return view('pages.landing.booking', ["active" => "explore"]);
    }
    
}
