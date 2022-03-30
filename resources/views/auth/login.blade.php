<x-guest-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">

    <div class="bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900 py-6">
        <h1 class="text-3xl text-center text-white uppercase" style="font-family: 'Merriweather', cursive;">Inicia Sesión En Nuestra Web</h1>
    </div>
    <div class="flex justify-between py-8 px-6 bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900">
        <div>
            <img src="{{ asset('image/landcruiser.png') }}" alt="landcruiser" class="w-100 h-100 px-20">
        </div>
        <div class="px-24 py-10">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('CORREO ELECTRÓNICO')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-10">
                    <x-label for="password" :value="__('CONTRASEÑA')" />

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-8">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="mt-4 rounded-full border-black border-2 text-red-600 shadow-sm focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50" name="remember">
                        <span class="mt-4 ml-4 text-sm text-black font-semibold">{{ __('RECUÉRDAME') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-10">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white font-semibold hover:text-black" href="{{ route('password.request') }}">
                            {{ __('¿OLVIDASTE TU CONTRASEÑA?') }}
                        </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('INICIA SESIÓN') }}
                    </x-button>
                </div>
            </form>
        </div>

    </div>
</x-guest-layout>
