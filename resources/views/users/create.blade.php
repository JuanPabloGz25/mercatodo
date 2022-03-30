<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('CREACIÓN DE USUARIOS') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-200 overflow-hidden shadow-xl sm:rounded-lg">

                    @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡REVISE LOS CAMPOS!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                    @endif

                        <form action="{{ route('users.store') }}" method="POST"
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Nombre:</label>
                                    <input name="name" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Apellidos:</label>
                                    <input name="lastname" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Email:</label>
                                    <input name="email" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Document:</label>
                                    <input name="document" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Teléfono:</label>
                                    <input name="phone" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Contraseña:</label>
                                    <input name="password" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Confirmar Contraseña:</label>
                                    <input name="confirm-password" class="py-2 px-3 rounded-lg border-2 border-blue-600 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                                </div>
                            </div>
                            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <a href="{{ route('users.index') }}" class='w-auto bg-red-400 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-black px-4 py-2'>CANCELAR</a>
                            <button type="submit" class='w-auto bg-blue-600 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-black px-4 py-2'>GUARDAR CAMBIOS</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</x-app-layout>
