<aside
    class="group/sidebar hidden md:flex md:flex-col shrink-0 lg:w-[280px] w-[250px] transition-all duration-300 ease-in-out m-0 fixed z-10 inset-y-0 left-0 bg-white border-r border-r-dashed border-r-neutral-200 sidenav fixed-start loopple-fixed-start"
    id="sidenav-main">

    <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

    <div class="flex items-center justify-between pl-8 pr-4 py-4">
        <div class="flex items-center w-full">
            <div class="w-[40px] h-[40px] aspect-square">
                <div class="inline-block relative shrink-0 cursor-pointer
        rounded-[.95rem]">
                    <img class="inline-block rounded-[.95rem]" src="images/profile.png" alt="avatar image">
                </div>
            </div>
            <div class="ml-2 truncate w-28">
                <a href="javascript:void(0)"
                    class="w-5 pr-2 truncate dark:hover:text-primary hover:text-primary transition-colors duration-200 ease-in-out text-base font-medium dark:text-neutral-400/90 text-secondary-inverse">
                    User
                </a>
            </div>
        </div>
    </div>

    <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

    <button id='test' onclick="my_modal_3.showModal()"
        class="btn btn-sm w-64 h-10 px-6 mt-4 mx-auto text-base bg-blue-400 hover:bg-blue-500">
        + New Task
    </button>

    <dialog id="my_modal_3" class="modal">
        <div class="modal-box mb-16">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-xl mb-2">New Task</h3>
            <form id='form' method="POST" action="/todo/create">
                @csrf

                <div class="mb-2">
                    <p class="font-bold mb-1">Title</p>
                    <input type="text" placeholder="Type here" name="title"
                        class="input input-bordered input-sm min-h-10 w-full px-2" value='{{ old('company') }}' />

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <p class="font-bold mb-1">Description</p>
                    <textarea placeholder="Enter task's description..." name="description"
                        class="textarea textarea-bordered textarea-xs w-full" value='{{ old('company') }}'></textarea>

                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p class="font-bold mb-1">Due Date/Time</p>
                    <input type="datetime-local" id="meeting-time" class="border px-1 py-2 w-full" name="datetime"
                        min="{{ date('Y-m-d\TH:i') }}" value='{{ old('company') }}' />

                    @error('datetime')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="btn btn-sm min-h-10 w-full mt-6 bg-blue-400 hover:bg-blue-500">Create</button>
            </form>
        </div>
    </dialog>

    <div class="relative pl-3 my-5">
        <div class="flex flex-col w-full font-medium">

            <div>
                <span
                    class="hover:bg-gray-200 ease-in transition duration-200 select-none flex items-center px-4 py-[.775rem] cursor-pointer  rounded-[.95rem] rounded-r-none">
                    <a href="/"
                        class="flex items-center flex-grow text-[1.15rem] dark:text-neutral-400/75 text-stone-500 hover:text-dark">Today</a>
                </span>
            </div>


            <div>
                <span
                    class="hover:bg-gray-200 ease-in transition duration-200 select-none flex items-center px-4 py-[.775rem] cursor-pointer rounded-[.95rem] rounded-r-none">
                    <a href="/week"
                        class="flex items-center flex-grow text-[1.15rem] dark:text-neutral-400/75 text-stone-500 hover:text-dark">
                        Week</a>
                </span>
            </div>

            <div>
                <span
                    class="hover:bg-gray-200 ease-in transition duration-200 select-none flex items-center px-4 py-[.775rem] cursor-pointer rounded-[.95rem] rounded-r-none">
                    <a href="/month"
                        class="flex items-center flex-grow text-[1.15rem] dark:text-neutral-400/75 text-stone-500 hover:text-dark">
                        Month</a>
                </span>
            </div>

        </div>
    </div>
</aside>
