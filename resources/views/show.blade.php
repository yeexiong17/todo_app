<x-layout>
    <h1 class="text-2xl font-bold mt-4">{{ $heading }}</h1>

    <div class="grid mt-4 grid-cols-1 md:grid-cols-2">
        @unless (count($todoData) == 0)
            @foreach ($todoData as $data)
                <?php
                $splitDateTime = explode(' ', $data->datetime);
                // $splitTime = explode(':', $splitDateTime[1]);
                ?>

                <a class="hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer duration-300"
                    onclick="show_modal_{{ $data->id }}.showModal()">
                    <div class="flex flex-row items-center">
                        <div class="flex flex-col justify-center grow">
                            <div class="flex flex-row items-center">
                                <h1 class="text-xl font-bold truncate mr-3">
                                    {{ $data->title }}
                                </h1>
                                <div class="mr-4">
                                    <p class="truncate text-red-500">
                                        {{ $splitDateTime[0] }}, {{ $splitDateTime[1] }}
                                    </p>
                                </div>
                            </div>
                            <p class="line-clamp-1">
                                {{ $data->description }}
                            </p>
                        </div>

                        @if ($data->done != 0)
                            <p class="font-bold mr-4 text-blue-500">Done</p>
                        @endif
                    </div>
                </a>
                <dialog id="show_modal_{{ $data->id }}" class="modal modal-middle">
                    <div class="modal-box">
                        <div class="flex flex-col justify-center">
                            <div class="flex flex-row items-center">
                                <h3 id='modal_title' class="font-bold text-2xl">{{ $data->title }}</h3>
                                {{-- Done Button --}}
                                @if ($data->done == 0)
                                    <div x-data="{ done: false }" class="ml-auto">
                                        <form id='done-form' action='todo/done/{{ $data->id }}' @submit="done = ! done"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-success text-white min-h-10 w-36">
                                                <div x-show="!done" class="flex flex-row items-center">
                                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                        width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="#fff" stroke-miterlimit="10"
                                                            stroke-width="2" d="M21 6L9 18 4 13"></path>
                                                    </svg>
                                                    Mark Done
                                                </div>

                                                <span x-show="done" class ="loading loading-spinner loading-md"></span>

                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div x-data="{ done: false }" class="ml-auto">
                                        <form id='done-form' action='todo/undone/{{ $data->id }}'
                                            @submit="done = ! done" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-info text-white min-h-10 w-36">
                                                <div x-show="!done" class="flex flex-row items-center">
                                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                        width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="#fff" stroke-miterlimit="10"
                                                            stroke-width="2" d="M21 6L9 18 4 13"></path>
                                                    </svg>
                                                    Mark Undone
                                                </div>

                                                <span x-show="done" class ="loading loading-spinner loading-md"></span>

                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            <p id='modal_datetime' class="text-base text-red-500">
                                {{-- Due, {{ substr($data->datetime, 11) }} --}}
                                {{ $splitDateTime[0] }}, {{ $splitDateTime[1] }}
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
                                    <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        width="24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>


                                <dialog id="edit_modal_{{ $data->id }}" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button onclick="onEditModalClose()"
                                                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-xl">Edit Note</h3>
                                        <form id='form' method="POST" action="/todo/edit/{{ $data->id }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="mt-2 mb-2">
                                                <p class="font-bold mb-1">Title</p>
                                                <input type="text" placeholder="Type here" name="title"
                                                    class="edit_title input input-bordered input-sm min-h-10 w-full px-2"
                                                    value='{{ $data->title }}' />

                                                @error('title')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <p class="font-bold mb-1">Description</p>
                                                <textarea placeholder="Enter task's description..." name="description"
                                                    class="edit_description textarea textarea-bordered textarea-xs text-sm w-full">{{ $data->description }}</textarea>

                                                @error('description')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <p class="font-bold mb-1">Due Date/Time</p>
                                                <input type="datetime-local" id="meeting-time"
                                                    class="edit_datetime border px-1 py-2 w-full" name="datetime"
                                                    value='{{ $data->datetime }}' />

                                                @error('datetime')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <button type="submit"
                                                class="btn btn-sm min-h-10 w-full mt-6 bg-blue-400 hover:bg-blue-500">Update</button>
                                        </form>
                                    </div>
                                </dialog>
                            </div>

                            {{-- Delete Button --}}
                            <div x-data='{ deleting: false }' class="flex flex-row items-center">
                                <form method="POST" id='delete-form' action='todo/delete/{{ $data->id }}'
                                    @submit="deleting = true">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="btn btn-square text-red-500 bg-white shadow-none border-none hover:bg-red-500 hover:text-white">
                                        <div x-show="!deleting">
                                            <?xml version="1.0" ?>
                                            <svg class="feather feather-trash-2" fill="none" height="24"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </div>

                                        <span x-show="deleting" class ="loading loading-spinner loading-md"></span>

                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <form method="dialog" class="modal-backdrop">
                        <button id='close_dialog_modal_5'>close</button>
                    </form>
                </dialog>
            @endforeach
        @else
            <p class="text-lg">No task found!</p>
        @endunless
    </div>
    <button id='test' onclick="small_add_modal_3.showModal()"
        class="md:hidden btn btn-sm w-full h-10 px-6 mt-10 mx-auto text-base bg-blue-400 hover:bg-blue-500">
        + New Task
    </button>

    <dialog id="small_add_modal_3" class="modal">
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

    <script>
        function handleEdit(id) {
            document.querySelector(`#edit_modal_${id}`).showModal()
            document.querySelector(`#edit_modal_${id}`).setAttribute("open", "false");

        }
    </script>
</x-layout>
