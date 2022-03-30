<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('TABLA DE PERMISOS') }}
        </h2>
    </x-slot>
    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-screen">
        <div class="text-center px-4">
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 overflow-hidden shadow-xl">

                <a type="button" href="{{ route('roles.create') }}" class="bg-yellow-500 px-16 py-2 rounded-3xl text-black font-bold hover:bg-yellow-200 transition duration-200 each-in-out">CREAR NUEVO PERMISO</a>
                <table class="w-full table text-black border-separate border-4 border-transparent text-sm rounded-3xl mt-4">
                    <thead class="uppercase font-bold text-center bg-yellow-500 text-black">
                    <tr>
                        <th class="p-2 rounded-3xl">PERMISO</th>
                        <th class="p-2 rounded-3xl">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                             @foreach ($roles as $rol)
                               <tr class="bg-yellow-200 text-black text-center font-semibold">
                                 <td class="p-2 rounded-3xl">{{ $rol->name }}</td>

                                   <td class="p-2 rounded-3xl">
                                       <div class="flex justify-center rounded-lg text-lg" role="group">
                                           <!-- botón editar -->
                                           <a href="{{ route('roles.edit', $rol->id) }}"><img src="https://cdn3.iconfinder.com/data/icons/education-209/64/pencil-pen-stationery-school-256.png" alt="" class="w-10 h-10"></a>

                                           <!-- botón borrar -->
                                           <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="formEliminar">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit"><img src="https://cdn2.iconfinder.com/data/icons/humano2/128x128/actions/edit-delete.png" alt="" class="w-10 h-10"></button>
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
                        confirmButtonText: 'Confirmar'
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
