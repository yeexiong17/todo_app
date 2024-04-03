<x-layout>
    <div class="lg:flex lg:h-full lg:flex-col">
        <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
            <h1 class="text-base font-semibold leading-6 text-gray-900">
                <p>{{ $currentMonth }} {{ $currentYear }}</p>
            </h1>
            <div class="flex items-center">
                <div class="relative flex items-center rounded-md bg-white shadow-sm md:items-stretch">
                    <a href="/calendar?month={{ $countMonth - 1 }}"
                        class="flex h-9 w-12 items-center justify-center rounded-l-md border-y border-l border-gray-300 pr-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pr-0 md:hover:bg-gray-50">
                        <span class="sr-only">Previous month</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <p
                        class="pl-5 pt-2 border-y border-gray-300 px-3.5 text-sm font-semibold text-gray-900 hover:bg-gray-50 md:block">
                        {{ $currentMonth }}
                    </p>
                    <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>
                    <a href="/calendar?month={{ $countMonth + 1 }}"
                        class="flex h-9 w-12 items-center justify-center rounded-r-md border-y border-r border-gray-300 pl-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pl-0 md:hover:bg-gray-50">
                        <span class="sr-only">Next month</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

            </div>
        </header>
        <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
            <div
                class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
                <div class="flex justify-center bg-white py-2">
                    <span>M</span>
                    <span class="sr-only sm:not-sr-only">on</span>
                </div>
                <div class="flex justify-center bg-white py-2">
                    <span>T</span>
                    <span class="sr-only sm:not-sr-only">ue</span>
                </div>
                <div class="flex justify-center bg-white py-2">
                    <span>W</span>
                    <span class="sr-only sm:not-sr-only">ed</span>
                </div>
                <div class="flex justify-center bg-white py-2">
                    <span>T</span>
                    <span class="sr-only sm:not-sr-only">hu</span>
                </div>
                <div class="flex justify-center bg-white py-2">
                    <span>F</span>
                    <span class="sr-only sm:not-sr-only">ri</span>
                </div>
                <div class="flex justify-center bg-white py-2">
                    <span>S</span>
                    <span class="sr-only sm:not-sr-only">at</span>
                </div>
                <div class="flex justify-center bg-white py-2">
                    <span>S</span>
                    <span class="sr-only sm:not-sr-only">un</span>
                </div>
            </div>
            <div class="flex bg-gray-200 text-xs leading-6 text-gray-700 lg:flex-auto">
                <div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">

                    @if ($startDay != 1)
                        @for ($i = 0; $i < $startDay - 1; $i++)
                            <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
                                <time></time>
                            </div>
                        @endfor
                    @endif

                    @for ($i = 0; $i < $countDay; $i++)
                        <div class="relative bg-white px-3 py-2 h-28">
                            <time>{{ $i + 1 }}</time>
                        </div>
                    @endfor
                    <!-- Is today, include: "flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white" -->
                    {{-- <div class="relative bg-white px-3 py-2">
                        <time datetime="2022-01-03">3</time>
                        <ol class="mt-2">
                            <li>
                                <a href="#" class="group flex">
                                    <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                        Design review</p>
                                    <time datetime="2022-01-03T10:00"
                                        class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">10AM</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex">
                                    <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                        Sales meeting</p>
                                    <time datetime="2022-01-03T14:00"
                                        class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">2PM</time>
                                </a>
                            </li>
                        </ol>
                    </div> --}}
                </div>
                <div class="isolate grid w-full grid-cols-7 grid-rows-6 gap-px lg:hidden">
                    <!--
            Always include: "flex h-14 flex-col py-2 px-3 hover:bg-gray-100 focus:z-10"
            Is current month, include: "bg-white"
            Is not current month, include: "bg-gray-50"
            Is selected or is today, include: "font-semibold"
            Is selected, include: "text-white"
            Is not selected and is today, include: "text-indigo-600"
            Is not selected and is current month, and is not today, include: "text-gray-900"
            Is not selected, is not current month, and is not today: "text-gray-500"
          -->

                    <button type="button"
                        class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
                        <time datetime="2022-02-06" class="ml-auto">6</time>
                        <span class="sr-only">0 events</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
