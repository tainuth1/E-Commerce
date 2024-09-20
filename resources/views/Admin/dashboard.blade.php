@extends('layout.app')

@section('title', 'Dashboard')


@section('content')
    <div class="w-full h-full px-4 pt-4 pb-6">
        <div class="">
            <h2 class="font-semibold text-[22px] mb-3 dark:text-gray-100">Admin Dashboard</h2>
        </div>
        <div class="w-full grid grid-cols-4 gap-5">
            <div class="w-full h-[115px] flex items-center gap-7 pl-10 bg-white shadow-lg rounded-md dark:bg-[#2C2C2C]">
                <div class="w-[65px] h-[65px] flex justify-center items-center rounded-lg" style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);">
                    <img class="w-[80%] h-[80%] object-cover" src="./images/product-Icon.png" alt="">
                </div>
                <div class="">
                    <p class="text-[#5e5e5e] dark:text-gray-300">Products</p>
                    <p class="font-semibold text-[19px] value-number dark:text-gray-200" data-target="9999">0</p>
                </div>
            </div>  
            <div class="w-full h-[115px] flex items-center gap-7 pl-10 bg-white shadow-md rounded-md dark:bg-[#2C2C2C]">
                <div class="w-[65px] h-[65px] flex justify-center items-center bg-slate-200 rounded-lg" style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);">
                    <img class="w-[80%] h-[80%] object-cover" src="./images/order-Icon.png" alt="">
                </div>
                <div class="">
                    <p class="text-[#5e5e5e] dark:text-gray-300">Ordered</p>
                    <p class="font-semibold text-[19px] value-number dark:text-gray-200" data-target="9999">0</p>
                </div>
            </div>
            <div class="w-full h-[115px] flex items-center gap-7 pl-10 bg-white shadow-lg rounded-md dark:bg-[#2C2C2C]">
                <div class="w-[65px] h-[65px] flex justify-center items-center bg-slate-200 rounded-lg" style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);">
                    <img class="w-[80%] h-[80%] object-cover" src="./images/product-Icon.png" alt="">
                </div>
                <div class="">
                    <p class="text-[#5e5e5e] dark:text-gray-300">Customers</p>
                    <p class="font-semibold text-[19px] value-number dark:text-gray-200" data-target="9999">0</p>
                </div>
            </div>
            <div class="w-full h-[115px] flex items-center gap-7 pl-10 bg-white shadow-lg rounded-md dark:bg-[#2C2C2C]">
                <div class="w-[65px] h-[65px] flex justify-center items-center bg-slate-200 rounded-lg" style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);">
                    <img class="w-[80%] h-[80%] object-cover" src="./images/customers-Icon.png" alt="">
                </div>
                <div class="">
                    <p class="text-[#5e5e5e] dark:text-gray-300">Earned</p>
                    <p class="font-semibold text-[19px] value-number dark:text-gray-200" data-target="9999">0</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-9 gap-5 mt-4" style="grid-template-rows: repeat(4, 190px);">
            <div class="w-full bg-white shadow-md rounded-md px-4 pt-2 col-span-6 row-span-2 dark:bg-[#2C2C2C]">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-[18px] dark:text-gray-200">Sale Overviews</h2>
                    <div class="">
                        <i class='bx bx-dots-vertical-rounded text-[20px] dark:text-gray-200' id="test"></i>
                    </div>
                </div>
                <div class="" id="chart-area"></div>
            </div>
            <div class="w-full bg-white shadow-md rounded-md col-span-3 row-span-3 dark:bg-[#2C2C2C]">
                <div class="flex justify-between items-center px-4 pt-2">
                    <h2 class="font-semibold text-[18px] dark:text-gray-200">Event Calendar</h2>
                    <div class="flex justify-center items-center">
                        <i class='bx bx-dots-vertical-rounded text-[20px] dark:text-gray-200' id="test"></i>
                    </div>
                </div> 

                <div class="grid grid-cols-2 px-4 mt-3 gap-4 cursor-pointer">
                    <div class="bg-[#F1F4FA] py-2 px-3 rounded-lg dark:bg-[#232323] ">
                        <p class="text-[#5e5e5e] text-[11px] flex items-center gap-1 dark:text-gray-300"> 
                            <span class="text-[20px]">•</span> 19 Sep, 2024
                        </p>
                        <div class="flex pl-3">
                            <p class="font-medium text-[16px] text-[#FF6D0A]">Sport Compitition</p>
                            <i class='bx bx-right-arrow-alt text-[25px] dark:text-gray-300'></i>
                        </div>
                    </div>
                    <div class="bg-[#F1F4FA] py-2 px-3 rounded-lg dark:bg-[#232323] ">
                        <p class="text-[#5e5e5e] text-[11px] flex items-center gap-1 dark:text-gray-300"> 
                            <span class="text-[20px]">•</span> 19 Sep, 2024
                        </p>
                        <div class="flex pl-3">
                            <p class="font-medium text-[16px] text-[#FF6D0A]">School Annual Function</p>
                            <i class='bx bx-right-arrow-alt text-[25px] dark:text-gray-300'></i>
                        </div>
                    </div>
                </div>

                <div class="w-full p-4">
                    <div class="w-full p-2 dark:bg-[#232323] bg-[#F1F4FA] rounded-lg">
                        <div class="flex items-center px-4 mt-3 justify-between">
                            <div class="flex items-center">
                                <button id="prevMonth" aria-label="calendar backward" class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="15 6 9 12 15 18" />
                                    </svg>
                                </button>
                            </div>
                            <span id="currentMonth" class="text-base font-bold dark:text-gray-100 text-gray-800"></span>
                            <div class="flex items-center">
                                
                                <button id="nextMonth" aria-label="calendar forward" class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="9 6 15 12 9 18" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center pt-5 justify-between overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Su</p></th>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Mo</p></th>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Tu</p></th>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">We</p></th>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Th</p></th>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Fr</p></th>
                                        <th><p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Sa</p></th>
                                    </tr>
                                </thead>
                                <tbody id="calendarBody">
                                    <!-- Days will be dynamically generated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white shadow-md rounded-md px-4 pt-2 col-span-4 row-span-2 dark:bg-[#2C2C2C]">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-[18px] dark:text-gray-200">Top Products</h2>
                    <div class="">
                        <i class='bx bx-dots-vertical-rounded text-[20px] dark:text-gray-200' id="test"></i>
                    </div>
                </div>
                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full">
                        <thead>
                            <tr class="">
                                <td class="text-[#5e5e5e] text-left text-[13px] text-sm dark:text-gray-400">Image</td>
                                <td class="text-[#5e5e5e] text-left text-[13px] text-sm dark:text-gray-400">Name</td>
                                <td class="text-[#5e5e5e] text-left text-[13px] text-sm dark:text-gray-400">Category</td>
                                <td class="text-[#5e5e5e] text-left text-[13px] text-sm dark:text-gray-400">Sales</td>
                                <td class="text-[#5e5e5e] text-left text-[13px] text-sm dark:text-gray-400">Revenue</td>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr class=" border-b dark:border-gray-500">
                                    <td class="pt-3 pb-2">
                                        <img src="https://via.placeholder.com/40" alt="" class="w-10 h-10 object-cover rounded-sm">
                                    </td>
                                    <td class="pt-3 pb-2 text-[15px] truncate font-medium dark:text-gray-300">Galaxy S24 Ultra</td>
                                    <td class="pt-3 pb-2 text-[15px] text-[#5e5e5e] dark:text-[#9d9d9d]">Electronics</td>
                                    <td class="pt-3 pb-2 text-[15px] text-black dark:text-[#9d9d9d]">150</td>
                                    <td class="pt-3 pb-2 text-[15px] text-[#c48a20] dark:text-[#FF6D0A]">$4500</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-full bg-white shadow-md rounded-md pt-2 col-span-2 row-span-2 dark:bg-[#2C2C2C]">
                <div class="flex justify-between items-center px-3">
                    <h2 class="font-semibold text-[18px] dark:text-gray-200">Customers</h2>
                    <div class="">
                        <i class='bx bx-dots-vertical-rounded text-[20px] dark:text-gray-200' id="test"></i>
                    </div>
                </div> 
                <div class="w-full" id="radialbar">
                </div>
                <div class="w-full flex justify-evenly gap-5">
                    <div class="text-center">
                        <p class="text-[#5e5e5e] text-[15px] dark:text-gray-300">Total</p>
                        <p class="text-[18px] font-medium flex items-baseline gap-1 dark:text-gray-300"><i class='bx text-[18px] bx-user'></i> 245</p>
                    </div>
                    <div class="text-center"> 
                        <p class="text-[#5e5e5e] text-[15px] dark:text-gray-300">Loyalty</p>
                        <p class="text-[18px] font-medium flex text-[#c48a20] items-baseline gap-1 dark:text-[#FF6D0A]"><i class='bx bx-user'></i> 245</p>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <a href="" class="">
                        <button class="py-2 px-16 bg-blue-500 text-white rounded-md transition-all hover:bg-blue-600">
                            Detail
                        </button>
                    </a>
                </div>
            </div>
            <div class='w-full bg-white shadow-md rounded-md pt-2 col-span-3 p-3' style='background-image: url(images/community.jpg); background-size: cover;'>
                <p class="text-white font-semibold text-[22px] mt-2 ml-2">Join our community <br> and find out more..</p>
                <a href="">
                    <button class="py-2 px-5 ml-2 mt-10 bg-white rounded-md">
                        Explore Now
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection

