<div wire:poll.5000ms>
    <x-label class="flex justify-center mt-2 dark:text-yellow-500  text-yellow-500 font-semibold uppercase tracking-widest text-xs">
        Propuestas en revision
    </x-label>
    @if ($propuestas->count())
    @foreach ($propuestas as $propuesta)
        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
            <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                <div
                    class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-yellow-400 border-r-yellow-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-yellow-900 dark:border-r-yellow-900">

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
                                        {{ $propuesta->nombre_propuesta }}
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
                                        {{ $propuesta->nombre }}
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
                                        {{ $propuesta->apellido }}
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
                                        {{ $propuesta->identificacion }}
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
                                        {{ $propuesta->nombre_agrupacion }}
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
                                        {{ $propuesta->categoria->nombre }}
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
                                        {{ $propuesta->subcategoria->nombre }}
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


                            <div class="mt-4 ">
                                <x-label for="about"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    {{ __('Observaciones') }}</x-label>
                                <p
                                    class=" block text-sm font-medium leading-6 text-gray-500 dark:text-gray-400 tracking-widest">
                                    {{ __('Señor(a) funcionario(a), ¿tiene alguna observacion?') }}

                                </p>
                                <p class="block text-xs font-medium leading-6 text-gray-500 dark:text-gray-400 tracking-widest">
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

                                <x-button wire:click="aprobarPropuesta({{ $propuesta->id }})" type="button"
                                    class="mr-4 bg-green-600 dark:bg-green-600 tracking-widest">
                                    {{ __('Aprobada') }}
                                </x-button>



                                <x-button wire:click="rechazarPropuesta({{ $propuesta->id }})"
                                    class="bg-red-500 dark:bg-red-500 tracking-widest">
                                    {{ __('Rechazada') }}
                                </x-button>





                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endforeach



    <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
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
                                <option value="5">Mostrar 5</option>
                                <option value="10">Mostrar 10</option>
                                <option value="20">Mostrar 20</option>
                                <option value="50">Mostrar 50</option>
                                <option value="100">Mostrar 100</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @else
        <div
            class="mt-5 text-center justify-between border-t dark:border-indigo-800 border-indigo-500 dark:bg-gray-900 bg-gray-100 dark:text-indigo-600 text-indigo-500 px-4 py-3 sm:px-6 tracking-widest">
            No tienes propuestas pendientes de validación.
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
