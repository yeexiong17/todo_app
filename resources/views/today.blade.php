<x-layout>
    <h1 class="text-2xl font-bold mt-4">Today's Task</h1>

    <div class="grid mt-4 grid-cols-2">
        @foreach ($todayData as $data)
            <?php
            $splitDateTime = explode(' ', $data->datetime);
            $splitTime = explode(':', $splitDateTime[1]);
            ?>

            <a onclick="openModal('{{ $data->title }}', '{{ $data->description }}', '{{ $data->datetime }}')"
                class="hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer duration-300">
                <div class="flex flex-row items-center">
                    <div>
                        <h1 class="text-xl font-bold truncate">
                            {{ $data->title }}
                        </h1>
                        <p class="truncate">
                            {{ $data->description }}
                        </p>
                    </div>
                    <div class="ml-auto mr-4">
                        <p class="truncate text-red-500">
                            {{ $splitTime[0] }}:{{ $splitTime[1] }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <div class="flex flex-col justify-center">
                    <div class="flex flex-row items-center">

                        <h3 id='modal_title' class="font-bold text-2xl"></h3>

                        <div x-data="{ open: false }" class="ml-auto">
                            <form @submit="open = ! open" method="POST" action="/todo/done/{{ $data->id }}">
                                <button class="btn btn-sm btn-success text-white min-h-10 w-36">
                                    <div x-show="!open" class="flex flex-row items-center">
                                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"
                                                d="M21 6L9 18 4 13"></path>
                                        </svg>
                                        Mark As Done
                                    </div>

                                    <span x-show="open" class ="loading loading-spinner loading-md"></span>

                                </button>
                            </form>
                        </div>
                    </div>

                    <p id='modal_datetime' class="text-base text-red-500"></p>
                </div>

                <p id='modal_description' class="min-h-32 max-h-44 my-4 border-t pt-2 overflow-y-auto text-wrap"></p>

                <div class="modal-action mt-10">
                    <div class="flex flex-row items-center">
                        <button class="btn btn-sm mr-2 min-h-9 w-20">Edit</button>
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button
                                class="btn btn-sm btn-error bg-white border border-red-500 text-red-500 hover:text-white min-h-9 w-20">Delete</button>
                        </form>
                    </div>

                </div>
            </div>

            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

    </div>

    <script>
        function openModal(title, description, time) {

            let splitDateTime = time.split(' ')
            let splitTime = splitDateTime[1].split(':')

            document.querySelector('#modal_title').innerText = title;
            document.querySelector('#modal_description').innerText = description;
            document.querySelector('#modal_datetime').innerText = `Today, ${splitTime[0]}:${splitTime[1]}`;
            document.querySelector('#my_modal_5').showModal();
        }

        function closeModal() {
            document.querySelector('#my_modal_5').close();
        }
    </script>
</x-layout>
