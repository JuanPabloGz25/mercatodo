<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('TABLA DE PRODUCTOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">

                <a type="button" href="{{ route('products.create') }}" class="bg-indigo-500 px-12 py-2 rounded text-black-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">CREAR NUEVO PRODUCTO</a>
                <table class="table-auto w-full text-center">
                    <thead>
                    <tr class="bg-gray-800 text-white text-center border px-4 py-2">
                        <th style="display: none;">ID</th>
                        <th class="border px-4 py-2">MARCA</th>
                        <th class="border px-4 py-2">LÍNEA</th>
                        <th class="border px-4 py-2">ESPECIFICACIONES</th>
                        <th class="border px-4 py-2">PRECIO</th>
                        <th class="border px-4 py-2">STOCK</th>
                        <th class="border px-4 py-2">ACCIONES</th>
                        <th class="border px-4 py-2">ESTADO</th>
                    </tr>
                    </thead>
                    <tbody>
                             @foreach ($products as $product)
                               <tr>
                                 <td class="border px-4 py-2 border-gray-900" style="display: none;">{{$product->code}}</td>
                                 <td class="border px-4 py-2 border-gray-900"> {{ $product->marca }} </td>
                                 <td class="border px-4 py-2 border-gray-900"> {{ $product->linea }}</td>
                                 <td class="border px-4 py-2 border-gray-900">{{ $product->especificaciones }}</td>
                                 <td class="border px-4 py-2 border-gray-900">{{ $product->price }} {{ $exchange }}</td>
                                 <td class="border px-4 py-2 border-gray-900">{{ $product->stock }}</td>

                                   <td class="border px-4 py-2 border-gray-900">
                                       <div class="flex justify-center rounded-lg text-lg" role="group">
                                           <!-- botón editar -->
                                           <a href="{{ route('products.edit', $product->id) }}" class="rounded bg-blue-600 hover:bg-blue-300 text-white font-bold py-1 px-1">EDITAR</a>

                                           <!-- botón borrar -->
                                           <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="formEliminar">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="rounded bg-red-600 hover:bg-red-300 text-white font-bold py-1 px-1">BORRAR</button>
                                           </form>

                                           <!-- botón estado -->
                                           <form action="{{route('StatusProduct', $product->id) }}"method="POST">
                                               @method('PUT')
                                               @csrf
                                               <button type="submit" class="rounded bg-green-600 hover:bg-green-300 text-white font-bold py-1 px-1">
                                                   @if($product->status == 'enable')
                                                       DESACTIVAR
                                                   @else
                                                       ACTIVAR
                                                   @endif</button>
                                           </form>
                                       </div>
                                   </td>
                                   <td class="border px-4 py-2 border-gray-900">
                                        @if($product->status == 'enable')
                                            PRODUCTO ACTIVO
                                        @else
                                            PRODUCTO INACTIVO
                                        @endif
                                   </td>
                               </tr>
                             @endforeach
                    </tbody>
                         </table>
                         <!-- Centramos la paginacion a la derecha -->
                       <div class="pagination justify-content-end">
                         {!! $products->links() !!}
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
                title: '¿CONFIRMA LA ELIMINACIÓN DEL PRODUCTO?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'CONFIRMAR'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡ELIMINADO!', 'EL PRODUCTO HA SIDO ELIMINADO EXITOSAMENTE.','success');
                }
            })
      }, false)
    })
})()
</script>
