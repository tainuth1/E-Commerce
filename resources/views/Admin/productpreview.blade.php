@extends('layout.app')

@section('title', 'Product Preview')

@section('content')

<div class="py-4 px-4">
    {{-- <h2 class="font-semibold text-[22px] dark:text-gray-100 pl-1 mb-4">Product Preview</h2> --}}
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
    <div class="grid grid-cols-2 gap-10 bg-white p-4 rounded-lg shadow-lg dark:bg-[#2C2C2C]">
        <div class="">
            <div class="flex gap-3 sticky top-[70px]">
                <!-- Thumbnail images -->
                <div class=" product-preview w-[100px] h-[650px] flex flex-col overflow-scroll gap-3">
                    <div class="thumbnail-images w-[80px] h-[80px] shadow-md rounded-md p-1 border-[2px] border-blue-300 dark:border-blue-500">
                        <img class="w-full h-full rounded-md object-cover cursor-pointer" src="{{ asset('/storage/'. $product->thumbnail) }}" alt="">
                    </div>
                    @foreach ($product->images as $image)
                        <div class="thumbnail-images w-[80px] h-[80px] shadow-md rounded-md">
                            <img class="w-full h-full rounded-md object-cover cursor-pointer" src="{{ asset('/storage/'. $image->path) }}" alt="">
                        </div>
                    @endforeach
                </div>

                <!-- Main Image -->
                <div class="image-container w-full h-[650px] rounded-md shadow overflow-hidden">
                    <img class="main-thumbnail w-full h-full object-cover rounded-md cursor-zoom-in transition-transform duration-[.1s]" id="zoom-image" src="{{ asset('/storage/'. $product->thumbnail) }}" alt="">
                </div>
            </div>
        </div>

        <!-- Other content -->
        <div class="">
            <div class="">
                <h2 class="text-[37px] font-medium dark:text-gray-200">
                    {{ $product->name }}
                </h2>
                <div class="flex items-baseline">
                    <div class="flex gap-1 text-[20px] mt-1">
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bx-star text-yellow-500'></i>
                    </div>
                    <span class="px-4 border-l-[2px] border-gray-700 ml-4 text-[17px] text-gray-700 dark:text-gray-400">
                        30 Review
                    </span>
                </div>
                <h3 class="my-8 text-[17px] font-medium text-gray-700 dark:text-gray-200">
                    Category : 
                    <span class="ml-2 font-normal text-yellow-600 dark:text-yellow-500">{{ $product->category }}</span>
                </h3>
                <p class="text-gray-600 dark:text-gray-300">
                    {{ $product->description }}
                </p>
                <div class="pt-6">
                    <p class="text-gray-800 font-medium dark:text-gray-300">Select Color: </p>
                    <div class="pt-1 flex gap-3">
                        <div class="color w-[60px] h-[60px] p-1 border-[2px] rounded-lg border-blue-300 dark:border-blue-500">
                            <div class="w-full h-full transition-all cursor-pointer bg-gray-100 border rounded-md shadow"></div>
                        </div>
                        <div class="color w-[60px] h-[60px] ">
                            <div class="w-full h-full transition-all cursor-pointer bg-black border rounded-md shadow"></div>
                        </div>
                        <div class="color w-[60px] h-[60px] ">
                            <div class="w-full h-full transition-all cursor-pointer bg-yellow-500 border rounded-md shadow"></div>
                        </div>
                        <div class="color w-[60px] h-[60px] ">
                            <div class="w-full h-full transition-all cursor-pointer bg-blue-500 border rounded-md shadow"></div>
                        </div>
                        <div class="color w-[60px] h-[60px] ">
                            <div class="w-full h-full transition-all cursor-pointer bg-red-500 border rounded-md shadow"></div>
                        </div>
                    </div>
                </div>
                <div class="py-8">
                    <p class="text-[35px] font-medium text-yellow-600 dark:text-yellow-500">
                        ${{ $product->price }}
                    </p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('product.edit', $product->id) }}">
                        <button class="py-5 px-28 text-[19px] text-white bg-blue-500 rounded-xl font-medium transition-all hover:shadow-lg">
                            Update
                        </button>
                    </a>
                    <button class="deleteBtn py-5 px-28 text-[19px] text-red-600 border-[2px] border-red-600 rounded-xl font-medium transition-all hover:shadow-lg" data-target="#deleteModal{{ $product->id }}">
                        Delete
                    </button>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection