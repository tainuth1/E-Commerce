<table class="min-w-full text-left">
    <thead class="">
        <tr class="border-b-[1px] border-gray-200 dark:border-gray-400">
            <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">#</th>
            <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Name</th>
            <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Email</th>
            <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Role</th>
            <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Register Date</th>
            <th class="px-6 py-4 text-[14px] text-gray-700 font-semibold dark:text-gray-300">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
        @if ($users->isNotEmpty())
            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-3 text-[14px] dark:text-gray-200">#{{ $user->id }}</td>
                    <td class="group px-6 py-3 flex items-center relative">
                        <img src="https://media.licdn.com/dms/image/C4D03AQG3cn_SyiWPCA/profile-displayphoto-shrink_800_800/0/1606924550876?e=2147483647&v=beta&t=dvMuUsvm2dMXVEaGe5O50sWzv-5BcaOxWPbjHDEuSbI" alt="" class="w-10 h-10 rounded-full object-cover mr-3">
                        <a href="{{ route('user.show',$user->id) }}" class="w-[150px] text-[14px] inline-block whitespace-nowrap overflow-hidden transition-all text-ellipsis hover:underline font-medium dark:text-gray-200">
                            {{ $user->name }}
                        </a>
                        {{-- <span class="absolute text-[12px] hidden -top-2 left-[77px] bg-gray-200 py-[3px] px-[8px] rounded-full text-gray-600 group-hover:block">
                            {{ $user->name }}
                        </span> --}}
                    </td>
                    <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">{{ $user->email }}</td>
                    <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">{{ $user->role }}</td>
                    <td class="px-6 py-3 text-[14px] text-gray-600 dark:text-gray-300">{{ $user->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4 relative">
                        <button class="show-action text-gray-500 hover:text-gray-700 z-10 dark:text-gray-400" id="">
                            <i class='bx bx-dots-horizontal-rounded text-[24px]'></i>
                        </button>
                        <div class="action absolute bg-white w-full shadow rounded-lg z-20 top-11 left-[-3px] overflow-hidden hidden dark:bg-[#2F2F2F]" id="action">
                            <a href="{{ route('product.edit', $user->id) }}" class="group flex text-gray-600 items-center gap-1 px-2 py-[5px] transition-all hover:bg-blue-600 cursor-pointer dark:text-gray-400">
                                <i class='bx bx-edit group-hover:text-white dark:text-gray-300'></i>
                                <span class="group-hover:text-white dark:text-gray-300">Update</span>
                            </a>
                            <a class="group deleteBtn flex text-gray-600 items-center gap-1 px-2 py-[5px] transition-all hover:bg-blue-600 cursor-pointer dark:text-gray-400"  data-target="#deleteModal{{ $user->id }}">
                                <i class='bx bx-trash group-hover:text-white dark:text-gray-300'></i>
                                <span class="group-hover:text-white dark:text-gray-300">Delete</span>
                            </a>
                        </div>
                        
                        <!-- Delete confirmation modal -->
                        <div id="deleteModal{{ $user->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
                            <div id="modalContent{{ $user->id }}" class="w-[500px] aspect-video flex justify-center items-center shadow-md bg-white rounded-lg p-4 transform scale-0 transition-transform duration-100 dark:bg-gray-300">
                                <form action="{{ route('user.destroy', $user->id) }}" method="post" class="w-full">
                                    @csrf
                                    @method('delete')
                                    <div class="w-full flex justify-center">
                                        <img src="{{ asset('/storage/'. $user->thumbnail) }}" class="w-28 aspect-square object-cover rounded-md shadow-2xl" alt="">
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
                    User Not Found.
                </td>
            </tr>
        @endif
    </tbody>
</table>
{{ $users->links('vendor.pagination.tailwind') }}