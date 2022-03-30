<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('EDITAR USUARIOS') }}
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

                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="name">Nombre:</label>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="lastname">Apellidos:</label>
                                {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="email">Email:</label>
                                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="email">Documento:</label>
                                    {!! Form::text('document', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="phone">Teléfono:</label>
                                {!! Form::text('phone', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="password">Contraseña:</label>
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="confirm-password">Confirmar Contraseña:</label>
                                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold" for="">Permisos:</label>
                                {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                            </div>
                            </div>

                            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <a href="{{ route('users.index') }}" class='w-auto bg-blue-400 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-black px-2 py-2'>Cancelar</a>
                            <button type="submit" class='w-auto bg-blue-700 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-black px-2 py-2'>Guardar</button>
                            </div>

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
