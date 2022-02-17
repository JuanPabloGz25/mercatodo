<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDITAR USUARIOS') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

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
                                <label for="name">NOMBRE</label>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label for="email">CORREO</label>
                                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label for="password">CONTRASEÑA</label>
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label for="confirm-password">CONFIRMAR CONTRASEÑA</label>
                                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                            </div>

                            <div class="grid grid-cols-1">
                                <label for="">ROL</label>
                                {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                            </div>
                            </div>

                            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <a href="{{ route('users.index') }}" class='w-auto bg-blue-400 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-black px-2 py-2'>CANCELAR</a>
                            <button type="submit" class='w-auto bg-blue-700 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-black px-2 py-2'>GUARDAR</button>
                            </div>

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
