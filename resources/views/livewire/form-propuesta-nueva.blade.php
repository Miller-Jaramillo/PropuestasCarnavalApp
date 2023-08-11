<div wire:poll.5000ms>
    <x-label
        class="flex justify-center mt-2 dark:text-emerald-500 font-semibold uppercase tracking-widest text-xs text-green-500 dark:text-green-500">
        Enviar nueva proppuesta
    </x-label>
    <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 pb-5">

        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
            <div
                class="pb-3 bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl
                border border-b-indigo-400 border-l-indigo-400 border border-t-emerald-400 border-r-emerald-400 pb-2
                dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-emerald-900 dark:border-r-emerald-900">

                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">


                    {{-- titulo formulario --}}
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row mt-5">

                        <div class="border-b border-gray-100 pb-2  ">
                            <h2 class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase ">
                                Registrar propuesta</h2>
                            <p class="mt-2 text-justify block text-sm font-medium leading-6 text-emerald-400 dark:text-emerald-700 tracking-widest">
                                Tu propuesta será enviada a los
                                funcionarios de Corpocarnaval.
                                Ellos se encargarán de evaluarla y te notificarán su
                                publicación en su correo electronico. <b> ¡Buena Suerte!</b></p>
                        </div>
                    </div>

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row">


                        {{-- inicio del grid --}}
                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-1   gap-x-10 ">
                            <div>
                                <x-label for="nombrePropuesta"
                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase ">
                                    Nombre de la Propuesta</x-label>
                                <div class="mt-1">
                                    <x-input type="text" wire:model="nombre_propuesta" name="nombre_propuesta"
                                        id="nombre_propuesta" autocomplete="given-name"
                                        class=" block w-full rounded-md border-0 shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                        text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase" />
                                </div>
                            </div>
                        </div>


                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-3   gap-x-10 ">

                            <div class="sm:mt-3 mt-3">
                                <x-label for="nombre_agrupacion"
                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                    Nombre Agrupacion</x-label>
                                <div class="mt-1">
                                    <x-input type="text" wire:model="nombre_agrupacion" name="nombre_agrupacion"
                                        id="nombre_agrupacion" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                        text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase" />
                                </div>
                            </div>



                            <div class="sm:mt-3 mt-3">
                                <x-label for="categoria" class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                    Categoria
                                </x-label>

                                <div class="mt-1">

                                    <x-select wire:model="categoriaId" id="categoria" wire:change="obtenerSubcategorias"
                                        class="block w-full rounded-md  shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                        text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest ">
                                        <option value="">Seleccionar categoría</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </x-select>


                                </div>
                            </div>



                            <div class="sm:mt-3 mt-3">

                                <x-label for="subcategoria" class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                    Subcategoria</x-label>
                                <div class="mt-1">
                                    <x-select wire:model="subcategoriaId" id="subcategoria"
                                        class="block w-full rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                        text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                        <option value="">Seleccionar subcategoría</option>
                                        @foreach ($subcategorias as $subcategoria)
                                            <option value="{{ $subcategoria->id }}">
                                                {{ $subcategoria->nombre }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">

                            <div class="">
                                <x-label for="descripcion" class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                    Descripcion</x-label>
                                <p class=" block text-sm font-medium leading-6 text-gray-400 dark:text-gray-700 tracking-widest">Describenos tu propuesta
                                    :).</p>

                                <div class="relative">
                                    <textarea wire:model="descripcion" id="descripcion" name="descripcion"
                                        class="resize-none block w-full rounded-md border-0 py-1.5 dark:bg-gray-900
                                         shadow-sm ring-1 ring-inset ring-indigo-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                         text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest
                                               h-10 // Altura inicial
                                               transition // Agrega transición para una expansión suave
                                               ease-in-out // Tipo de transición
                                               focus:h-32 // Altura al enfocar el textarea"></textarea>
                                </div>

                            </div>



                            <div class="mt-4 ">
                                <x-label for="cover-photo" class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                    Foto o
                                    Video</x-label>


                                @if ($file)
                                    <div>
                                        @if (Str::startsWith($file->getMimeType(), 'image'))
                                            <div
                                                class="mt-2 flex justify-center sm:rounded-lg rounded-md  dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                                <div class="text-center">
                                                    <img src="{{ $preview }}" alt="Preview"
                                                        class="h-128 w-128 sm:rounded-lg rounded-md border-2 border-indigo-100 ">
                                                </div>
                                            </div>
                                        @elseif (Str::startsWith($file->getMimeType(), 'video'))
                                            <div
                                                class="mt-2 flex justify-center sm:rounded-lg rounded-md  dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                                <div class="text-center">
                                                    <video controls src="{{ $preview }}"
                                                        class="h-128 w-128 sm:rounded-lg rounded-md border-2 border-indigo-100 "></video>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <div class="mt-2">
                                    <input type="file" id="file" wire:model="file" accept="image/*,video/*"
                                        class="mt-1">
                                </div>
                            </div>
                        </div>




                        <div class="mt-4 flex justify-end">
                            <button wire:click="closeForm" type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                                Cancelar
                            </button>
                            <x-button wire:click="submitForm" class="ml-4 bg-green-600 dark:bg-green-600">
                                {{ __('Enviar') }}
                            </x-button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div>
        @if ($message)
            <div x-data="{ show: @entangle('message') }" x-show="show" x-init="setTimeout(() => { show = false; }, 3000)"
                class="fixed inset-0 flex items-center justify-center">
                <div class="bg-white dark:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-center">
                    {!! $message !!}
                </div>
            </div>
        @endif
    </div>



    @livewireScripts

</div>
