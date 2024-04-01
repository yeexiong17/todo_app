<nav class="z-50 border-b">
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Homepage</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl"></a>
        </div>
        <div class="navbar-end">
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />

            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            <div class="dropdown">
                <button class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="badge badge-xs badge-primary indicator-item"></span>
                    </div>
                </button>
                <ul tabindex="0"
                    class="dropdown-content right-2 top-16 z-[1] menu px-4 py-2 shadow bg-base-100 rounded w-80">
                    {{-- Shows all notifications --}}
                    <div class="flex flex-row items-center">
                        <h1 class="font-bold text-lg">Notifications</h1>
                        <p class="text-blue-700 ml-auto hover:cursor-pointer">Clear</p>
                    </div>
                    <div class="py-4 rounded cursor-pointer transition duration-300 hover:bg-gray-200">
                        <p class="ml-2 text-base">Task 1 Due at 5pm</p>
                    </div>
                    <div class="py-4 rounded cursor-pointer transition duration-300 hover:bg-gray-200">
                        <p class="ml-2 text-base">Task 2 Due at 5pm</p>
                    </div>
                    <div class="py-4 rounded cursor-pointer transition duration-300 hover:bg-gray-200">
                        <p class="ml-2 text-base">Task 3 Due at 5pm</p>
                    </div>
                    <div class="py-4 rounded cursor-pointer transition duration-300 hover:bg-gray-200">
                        <p class="ml-2 text-base">Task 4 Due at 5pm</p>
                    </div>

                </ul>
            </div>
        </div>
    </div>
</nav>
