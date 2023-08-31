<div wire:poll.5000ms>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Ajustar categorias') }}
        </h2>
    </x-slot>


    <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
            <div
                class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-fuchsia-400 border-r-fuchsia-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-fuchsia-900 dark:border-r-fuchsia-900">

                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6 p-5  ">

                    <p class="text-gray-500 text-justify text-sm">
                        <b> Importante: Ten precaución al modificar las Categorías y Subcategorías.
                            Eliminar las que se usan actualmente puede afectar la información de los usuarios de manera
                            significativa.</b>
                    </p>

                    <div class="mt-3 border-t border-gray-200 dark:border-gray-600"></div>

                    <x-label class="mt-5">
                        <div class="flex items-center text-gray-400 dark:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-200">
                                <label class="ml-2 flex items-center text-sm text-gray-400 dark:text-gray-700">Ajustar
                                    Categorías</label>
                            </div>
                        </div>
                    </x-label>

                    <div>

                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-2 mt-2">
                            <div class="col-span-3 flex items-center">
                                <x-select wire:model="categoriaId" wire:change="obtenerSubcategorias" id="categoria"
                                    class="block w-full mt-1">
                                    <option value="">Selecciona una categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach

                                </x-select>
                            </div>

                            <div class=" col-span-2 flex sm:items-center justify-center  ">
                                <x-button wire:click="ShowAgregarCategoria"
                                    class=" bg-sky-500 hover:bg-sky-600 dark:bg-sky-600 hover:dark:bg-sky-500
                    focus:bg-sky-500 dark:focus:bg-sky-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Agregar categoria


                                </x-button>

                            </div>
                        </div>





                        <!-- Label para mostrar el nombre de la categoría seleccionada -->



                        @if ($categoriaId != null)
                            <x-label class="block mt-1 font-medium leading-6 text-gray-500 dark:text-gray-400">Categoría
                                seleccionada:
                                {{ $categorias->where('id', $categoriaId)->first()->nombre }}</x-label>
                        @endif



                        <div class="mt-3">
                            @if ($categoriaId)
                                {{ $showAgregarCategoria = false }}
                                <x-button wire:click="editarCategoria({{ $categoriaId }})"
                                    class="mr-2 bg-green-500 hover:bg-green-600 dark:bg-green-600 hover:dark:bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                        <path
                                            d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                    </svg>

                                    Editar Categoria
                                </x-button>
                                <x-button wire:click="confirmCategoriaDeletion({{ $categoriaId }})"
                                    class="dark:hover:bg-red-500  hover:bg-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    Eliminar Categoria
                                </x-button>




                                @if (count($subcategorias) > 0 && $editarCategoria == false)
                                    <div class="mt-7 border-t border-gray-200 dark:border-gray-600"></div>
                                    <div class="mt-5">

                                        <x-label for="">
                                            <div class="flex items-center text-gray-400 dark:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-5 h-5">
                                                    <path fill-rule="evenodd"
                                                        d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <label
                                                    class="ml-2 flex items-center text-sm text-gray-400 dark:text-gray-700">Ajustar
                                                    Subategorías</label>
                                            </div>
                                        </x-label>

                                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-2  flex items-center">
                                            <div class="col-span-3 flex items-center">

                                                <x-select wire:model="subcategoriaId" id="subcategoria"
                                                    class="block w-full mt-3">
                                                    <option value="">{{ $mensajeSelect }}</option>
                                                    @foreach ($subcategorias as $subcategoria)
                                                        <option value="{{ $subcategoria->id }}">
                                                            {{ $subcategoria->nombre }}</option>
                                                    @endforeach
                                                </x-select>

                                            </div>

                                            <div class=" col-span-2 flex justify-center mt-2">
                                                <x-button wire:click="showAgregarSubcategoria"
                                                    class=" bg-sky-500 hover:bg-sky-600 dark:bg-sky-600 hover:dark:bg-sky-500
                                    focus:bg-sky-500 dark:focus:bg-sky-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-5 h-5 ">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Agregar Subcategoria
                                                </x-button>
                                            </div>
                                        </div>
                                    </div>




                                    @if ($subcategoriaId != null)
                                        <x-label
                                            class="block mt-1 font-medium leading-6 text-gray-500 dark:text-gray-400">Subcategoría
                                            seleccionada:
                                            {{ $subcategorias->where('id', $subcategoriaId)->first()->nombre }}</x-label>
                                    @endif



                                    <div class="mt-3">
                                        @if ($subcategoriaId != '')
                                            <x-button wire:click="editarSubcategoria({{ $subcategoriaId }})"
                                                class="mr-2 bg-green-500 hover:bg-green-600 dark:bg-green-600 hover:dark:bg-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-5 h-5">
                                                    <path
                                                        d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                    <path
                                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                                </svg>

                                                Editar Subategoria
                                            </x-button>
                                            <x-button wire:click="confirmSubcategoriarDeletion({{ $subcategoriaId }})"
                                                class="dark:hover:bg-red-500  hover:bg-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-5 h-5">
                                                    <path fill-rule="evenodd"
                                                        d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                Eliminar Subategoria
                                            </x-button>
                                        @endif

                                    </div>
                                @else
                                    <div class="mt-3 border-t border-gray-200 dark:border-gray-600"></div>
                                    <x-label for=""
                                        class="mt-3 text-md text-gray-500 dark:text-gray-400 ">Esta Categoria
                                        aun no tiene
                                        subcategorias</x-label>
                                    <x-button wire:click="showAgregarSubcategoria"
                                        class=" mt-2 bg-sky-500 hover:bg-sky-600 dark:bg-sky-600 hover:dark:bg-sky-500
                        focus:bg-sky-500 dark:focus:bg-sky-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Agregar Subcategoria
                                    </x-button>

                                @endif
                            @endif
                        </div>


                        @if ($confirmCategoriaDeletion)
                            <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">
                                <div
                                    class="bg-white dark:bg-gray-800 dark:text-white text-gray-900 p-6 rounded-lg shadow-xl border-2 border-blue-500">
                                    <p>¿Estás seguro de eliminar la categoria {{ $nombre }}? Tambien se
                                        eliminaran sus
                                        subcategorias</p>
                                    <div class="mt-4 flex justify-end">
                                        <x-button wire:click="eliminarCategoria({{ $confirmCategoriaDeletion }})"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 dark:bg-red-500 rounded-md hover:bg-red-600 dark:hover:bg-red-600">
                                            Sí, eliminar
                                        </x-button>

                                        <x-button wire:click="cancelCategoriaDeletion"
                                            class="px-4 py-2 ml-4 text-sm font-medium text-gray-700  border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 dark:hover:bg-gray-800">
                                            Cancelar
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div>


                            @if ($confirmSubcategoriarDeletion)
                                <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">
                                    <div
                                        class="bg-white dark:bg-gray-800 dark:text-white text-gray-900 p-6 rounded-lg shadow-xl border-2 border-blue-500">
                                        <p>¿Estás seguro de eliminar la subcategoria {{ $nombre }}? </p>
                                        <div class="mt-4 flex justify-end">
                                            <x-button
                                                wire:click="eliminarSubcategoria({{ $confirmSubcategoriarDeletion }})"
                                                class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                                                Sí, eliminar
                                            </x-button>

                                            <x-button wire:click="cancelSubcategoriarDeletion"
                                                class="px-4 py-2 ml-4 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                                                Cancelar
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Cuadro para ingresar el nuevo nombre de la categoría -->
                        @if ($editarCategoria)
                            <div class="mt-3">
                                <x-label
                                    class="block text-sm font-medium leading-6 text-gray-500 dark:text-gray-400">Editar
                                    Categoría: {{ $categorias->where('id', $categoriaId)->first()->nombre }}</x-label>
                                <x-input type="text" wire:model="nombre"
                                    placeholder="Nuevo nombre de la categoría" class="block w-full mt-1" />
                                <x-button wire:click="actualizarCategoria"
                                    class="mt-3 bg-green-500 hover:bg-green-600 dark:bg-green-600 hover:dark:bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Guardar Cambios
                                </x-button>
                                <x-button wire:click="cancelarEditarCategoria"
                                    class="mt-3 dark:hover:bg-red-500  hover:bg-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar
                                </x-button>
                            </div>
                        @endif











                        @if ($editarSubcategoria)
                            <div class="mt-3">
                                <x-label
                                    class="block text-sm font-medium leading-6 text-gray-500 dark:text-gray-400">Editar
                                    Subcategoría:
                                    {{ $subcategorias->where('id', $subcategoriaId)->first()->nombre }}</x-label>
                                <x-input type="text" wire:model="nombre"
                                    placeholder="Nuevo nombre de la subcategoría" class="block w-full mt-1" />
                                <x-button wire:click="actualizarSubcategoria" class="mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Guardar Cambios
                                </x-button>
                                <x-button wire:click="cancelarEditarSubcategoria" class="mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar
                                </x-button>
                            </div>
                        @endif





                        <div>
                            @if ($showAgregarCategoria)
                                <div class="mt-5">
                                    <x-label class="block text-sm font-medium leading-6">Agregar Categoría</x-label>
                                    <x-input type="text" wire:model="nombre" placeholder="Nombre de la categoría"
                                        class="block w-full mt-1" />
                                </div>

                                <x-button wire:click="agregarCategoria" class="mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Agregar
                                </x-button>

                                <x-button wire:click="cancelAgregarCategoria" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar
                                </x-button>
                            @endif
                        </div>


                        <div>
                            @if ($showAgregarSubcategoria)
                                <div class="mt-5">

                                    @if ($categoriaId != null)
                                        <x-label class="block mt-2 font-medium leading-6 text-gray-900">Agregar
                                            Subcategoría a:
                                            {{ $categorias->where('id', $categoriaId)->first()->nombre }}</x-label>
                                    @endif


                                    <x-input type="text" wire:model="nombre"
                                        placeholder="Nombre de la Subcategoría" class="block w-full mt-1" />
                                </div>

                                <x-button wire:click="agregarSubcategoria" class="mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Agregar
                                </x-button>

                                <x-button wire:click="cancelAgregarSubcategoria" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar
                                </x-button>
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>



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
