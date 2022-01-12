<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            rel="icon"
            type="img/png"
            sizes="32x32"
            href="{{ asset('assets/favicon.png') }}"
        />
        
        <link rel="stylesheet" href="tailwind.css" />

        <link
            rel="stylesheet"
            href="{{ url('https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css') }}"
        />

        <title>About | UWHcamp</title>

        <style>
            #menu-toggle:checked + #menu {
                display: block;
            }

            #dropdown-toggle:checked + #dropdown {
                display: block;
            }

            a,span {
                position: relative;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            a.arrow,
            span.arrow {
                display: flex;
                align-items: center;
                font-weight: 600;
                line-height: 1.5;
            }

            a.arrow .arrow_icon,
            span.arrow .arrow_icon {
                position: relative;
                margin-left: 0.5em;
            }

            a.arrow .arrow_icon svg,
            span.arrow .arrow_icon svg {
                transition: transform 0.3s 0.02s ease;
                margin-right: 1em;
            }

            a.arrow .arrow_icon::before,
            span.arrow .arrow_icon::before {
                content: "";
                display: block;
                position: absolute;
                top: 50%;
                left: 0;
                width: 0;
                height: 2px;
                background: #38b2ac;
                transform: translateY(-50%);
                transition: width 0.3s ease;
            }

            a.arrow:hover .arrow_icon::before,
            span.arrow:hover .arrow_icon::before {
                width: 1em;
            }

            a.arrow:hover .arrow_icon svg,
            span.arrow:hover .arrow_icon svg {
                transform: translateX(0.75em);
            }

            /* .cover {
      border-bottom-right-radius: 128px;
    } */

            .bg-blue-teal-gradient {
                background: rgb(49, 130, 206);
                background: linear-gradient(
                    90deg,
                    rgba(49, 130, 206, 1) 0%,
                    rgba(56, 178, 172, 1) 100%
                );
            }

            /* @media (min-width: 1024px) {
      .cover {
        border-bottom-right-radius: 256px;
      }
    } */
        </style>
    </head>

    <body class="antialiased bg-white font-sans text-gray-900">
        <main class="w-full">
            <!-- start header -->
            <header
                class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64"
            >
                <div
                    class="hidden md:flex justify-between items-center py-2 border-b text-sm py-3"
                    style="border-color: rgba(255, 255, 255, 0.25)"
                >
                    <div class="">
                        <ul class="flex text-white">
                            <li>
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 fill-current text-white"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z"
                                        />
                                    </svg>

                                    <span class="ml-2"
                                        >Universitas KH. A. Wahab Chasbullah Jombang</span
                                    >
                                </div>
                            </li>
                            <li class="ml-6">
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 fill-current text-white"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z"
                                        />
                                    </svg>

                                    <span class="ml-2">+62 81233285849</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="">
                        <ul class="flex justify-end text-white">
                            <li>
                                <a href="#" target="_blank" title="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        class="fill-current"
                                    >
                                        <path
                                            d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592	c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20	c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z"
                                        ></path>
                                    </svg>
                                </a>
                            </li>

                            <li class="ml-6">
                                <a href="#" target="_blank" title="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        class="fill-current"
                                    >
                                        <path
                                            d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809	c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793	c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05	c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032	c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028	c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22	c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"
                                        ></path>
                                    </svg>
                                </a>
                            </li>

                            <li class="ml-6">
                                <a href="#" target="_blank" title="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        class="fill-current"
                                    >
                                        <path
                                            d="M20.947,8.305c-0.011-0.757-0.151-1.508-0.419-2.216c-0.469-1.209-1.424-2.165-2.633-2.633 c-0.699-0.263-1.438-0.404-2.186-0.42C14.747,2.993,14.442,2.981,12,2.981s-2.755,0-3.71,0.055 c-0.747,0.016-1.486,0.157-2.185,0.42C4.896,3.924,3.94,4.88,3.472,6.089C3.209,6.788,3.067,7.527,3.053,8.274 c-0.043,0.963-0.056,1.268-0.056,3.71s0,2.754,0.056,3.71c0.015,0.748,0.156,1.486,0.419,2.187 c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45c0.963,0.043,1.268,0.056,3.71,0.056s2.755,0,3.71-0.056 c0.747-0.015,1.486-0.156,2.186-0.419c1.209-0.469,2.164-1.425,2.633-2.633c0.263-0.7,0.404-1.438,0.419-2.187 c0.043-0.962,0.056-1.267,0.056-3.71C21.003,9.572,21.003,9.262,20.947,8.305z M11.994,16.602c-2.554,0-4.623-2.069-4.623-4.623 s2.069-4.623,4.623-4.623c2.552,0,4.623,2.069,4.623,4.623S14.546,16.602,11.994,16.602z M16.801,8.263 c-0.597,0-1.078-0.482-1.078-1.078s0.481-1.078,1.078-1.078c0.595,0,1.077,0.482,1.077,1.078S17.396,8.263,16.801,8.263z"
                                        ></path>
                                        <circle
                                            cx="11.994"
                                            cy="11.979"
                                            r="3.003"
                                        ></circle>
                                    </svg>
                                </a>
                            </li>

                            <li class="ml-6">
                                <a href="#" target="_blank" title="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        class="fill-current"
                                    >
                                        <path
                                            d="M21.593,7.203c-0.23-0.858-0.905-1.535-1.762-1.766C18.265,5.007,12,5,12,5S5.736,4.993,4.169,5.404	c-0.84,0.229-1.534,0.921-1.766,1.778c-0.413,1.566-0.417,4.814-0.417,4.814s-0.004,3.264,0.406,4.814	c0.23,0.857,0.905,1.534,1.763,1.765c1.582,0.43,7.83,0.437,7.83,0.437s6.265,0.007,7.831-0.403c0.856-0.23,1.534-0.906,1.767-1.763	C21.997,15.281,22,12.034,22,12.034S22.02,8.769,21.593,7.203z M9.996,15.005l0.005-6l5.207,3.005L9.996,15.005z"
                                        ></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-between py-6">
                    <div class="w-1/2 md:w-auto">
                        <a
                            href="{{ route('index') }}"
                            class="text-white font-bold text-2xl"
                        >
                            <img src="{{ asset('/assets/images/logo.png') }}" alt="">
                        </a>
                    </div>

                    <label
                        for="menu-toggle"
                        class="pointer-cursor md:hidden block"
                        ><svg
                            class="fill-current text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 20 20"
                        >
                            <title>menu</title>
                            <path
                                d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
                            ></path>
                        </svg>
                    </label>

                    <input class="hidden" type="checkbox" id="menu-toggle" />

                    <div class="hidden md:block w-full md:w-auto" id="menu">
                        <nav
                            class="w-full bg-white md:bg-transparent rounded shadow-lg px-6 py-4 mt-4 text-center md:p-0 md:mt-0 md:shadow-none"
                        >
                            <ul class="md:flex  items-center ">
                                <li >
                                    <a
                                        class="py-2 inline-block md:text-white md:hidden hover:text-gray-700 lg:block font-semibold"
                                        href="{{ route('index') }}"
                                        >Home</a>
                                </li>
                                <li class="md:ml-4">
                                    <a
                                        class="py-2 inline-block md:text-white hover:text-gray-700 md:px-2 font-semibold"
                                        href="{{ route('explore.landing') }}"
                                        >Bootcamp</a>
                                </li>
                                <li class="md:ml-4">
                                    <a
                                        class="py-2 inline-block md:text-white hover:text-gray-700 md:px-2 font-semibold"
                                        href="{{ route('profesional.landing') }}"
                                        >Professional Development</a
                                    >
                                </li>
                                <li class="md:ml-4 md:hidden lg:block">
                                    <a
                                        class="py-2 inline-block hover:text-gray-700 md:text-white md:px-2 font-semibold"
                                        href="#"
                                        >Corporate</a
                                    >
                                </li>
                                <li class="md:ml-4">
                                    <a
                                        class="py-2 inline-block hover:text-gray-700 md:text-white md:px-2 font-semibold"
                                        href="{{ route('create') }}"
                                        >About Us</a
                                    >
                                </li>
                                <li class="md:ml-6 mt-3 md:mt-0">
                                    {{-- <a
                                        class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded"
                                        href="book-appointment.html"
                                        >Book Appointment</a
                                    > --}}

                                    @auth
                                        <a href="{{ route('member.dashboard.index') }}" class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 hover:text-gray-700 md:bg-transparent md:text-white border border-white rounded">
                                            MyDashboard
                                        </a>
                                    @if (auth()->user()->detail_user()->first()->photo != NULL)
  
                                <img src="{{ url(Storage::url(auth()->user()->detail_user()->first()->photo)) }}" alt="Photo Profile" class="inline ml-3 h-12 w-12 rounded-full">
  
                            {{-- @if (Auth::user()->avatar)
                            <img src="{{Auth::user()->avatar}}" class="inline ml-3 h-12 w-12 rounded-full" alt="Member profile"> --}}
                            @else    
                            {{-- <img src="https://ui-avatars.com/api/?name=Admin" class="user-photo rounded-cilcle" alt="" style="border-radius: 50%"> --}}
                                            
                                <img class="inline ml-3 h-12 w-12 rounded-full" src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="">
  
                            @endif
           @endauth

          @guest
              <a onclick="toggleModal('loginModal')" class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded">
            Login
          </a>
          @endguest

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
            <!-- end header -->

            <!-- start hero -->
            <div class="bg-gray-100">
                <section
                    class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex items-center min-h-screen"
                >
                    <div class="h-full absolute top-0 left-0 z-0">
                        <img
                            src="{{ asset('/assets/images/cover-bg.jpg') }}"
                            alt=""
                            class="w-full h-full object-cover opacity-20"
                        />
                    </div>

                    <div class="lg:w-3/4 xl:w-2/4 relative z-10 h-100 lg:mt-16">
                        <div>
                            <h1
                                class="text-white text-4xl md:text-5xl xl:text-6xl font-bold leading-tight"
                            >
                                A better life starts with a beautiful smile.
                            </h1>
                            <p
                                class="text-blue-100 text-xl md:text-2xl leading-snug mt-4"
                            >
                                Welcome to the Dentist Office of Dr. Thomas
                                Dooley, where trust and comfort are priorities.
                            </p>
                            <a
                                href="#"
                                class="px-8 py-4 bg-teal-500 text-white rounded inline-block mt-8 font-semibold"
                                >Book Appointment</a
                            >
                        </div>
                    </div>
                </section>
            </div>
            <!-- end hero -->

            <!-- start about -->
            <section
                class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32"
            >
                <div class="flex flex-col lg:flex-row lg:-mx-8">
                    <div class="w-full lg:w-1/2 lg:px-8">
                        <h2 class="text-3xl leading-tight font-bold mt-4">
                            Welcome to the Dentist Office of Dr. Thomas Dooley
                        </h2>
                        <p class="text-lg mt-4 font-semibold">
                            Excellence in Dentistry in the Heart of NY
                        </p>
                        <p class="mt-2 leading-relaxed">
                            Donec convallis sollicitudin facilisis. Integer nisl
                            ligula, accumsan non tincidunt ac, imperdiet in
                            enim. Donec efficitur ullamcorper metus, eu
                            venenatis nunc. Nam eget neque tempus, mollis sem a,
                            faucibus mi.
                        </p>
                    </div>

                    <div class="w-full lg:w-1/2 lg:px-8 mt-12 lg:mt-0">
                        <div class="md:flex">
                            <div>
                                <div
                                    class="w-16 h-16 bg-blue-600 rounded-full"
                                ></div>
                            </div>
                            <div class="md:ml-8 mt-4 md:mt-0">
                                <h4 class="text-xl font-bold leading-tight">
                                    Everything You Need Under One Roof
                                </h4>
                                <p class="mt-2 leading-relaxed">
                                    Our comprehensive services allow you to
                                    receive all needed dental care right here in
                                    our state-of-art office – from dental
                                    cleanings and fillings to dental implants
                                    and extractions.
                                </p>
                            </div>
                        </div>

                        <div class="md:flex mt-8">
                            <div>
                                <div
                                    class="w-16 h-16 bg-blue-600 rounded-full"
                                ></div>
                            </div>
                            <div class="md:ml-8 mt-4 md:mt-0">
                                <h4 class="text-xl font-bold leading-tight">
                                    Our Patient-Focused Approach
                                </h4>
                                <p class="mt-2 leading-relaxed">
                                    Your treatment plan will perfectly match
                                    your needs, lifestyle, and goals. Even if
                                    it’s been years since you last visited the
                                    dentist, we can help. Our comfortable
                                    office, compassionate team, and
                                    minimally-invasive treatments will help you
                                    feel completely at ease.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:flex md:flex-wrap mt-24 text-center md:-mx-4">
                    <div class="md:w-1/2 md:px-4 lg:w-1/4">
                        <div
                            class="bg-white rounded-lg border border-gray-300 p-8"
                        >
                            <img
                                src="{{ asset('/assets/images/teeth-whitening.svg') }}"
                                alt=""
                                class="h-20 mx-auto"
                            />

                            <h4 class="text-xl font-bold mt-4">
                                Teeth Whitening
                            </h4>
                            <p class="mt-1">
                                Let us show you how our experience.
                            </p>
                            <a href="#" class="block mt-4">Read More</a>
                        </div>
                    </div>

                    <div class="md:w-1/2 md:px-4 mt-4 md:mt-0 lg:w-1/4">
                        <div
                            class="bg-white rounded-lg border border-gray-300 p-8"
                        >
                            <img
                                src="{{ asset('/assets/images/oral-surgery.svg') }}"
                                alt=""
                                class="h-20 mx-auto"
                            />

                            <h4 class="text-xl font-bold mt-4">Oral Surgery</h4>
                            <p class="mt-1">
                                Let us show you how our experience.
                            </p>
                            <a href="#" class="block mt-4">Read More</a>
                        </div>
                    </div>

                    <div class="md:w-1/2 md:px-4 mt-4 md:mt-8 lg:mt-0 lg:w-1/4">
                        <div
                            class="bg-white rounded-lg border border-gray-300 p-8"
                        >
                            <img
                                src="{{ asset('/assets/images/painless-dentistry.svg') }}"
                                alt=""
                                class="h-20 mx-auto"
                            />

                            <h4 class="text-xl font-bold mt-4">
                                Painless Dentistry
                            </h4>
                            <p class="mt-1">
                                Let us show you how our experience.
                            </p>
                            <a href="#" class="block mt-4">Read More</a>
                        </div>
                    </div>

                    <div class="md:w-1/2 md:px-4 mt-4 md:mt-8 lg:mt-0 lg:w-1/4">
                        <div
                            class="bg-white rounded-lg border border-gray-300 p-8"
                        >
                            <img
                                src="{{ asset('/assets/images/periodontics.svg') }}"
                                alt=""
                                class="h-20 mx-auto"
                            />

                            <h4 class="text-xl font-bold mt-4">Periodontics</h4>
                            <p class="mt-1">
                                Let us show you how our experience.
                            </p>
                            <a href="#" class="block mt-4">Read More</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end about -->

            <!-- start testimonials -->
            <section
                class="relative bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-16 lg:py-32"
            >
                <div class="flex flex-col lg:flex-row lg:-mx-8">
                    <div class="w-full lg:w-1/2 lg:px-8">
                        <h2 class="text-3xl leading-tight font-bold mt-4">
                            Why choose the Mesothelioma Center?
                        </h2>
                        <p class="mt-2 leading-relaxed">
                            Aenean ut tellus tellus. Suspendisse potenti. Nullam
                            tincidunt lacus tellus, sed aliquam est vehicula a.
                            Pellentesque consectetur condimentum nulla, eleifend
                            condimentum purus vehicula in. Donec convallis
                            sollicitudin facilisis. Integer nisl ligula,
                            accumsan non tincidunt ac, imperdiet in enim. Donec
                            efficitur ullamcorper metus, eu venenatis nunc. Nam
                            eget neque tempus, mollis sem a, faucibus mi.
                        </p>
                    </div>

                    <div
                        class="w-full md:max-w-md md:mx-auto lg:w-1/2 lg:px-8 mt-12 mt:md-0"
                    >
                        <div class="bg-gray-400 w-full h-72 rounded-lg">

                        </div>

                        <p class="italic text-sm mt-2 text-center">
                            Aenean ante nisi, gravida non mattis semper.
                        </p>
                    </div>
                </div>
            </section>
            <!-- end testimonials -->

            <!-- start blog -->
            <section
                class="relative bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-32"
            >
                <div class="">
                    <h2 class="text-3xl leading-tight font-bold">
                        Health Blog
                    </h2>
                    <p class="text-gray-600 mt-2 md:max-w-lg">
                        Pellentesque habitant morbi tristique senectus et netus
                        et malesuada fames ac turpis egestas.
                    </p>

                    <a
                        href="#"
                        title=""
                        class="inline-block text-teal-500 font-semibold mt-6 mt:md-0"
                        >View All Posts</a
                    >
                </div>

                <div class="md:flex mt-12 md:-mx-4">
                    <div class="md:px-4 md:w-1/2 xl:w-1/4">
                        <div class="bg-white rounded border border-gray-300">

                            <div class="w-full h-48 overflow-hidden bg-gray-300">

                            </div>

                            <div class="p-4">
                                <div class="flex items-center text-sm">
                                    <span class="text-teal-500 font-semibold"
                                        >Business</span
                                    >
                                    <span class="ml-4 text-gray-600"
                                        >29 Nov, 2019</span
                                    >
                                </div>
                                <p
                                    class="text-lg font-semibold leading-tight mt-4"
                                >
                                    Card Title
                                </p>
                                <p class="text-gray-600 mt-1">
                                    This card has supporting text below as a
                                    natural lead-in to additional content.
                                </p>
                                <div class="flex items-center mt-4">
                                    <div
                                        class="w-8 h-8 rounded-full overflow-hidden bg-gray-300"
                                    ></div>
                                    <div class="ml-4">
                                        <p class="text-gray-600">
                                            By
                                            <span
                                                class="text-gray-900 font-semibold"
                                                >Abby Sims</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:px-4 md:w-1/2 xl:w-1/4 mt-4 md:mt-0">
                        <div class="bg-white rounded border border-gray-300">

                            <div class="w-full h-48 overflow-hidden bg-gray-300">
                                
                            </div>

                            <div class="p-4">
                                <div class="flex items-center text-sm">
                                    <span class="text-teal-500 font-semibold"
                                        >Business</span
                                    >
                                    <span class="ml-4 text-gray-600"
                                        >29 Nov, 2019</span
                                    >
                                </div>
                                <p
                                    class="text-lg font-semibold leading-tight mt-4"
                                >
                                    Card Title
                                </p>
                                <p class="text-gray-600 mt-1">
                                    This card has supporting text below as a
                                    natural lead-in to additional content.
                                </p>
                                <div class="flex items-center mt-4">
                                    <div
                                        class="w-8 h-8 rounded-full overflow-hidden bg-gray-300"
                                    ></div>
                                    <div class="ml-4">
                                        <p class="text-gray-600">
                                            By
                                            <span
                                                class="text-gray-900 font-semibold"
                                                >Abby Sims</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end blog -->

            <!-- start cta -->
            <section
                class="relative bg-blue-teal-gradient px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12 text-center md:text-left"
            >
                <div class="md:flex md:items-center md:justify-center">
                    <h2 class="text-xl font-bold text-white">
                        Get in touch with us today!
                        <br class="block md:hidden" />Call us on: +62 81233285849
                    </h2>
                    <a
                        href="#"
                        class="px-8 py-4 bg-white text-blue-600 rounded inline-block font-semibold md:ml-8 mt-4 md:mt-0"
                        >Start Appointment</a
                    >
                </div>
            </section>
            <!-- end cta -->

            <!-- start footer -->

            
           <footer class="bg-gray-900 relative py-2">
                <div class="mx-auto lg:px-16 md:px-20 px-8 py-8 ">
                    <div class="sm:flex sm:mt-16">
                        <div class="mt-8 sm:mt-0 sm:w-full flex flex-col md:flex-row justify-between">
                            <div class="flex-1 mt-2 flex-col">
                                <h2 class="font-medium text-white font-bold text-lg mb-4">Company</h2>
                                <div class="my-3">
                                    <a href="{{ route('index') }}" class="text-white hover:text-gray-700 font-normal">
                                        Home
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="{{ route('explore.landing') }}" class="text-white hover:text-gray-700 font-normal">
                                        Bootcamp
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Professional Development
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Corporate
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        About
                                    </a>
                                </div>
                            </div>
                            <div class="flex-1 mt-2 flex-col">
                                <h4 class="font-medium text-white font-bold text-lg mt-4 md:mt-0 mb-4">Featured Services</h4>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Programming &amp; Tech
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Graphics &amp; Design
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Digital Marketing
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Business
                                    </a>
                                </div>
                            </div>
                            <div class="flex-1 mt-2 flex-col">
                                <h4 class="font-medium text-white font-bold text-lg mt-4 md:mt-0 mb-4">Our Community</h4>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Instagram
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Telegram
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Facebook
                                    </a>
                                </div>
                                <div class="my-3">
                                    <a href="#" class="text-white hover:text-gray-700 font-normal">
                                        Discord
                                    </a>
                                </div>
                            </div>
                            <div class="flex-1 mt-2 flex-col lg:mr-28">
                                <h4 class="font-medium text-white font-bold text-lg mt-4 md:mt-0 mb-4">
                                    Get Weekly Updates & Tips
                                </h4>
                                <div class="my-3">
                                    <p class="text-white hover:text-gray-700 font-normal">
                                        Berlangganan buletin kami untuk mendapatkan berita mingguan, pembaruan, kiat, dan penawaran khusus Anda. Di setiap hari Senin!
                                    </p>
                                    <div class="flex flex-wrap items-stretch w-full mt-4 relative h-15 hover:text-black font-bold bg-serv-email rounded-lg items-center rounded mb-2 pr-5">
                                        <div class="flex -mr-px justify-center w-15 p-4">
                                            <span
                                            class="flex items-center leading-normal bg-serv-email px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
                                            >
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="5" width="20" height="14" rx="3" fill="#22B07D"/>
                                            <path d="M5 8L12 12L19 8" stroke="#0F3040" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>                                        
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <button onclick="toggleModal('loginModal')" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-gray-500 text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Subscribe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto lg:px-16 md:px-20 px-8 py-8 ">
                    <div class="mt-16 border-t border-serv-border sm:flex justify-between w-100 ">
                        <div class="flex items-left mt-8">
                            <h1 class="text-white text-3xl font-bold">
                                UWHcamp
                            </h1>
                        </div>
                        <div class="sm:flex items-center justify-center mt-8 lg:ml-24">
                            <p class="text-white">
                            <div class="sm:flex sm:space-x-6">
                                <span class="sm:flex block">
                                    <a href="#" class="text-white">Terms</a>
                                </span>
                                <span class="sm:flex block">
                                    <a href="#" class="text-white">Privacy</a>
                                </span>
                                <span class="sm:flex block">
                                    <a href="#" class="text-white">Updates</a>
                                </span>
                                <span class="sm:flex block">
                                    <a href="#" class="text-white">Contact us</a>
                                </span>
                            </div>
                            </p>
                        </div>
                        <div class="flex items-right flex-end mt-8">
                            <p class="text-white">
                                &copy; 2022 UWHcamp All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </main>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script
            async
            src="{{ url('https://www.googletagmanager.com/gtag/js?id=UA-131505823-4') }}"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-131505823-4");
        </script>
    </body>
</html>
