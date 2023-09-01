<div">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Propuestas') }}
        </h2>
    </x-slot>



    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6">
            <div class="flex justify-center mt-1 ">

                {{-- --> icono nuevas propuestas  --}}
                <div class="col-span-1">
                    <x-button wire:click="openPropuestasRecibidas"
                        class="inline-flex items-center px-4 py-2
                        hover:bg-gray-700 dark:hover:bg-gray-400
                        bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3  icon-blue "
                        title="Propuestas recibidas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                        </svg>

                        {{-- <p class="sm:hidden block "> Nueva <br> propuesta</p> --}}
                    </x-button>
                </div>

                {{-- --> icono en revision  --}}
                <div class="col-span-1">
                    <x-button wire:click="openFormPropuestasRevicion"
                        class="inline-flex items-center px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-400 bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3 icon-yellow"
                        title="Propuestas en revision">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 01-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0113.5 1.5H15a3 3 0 012.663 1.618zM12 4.5A1.5 1.5 0 0113.5 3H15a1.5 1.5 0 011.5 1.5H12z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 019 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0116.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625v-12z" />
                                <path
                                    d="M10.5 10.5a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963 5.23 5.23 0 00-3.434-1.279h-1.875a.375.375 0 01-.375-.375V10.5z" />
                            </svg>

                            {{-- <p class="sm:hidden block ">Propuestas <br>enviadas</p> --}}
                    </x-button>
                </div>


                {{-- --> icono aprobadas  --}}
                <div class="col-span-1">
                    <x-button wire:click="openPropuestasAprobadas"
                        class="inline-flex items-center px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-400 bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3 icon-green"
                        title="Propuestas aprobadas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z"
                                    clip-rule="evenodd" />
                            </svg>

                            {{-- <p class="sm:hidden block ">Propuestas <br>enviadas</p> --}}
                    </x-button>
                </div>


                {{-- --> icono rechazadas --}}
                <div class="col-span-1">
                    <x-button wire:click="openPropuestasRechazadas"
                        class="inline-flex items-center px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-400 bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3 icon-red"
                        title="Propuestas rechazadas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                className="w-6 h-6">
                                <path fillRule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 00-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 01-.189-.866c0-.298.059-.605.189-.866zm-4.34 7.964a.75.75 0 01-1.061-1.06 5.236 5.236 0 013.73-1.538 5.236 5.236 0 013.695 1.538.75.75 0 11-1.061 1.06 3.736 3.736 0 00-2.639-1.098 3.736 3.736 0 00-2.664 1.098z"
                                    clipRule="evenodd" />
                            </svg>

                            {{-- <p class="sm:hidden block ">Propuestas <br>enviadas</p> --}}
                    </x-button>
                </div>


{{--

                <div class=" flex justify-center">
                    <div class=" relative rounded-full flex items-center">
                        <x-dropdown align="rigt" width="48">
                            <x-slot name="trigger">
                                <!-- Botón con el ícono de ajustes -->
                                <x-button class="focus:outline-none "
                                    class="inline-flex items-center px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-400 bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-6 h-6" style=" color: rgb(1, 120, 255);">
                                        <path fill-rule="evenodd"
                                            d="M14.5 10a4.5 4.5 0 004.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 01-.493.11 3.01 3.01 0 01-1.618-1.616.455.455 0 01.11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 00-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 103.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01zM5 16a1 1 0 11-2 0 1 1 0 012 0z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 01-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012zM6 4.586l2.33 2.33a.452.452 0 01-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 01-.447-.276l-1.7-3.402a.5.5 0 01.093-.577l.49-.49a.5.5 0 01.577-.094l3.402 1.7A.5.5 0 016 3.31v1.277z" />
                                    </svg>

                                </x-button>
                            </x-slot>
                            <!-- Opciones del menú desplegable -->
                            <x-slot name="content" class="border border-gray origin-top">
                                <!-- Encabezado -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Ajustes') }}
                                </div>
                                <!-- Opción para ajustar categorías -->
                                <x-dropdown-link wire:click="showPanelCategorias" class="block">
                                    {{ __('Ajustar categorías') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div> --}}


            </div>



            <div class="grid grid-cols-2 sm:grid-cols-12">

                <!-- Componente del menú desplegable -->

            </div>
        </div>

        @if ($openPropuestasRecibidas)
            <div>
                <livewire:administrador.propuestas-recibidas>
                </livewire:administrador.propuestas-recibidas>
            </div>
        @endif


        @if ($openFormPropuestasRevicion)
            <div>
                <livewire:administrador.form-validar-propuesta-participante>
                </livewire:administrador.form-validar-propuesta-participante>
            </div>
        @endif

        @if ($openPropuestasAprobadas)
            <div>
                <livewire:administrador.propuestas-aprobadas></livewire:administrador.propuestas-aprobadas>

            </div>
        @endif





        @if ($openPropuestasRechazadas)
            <div>
                <livewire:administrador.propuestas-rechazadas></livewire:administrador.propuestas-rechazadas>

            </div>
        @endif


        @if ($showPanelCategorias)
            <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                    <div
                        class=" bg-white dark:bg-gray-900 overflow-hidden shadow-xl  sm:rounded-xl rounded-xl border border-b-indigo-400 border-l-indigo-400 border border-t-fuchsia-400 border-r-fuchsia-400 dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-fuchsia-900 dark:border-r-fuchsia-900">

                        <div class="flex items-center justify-end mr-2 mt-2">
                            <button class="red-hover icon-red" wire:click="closePanelCategorias">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>


                        <livewire:administrador.categorias-component> </livewire:administrador.categorias-component>

                    </div>
                </div>
            </div>
        @endif

    </div>

    </div>




    <style>
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

        .icon-yellow path {
            fill: rgb(217, 255, 2);
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
    </style>
