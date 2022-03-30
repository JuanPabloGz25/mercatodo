<x-guest-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">

    <div class="bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900 py-4">
        <h1 class="text-3xl text-center text-white uppercase" style="font-family: 'Merriweather', cursive;">Regístrate en Nuestra Web</h1>
    </div>

    <div class="flex justify-around bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900 px-10 py-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
        <div>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('NOMBRE')" />

                    <x-input id="name" class="block mt-1 w-80 h-8" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Lastname -->
                <div>
                    <x-label for="lastname" :value="__('APELLIDOS')" />

                    <x-input id="lastname" class="block mt-1 w-80 h-8" type="text" name="lastname" :value="old('lastname')" required autofocus />
                </div>

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('CORREO ELECTRÓNICO')" />

                    <x-input id="email" class="block mt-1 w-80 h-8" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Document -->
                <div>
                    <x-label for="document" :value="__('IDENTIFICACIÓN')" />

                    <x-input id="document" class="block mt-1 w-80 h-8" type="text" name="document" :value="old('document')" required autofocus />
                </div>

                <!-- Phone -->
                <div>
                    <x-label for="phone" :value="__('NÚMERO DE CONTACTO')" />

                    <x-input id="phone" class="block mt-1 w-80 h-8" type="text" name="phone" :value="old('phone')" required autofocus />
                </div>

                <!-- Gender -->
                <div>
                    <x-label for="gender" :value="__('GÉNERO')" />

                    <x-input id="gender" class="block mt-1 w-80 h-8" type="text" name="gender" :value="old('gender')" required autofocus />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" :value="__('CONTRASEÑA')" />

                    <x-input id="password" class="block mt-1 w-80 h-8"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" :value="__('CONFIRMAR CONTRASEÑA')" />

                    <x-input id="password_confirmation" class="block mt-1 w-80 h-8"
                         type="password"
                         name="password_confirmation" required />
                </div>
        </div>
                <div class="flex items-center justify-center mt-4">
                    <a class="underline text-sm text-white font-semibold hover:text-black" href="{{ route('login') }}">
                        {{ __('¿YA ESTÁS REGISTRADO?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('REGÍSTRESE') }}
                    </x-button>
                </div>
                </form>
        <div class="flex justify-between">
            <img src="{{ asset('image/opcion1.avif') }}" alt="opcion1" class="rounded-3xl mr-4 border-2 border-white">
            <img src="{{ asset('image/opcion2.avif') }}" alt="opcion2" class="rounded-3xl border-2 border-white">
        </div>
    </div>
</x-guest-layout>
