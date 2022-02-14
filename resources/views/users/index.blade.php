<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabla de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-3">
                <a class="btn btn-warning" href="{{ route('users.create') }}">Nuevo</a>        
                         
                         <table class="table table-striped mt-2">
                           <thead style="background-color:#6777ef">                                     
                               <th>Nombre</th>
                               <th>Correo</th>
                               <th>Rol</th>
                               <th>Acciones</th>     
                               <th>Estado</th>                                                              
                           </thead>
                           <tbody>
                             @foreach ($users as $user)
                               <tr>
                                 <td>{{ $user->name }}</td>
                                 <td>{{ $user->email }}</td>
                                 <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                        @endforeach
                                    @endif
                                </td>

                                 <td class="inline-flex">
                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                <a class="inline-flex bg-teal-300 text-black rounded-full h-6 px-3 justify-center items-center" href="{{ route('users.edit', $user->id) }}">{{trans('Edit')}}</a>
                                            </div>
                                        </div>

                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                                                {!! Form::submit(trans('Eliminar')) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="p-2">
                                        <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                        <form action="{{route('StatusChange', $user->id) }}"method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit">@if($user->status == 'enable')
                                            Desactivar 
                                        @else
                                            Activar
                                        @endif</button>
                                        </form>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($user->status == 'enable')
                                            Usuario Activo
                                        @else
                                            Usuario Inactivo
                                        @endif
                                    </td>
                               </tr>
                             @endforeach
                           </tbody>
                         </table>
                         <!-- Centramos la paginacion a la derecha -->
                       <div class="pagination justify-content-end">
                         {!! $users->links() !!}
                       </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
