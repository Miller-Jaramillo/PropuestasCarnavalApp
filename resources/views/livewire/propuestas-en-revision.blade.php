<div wire:poll.5000ms>
    @foreach ($propuestas as $propuesta)
        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                <div
                    class="  bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-fuchsia-400 border-r-fuchsia-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-fuchsia-900 dark:border-r-fuchsia-900">

                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">



                        {{-- titulo formulario --}}
                        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row  ">

                            <div class=" pb-2 flex justify-end ">




                                <label for="" class="text-yellow-500">
                                    {{ $propuesta->estado }}
                                </label>


                            </div>



                        </div>
                        <div class="mt-1  border-t dark:border-indigo-950 border-indigo-200"></div>

                        <div class="mt-3 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row shadow-xl sm:rounded-xl rounded-xl ">


                            {{-- inicio del grid --}}
                            <div class="mt-3 grid grid-cols-1 sm:grid-cols-1   gap-x-10 pb-5">

                                <div>
                                    <div class="mt-1">
                                        <p
                                            class="text-lg font-semibold leading-6 dark:text-gray-100  text-gray-900 flex justify-center  ">
                                            {{ $propuesta->nombre_propuesta }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 text-center   gap-x-10  ">




                                <div>
                                    <x-label for="nombreAgrupacion"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700">
                                        Agrupación</x-label>
                                    <div class="mt-1">
                                        <p class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->nombre_agrupacion }}
                                        </p>
                                    </div>
                                </div>



                                <div>
                                    <x-label for="categoria"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700">
                                        Categoria
                                    </x-label>

                                    <div class="mt-1">
                                        <p class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->categoria->nombre }}
                                        </p>
                                    </div>
                                </div>



                                <div>

                                    <x-label for="subcategoria"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700">
                                        Subcategoria</x-label>
                                    <div class="mt-1">
                                        <p class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->subcategoria->nombre }}
                                        </p>
                                    </div>
                                </div>



                            </div>

                            <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">

                                <div class="">
                                    <x-label for="descripcion"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700">
                                        Descripcion</x-label>
                                    <div class="mt-1">
                                        <p class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->descripcion }}
                                        </p>
                                    </div>

                                </div>


                                <div class="mt-4 pb-5">
                                    <x-label for="cover-photo"
                                        class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700">
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
                        </div>
                        <div class="mt-3 border-t dark:border-indigo-950 border-indigo-200"></div>
                    </div>
                    <div
                    class="justify-between dark:bg-gray-900 bg-white px-4 py-3 sm:px-6 text-gray-500 ">
                    {{ $propuestas->links() }}
                </div>
                </div>
            </div>


        </div>
    @endforeach

</div>