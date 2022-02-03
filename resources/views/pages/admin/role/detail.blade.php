@extends('layouts.app')

@section('title', 'Detail Role')

@section('content')


    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Akses Roles {{ $role->role_user ?? '' }}
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                {{ $role->akses->count() }} Total Akses Roles
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">
                                <a href="{{ route('admin.role.edit', $role->id) }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    ! Edit Akses Role
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
                                            <th class="py-4" scope="">Menu</th>
                                            <th class="py-4" scope="">Activ</th>
                                            <th class="py-4" scope="">Akses</th>
                                            <th class="py-4" scope="">Created</th>
                                            <th class="py-4" scope="">Edit</th>
                                            <th class="py-4" scope="">Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                            
                                        @foreach ($akses as $item)
                                            <tr class="text-gray-700 border-b">
                                                    <td class="px-1 py-5 font-normal text-md">
                                                        {{ $item->menu->nama_menu }}
                                                    </td>

                                                    <td class="px-1 py-5 font-bold text-md">
                                                        {{ $item->menu->activ }}
                                                    </td>

                                                    @if ($item->akses == 1)
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/check-icon.svg') }}" >
                                                        </td>
                                                    @else
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/ic_secure.svg') }}" >
                                                        </td>
                                                    @endif
                                                    
                                                    @if ($item->tambah == 1)
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/check-icon.svg') }}" >
                                                        </td>
                                                    @else
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/ic_secure.svg') }}" >
                                                        </td>
                                                    @endif

                                                    @if ($item->edit == 1)
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/check-icon.svg') }}" >
                                                        </td>
                                                    @else
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/ic_secure.svg') }}" >
                                                        </td>
                                                    @endif

                                                    @if ($item->hapus == 1)
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/check-icon.svg') }}" >
                                                        </td>
                                                    @else
                                                        <td class="px-1 py-5 text-sm">
                                                            <img class="mr-3" src="{{ asset('/assets/images/ic_secure.svg') }}" >
                                                        </td>
                                                    @endif


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <div class="px-4 py-5 mt-5 text-right sm:px-6">
    
                                            <a href="{{ route('admin.role.index') }}" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                Back
                                            </a>
    
                                            <a href="{{ route('admin.role.edit', $role->id) }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Are you sure want to submit this data ?')">
                                                Edit Akses
                                            </a>
    
                                        </div>
                            </div>
                        </main>
                    </div>
                </section>
    </main>

    
@endsection