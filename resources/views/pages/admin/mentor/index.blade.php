@extends('layouts.app')

@section('title', 'My Service')

@section('content')

@if (count($mentor))

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                My Mentor
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                {{ $mentor->count() }} Total Mentor
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">
                                <a href="{{ route('admin.mentor.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    + Add Mentor
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
                                            <th class="py-4" scope="">Name</th>
                                            <th class="py-4" scope="">No Tlp</th>
                                            <th class="py-4" scope="">Keahlian</th>
                                            <th class="py-4" scope="">Email</th>
                                            <th class="py-4" scope="">Status</th>
                                            <th class="py-4" scope="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($mentor as $key => $men)
                                            
                                            <tr class="text-gray-700 border-b">
                                                <td class="w-2/6 px-1 py-5">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                            @if ($men->detail_user->photo != null )

                                                                <img class="object-cover w-full h-full rounded" src="{{ url(Storage::url($men->detail_user->photo)) }}" alt="thumbnail" loading="lazy" />

                                                            @else
                                                            
                                                                <img class="object-cover w-full h-full rounded" src="{{ url('https://randomuser.me/api/portraits/men/3.jpg') }}" alt="" loading="lazy" />
                                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>

                                                            @endif

                                                        </div>

                                                        <div>
                                                            
                                                            <a href="{{ route('admin.mentor.show', $men->id) }}" class="font-medium text-black">
                                                                {{ $men->name ?? '' }}
                                                            </a>

                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-1 py-5 text-sm">
                                                    {{ $men->detail_user->contact_number ?? '' }}
                                                </td>
                                                <td class="px-1 py-5 text-sm">
                                                    {{ $men->detail_user->role ?? '' }}
                                                </td>

                                                <td class="px-1 py-5 text-sm">
                                                    {{ $men->email ?? '' }}
                                                </td>
                                                 
                                                <td class="px-1 py-5 text-sm text-green-500 text-md">
                                                            @if ($men->status == 'Active')
                                                                {{ $men->status ?? '' }}
                                                            @else
                                                                <p class="text-grey-800">{{ $men->status ?? '' }}</p>
                                                            @endif
                                                </td>
                                                
                                                
                                                <td class="px-1 py-5 text-sm">
                                                    <a href="{{ route('admin.mentor.show', $men['id']) }}" class="py-2 mt-2 text-serv-yellow hover:text-gray-800">
                                                        <i class="fas fa-eye fa-lg"></i>
                                                    </a>
                                                    <a href="{{ route('admin.mentor.edit', $men['id']) }}" class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i>
                                                        
                                                    </a>

                                                    <form action="{{ route('admin.mentor.destroy', $men->id) }}" method="post" >
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
                    <a href="{{ route('admin.mentor.create') }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Mentor
                    </a>
                </div>
            </div>
        </div>

@endif
    
@endsection