<div wire:poll.5000ms>
    <x-label
        class="flex justify-center mt-2 font-semibold uppercase tracking-widest text-xs text-red-500 dark:text-red-500">
        Propuestas Rechazadas
    </x-label>
    @if ($propuestas->count())
        @foreach ($propuestas as $propuesta)
            <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                    <div
                        class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-red-400 border-r-red-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-red-900 dark:border-r-red-900">

                        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">


                            {{-- inicio del grid --}}
                            <div class="mt-5 grid grid-cols-1 sm:grid-cols-1   gap-x-10 pb-5">

                                <div>
                                    <x-label for=""
                                        class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                        {{ $propuesta->updated_at->format('d-m-y') }}
                                    </x-label>
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
                                    <div class="mt-1">
                                        <p
                                            class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase ">
                                            {{ $propuesta->nombre }}
                                        </p>
                                    </div>
                                </div>


                                <div class="">
                                    <x-label for="apellido"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                        Apellido
                                    </x-label>
                                    <div class="mt-1">
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
                                    <div class="mt-1">
                                        <p class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->identificacion }}
                                        </p>
                                    </div>
                                </div>


                                <div class="sm:mt-3 mt-3">
                                    <x-label for="nombreAgrupacion"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                        Agrupación</x-label>
                                    <div class="mt-1">
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

                                    <div class="mt-1">
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
                                    <div class="mt-1">
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




                                @if ($propuesta->observaciones != null)
                                    <div class="mt-4 pb-2">
                                        <x-label
                                            class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                            Observaciones</x-label>
                                        <x-label
                                            class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                            {{ $propuesta->observaciones }}</x-label>
                                    </div>
                                @endif



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
            No hay propuestas rechazadas
        </div>

    @endif


</div>
