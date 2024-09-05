<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2c9290e2d0.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    <div class="w-full flex bg-[#F8F8FA]">
        {{-- Side Bar --}}
        <aside class="transition-all h-[100vh] bg-white shadow sm:w-64 sm:fixed sm:-left-64 sm:top-0 lg:sticky lg:w-20 lg:left-0 xl:sticky xl:w-64" id="sidebar">
            @include('layout.sidebar')
        </aside>

        {{-- content --}}
        <div class="w-full">
            <nav class="w-full h-[60px] bg-white shadow flex justify-between items-center">
                <div class="ml-4 hidden sm:hidden lg:hidden xl:block cursor-pointer" id="bar">
                    <i class="fa-solid fa-bars-staggered text-black text-[30px]"></i>
                </div>
                <div class="ml-4 hidden sm:hidden lg:block xl:hidden cursor-pointer" id="bar-ipad">
                    <i class="fa-solid fa-bars-staggered text-black text-[30px]"></i>
                </div>
                <div class="ml-4 hidden sm:block lg:hidden xl:hidden cursor-pointer" id="bar-phone">
                    <i class="fa-solid fa-bars-staggered text-black text-[30px]"></i>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>


</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bar = document.getElementById('bar');
        const barIpad = document.getElementById('bar-ipad');
        const barPhone = document.getElementById('bar-phone');
        const sidebar = document.getElementById('sidebar');

        bar.addEventListener('click', function(){
            sidebar.classList.toggle('xl:w-64');
            sidebar.classList.toggle('xl:w-20'); 
        });

        barIpad.addEventListener('click', function(){
            sidebar.classList.toggle('lg:w-20');
            sidebar.classList.toggle('lg:w-64');
        });
        barPhone.addEventListener('click', function(){
            sidebar.classList.toggle('sm:-left-64');
            sidebar.classList.toggle('sm:left-0');
        });
    });
</script>
</html>
