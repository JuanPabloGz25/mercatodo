<x-guest-layout>
    <div class="bg-gradient-to-r from-blue-900 via-blue-600 to-blue-900 min-h-screen">
        <div class="container bg-transparent p-24 justify-around">
            <div class="text-lg text-black font-bold mt-36 text-center">
                {{ __('GRACIAS POR REGISTRARSE, ANTES DE EMPEZAR DEBES VERIFICAR TU CORREO ELECTRONICO DANDO CLICK EN EL ENLACE.     SI NO HAS RECIBIDO EL CORREO, TE LO ENVIAREMOS NUEVAMENTE.') }}
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-lg text-black">
                    {{ __('NUEVO LINK DE VERIFICACIÓN HA SIDO ENVIADO A SU CORREO ELECTRÓNICO') }}
                </div>
            @endif
            <div class="mt-4 flex items-center justify-around">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-button>
                            {{ __('REENVIAR VERIFICACIÓN DE EMAIL') }}
                        </x-button>
                    </div>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="uppercase text-sm text-black hover:text-gray-900 bg-yellow-400 border-2 border-blue-600 font-semibold p-2 rounded-2xl">
                        {{ __('CERRAR') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
