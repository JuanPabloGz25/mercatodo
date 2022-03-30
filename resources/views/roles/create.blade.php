<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('CREACIÓN DE PERMISOS') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200">

                    @if($errors->any())
                        <div class="alert alert-dark alert-dimissible fade show" role="alert">
                            <strong>Revise los campos!</strong>
                            @foreach($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dimiss="alert" aria-label="close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Nombre del Permiso:</label>
                            {!! Form::text('name', '', array('class'=>'form-control')) !!}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="form-group">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Permisos Asignados:</label>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{$value->name}}</label>
                                <br/>
                            @endforeach

                        </div>
                    </div>
                </div>
                <button type="submit" class='justify-items-center w-auto bg-blue-600 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-black px-4 py-2'>GUARDAR CAMBIOS</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
