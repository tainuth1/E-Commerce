<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{font-family: "Poppins", system-ui;}
        body::-webkit-scrollbar{display: none}
    </style>
    <title>@yield('title')</title>
</head>
<body class="">
    <div class="w-full h-full flex bg-[#F1F4FA] dark:bg-[#232323]">
        {{-- Side Bar h-[729px]--}}
        <aside class="transition-all h-full z-[2] bg-white shadow sm:w-64 sm:fixed sm:-left-64 sm:top-0 lg:sticky lg:top-0 lg:w-20 lg:left-0 xl:sticky xl:top-0 xl:w-64
            dark:bg-[#2C2C2C]
        " id="sidebar">
            @include('layout.sidebar')
        </aside>

        {{-- Nav Bar --}}
        <div class="w-full h-full m-4">
            <nav class="w-full h-[60px] rounded-lg bg-white sticky top-0 z-[1] shadow-md flex justify-between items-center dark:bg-[#2C2C2C]">
                <div class="ml-4 hidden sm:hidden lg:hidden xl:block cursor-pointer" id="bar">
                    <i class='bx bx-menu-alt-left text-black text-[39px] dark:text-gray-200'></i>
                </div>
                <div class="ml-4 hidden sm:hidden lg:block xl:hidden cursor-pointer" id="bar-ipad">
                    <i class='bx bx-menu-alt-left text-black text-[39px] dark:text-gray-200'></i>
                </div>
                <div class="ml-4 hidden sm:block lg:hidden xl:hidden cursor-pointer" id="bar-phone">
                    <i class='bx bx-menu-alt-left text-black text-[39px] dark:text-gray-200'></i>
                </div>

                {{-- profile --}}
                <div class="flex items-center gap-3">
                    <div class="">
                        <button id="theme-toggle"
                            class="h-10 w-10 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="fill-violet-700 block dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg class="fill-yellow-500 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="w-9 h-9 rounded-full overflow-hidden cursor-pointer border-[2px] border-blue-600 mr-4 dark:border-white">
                        <div class="w-full h-full rounded-full">
                            <img src="https://avatars.githubusercontent.com/u/148186087?v=4" class="w-full h-full object-cover" alt="">
                        </div>
                    </div>
                </div>
            </nav>
            {{-- Content --}}
            @yield('content')
        </div>
    </div>

@vite(['resources/js/app.js'])
@vite(['resources/js/chart.js'])
@vite(['resources/js/calender.js'])
@vite(['resources/js/counting.js'])
@vite(['resources/js/createproduct.js'])
@vite(['resources/js/showproduct.js'])
@vite(['resources/js/productpreview.js'])
@vite(['resources/js/updateproduct.js'])
</body>
</html>
