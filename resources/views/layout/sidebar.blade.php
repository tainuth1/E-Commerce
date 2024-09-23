<style>.side-bar::-webkit-scrollbar {display: none;}</style>

<div class="w-full h-full">
    <div class="w-full h-[60px] flex justify-center items-center">
        <div class=" w-11 h-11 cursor-pointer rounded-lg overflow-hidden">
            <img class="w-full h-full object-cover" src="https://cdn-1.webcatalog.io/catalog/alibaba/alibaba-icon.png" alt="">
        </div>
    </div>
        <div class="w-full h-[653px] mt-4 overflow-y-scroll side-bar">
        <div class="w-full h-full">
            <ul class="flex flex-col px-4 gap-2">


                <li class="group flex items-center justify-between bg-blue-500 text-white cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class=' bx bxs-dashboard text-[20px] text-white transition-all group-hover:text-whit' ></i>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class=" text-menu text-[14px] transition-all opacity-[1] visible group-hover:text-white">Dashboard</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center">
                            <i class='bx bxs-bar-chart-alt-2 text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Analytic</a>
                    </div> 
                    <div class="drop-sub drop-bar flex justify-center items-center " id="">
                        <i class='bx bxs-chevron-down text-[17px] transition-all chevron group-hover:text-white dark:text-gray-200'></i>
                    </div>
                </li>
                <div class="w-full hidden sub-menu">
                    <div class="pl-9">
                        <ul class="">
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class=' bx bxs-cart-alt text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Sales</a>
                    </div>
                    <div class="drop-sub drop-bar flex justify-center items-center" id="">
                        <i class='bx bxs-chevron-down text-[17px] transition-all chevron group-hover:text-white dark:text-gray-200'></i>   
                    </div>
                </li>
                <div class="w-full hidden sub-menu">
                    <div class="pl-9">
                        <ul class="">
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class=' bx bxs-envelope text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Message</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center">
                            <i class='bx bxs-bar-chart-alt-2 text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Products</a>
                    </div> 
                    <div class="drop-sub drop-bar flex justify-center items-center " id="">
                        <i class='bx bxs-chevron-down text-[17px] transition-all chevron group-hover:text-white dark:text-gray-200'></i>
                    </div>
                </li>
                <div class="w-full hidden sub-menu">
                    <div class="pl-9">
                        <ul class="">
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="{{ route('product.create') }}" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Add Products</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Views</a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Sold Out   </a>
                            </li>
                            <li class="group p-2 rounded-md transition-all hover:bg-blue-500">
                                <a href="" class="text-[14px] text-[#5e5e5e] transition-all group-hover:text-white dark:text-gray-300">Overviews</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class=' bx bxs-user-account text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">User</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class='bx bxs-message-alt-dots text-[20px] text-black transition-all group-hover:text-white dark:text-white'></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">FeedBack</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class='bx bxs-report text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Report</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class=' bx bxs-cog text-[20px] text-black transition-all group-hover:text-white dark:text-white' ></i>
                        </div>
                        <a href="" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Setting</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>


                <li class="group flex items-center justify-between cursor-pointer transition-all hover:bg-blue-500 rounded-md">
                    <div class="flex items-center gap-1">
                        <div class="w-10 h-10  rounded-md flex justify-center items-center transition-all">
                            <i class='bx bx-log-out text-[20px] text-black transition-all group-hover:text-white dark:text-white'></i>
                        </div>
                        <a href="{{ route('logout') }}" class="text-menu text-[14px] text-[#5e5e5e] transition-all opacity-[1] visible group-hover:text-white dark:text-gray-300">Logout</a>
                    </div>
                    <div class="drop-sub flex justify-center items-center" id=""></div>
                </li>
            </ul>
        </div>
    </div>
</div>