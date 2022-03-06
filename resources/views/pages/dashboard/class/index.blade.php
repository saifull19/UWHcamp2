@extends('layouts.app')

@section('title', 'Class')
@section('content')

@if (count($orders)) 

    <main class="h-full overflow-y-auto">
                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Kelas Saya
                            </h2>

                            <p class="text-sm text-gray-400">
                                {{ auth()->user()->order_buyer()->count() }} Total Kelas
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right"></div>
                    
                    </div>
                </div>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">

                            <div class="p-6 bg-grey rounded-xl">

                                    <div>
                                        <h2 class=" text-xl font-semibold">
                                            Service
                                        </h2>

                                        <p class="text-sm mb-4 text-gray-400">
                                            Belajar dengan giat, untuk masa depan yang lebih baik.
                                        </p>
                                    </div>
                                    

                                    
                                    @forelse ($orders as $order)

                                        @if ($order->payment_status == 'paid')
                                        
                                            <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
                                                <a href="{{ route('member.class.show', $order->id) }}" class="">
                                                    <div class="flex flex-col justify-center px-4 py-4 mb-4 bg-white hover:bg-gray-300 rounded-xl">
                                                        <div>
                                                            <div>
                                                                {{-- <img src="{{ asset('/assets/images/jason-goodman-Oalh2MojUuk-unsplash.jpg') }}" alt="" class="w-50 h-30"> --}}
                                                                @if ($order->service->thumbnail_Service[0]->thumbnail)
                                                                    
                                                                        <img class="object-cover w-50 h-30 rounded" src="{{ url(Storage::url($order->service->thumbnail_service[0]->thumbnail)) }}" alt="" loading="lazy" />
                                                                        
                                                                    @else

                                                                        <img class="object-cover w-50 h-30 rounded" src="{{ asset('/assets/1.png') }}" alt="" loading="lazy" />
                                                                        
                                                                    @endif
                                                            </div>

                                                            <p class="mt-5 text-2xl font-semibold text-left text-gray-800"> {{ $order->service->title ?? '' }}</p>

                                                            <p class="text-md text-left font-normal py-5 text-gray-800">
                                                                {{ $order->user_freelancer->name ?? '' }}<br class="hidden lg:block">
                                                                <span class="text-sm text-gray-500">{{ $order->user_freelancer->detail_user->role ?? '' }}</span>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        @endif
                                        
                                        @empty
                                            {{-- empty --}}
                                        @endforelse


                            </div>

                            {{-- <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                                <table class="w-full" aria-label="Table">
                                    
                                    <thead>
                                        <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                            <th class="py-4" scope="">Mentor Name</th>
                                            <th class="py-4" scope="">Service Details</th>
                                            <th class="py-4" scope="">Price</th>
                                            <th class="py-4" scope="">Payment Status</th>
                                            <th class="py-4" scope="">Status</th>
                                            <th class="py-4" scope="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($orders as $order)

                                            <tr class="text-gray-700 border-b">

                                                <td class="px-1 py-5 text-sm w-2/8">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                            @if ($order->user_freelancer->detail_user->photo != NULL)
                                                                
                                                                <img class="object-cover w-full h-full rounded-full" src="{{ url(Storage::url($order->user_freelancer->detail_user->photo)) }}" alt="Photo freelancer" loading="lazy" />

                                                            @else

                                                                <img class="object-cover w-full h-full rounded-full" src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="">
                                                                

                                                            @endif

                                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                        </div>

                                                        <div>
                                                            <p class="font-medium text-black">{{ $order->user_freelancer->name ?? '' }}</p>
                                                            <p class="text-sm text-gray-400">{{ $order->user_freelancer->ddetail_user->role ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="w-2/6 px-1 py-5">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                            @if ($order->service->thumbnail_Service[0]->thumbnail)
                                                            
                                                                <img class="object-cover w-full h-full rounded" src="{{ url(Storage::url($order->service->thumbnail_service[0]->thumbnail)) }}" alt="" loading="lazy" />
                                                                
                                                            @else

                                                                <img class="object-cover w-full h-full rounded" src="{{ asset('/assets/1.png') }}" alt="" loading="lazy" />
                                                                
                                                            @endif

                                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                        </div>

                                                        <div>
                                                            <p class="font-medium text-black">
                                                                {{ $order->service->title ?? '' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-1 py-5 text-sm">
                                                    {{ 'Rp. '.number_format($order->service->price) ?? '' }}
                                                </td>

                                                @if ($order->payment_status == 'Waiting')
                                                    <td class="px-1 py-5 text-sm">
                                                        <a href="{{ $order->midtrans_url }}" class="px-4 ml-3 py-2 mt-2 text-center text-white rounded-xl bg-serv-button">Pay Here</a>
                                                    </td>
                                                @else
                                                    <td class="px-1 py-5 text-sm">
                                                        <div class="mr-5 py-2 mt-2 text-center text-white rounded-xl bg-serv-email ">{{ $order->payment_status ?? '' }}</div>
                                                    </td>
                                                @endif

                                                <td class="px-1 py-5 text-sm text-green-500 
                                                    @if ($order->order_status_id == '1')
                                                        {{ 'text-green-500' }}
                                                    @elseif($order->order_status_id == '2')
                                                        {{ 'text-yellow-500' }}
                                                    @elseif($order->order_status_id == '3')
                                                        {{ 'text-red-500' }}
                                                    @endif
                                                    text-md">
                                                    {{ $order->order_status->name ?? '' }}
                                                </td>
                                                
                                                <td class="px-1 py-5 text-sm">
                                                
                                                @if ($order->order_status_id == '1')

                                                    <a href="{{ route('member.order.show', $order->id) }}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">
                                                    Certificate</a>

                                                    <p  class="px-4 py-2 mt-2 text-left text-green-500 rounded-xl ">
                                                        Approved
                                                    </p>

                                                @elseif($order->order_status_id == '2')

                                                    <a href="{{ route('member.class.show', $order->id) }}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">
                                                    Materi</a>

                                                @elseif($order->order_status_id == '3')

                                                    <p class="px-4 py-2 mt-2 text-left text-red-500 rounded-xl">
                                                        Rejected
                                                    </p>

                                                @elseif($order->order_status_id == '4')
                                                
                                                    <a href="{{ route('member.order.show', $order->id) }}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">
                                                    Details</a>

                                                @else
                                                    {{ 'N/A' }}
                                                @endif

                                            </td>
                                            </tr>
                                            
                                        @empty
                                    
                                        @endforelse
                                        
                                        

                                    </tbody>
                                </table>
                            </div> --}}
                        </main>
                    </div>
                </section>
    </main>

@else

    <div class="flex h-screen">
                <div class="m-auto text-center">
                    <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        There is No Request Yet
                    </h2>
                    <p class="text-sm text-gray-400">
                    It seems that you haven’t ordered any service. <br>
                    Let’s order your first service!
                    </p>

                    <div class="relative mt-0 md:mt-6">
                        <a href="{{ route('explore.landing') }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                            Find Services
                        </a>
                    </div>
                </div>
        </div>

@endif


@endsection