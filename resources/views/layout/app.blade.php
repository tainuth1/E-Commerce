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
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{
            font-family: "Poppins", system-ui;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body class="">
    <div class="w-full h-full flex bg-[#F1F4FA] dark:bg-black">
        {{-- Side Bar h-[729px]--}}
        <aside class="transition-all h-full z-[99] bg-white shadow sm:w-64 sm:fixed sm:-left-64 sm:top-0 lg:sticky lg:top-0 lg:w-20 lg:left-0 xl:sticky xl:top-0 xl:w-64" id="sidebar">
            @include('layout.sidebar')
        </aside>

        {{-- Nav Bar --}}
        <div class="w-full h-full">
            <nav class="w-full h-[60px] bg-white sticky top-0 z-[98] shadow-md flex justify-between items-center">
                <div class="ml-4 hidden sm:hidden lg:hidden xl:block cursor-pointer" id="bar">
                    <i class='bx bx-menu-alt-left text-black text-[39px]'></i>
                </div>
                <div class="ml-4 hidden sm:hidden lg:block xl:hidden cursor-pointer" id="bar-ipad">
                    <i class='bx bx-menu-alt-left text-black text-[39px]'></i>
                </div>
                <div class="ml-4 hidden sm:block lg:hidden xl:hidden cursor-pointer" id="bar-phone">
                    <i class='bx bx-menu-alt-left text-black text-[39px]'></i>
                </div>

                {{-- profile --}}
                <div class="w-9 h-9 rounded-full overflow-hidden cursor-pointer border border-blue-600 mr-4">
                    <div class="w-full h-full">
                        <img src="https://avatars.githubusercontent.com/u/148186087?v=4" class="w-full h-full object-cover" alt="">
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
</body>
</html>
