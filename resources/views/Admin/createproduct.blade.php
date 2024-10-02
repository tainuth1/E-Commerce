@extends('layout.app')

@section('title', 'Add Product')

@section('content')
    <div class="w-full h-full px-1 pt-4 pb-6">
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
        <div class="">
            <h2 class="font-semibold text-[22px] mb-3 dark:text-gray-100">Add Product</h2>
        </div>
        <div class="w-full rounded-md shadow-lg bg-white p-4 dark:bg-[#2C2C2C]">
            <form action="{{ route('product.store') }}" method="post" class="" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div class="grid grid-cols-2 gap-4 ">
                        <div class="">
                            <x-label>Name</x-label>
                            @error('name')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-input class="w-full " name="name" value="{{ old('name') }}" autocomplete="off"></x-input>
                        </div>
                        <div class="">
                            <x-label>Category</x-label>
                            @error('category')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-select class="w-full"  :options="['' => '',
                                                                'Phone' => 'Phone',
                                                                'Computer' => 'Computer', 
                                                                'Laptop' => 'Laptop', 
                                                                'Camping' => 'Camping', 
                                                                'Kitchen' => 'Kitchen',
                                                                'Gaming' => 'Gaming',
                                                                'Shoes' => 'Shoes',
                                                                'Clothing' => 'Clothing',
                                                                ]" 
                            name="category" 
                            selected="{{ old('category') }}" />
                        </div>
                        <div class="col-span-2">
                            <x-label>Description</x-label>
                            @error('description')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-text-area class="w-full" name="description" rows="5">{{ old('description') }}</x-text-area>
                        </div>
                        <div class="">
                            <x-label>Price</x-label>
                            @error('price')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-input class="w-full" name="price" value="{{ old('price') }}" autocomplete="off"></x-input>
                        </div>
                        <div class="">
                            <x-label>Visibilty</x-label>
                            @error('visibility')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-select class="w-full" :options="['Active' => 'Active',
                                                                'Pending' => 'Pending',
                                                                'Coming Soon' => 'Coming Soon',
                                                                ]" 
                            name="visibility"
                            selected="'{{ old('visibility') }}" />
                        </div>
                        <div class="">
                            <x-label>Discount (Optional)</x-label>
                            @error('discount')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-select class="w-full"  :options="['0' => '0%',
                                                                '10' => '10%',
                                                                '20' => '20%', 
                                                                '30' => '30%', 
                                                                '50' => '50%', 
                                                                '60' => '60%',
                                                                '70' => '70%',
                                                                '80' => '80%',
                                                                '90' => '90%',
                                                                '100' => '100%',
                                                                ]" 
                            name="discount" 
                            selected="{{ old('discount') }}" />   
                        </div>
                        <div class="">
                            <x-label>Stock</x-label>
                            @error('stock')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-input class="w-full" name="stock" value="{{ old('stock') }}" autocomplete="off"></x-input>
                        </div>
                        <div class="">
                            <x-label>Thumbnail</x-label>
                            @error('thumbnail')
                                <x-label class="text-red-600 text-[12px]">{{ $message }}</x-label>
                            @enderror<br>
                            <x-input class="w-full" value="" id="thumbnail-input" name="thumbnail" type="file"/>
                            <p class="text-[11px] mt-1 text-gray-500">
                                <span class="text-red-600">Note:</span>
                                The images should be square to get a good result
                            </p>
                        </div>
                        <div class="w-full">
                            <x-label>Thumbnail Preview</x-label><br>
                            <div id="show-thumbnail" class="aspect-square rounded-lg border-[1px] border-gray-300 cursor-pointer overflow-hidden p-1">
                                <img id="thumbnail-preview" class="w-full h-full object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <x-label class="flex items-center gap-3">
                            Collection 
                            <p class="text-[11px] mt-1 text-gray-500">
                                <span class="text-red-600">Note:</span>
                                The images should be square to get a good result
                            </p>
                        </x-label>
                        <x-input type="file" id="collection-input" name="collection[]" class="w-full mb-3" multiple></x-input>
                        <x-label class="">Collection Preview</x-label>
                        <div id="preview-container" class="grid grid-cols-3 gap-3 bg-[#F1F4FA] dark:bg-[#232323] rounded-md p-3">
                            <!-- Image previews will appear here -->
                        </div>
                    </div>
                    {{-- <div class="">
                        <x-label>Collection</x-label>
                        <x-input type="file" class="w-full"></x-input>
                        <div class="grid grid-cols-3 gap-3 mt-5">

                            @for ($i = 0; $i < 5; $i++)
                                <div class="w-[193px] h-[193px] cursor-zoom-in relative">
                                    <button type="button" class="absolute w-[20px] h-[20px] rounded-full flex items-center justify-center bg-[#FF6D0A] -right-2 -top-2">
                                        <i class='bx bx-x text-[20px] text-white'></i>
                                    </button>
                                    <img class="w-full h-full object-cover rounded-md" src="https://th.bing.com/th/id/OIP.xoJvfE6QcS8EyzTukNIhTAHaHa?pid=ImgDet&w=185&h=185&c=7&dpr=1.3" alt="">
                                </div>
                            @endfor

                        </div>
                    </div> --}}
                </div>
                <div class="text-end">
                    <x-button class="bg-red-600" type="reset">Cancel</x-button>
                    <x-button type="submit">Create</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
