<div wire:poll.5000ms>

    @if ($propuestas->count())
        @foreach ($propuestas as $propuesta)
            <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6 pb-2 ">
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                    <div
                        class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl
                    border border-b-indigo-400 border-l-indigo-400 border border-t-sky-400 border-r-sky-400
                    dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-sky-900 dark:border-r-sky-900">

                        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">



                            {{-- titulo formulario --}}
                            <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row  ">

                                <div class=" pb-2 flex justify-end ">
                                    <label class="font-semibold text-blue-500">
                                        {{ $propuesta->estado }}
                                    </label>

                                </div>
                            </div>

                            <div class="mt-1  border-t dark:border-indigo-950 border-indigo-200"></div>
                            <div
                                class="mt-3 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row shadow-xl  sm:rounded-xl rounded-xl">


                                {{-- inicio del grid --}}
                                <div class="mt-3 grid grid-cols-1 sm:grid-cols-1   gap-x-10 pb-5">

                                    <div>
                                        <x-label for=""
                                            class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                            {{ $propuesta->created_at->format('d-m-y') }}
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


                                    <div>
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



                                    <div>

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


                                    <div class="mt-4 pb-5">
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

                                <div>

                                    <x-label for="descripcion"
                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                    Tu propuesta ha sido enviada y está pendiente de revisión por parte del administrador.
                                    Una vez que tu propuesta entre en estado de revisión, no podrás eliminarla.
                                </x-label>


                                </div>
                                <div class="mt-2  pb-2 flex justify-end">
                                    <x-button wire:click="eliminarPropuesta({{ $propuesta->id }})"
                                        class="bg-red-500 dark:bg-red-500 tracking-widest">
                                        {{ __('Eliminar') }}
                                    </x-button>
                                </div>

                            </div>
                            <div class="mt-3 border-t dark:border-indigo-950 border-indigo-200"></div>
                        </div>

                        <div class="justify-between  dark:bg-gray-900 bg-white px-4 py-3 sm:px-6 text-gray-500 ">
                            {{ $propuestas->links() }}
                        </div>

                    </div>

                </div>


            </div>
        @endforeach

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


    @else
        <div
            class="mt-5 text-center justify-between  dark:text-indigo-600 text-indigo-500 px-4 py-3 sm:px-6 tracking-widest">
            No tienes propuestas en estado de enviadas
        </div>
    @endif

</div>
