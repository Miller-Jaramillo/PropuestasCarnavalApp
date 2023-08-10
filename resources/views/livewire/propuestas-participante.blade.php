<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
        {{ __('Prouestas') }}
    </h2>
</x-slot>


<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6">
        <div class="bg-gray-100 dark:bg-gray-900 overflow-hidden  ">

            <div class="flex justify-center mt-1 pb-3">


                <div>
                    <x-button wire:click=""
                        class="inline-flex items-center px-4 py-2
                        hover:bg-gray-700 dark:hover:bg-gray-400
                        bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3  icon-red"
                        title="Informacion">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>
                        {{-- <p class="sm:hidden block "> Informacion <br> importante</p> --}}
                    </x-button>

                </div>

                <div>
                    <x-button wire:click="openFormNuevaPropuesta"
                        class="inline-flex items-center px-4 py-2
                        hover:bg-gray-700 dark:hover:bg-gray-400
                        bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3 icon-emerald"
                        title="Nueva propuesta">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <path fill-rule="evenodd"
                                d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z"
                                clip-rule="evenodd" />
                            <path
                                d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                        </svg>

                        {{-- <p class="sm:hidden block "> Nueva <br> propuesta</p> --}}
                    </x-button>

                </div>


                <div>
                    <x-button wire:click="openFormPropuestasEnviadas"
                        class="inline-flex items-center px-4 py-2
                        hover:bg-gray-700 dark:hover:bg-gray-400
                        bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3 icon-sky"
                        title="Propuestas enviadas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6.905 9.97a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72V18a.75.75 0 001.5 0v-4.19l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                            </svg>
                            {{-- <p class="sm:hidden block ">Propuestas <br>enviadas</p> --}}
                    </x-button>

                </div>

                <div>
                    <x-button wire:click="openFormPropuestasAprobadas"
                        class="inline-flex items-center px-4 py-2
                        hover:bg-gray-700 dark:hover:bg-gray-400
                        bg-white dark:bg-gray-800 dark:sm:bg-gray-800 shadow-sm  mr-3 icon-oro"
                        title="Propuesta aprobadas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6   sm:w-6 sm:h-6">
                            <path fill-rule="evenodd"
                                d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z"
                                clip-rule="evenodd" />
                        </svg>
                        {{-- <p class="sm:hidden block ">Propuestas <br>aprobadas</p> --}}
                    </x-button>

                </div>
            </div>
        </div>
    </div>


    @if ($showFormPropuestasEnviadas)
    <livewire:propuestas-en-revision> </livewire:propuestas-en-revision>
        <livewire:form-propuestas-enviadas> </livewire:form-propuestas-enviadas>

    @endif




    @if ((request()->has('showForm') && request()->get('showForm') === 'true') || $showFormNuevaPropuesta)
        <livewire:form-propuesta-nueva> </livewire:form-propuesta-nueva>
    @endif





    @if ($showFormPropuestasAprobadas)
        <livewire:form-propuestas-aprobadas> </livewire:form-propuestas-aprobadas>
    @endif

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
        fill: hsl(129, 100%, 50%);
    }


    .icon-teal path {
        fill: rgb(20, 184, 166);
    }

    .icon-emerald path {
        fill: rgb(16, 185, 129);
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

    .icon-sky path {
        fill: rgb(14, 165, 233);
    }
</style>
