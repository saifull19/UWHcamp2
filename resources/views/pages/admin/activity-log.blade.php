@extends('layouts.app')

@section('title', 'My Service')

@section('content')

@if (count($activity))

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                All Activity
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                {{ $activity->count() }} All Activity
                            </p>
                        </div>
                        
                    </div>
                </div>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                                <table class="w-full" aria-label="Table">
                                    
                                    <thead>
                                        <tr class="text-sm font-normal text-gray-900 border-b border-b-gray-600">
                                            <th class="py-4 " scope="">ID</th>
                                            <th class="py-4 " scope="">Nama User</th>
                                            <th class="py-4 text-center" scope="">Description</th>
                                            <th class="py-4 pl-5" scope="">Subject_type</th>
                                            <th class="py-4" scope="">Subject_id</th>
                                            <th class="py-4 text-center" scope="">Dates</th>
                                            <th class="py-4 text-center" scope="">Attributes</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($activity as $item)
                                            
                                            <tr class="text-gray-700 border-b">
                                                <td class="px-1 py-5 font-bold text-sm">
                                                    {{ $item->causer_id }}
                                                </td>

                                                <td class=" px-1 py-5">
                                                    {{ $item->log_name ?? '' }}
                                                </td>

                                                <td class="px-8 font-bold py-5 text-sm">
                                                    {{ $item->description ?? '' }}
                                                </td>

                                                <td class="px-8 py-5 text-sm">
                                                    {{ $item->subject_type ?? '' }}
                                                </td>
                                                
                                                <td class="px-8 py-5 text-sm font-bold text-center text-green-500 text-md">
                                                    {{ $item->subject_id }}
                                                </td>
                                                
                                                <td class="px-8 py-5 text-sm">
                                                     <p class="py-2 mt-2  text-center">
                                                         
                                                         {{ $item->created_at ?? '' }}
                                                    </p>
                                                </td>
                                                
                                                <td class="pl-5 px-1 py-5 text-sm text-center">
                                                    <p class="py-2 mt-2  text-center">
                                                         
                                                         {!! $item->properties !!}
                                                    </p>
                                                </td>
                                            </tr>

                                        @empty
                                            
                                        @endforelse

                                    </tbody>
                                </table>
                                <div class="py-5 font-normal">
                                    {{ $activity->links() }}
                                </div>
                            </div>
                        </main>
                    </div>
                </section>
    </main>

@else

        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Requests Yet
                </h2>
                <p class="text-sm text-gray-400">
                    It seems that you haven’t provided any service. <br>
                    Let’s create your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('admin.webinar.create') }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Menu
                    </a>
                </div>
            </div>
        </div>

@endif
    
@endsection