<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('TABLA DE NOTICIAS') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-screen">
        <div class="text-center px-4">
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 overflow-hidden shadow-xl">

                <a type="button" href="{{ route('news.create') }}" class="bg-yellow-500 px-16 py-2 rounded-3xl text-black font-bold hover:bg-yellow-200 transition duration-200 each-in-out">CREAR NUEVA NOTICIA</a>
                <table class="w-full table text-black border-separate border-4 border-transparent text-sm rounded-3xl mt-4">
                    <thead class="uppercase font-bold text-center bg-yellow-500 text-black">
                    <tr>
                        <th style="display: none;">ID</th>
                        <th class="p-2 rounded-3xl">Título</th>
                        <th class="p-2 rounded-3xl">Autor</th>
                        <th class="p-2 rounded-3xl">Fecha</th>
                        <th class="p-2 rounded-3xl">Categoria</th>
                        <th class="p-2 rounded-3xl">Acciones</th>
                        <th class="p-2 rounded-3xl">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($news as $new)
                        <tr class="bg-yellow-200 text-black text-center font-semibold">
                            <td class="p-2 rounded-3xl" style="display: none;">{{$new->code}}</td>
                            <td class="p-2 rounded-3xl"> {{ $new->title }} </td>
                            <td class="p-2 rounded-3xl"> {{ $new->author }} </td>
                            <td class="p-2 rounded-3xl"> {{ $new->date }}</td>
                            <td class="p-2 rounded-3xl">{{ $new->category }}</td>
                            <td class="p-2 rounded-3xl">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <!-- botón editar -->
                                    <a href="{{ route('news.edit', $new->id) }}"><img src="https://cdn3.iconfinder.com/data/icons/education-209/64/pencil-pen-stationery-school-256.png" alt="" class="w-10 h-10"></a>

                                    <!-- botón borrar -->
                                    <form action="{{ route('news.destroy', $new->id) }}" method="POST" class="formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><img src="https://cdn2.iconfinder.com/data/icons/humano2/128x128/actions/edit-delete.png" alt="" class="w-10 h-10"></button>
                                    </form>

                                    <!-- botón estado -->
                                    <form action="{{route('StatusNew', $new->id) }}"method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit">
                                            @if($new->status == 'enable')
                                                <img src="https://cdn4.iconfinder.com/data/icons/internet-security-flat-2/32/Internet_off_Alert_bell_notification_alarm_disable-256.png" alt="" class="w-10 h-10">
                                            @else
                                                <img src="https://cdn4.iconfinder.com/data/icons/internet-security-flat-2/32/Internet_Security_Alert_bell_notification_alarm_notice-256.png" alt="" class="w-10 h-10">
                                            @endif</button>
                                    </form>
                                </div>
                            </td>
                            <td class="p-2 rounded-3xl">
                                @if($new->status == 'enable')
                                    <h1 class="bg-green-500 rounded-full">VISIBLE</h1>
                                @else
                                    <h1 class="bg-red-600 rounded-full">PRIVADA</h1>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Centramos la paginacion a la derecha -->
                <div class="pagination justify-content-end">
                    {!! $news->links() !!}
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
                        title: '¿CONFIRMA LA ELIMINACIÓN DE LA NOTICIA?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡ELIMINADO!', 'LA NOTICIA HA SIDO ELIMINADO EXITOSAMENTE.','success');
                        }
                    })
                }, false)
            })
    })()
</script>
