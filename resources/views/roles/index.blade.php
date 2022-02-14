<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabla de Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-3">
                <a class="btn btn-warning" href="{{ route('roles.create') }}">Crear Nuevo Rol</a>        
                         
                         <table class="table table-striped mt-2">
                           <thead style="background-color:#6777ef">                                     
                               <th>Nombre del Rol</th>
                               <th>Acciones</th>                                                          
                           </thead>
                           <tbody>
                             @foreach ($roles as $rol)
                               <tr>
                                 <td>{{ $rol->name }}</td>
                                                              
                                 <td class="inline-flex">
                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                <a class="inline-flex bg-teal-300 text-black rounded-full h-6 px-3 justify-center items-center" href="{{ route('roles.edit', $rol->id) }}">{{trans('Editar')}}</a>
                                            </div>
                                        </div>

                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['roles.destroy', $rol->id]]) !!}
                                                {!! Form::submit(trans('Eliminar')) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                               </tr>
                             @endforeach
                           </tbody>
                         </table>
                         <!-- Centramos la paginacion a la derecha -->
                       <div class="pagination justify-content-end">
                         {!! $roles->links() !!}
                       </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
