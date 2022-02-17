<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TABLA DE USUARIOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <a type="button" href="{{ route('users.create') }}" class="bg-indigo-500 px-12 py-2 rounded text-black-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">CREAR NUEVO USUARIO</a>
                <table class="table-auto w-full">
                    <thead>
                    <tr class="bg-gray-900 text-white">
                        <th class="border px-4 py-2">NOMBRE</th>
                        <th class="border px-4 py-2">CORREO</th>
                        <th class="border px-4 py-2">ROL</th>
                        <th class="border px-4 py-2">ACCIONES</th>
                        <th class="border px-4 py-2">ESTADO</th>
                    </tr>
                    </thead>
                    <tbody>

                             @foreach ($users as $user)
                               <tr>
                                 <td class="border px-4 py-2 border-gray-900"> {{ $user->name }} </td>
                                 <td class="border px-4 py-2 border-gray-900">{{ $user->email }} </td>
                                 <td class="border px-4 py-2 border-gray-900">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $rolName)
                                            <h5><span class="border px-4 py-2 border-gray-900">{{$rolName}}</span></h5>
                                        @endforeach
                                    @endif
                                </td>

                                   <td class="border px-4 py-2 border-gray-900">
                                       <div class="flex justify-center rounded-lg text-lg text-center" role="group">
                                           <!-- botón editar -->
                                           <a href="{{ route('users.edit', $user->id) }}" class="rounded bg-blue-600 hover:bg-blue-300 text-white font-bold py-1 px-1">EDITAR</a>

                                           <!-- botón borrar -->
                                           <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="formEliminar">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="rounded bg-red-600 hover:bg-red-300 text-white font-bold py-1 px-1">BORRAR</button>
                                           </form>

                                           <!-- botón estado -->
                                           <form action="{{route('StatusChange', $user->id) }}"method="POST">
                                               @method('PUT')
                                               @csrf
                                               <button type="submit" class="rounded bg-green-600 hover:bg-green-300 text-white font-bold py-1 px-1">
                                                   @if($user->status == 'enable')
                                                       DESACTIVAR
                                                   @else
                                                       ACTIVAR
                                                   @endif</button>
                                           </form>
                                       </div>
                                   </td>
                                   <td class="border px-4 py-2 border-gray-900">
                                       @if($user->status == 'enable')
                                           USUARIO ACTIVO
                                       @else
                                           USUARIO INACTIVO
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
<script>
    (function () {
        'use strict'
        //debemos crear la clase formEliminar dentro del form del boton borrar
        //recordar que cada registro a eliminar esta contenido en un form
        var forms = document.querySelectorAll('.formEliminar')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿CONFIRMA LA ELIMINACIÓN DEL USUARIO?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'CONFIRMAR'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡ELIMINADO!', 'EL USUARIO HA SIDO ELIMINADO EXITOSAMENTE.','success');
                        }
                    })
                }, false)
            })
    })()
</script>
