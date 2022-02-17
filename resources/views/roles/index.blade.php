<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TABLA DE ROLES') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">

                <a type="button" href="{{ route('roles.create') }}" class="bg-indigo-500 px-12 py-2 rounded text-black-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">CREAR NUEVO ROL</a>
                <table class="table-auto w-full">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border px-4 py-2">NOMBRE DEL ROL</th>
                        <th class="border px-4 py-2">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                             @foreach ($roles as $rol)
                               <tr>
                                 <td class="border px-4 py-2 border-gray-900">{{ $rol->name }}</td>

                                   <td class="border px-4 py-2 border-gray-900">
                                       <div class="flex justify-center rounded-lg text-lg" role="group">
                                           <!-- botón editar -->
                                           <a href="{{ route('roles.edit', $rol->id) }}" class="rounded bg-blue-600 hover:bg-blue-300 text-white font-bold py-2 px-4">EDITAR</a>

                                           <!-- botón borrar -->
                                           <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="formEliminar">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="rounded bg-red-600 hover:bg-red-300 text-white font-bold py-2 px-4">BORRAR</button>
                                           </form>
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
                        title: '¿CONFIRMA LA ELIMINACIÓN DEL ROL?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'CONFIRMAR'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡ELIMINADO!', 'EL ROL HA SIDO ELIMINADO EXITOSAMENTE.','success');
                        }
                    })
                }, false)
            })
    })()
</script>
