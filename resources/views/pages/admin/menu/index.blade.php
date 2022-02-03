@extends('layouts.app')

@section('title', 'My Service')

@section('content')

@if (count($menu))

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                All Menu
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                {{ $menu->count() }} Total Menu
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">
                                <a href="{{ route('admin.menu.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    + Add Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                                <table class="w-full" aria-label="Table">
                                    
                                    <thead>
                                        <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                            <th class="py-4 " scope="">ID</th>
                                            <th class="py-4 " scope="">Menu</th>
                                            <th class="py-4" scope="">Level Menu</th>
                                            <th class="py-4 pl-5" scope="">Icon</th>
                                            <th class="py-4" scope="">Activ</th>
                                            <th class="py-4 text-center" scope="">Created</th>
                                            <th class="py-4 text-center" scope="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($menu as $item)
                                            
                                            <tr class="text-gray-700 border-b">
                                                <td class="px-1 py-5 text-sm">
                                                    {{ $item->id ?? '' }}
                                                </td>

                                                <td class=" px-1 py-5">
                                                    {{ $item->nama_menu ?? '' }}
                                                </td>

                                                <td class="px-1 py-5 text-sm">
                                                    {{ $item->level_menu ?? '' }}
                                                </td>

                                                <td class="px-1 py-5 text-sm">
                                                    {{ $item->icon ?? '' }}
                                                </td>
                                                
                                                <td class="px-1 py-5 text-sm font-bold text-green-500 text-md">
                                                    {{ $item->activ }}
                                                </td>
                                                
                                                <td class="px-5 py-5 text-sm">
                                                     <p class="py-2 mt-2 text-white rounded-xl text-center bg-serv-email">
                                                         
                                                         {{ $item->created_at->diffForHumans() ?? '' }}
                                                    </p>
                                                </td>
                                                
                                                <td class="pl-5 px-1 py-5 text-sm text-center">
                                                    {{-- <a href="{{ route('admin.menu.show', $item['id']) }}" class="py-2 mt-2 text-serv-yellow hover:text-gray-800">
                                                        <i class="fas fa-eye fa-lg"></i>
                                                    </a> --}}
                                                    <a href="{{ route('admin.menu.edit', $item['id']) }}" class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i>
                                                        
                                                    </a>

                                                    <form class="inline" action="{{ route('admin.menu.destroy', $item->id) }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                    <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt fa-lg"></i>
                                                        
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            
                                        @endforelse

                                    </tbody>
                                </table>
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