@extends('layout.app')

@section('title', 'Product')

@section('content')
    
<div class="w-full h-full px-1 pb-6">
    <div class="flex justify-between items-center my-4">
        @if (session('msg'))
            <div id="alert" class="fixed z-50 top-9 right-[400px] flex w-[500px] shadow-xl rounded-lg transition-transform duration-300">
                <div class="bg-green-600 py-1 px-6 rounded-l-lg flex items-center">
                    <i class='bx bx-check-circle text-white text-[22px]'></i>
                </div>
                <div class="px-4 py-3 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
                    <div>{{ session('msg') }}</div>
                    <button id="close-alert" class="flex justify-center items-center">
                        <i class='bx bx-x text-[22px]'></i>
                    </button>
                </div>
            </div>
        @endif
        <h2 class="font-semibold text-[22px] dark:text-gray-100 pl-1">Product</h2>
        <div class="flex items-center gap-7 text-gray-600">
            <div class="text-[14px] flex items-center gap-2 dark:text-gray-300">
                Showing
                <select name="showing" id="showing" class=" bg-white text-gray-700 px-7 py-2 text-[14px] outline-[1px] border-[1px] focus:outline-blue-600 rounded-lg shadow-inner hover:shadow-xl border-gray-300 dark:bg-gray-200">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                </select>
            </div>
            <div class="relative">
                <form action="{{ route('product.index') }}" class="" method="GET">
                    <input type="text" name="query" value="{{ request()->input('query') }}" autocomplete="off" placeholder="Search . . . . " class="w-[300px] outline-[1px] focus:outline-blue-600 text-gray- focus:shadow-lg shadow-inner px-4 py-2 rounded-lg border-[1px] border-gray-300 dark:bg-gray-200">
                    <button type="submit" class="absolute right-2 top-2">
                        <i class='bx bx-search text-[25px]'></i>
                    </button>
                </form>
            </div>
            <a href="" class="flex items-center gap-1 text-[14px] transition-all  bg-white shadow px-4 py-2 rounded-lg hover:shadow-xl border-gray-300 dark:bg-gray-200 active:shadow-inner">
                <i class='bx bx-export text-[23px]'></i> 
                Export
            </a>
            <a href="{{ route('product.create') }}">
                <x-button class="flex items-center transition-all shadow hover:shadow-xl">
                    <i class='bx bx-plus text-[20px]'></i>
                    Add New Product
                </x-button>
            </a>
        </div>
    </div>
    <div class="bg-white rounded-xl overflow-hidden shadow dark:bg-[#2C2C2C]">
        <table class="min-w-full text-left">
            <thead class="">
                <tr class="border-b-[1px] border-gray-200 dark:border-gray-400">
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">#</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Product Name</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Category</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Price</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Discount</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Stock</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Status</th>
                    <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-3 text-[14px] dark:text-gray-200">#{{ $product->id }}</td>
                            <td class="group px-6 py-3 flex items-center relative">
                                <img src="./storage/{{ $product->thumbnail }}" alt="" class="w-10 h-10 rounded-full object-cover mr-3">
                                <a href="{{ route('product.show',$product->id) }}" class="w-[150px] text-[14px] inline-block whitespace-nowrap overflow-hidden transition-all text-ellipsis hover:underline font-medium dark:text-gray-200">
                                    {{ $product->name }}
                                </a>
                                <span class="absolute text-[12px] hidden -top-2 left-[77px] bg-gray-200 py-[3px] px-[8px] rounded-full text-gray-600 group-hover:block">
                                    {{ $product->name }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">{{ $product->category }}</td>
                            <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">${{ $product->price }}</td>
                            <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">{{ $product->discount }}%</td>
                            <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">{{ $product->stock }}</td>
                            <td class="px-6 py-3 text-[14px]">
                                @if ($product->visibility == 'Active')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">{{ $product->visibility }}</span>
                                @elseif($product->visibility == 'Pending')
                                    <span class="inline-block px-3 py-1 text-orange-800 bg-orange-100 rounded-full">{{ $product->visibility }}</span>
                                @elseif($product->visibility == 'Coming Soon')
                                    <span class="inline-block px-3 py-1 text-blue-800 bg-blue-100 rounded-full">{{ $product->visibility }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 relative">
                                <button class="show-action text-gray-500 hover:text-gray-700 z-10 dark:text-gray-400" id="">
                                    <i class='bx bx-dots-horizontal-rounded text-[24px]'></i>
                                </button>
                                <div class="action absolute bg-white w-full shadow rounded-lg z-20 top-11 left-[-3px] overflow-hidden hidden dark:bg-[#2F2F2F]" id="action">
                                    <a href="{{ route('product.edit', $product->id) }}" class="group flex text-gray-600 items-center gap-1 px-2 py-[5px] transition-all hover:bg-blue-600 cursor-pointer dark:text-gray-400">
                                        <i class='bx bx-edit group-hover:text-white dark:text-gray-300'></i>
                                        <span class="group-hover:text-white dark:text-gray-300">Update</span>
                                    </a>
                                    <a class="group deleteBtn flex text-gray-600 items-center gap-1 px-2 py-[5px] transition-all hover:bg-blue-600 cursor-pointer dark:text-gray-400"  data-target="#deleteModal{{ $product->id }}">
                                        <i class='bx bx-trash group-hover:text-white dark:text-gray-300'></i>
                                        <span class="group-hover:text-white dark:text-gray-300">Delete</span>
                                    </a>
                                </div>
                                
                                <!-- Delete confirmation modal -->
                                <div id="deleteModal{{ $product->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
                                    <div id="modalContent{{ $product->id }}" class="w-[500px] aspect-video flex justify-center items-center shadow-md bg-white rounded-lg p-4 transform scale-0 transition-transform duration-100 dark:bg-gray-300">
                                        <form action="{{ route('product.destroy', $product->id) }}" method="post" class="w-full">
                                            @csrf
                                            @method('delete')
                                            <div class="w-full flex justify-center">
                                                <img src="{{ asset('/storage/'. $product->thumbnail) }}" class="w-28 aspect-square object-cover rounded-md shadow-2xl" alt="">
                                            </div>
                                            <p class="text-center text-gray-700 my-4">Are you sure you want to delete this product?</p>
                                            <div class="flex justify-center gap-4">
                                                <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded cancelBtn hover:bg-blue-600">Cancel</button>
                                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-6 py-3 text-[18px] text-gray-600 dark:text-gray-300">
                            Product Not Found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $products->links('vendor.pagination.tailwind') }}
        {{-- <div class="flex justify-between items-center bg-white px-6 py-3 border-t dark:bg-[#2C2C2C] dark:border-gray-400">
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-200">Previous</button>
            <div class="flex space-x-2">
                <button class="text-white px-3 py-1 bg-blue-500 rounded dark:text-white shadow-inner">1</button>
                <button class="text-gray-500 hover:text-gray-700 px-3 py-1 dark:text-gray-400">2</button>
                <button class="text-gray-500 hover:text-gray-700 px-3 py-1 dark:text-gray-400">3</button>
                <button class="text-gray-500 hover:text-gray-700 px-3 py-1 dark:text-gray-400">4</button>
                <button class="text-gray-500 hover:text-gray-700 px-3 py-1 dark:text-gray-400">5</button>
            </div>
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-200">Next</button>
        </div> --}}
    </div>
</div>

@endsection