<div wire:poll.5000ms>
    <!-- Resto de tu código de vista -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Feed de Noticias') }}
        </h2>
    </x-slot>



    <x-label class="flex justify-center mt-2 dark:text-blue-500 font-extrabold  uppercase tracking-widest text-xs ">
        <span class="bg-gradient-text-3">✨ Propuestas para el carnaval de negros y blancos ✨</span>
    </x-label>


    @if ($propuestas->count())
        @foreach ($propuestas as $propuesta)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-60 px-4 sm:px-6 py-2">
                <div
                    class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-xl rounded-xl
                        border border-b-sky-400 border-l-teal-400 border border-t-green-400 border-r-yellow-400 pb-2
                        dark:border-b-sky-900 dark:border-l-teal-900 dark:border-t-green-800 dark:border-r-sky-600/50 ">

                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 py-5">
                        <button
                            class="flex  text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ $propuesta->user->profile_photo_url }}" alt="{{ $propuesta->user->name }}" />
                            <div class="ml-2 flex justify-center grid grid-cols-1 sm:grid-cols-1">

                                <div>
                                    <x-label for=""
                                        class="text-xs font-semibold leading-6 tracking-widest uppercase">
                                        {{ $propuesta->user->name }}
                                    </x-label>
                                </div>

                                <div>
                                    <x-label for=""
                                        class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                        {{ $propuesta->updated_at->format('d-m-y h:i A') }}
                                    </x-label>

                                </div>
                            </div>
                        </button>
                    </div>



                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6 pb-5 ">
                        {{-- inicio del grid --}}
                        <div class="grid grid-cols-1 sm:grid-cols-1   gap-x-10">
                            <div>
                                <div class="">
                                    <x-label
                                        class="text-lg font-semibold tracking-widest leading-6 dark:text-gray-200  text-gray-900 flex justify-center uppercase  ">
                                        {{ $propuesta->nombre_propuesta }}
                                    </x-label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 grid grid-cols-3 sm:grid-cols-3 text-center   gap-x-10  ">
                            <div class="">
                                <x-label for="nombreAgrupacion"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    Agrupación</x-label>
                                <div class="">
                                    <p
                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                        {{ $propuesta->nombre_agrupacion }}
                                    </p>
                                </div>
                            </div>



                            <div class="">
                                <x-label for="categoria"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    Categoria
                                </x-label>

                                <div class="">
                                    <p
                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                        {{ $propuesta->categoria->nombre }}
                                    </p>
                                </div>
                            </div>

                            <div class="">
                                <x-label for="subcategoria"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    Subcategoria</x-label>
                                <div class="">
                                    <p
                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                        {{ $propuesta->subcategoria->nombre }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class=" mt-2 grid grid-cols-1 sm:grid-cols-1">
                            <div class="">
                                <x-label for="descripcion"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    Descripcion</x-label>

                                <div
                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                    <x-label for="">
                                        {{ $propuesta->descripcion }}
                                    </x-label>
                                </div>
                            </div>


                            <div class="mt-4 ">
                                <x-label for="cover-photo"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    Foto o
                                    Video</x-label>
                                <div
                                    class="mt-2 flex justify-center sm:rounded-lg rounded-md dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                    <div class="text-center">

                                        <img class="h-128 w-128 sm:rounded-lg rounded-md  border-2 border-indigo-100 "
                                            src="{{ asset('storage/' . $propuesta->foto_o_video) }}"
                                            alt="Foto de la propuesta">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5 px-4 sm:px-6 py-2">
                            <div class="bg-white dark:bg-gray-900 overflow-hidden  sm:rounded-lg rounded-md  pb-2">
                                <div class="flex justify-center mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5 icon-red dark:icon-red">
                                        <path
                                            d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                                    </svg>
                                    <x-label for="" class="mr-5 ml-1">
                                        {{ $propuesta->likes }}
                                    </x-label>

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5  icon-blue dark:icon-blue">
                                        <path fill-rule="evenodd"
                                            d="M3.43 2.524A41.29 41.29 0 0110 2c2.236 0 4.43.18 6.57.524 1.437.231 2.43 1.49 2.43 2.902v5.148c0 1.413-.993 2.67-2.43 2.902a41.102 41.102 0 01-3.55.414c-.28.02-.521.18-.643.413l-1.712 3.293a.75.75 0 01-1.33 0l-1.713-3.293a.783.783 0 00-.642-.413 41.108 41.108 0 01-3.55-.414C1.993 13.245 1 11.986 1 10.574V5.426c0-1.413.993-2.67 2.43-2.902z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <x-label for="" class="mr-5 ml-1  text-gray-400">
                                        {{ $propuesta->comments }}
                                    </x-label>
                                </div>
                            </div>
                        </div>



                        {{-- 1.1.2.3 --}}
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5 px-4 sm:px-6">
                            <div
                                class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg rounded-md  pb-2">
                                <div
                                    class="flex justify-center mt-2 border-b dark:border-b-indigo-600 border-b-indigo-600  ">
                                    <div wire:key="{{ $propuesta->id }}">
                                        <!-- ... contenido de la propuesta ... -->
                                        <x-label wire:click="darLike({{ $propuesta->id }})"
                                            class="ml-1 text-sm font-semibold leading-7 uppercase tracking-wider cursor-pointer {{ in_array($propuesta->id, $likes) ? 'text-red-400' : 'text-gray-400' }} dark:{{ in_array($propuesta->id, $likes) ? 'text-red-400' : 'text-gray-400' }}">
                                            Me Gusta
                                        </x-label>
                                    </div>
                                    <x-label wire:click="comentar"
                                        class="ml-1 text-sm font-semibold leading-7 uppercase tracking-wider cursor-pointer {{ in_array($propuesta->id, $likes) ? 'text-red-400' : 'text-yellow-400' }} dark:{{ in_array($propuesta->id, $likes) ? 'text-red-400' : 'text-yellow-400' }}">
                                        COMENTAR
                                    </x-label>
                                </div>

                                <div class="mt-2 grid grid-cols-10 sm:grid-cols-10 ">
                                    <div class="col-span-1 sm:col-span-1 flex justify-center">
                                        <img class="h-10 w-10 rounded-full object-cover "
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </div>

                                    <div class="col-span-8 flex items-center">
                                        <textarea wire:model="contenidoComentario"
                                            class="auto-expand block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 dark:bg-gray-900 shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 tracking-widest"
                                            rows="1" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"></textarea>
                                    </div>

                                    <div class="col-span-1 flex justify-center">
                                        <button class="col-span-1 flex items-center icon-sky"
                                            wire:click="saveComment({{ $propuesta->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path
                                                    d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @if ($propuesta->comments != null)
                                <div class="mt-4 pb-2">
                                    <x-label
                                        class="block text-xs font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                        Comentarios
                                    </x-label>

                                    @php
                                        $visibleComments = 1;
                                        $totalComments = count($propuesta->comentarios);
                                        $startIdx = max($totalComments - $visibleComments, 0);
                                    @endphp

                                    @foreach ($propuesta->comentarios->slice($startIdx)->reverse() as $index => $comentario)
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5 px-4 sm:px-6 mt-2">
                                            <div
                                                class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg rounded-md pb-2">
                                                <div class="mt-2 grid grid-cols-10 sm:grid-cols-10 ">
                                                    <div class="col-span-1 flex justify-center">
                                                        <img class="h-8 w-8 rounded-full object-cover "
                                                            src="{{ $comentario->user->profile_photo_url }}"
                                                            alt="{{ $comentario->user->name }}" />
                                                    </div>
                                                    <div class="col-span-8 flex items-center">
                                                        <x-label
                                                            class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                            {{ $comentario->contenido }}
                                                        </x-label>
                                                    </div>
                                                    @if ($this->canDeleteComment($comentario->user->id) && $comentario->user_id === Auth::user()->id)
                                                        <div class="col-span-1 flex justify-center">
                                                            <button class="col-span-1 flex items-center icon-red"
                                                                wire:click="eliminarComentario({{ $comentario->id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    class="w-4 h-4">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="flex">
                                                <label
                                                    class="ml-1 font-medium leading-6 text-gray-400 dark:text-gray-700 tracking-widest"
                                                    style="font-size: 8px;">
                                                    {{ $comentario->created_at }}
                                                </label>

                                            </div>

                                        </div>
                                    @endforeach

                                    @if ($totalComments > $visibleComments)
                                        <div x-data="{ expanded: false }">
                                            <div class="mt-2">
                                                <x-label
                                                    class="block text-xs font-medium leading-6 text-gray-400 dark:text-gray-700 tracking-widest cursor-pointer"
                                                    @click="expanded = !expanded">
                                                    Ver más comentarios ({{ $totalComments - $visibleComments }})
                                                </x-label>
                                            </div>

                                            <div x-show="expanded" class="mt-4">
                                                @foreach ($propuesta->comentarios->slice(0, $startIdx)->reverse() as $comentario)
                                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-5 px-4 sm:px-6 mt-2">
                                                        <!-- ... Contenido del comentario ... -->

                                                        <div
                                                            class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg rounded-md pb-2">
                                                            <div class="mt-2 grid grid-cols-10 sm:grid-cols-10 ">
                                                                <div class="col-span-1 flex justify-center">
                                                                    <img class="h-8 w-8 rounded-full object-cover "
                                                                        src="{{ $comentario->user->profile_photo_url }}"
                                                                        alt="{{ $comentario->user->name }}" />
                                                                </div>
                                                                <div class="col-span-8 flex items-center">
                                                                    <x-label
                                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                                        {{ $comentario->contenido }}
                                                                    </x-label>
                                                                </div>
                                                                @if ($this->canDeleteComment($comentario->user->id) && $comentario->user_id === Auth::user()->id)
                                                                    <div class="col-span-1 flex justify-center">
                                                                        <button
                                                                            class="col-span-1 flex items-center icon-red"
                                                                            wire:click="eliminarComentario({{ $comentario->id }})">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor" class="w-4 h-4">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="flex ">

                                                            <label
                                                                class="ml-1 block font-medium leading-6 text-gray-400 dark:text-gray-700 tracking-widest"
                                                                style="font-size: 8px;">
                                                                {{ $comentario->created_at }}
                                                            </label>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        <div class="mt-2 pb-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
            <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                <div
                    class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-fuchsia-400 border-r-fuchsia-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-fuchsia-900 dark:border-r-fuchsia-900">
                    <div
                        class="justify-between border-t dark:border-indigo-800 border-indigo-500  dark:bg-gray-900 bg-gray-100 px-4 py-3 sm:px-6 text-gray-500 ">
                        <div class="flex justify-center">
                            <div class="rounded-md shadow-sm  block flex items-center">
                                <select wire:model="perPage"
                                    class="dark:border-indigo-900 border-indigo-200 outline-none bg-indigo-50 text-gray-500 text-xs rounded-md dark:bg-gray-900 tracking-widest ">
                                    <option value="1">Mostrar 1</option>
                                    <option value="10">Mostrar 10</option>
                                    <option value="25">Mostrar 25</option>
                                    <option value="50">Mostrar 50</option>
                                    <option value="100">Mostrar 100</option>
                                    <option value="200">Mostrar 200</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div
            class="justify-between border-t dark:border-indigo-800 border-indigo-500 dark:bg-gray-900 bg-gray-100 dark:text-indigo-800 text-indigo-500 px-4 py-3 sm:px-6">
            No hay resultados hay propuesta
        </div>
    @endif

</div>


<style>
    .icon-sky path {
        fill: rgb(2, 132, 199);
    }

    .red-hover:hover path {
        fill: red;
    }

    .yellow-hover:hover path {
        fill: rgb(166, 22, 188);
    }


    .icon-blue path {
        fill: rgb(24, 109, 220);
    }

    .blue-hover:hover path {
        fill: rgb(24, 109, 220);
    }

    .green-hover:hover path {
        fill: rgb(0, 255, 38);
    }

    .icon-green path {
        fill: rgb(0, 255, 38);
    }

    .icon-oranch path {
        fill: rgb(255, 119, 0);
    }

    .icon-red path {
        fill: rgb(255, 0, 0);
    }


    .icon-blueclar path {
        fill: rgb(0, 200, 255);
    }

    .icon-oro path {
        fill: rgb(218, 165, 32);
    }


    .bg-gradient-text {
        background-image: linear-gradient(to right, #0ea5e9, #10b981, #14b8a6);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }

    .bg-gradient-text-2 {
        background-image: linear-gradient(to right, #fbbf24, #f87171, #60a5fa);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }

    .bg-gradient-text-3 {
        background-image: linear-gradient(to right, #ff6b6b, #feca57, #48dbfb, #1dd1a1, #ff9ff3);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }

    .auto-expand {
        overflow: hidden;
        resize: none;
        height: auto;
    }
</style>
