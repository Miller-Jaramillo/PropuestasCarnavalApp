<div wire:poll.5000ms>
    <x-label
        class="flex justify-center mt-5 dark:text-yellow-500  text-yellow-500 font-semibold uppercase tracking-widest text-xs">
        Propuestas en revision
    </x-label>

    <!-- Filtro de busqueda -->
    <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
            <div class=" bg-gray-100 dark:bg-gray-900 overflow-hidden sm:rounded-xl rounded-xl ">
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">
                    <div class="flex justify-center mt-1 pb-1">

                        <input wire:model="search"
                            class="form-input rounded-md shadow-sm  block w-full col-span-10 sm:grid-cols-10
                    bg-indigo-50 dark:bg-gray-900 text-gray-500 dark:border-indigo-900 border-indigo-200 "
                            type="text" placeholder="Buscar">

                        @if ($search != '' || $categoriaId != '')
                            <button wire:click="clear"
                                class="bg-gray-100 sm:bg-gray-100 dark:bg-gray-900 sm:dark:bg-gray-900  dark:text-gray-500 text-gray-500
                                        sm:form-input border-none
                                        sm:rounded-md shadow-sm ml-1 icon-red sm:flex flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif

                        <div class="hidden sm:block  rounded-md shadow-sm  ml-2 flex justify-center  ">
                            <select wire:model="categoriaId" id="categoria"
                                class="dark:border-indigo-900 border-indigo-200 outline-none bg-indigo-50 text-gray-500 text-sm rounded-md dark:bg-gray-900 ">
                                <option value="">Buscar por categoría</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="rounded-md shadow-sm  ml-2 flex justify-center  ">
                            <select wire:model="perPage"
                                class="dark:border-indigo-900 border-indigo-200 outline-none bg-indigo-50 text-gray-500 text-sm rounded-md dark:bg-gray-900 ">
                                <option value="5">Mostrar 5</option>
                                <option value="10">Mostrar 10</option>
                                <option value="15">Mostrar 15</option>
                                <option value="25">Mostrar 25</option>
                                <option value="50">Mostrar 50</option>
                                <option value="100">Mostrar 100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla propuestas -->
    <div class="py-5 ">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8    px-4 sm:px-6  ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg rounded-md">

                @if ($propuestas->count())
                    <table class="w-full md:w-auto min-w-full ">
                        <thead class="border-b dark:border-indigo-800 border-indigo-500">
                            <tr>
                                <th
                                    class=" px-6 py-3  bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Propuesta</th>
                                <th
                                    class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Agruacion</th>

                                <th
                                    class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Categoria</th>

                                <th
                                    class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Fecha</th>

                                <th
                                    class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>


                        <tbody class="dark:bg-gray-900 divide-y dark:divide-indigo-950 divide-indigo-50">
                            @foreach ($propuestas as $propuesta)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $propuesta->user->profile_photo_url }}"
                                                alt="{{ $propuesta->user->name }}" />
                                            <div class="ml-4">
                                                <p
                                                    class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                                    {{ $propuesta->user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="hidden sm:table-cell px-6 py-4 text-center">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->nombre_propuesta }}</p>
                                    </td>

                                    <td class="px-6 py-4 text-center ">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->nombre_agrupacion }}</p>
                                    </td>

                                    <td class="hidden sm:table-cell px-6 py-4 text-center">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->categoria->nombre }}</p>
                                    </td>

                                    <td class="hidden sm:table-cell px-6 py-4 text-center">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->created_at->format('d-m-y') }}</p>
                                    </td>

                                    {{-- --> ICONOS - ACCIONES --}}

                                    <td class="px-6 py-4 text-center dark:bg-gray-900 bg-white ">
                                        <div class="flex justify-center">
                                            {{-- -->Ver User --}}
                                            <a href="#" class="icon-blue green-hover"
                                                wire:click="showPropuesta({{ $propuesta->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-10 h-6">
                                                    <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="#"
                                                wire:click="confirmEliminarPropuesta({{ $propuesta->id }})"
                                                class="red-hover icon-red">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-10 h-6">
                                                    <path fill-rule="evenodd"
                                                        d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="justify-between border-t dark:border-indigo-800 border-indigo-500  dark:bg-gray-900 bg-white px-4 py-3 sm:px-6 text-gray-500 ">
                        {{ $propuestas->links() }}
                    </div>
                @else
                    <div
                        class="mt-5 text-center justify-between border-t dark:border-indigo-800 border-indigo-500 dark:bg-gray-900 bg-gray-100 dark:text-indigo-600 text-indigo-500 px-4 py-3 sm:px-6 tracking-widest">
                        No hay resultados.
                    </div>
                @endif

                <div>
                    @if ($message)
                        <div x-data="{ show: @entangle('message') }" x-show="show" x-init="setTimeout(() => { show = false; }, 2000)"
                            class="fixed inset-0 flex items-center justify-center">
                            <div class="bg-white dark:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-center">
                                {!! $message !!}
                            </div>
                        </div>
                    @endif
                </div>
                @livewireScripts
            </div>
        </div>
    </div>


    <!-- Información del usuario flotante -->
    <div class="flex items-center">
        @if ($showPropuestaInfo)
            <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">
                <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">

                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                        <div class="flex justify-center pb-2">
                            <button wire:click="closeShowPropuesta" class="shadow-sm block icon-red  ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </button>
                        </div>
                        <div
                            class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-sky-400 border-r-sky-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-sky-900 dark:border-r-sky-900">
                            <div class="modal-content">
                                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">

                                    {{-- inicio del grid --}}
                                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-1   gap-x-10 pb-5">
                                        <div>
                                            <x-label for="nombrePropuesta"
                                                class="block text-center text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Nombre
                                                de la Propuesta</x-label>
                                            <div class="">
                                                <x-label
                                                    class="text-lg font-semibold tracking-widest leading-6 dark:text-gray-200  text-gray-900 flex justify-center uppercase  ">
                                                    {{ $propuestaInfo->nombre_propuesta }}
                                                </x-label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 grid grid-cols-3 sm:grid-cols-3 text-center   gap-x-10  ">
                                        <div class="">
                                            <x-label for="nombre"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Nombre</x-label>
                                            <div class="">
                                                <p
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                    {{ $propuestaInfo->nombre }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="">
                                            <x-label for="apellido"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Apellido
                                            </x-label>
                                            <div class="">
                                                <p
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                    {{ $propuestaInfo->apellido }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="">
                                            <x-label for="identificacion"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Identificación</x-label>
                                            <div class="">
                                                <p
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                    {{ $propuestaInfo->identificacion }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="sm:mt-3 mt-3">
                                            <x-label for="nombreAgrupacion"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Agrupación</x-label>
                                            <div class="">
                                                <p
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                    {{ $propuestaInfo->nombre_agrupacion }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="sm:mt-3 mt-3">
                                            <x-label for="categoria"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Categoria
                                            </x-label>

                                            <div class="">
                                                <p
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                    {{ $propuestaInfo->categoria->nombre }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="sm:mt-3 mt-3">
                                            <x-label for="subcategoria"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Subcategoria</x-label>
                                            <div class="">
                                                <p
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                    {{ $propuestaInfo->subcategoria->nombre }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">
                                        <div class="">
                                            <x-label for="descripcion"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                Descripcion</x-label>

                                            <div
                                                class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                <x-label for="">
                                                    {{ $propuestaInfo->descripcion }}
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
                                                        src="{{ asset('storage/' . $propuestaInfo->foto_o_video) }}"
                                                        alt="Foto de la propuesta">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 ">
                                            <x-label for="about"
                                                class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                {{ __('Observaciones') }}</x-label>
                                            <p
                                                class=" block text-sm font-medium leading-6 text-gray-500 dark:text-gray-400 tracking-widest">
                                                {{ __('Señor(a) funcionario(a), ¿tiene alguna observacion?') }}

                                            </p>
                                            <p
                                                class="block text-xs font-medium leading-6 text-gray-500 dark:text-gray-400 tracking-widest">
                                                {{ __('En caso de que la propuesta sea rechazada, es obligatorio dejar una observación explicando el motivo del rechazo al usuario.') }}
                                            </p>

                                            <div class="relative">
                                                <textarea wire:model="observacion" id="observacion" name="observacion"
                                                    class="resize-none block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 dark:bg-gray-900 shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 tracking-widest
                                                           h-10 // Altura inicial
                                                           transition // Agrega transición para una expansión suave
                                                           ease-in-out // Tipo de transición
                                                           focus:h-32 // Altura al enfocar el textarea"></textarea>
                                            </div>
                                        </div>

                                        <div class="mt-5  pb-10 flex justify-end">
                                            <x-button wire:click="aprobarPropuesta({{ $propuestaInfo->id }})"
                                                type="button"
                                                class="mr-4 bg-green-600 dark:bg-green-600 tracking-widest">
                                                {{ __('Aprobada') }}
                                            </x-button>

                                            <x-button wire:click="rechazarPropuesta({{ $propuestaInfo->id }})"
                                                class="bg-red-500 dark:bg-red-500 tracking-widest">
                                                {{ __('Rechazada') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($confirmEliminarPropuesta)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">
            <div
                class="bg-white dark:bg-gray-800 dark:text-white text-gray-900 p-6 rounded-lg shadow-xl border-2 border-blue-500">
                <p>¿Estás seguro de eliminar la propuesta {{ $nombrePropuesta }}?</p>
                <div class="mt-4 flex justify-end">
                    <button wire:click="eliminarPropuesta({{ $confirmEliminarPropuesta }})"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                        Sí, eliminar
                    </button>
                    <button wire:click="cancelEliminarPropuesta"
                        class="px-4 py-2 ml-4 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    @endif




    <style>
        /* styles.css */
        .modal-content {
            max-height: 80vh;
            /* Altura máxima del 80% del viewport height */
            overflow-y: auto;
            /* Habilita el scroll vertical si el contenido excede la altura máxima */
        }
    </style>


</div>
