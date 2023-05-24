<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            </div>

            <div class="mt-4">
                <x-label for="rpe" value="{{ __('RPE') }}" />
                <x-input id="rpe" class="block mt-1 w-full" type="number" name="rpe" :value="old('rpe')" required autocomplete="rpe" />
            </div>

            <div class="mt-4">
                <x-label for="apellido_pa" value="{{ __('Apellido Paterno') }}" />
                <x-input id="apellido_pa" class="block mt-1 w-full" type="text" name="apellido_pa" required autocomplete="apellido_pa" />
            </div>

            <div class="mt-4">
                <x-label for="apellido_ma" value="{{ __('Apellido Materno') }}" />
                <x-input id="apellido_ma" class="block mt-1 w-full" type="text" name="apellido_ma" required autocomplete="apellido_ma" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya estas registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
