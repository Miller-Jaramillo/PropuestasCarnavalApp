<div id="floating-form"
class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 ">
<div
    class="bg-gray-100 dark:bg-gray-800 p-6 rounded-md dark:text-white text-gray-900 border border-indigo-800">

    <form method="POST" action="{{ route('register-participante.store') }}">
        @csrf
        <div class="text-center">
            <p class="text-xl"><b>PARTICIPA EN EL CARNAVAL</b></p>
            <p class="text-sm">Completa tus datos para participar en el carnaval de Negros y
                Blancos.
                <br>Al finalizar, podras enviarnos tu propuesta.
            </p>
            <p class="text-md">
                <b>¡No te quedes fuera! 👨‍🎤👩‍🎤🤹‍♂️✨</b>
            </p>
        </div>

        <div class="mt-5">
            <x-label for="name" value="{{ __('Nombre completo') }}" />
            <x-input id="name" class="block mt-1 w-full " type="text" name="name"
                wire:model="name" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-label for="lastname" value="{{ __('Apellido completo') }}" />
            <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                wire:model="lastname" required autocomplete="lastname" />
        </div>


        <div class="mt-4">
            <x-label for="cellphone" value="{{ __('Celular') }}" />
            <x-input id="cellphone" class="block mt-1 w-full" type="text" name="cellphone"
                wire:model="cellphone" required autofocus autocomplete="name"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
        </div>

        <div class="mt-4">
            <x-label for="identification_number" value="{{ __('Numero de Cedula') }}" />
            <x-input id="identification_number" class="block mt-1 w-full" type="text"
                name="identification_number" wire:model="identification_number" required autofocus
                autocomplete="identification_number"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
        </div>


        <div class="mt-4 flex justify-end">
            <x-button wire:click="closeForm" type="button"
                class="px-4 py-2 text-sm font-medium shadow-sm rounded-md dark:hover:bg-red-400  hover:bg-red-500">
                Cancelar
            </x-button>

            <x-button class="ml-4 shadow-sm rounded-md dark:bg-green-500  bg-green-500 dark:hover:bg-green-600  hover:bg-green-600">
                {{ __('particiar') }}
            </x-button>

    </form>
</div>
</div>