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
                    <input type="text" name="query" value="{{ request()->input('query') }}" autocomplete="off" placeholder="Search . . . . " class="w-[300px] outline-[1px] focus:outline-blue-600 transition-all focus:shadow-lg shadow-inner px-4 py-2 rounded-lg border-[1px] border-gray-300 dark:bg-gray-200">
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
    <div class="">
        <div class="bg-white rounded-xl overflow-hidden shadow dark:bg-[#2C2C2C]" id="products-list">
            @include('partials.product_table', ['products' => $products])
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#showing').change(function () {
            var perPage = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ route('product.index') }}",
                data: {
                    showing: perPage
                },
                dataType: 'html',
                success: function (response) {
                    $('#products-list').html(response);

                    // Reattach event listeners to newly loaded elements
                    rebindJS();
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });

        // Initial JS bindings
        rebindJS();
    });

    function rebindJS() {
        const showActions = document.querySelectorAll('.show-action');
        const actions = document.querySelectorAll('.action');

        showActions.forEach((showAction, index) => {
            showAction.addEventListener('click', (e) => {
                e.stopPropagation();
                actions.forEach((action, i) => {
                    if (i !== index) {
                        action.classList.remove('block');
                        action.classList.add('hidden');
                    }
                });
                actions[index].classList.toggle('block');
                actions[index].classList.toggle('hidden');
            });
        });

        document.addEventListener('click', (e) => {
            actions.forEach((action) => {
                if (!action.contains(e.target)) {
                    action.classList.remove('block');
                    action.classList.add('hidden');
                }
            });
        });

        const deleteBtns = document.querySelectorAll('.deleteBtn');
        const cancelBtns = document.querySelectorAll('.cancelBtn');

        deleteBtns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const targetModalId = btn.getAttribute('data-target');
                showModal(targetModalId);
            });
        });

        cancelBtns.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                const modalId = '#' + e.target.closest('[id^="deleteModal"]').id;
                closeModal(modalId);
            });
        });

        const alertBox = document.getElementById('alert');
        const closeButton = document.getElementById('close-alert');

        if (alertBox && closeButton) {
            alertBox.classList.add('transform', 'translate-y-[-100%]', 'transition-transform', 'duration-300');
            setTimeout(() => {
                alertBox.classList.remove('translate-y-[-100%]');
            }, 100);

            closeButton.addEventListener('click', function() {
                alertBox.classList.add('translate-y-[-100%]');
                setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 200);
            });
        }
    }
</script>
@endsection

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