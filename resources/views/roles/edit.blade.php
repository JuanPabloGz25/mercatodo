<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('EDICIÓN DE PERMISOS') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-min-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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

                    {!! Form::model($role,['method' => 'PATCH', 'route'=>['roles.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Nombre del Permiso:</label>
                                {!! Form::text('name', '', array('class'=>'form-control')) !!}
                            </div>
                        </div>>
                        <div class="form-group">
                            <label for="">Permisos Asignados:</label>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions)? true : false, array('class' => 'name'))}}
                                    {{$value->name}}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>

                </div>
                <button>Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
