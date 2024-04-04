<x-layout>
    <div class="lg:flex lg:h-full lg:flex-col">
        <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
            <h1 class="text-base font-semibold leading-6 text-gray-900">
                <p>{{ $currentMonth }} {{ $currentYear }}</p>
            </h1>
            <div class="flex items-center">
                <div class="relative flex items-center rounded-md bg-white shadow-sm md:items-stretch">
                    <a href="/calendar?monthCount={{ $countMonth - 1 }}"
                        class="flex h-9 w-12 items-center justify-center rounded-l-md border-y border-l border-gray-300 pr-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pr-0 md:hover:bg-gray-50">
                        <span class="sr-only">Previous month</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="flex items-center border-y-2">
                        <p
                            class="py-2border-y border-gray-300 px-3.5 text-sm font-semibold text-gray-900 hover:bg-gray-50">
                            {{ $currentMonth }}
                        </p>
                    </div>
                    <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>
                    <a href="/calendar?monthCount={{ $countMonth + 1 }}"
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
                    @for ($i = 1; $i <= $countDay; $i++)
                        <div class="relative bg-white px-3 py-2 h-28 overflow-y-auto">
                            <time
                                class="font-semibold {{ date('Y-m-d') == $currentYear . '-' . str_pad($countMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) ? 'flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white' : null }}">{{ $i }}</time>
                            <ol class="mt-2">
                                @foreach ($todoData as $data)
                                    @if (
                                        $currentYear . '-' . str_pad($countMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) ==
                                            explode(' ', $data->datetime)[0]
                                    )
                                        <li>
                                            <a onclick="show_modal_{{ $data->id }}.showModal()" class="group flex">
                                                <p
                                                    class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                                    {{ $data->title }}
                                                </p>
                                                <time datetime="2022-02-04T21:00"
                                                    class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">
                                                    {{ explode(' ', $data->datetime)[1] }}
                                                </time>
                                            </a>
                                            <dialog id="show_modal_{{ $data->id }}"
                                                class="modal modal-bottom sm:modal-middle">
                                                <div class="modal-box">
                                                    <div class="flex flex-col justify-center">
                                                        <div class="flex flex-row items-center">
                                                            <h3 id='modal_title' class="font-bold text-2xl">
                                                                {{ $data->title }}</h3>
                                                            {{-- Done Button --}}
                                                            @if ($data->done == 0)
                                                                <div x-data="{ done: false }" class="ml-auto">
                                                                    <form id='done-form'
                                                                        action='todo/done/{{ $data->id }}'
                                                                        @submit="done = ! done" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button
                                                                            class="btn btn-sm btn-success text-white min-h-10 w-36">
                                                                            <div x-show="!done"
                                                                                class="flex flex-row items-center">
                                                                                <svg class="mr-1"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    x="0px" y="0px" width="20"
                                                                                    height="20" viewBox="0 0 24 24">
                                                                                    <path fill="none" stroke="#fff"
                                                                                        stroke-miterlimit="10"
                                                                                        stroke-width="2"
                                                                                        d="M21 6L9 18 4 13"></path>
                                                                                </svg>
                                                                                Mark Done
                                                                            </div>

                                                                            <span x-show="done"
                                                                                class ="loading loading-spinner loading-md"></span>

                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @else
                                                                <div x-data="{ done: false }" class="ml-auto">
                                                                    <form id='done-form'
                                                                        action='todo/undone/{{ $data->id }}'
                                                                        @submit="done = ! done" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button
                                                                            class="btn btn-sm btn-info text-white min-h-10 w-36">
                                                                            <div x-show="!done"
                                                                                class="flex flex-row items-center">
                                                                                <svg class="mr-1"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    x="0px" y="0px" width="20"
                                                                                    height="20" viewBox="0 0 24 24">
                                                                                    <path fill="none" stroke="#fff"
                                                                                        stroke-miterlimit="10"
                                                                                        stroke-width="2"
                                                                                        d="M21 6L9 18 4 13"></path>
                                                                                </svg>
                                                                                Mark Undone
                                                                            </div>

                                                                            <span x-show="done"
                                                                                class ="loading loading-spinner loading-md"></span>

                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <p id='modal_datetime' class="text-base text-red-500">
                                                            {{ explode(' ', $data->datetime)[0] }},
                                                            {{ explode(' ', $data->datetime)[1] }}
                                                        </p>

                                                    </div>

                                                    <p id='modal_description'
                                                        class="min-h-32 max-h-44 my-4 border-t pt-2 overflow-y-auto text-wrap text-sm">
                                                        {{ $data->description }}
                                                    </p>

                                                    <div class="modal-action mt-10">

                                                        {{-- Edit Button --}}
                                                        <div>
                                                            <button onclick="handleEdit('{{ $data->id }}')"
                                                                class="btn btn-square mr-4 bg-white border-none shadow-none">
                                                                <?xml version="1.0" ?>
                                                                <svg class="feather feather-edit" fill="none"
                                                                    height="24" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" viewBox="0 0 24 24"
                                                                    width="24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                                </svg>
                                                            </button>


                                                            <dialog id="edit_modal_{{ $data->id }}"
                                                                class="modal">
                                                                <div class="modal-box">
                                                                    <form method="dialog">
                                                                        <button onclick="onEditModalClose()"
                                                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                                    </form>
                                                                    <h3 class="font-bold text-xl">Edit Note</h3>
                                                                    <form id='form' method="POST"
                                                                        action="/todo/edit/{{ $data->id }}">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="mt-2 mb-2">
                                                                            <p class="font-bold mb-1">Title</p>
                                                                            <input type="text"
                                                                                placeholder="Type here" name="title"
                                                                                class="edit_title input input-bordered input-sm min-h-10 w-full px-2"
                                                                                value='{{ $data->title }}' />

                                                                            @error('title')
                                                                                <p class="text-red-500 text-xs mt-1">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <p class="font-bold mb-1">Description</p>
                                                                            <textarea placeholder="Enter task's description..." name="description"
                                                                                class="edit_description textarea textarea-bordered textarea-xs text-sm w-full">{{ $data->description }}</textarea>

                                                                            @error('description')
                                                                                <p class="text-red-500 text-xs mt-1">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div>
                                                                            <p class="font-bold mb-1">Due Date/Time</p>
                                                                            <input type="datetime-local"
                                                                                id="meeting-time"
                                                                                class="edit_datetime border px-1 py-2 w-full"
                                                                                name="datetime"
                                                                                value='{{ $data->datetime }}' />

                                                                            @error('datetime')
                                                                                <p class="text-red-500 text-xs mt-1">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>

                                                                        <button type="submit"
                                                                            class="btn btn-sm min-h-10 w-full mt-6 bg-blue-400 hover:bg-blue-500">Update</button>
                                                                    </form>
                                                                </div>
                                                            </dialog>
                                                        </div>

                                                        {{-- Delete Button --}}
                                                        <div x-data='{ deleting: false }'
                                                            class="flex flex-row items-center">
                                                            <form method="POST" id='delete-form'
                                                                action='todo/delete/{{ $data->id }}'
                                                                @submit="deleting = true">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="btn btn-square text-red-500 bg-white shadow-none border-none hover:bg-red-500 hover:text-white">
                                                                    <div x-show="!deleting">
                                                                        <?xml version="1.0" ?>
                                                                        <svg class="feather feather-trash-2"
                                                                            fill="none" height="24"
                                                                            stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <polyline points="3 6 5 6 21 6" />
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                                            <line x1="10" x2="10"
                                                                                y1="11" y2="17" />
                                                                            <line x1="14" x2="14"
                                                                                y1="11" y2="17" />
                                                                        </svg>
                                                                    </div>

                                                                    <span x-show="deleting"
                                                                        class ="loading loading-spinner loading-md"></span>

                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>

                                                <form method="dialog" class="modal-backdrop">
                                                    <button id='close_dialog_modal_5'>close</button>
                                                </form>
                                            </dialog>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    @endfor
                </div>
                <div class="isolate grid w-full grid-cols-7 grid-rows-6 gap-px lg:hidden">

                    <button type="button"
                        class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
                        <time datetime="2022-02-06" class="ml-auto">6</time>
                        <span class="sr-only">0 events</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleEdit(id) {
            document.querySelector(`#edit_modal_${id}`).showModal()
            document.querySelector(`#edit_modal_${id}`).setAttribute("open", "false");
        }
    </script>
</x-layout>
