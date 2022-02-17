<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Order;
use App\Models\Service;
use App\Models\Materi;
use App\Models\TugasMateri;

class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders = Order::where('buyer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.class.index', [
            'orders' => $orders->load('service', 'order_status', 'user_buyer', 'user_freelancer')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $materi = Materi::where('service_id', $order['service_id'])->get();
        // dd($materi);
        return view('pages.dashboard.class.detail', compact('order', 'materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = Materi::where('id', $id)->first();
        $tugas_materi = TugasMateri::where('materi_id', $id)->first();
        $tugas = TugasMateri::where('users_id', Auth::user()->id)->first();
        
        $materis = Materi::all();

        return view('pages.dashboard.class.detail-materi', compact('materis', 'materi', 'tugas_materi', 'tugas'));
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
        $materi = Materi::where('id', $id)->first();
        $users = Auth::user()->id;

        $rules = [
            'description' => 'required'
        ];
        $validatedData = $request->validate($rules);


        $tugas = new TugasMateri();
        $tugas->users_id = $users;
        $tugas->materi_id = $materi->id;
        $tugas->description = $validatedData['description'];
        $tugas->save();

        toast()->success('Submit Tugas has been succes');
        return back();
        // return redirect('http://localhost:8000/member/class/2/edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
