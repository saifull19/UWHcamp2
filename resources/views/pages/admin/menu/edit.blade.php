@extends('layouts.app')

@section('title', 'Create My Webinar')
@section('content')

    <main class="h-full overflow-y-auto">
                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-12">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Edit Menu {{ $menu->nama_menu ?? '' }}
                            </h2>

                            <p class="text-sm text-gray-400">
                                Update the MENU you provide
                            </p>

                        </div>
                    </div>
                </div>

                <!-- breadcrumb -->
                <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex p-0 list-none">

                        <li class="flex items-center">
                            <a href="{{ route('admin.menu.index') }}" class="text-gray-400">My Menu</a>
                            <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>

                        <li class="flex items-center">
                            <a href="#" class="font-medium">Edit Your Menu {{ $menu->nama_menu ?? '' }}</a>
                        </li>

                    </ol>
                </nav>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                                <form action="{{ route('admin.menu.update', [$menu->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="">
                                        <div class="px-4 py-5 sm:p-6">

                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 -mb-6">

                                                    <label for="nama_menu" class="block mb-3 font-medium text-gray-700 text-md">Title Menu</label>

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <input placeholder="Menu Name,,?" type="text" name="nama_menu" id="nama_menu" autocomplete="nama_menu" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $menu->nama_menu ?? '' }}" required>

                                                    @if ($errors->has('nama_menu'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('nama_menu') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <select id="level_menu" name="level_menu" autocomplete="level_menu" class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                        
                                                        <option>Level Menu</option>
                                                        <option value="main_menu" selected>main_menu</option>
                                                        <option value="sub_menu" selected>sub_menu</option>
                                                        {{-- <option value="30" selected>30 Orang</option> --}}
                                                      
                                                    </select>

                                                    @if ($errors->has('level_menu'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('level_menu') }}</p>
                                                    @endif
                                                    
                                                </div>
                                                

                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="master_menu" class="block mb-3 font-medium text-gray-700 text-md">Master Menu</label>

                                                    <input placeholder="No urut master" type="number" name="master_menu" id="master_menu" autocomplete="master_menu" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $menu->master_menu ?? '' }}" required>

                                                    @if ($errors->has('master_menu'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('master_menu') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="no_urut" class="block mb-2 font-medium text-gray-700 text-md">No Urut Menu</label>
                                                    
                                                   <input placeholder="No urut letak menu" type="number" name="no_urut" id="no_urut" autocomplete="no_urut" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $menu->no_urut ?? '' }}" required>

                                                    @if ($errors->has('no_urut'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('no_urut') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="url" class="block mb-2 font-medium text-gray-700 text-md">Url Menu</label>
                                                    
                                                   <input placeholder="No urut letak menu" type="text" name="url" id="url" autocomplete="url" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $menu->url ?? '' }}" required>

                                                    @if ($errors->has('url'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('url') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="icon" class="block mb-2 font-medium text-gray-700 text-md">Icon Menu</label>
                                                    
                                                   <input placeholder="No urut letak menu" type="text" name="icon" id="icon" autocomplete="icon" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $menu->icon ?? '' }}" required>

                                                    @if ($errors->has('icon'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('icon') }}</p>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>

                                        <div class="px-4 py-3 text-right sm:px-6">

                                            <a href="{{ route('admin.menu.index') }}" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                Cancel
                                            </a>

                                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Are you sure want to submit this data ?')">
                                                Update Menu
                                            </button>

                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </main>
                    </div>
                </section>
    </main>
    
    @endsection

    