<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabla de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-3">
                <a class="btn btn-warning" href="{{ route('products.create') }}">Crear Nuevo Producto</a>        
                         
                         <table class="table table-striped mt-2">
                             
                           <thead style="background-color:#6777ef">                                     
                               <th>Código</th>
                               <th>Imagen</th>
                               <th>Marca</th>
                               <th>Línea</th>
                               <th>Especificaciones</th>
                               <th>Precio</th>     
                               <th>Stock</th>
                               <th>Acciones</th>  
                               <th>Estado</th>                                                                
                           </thead>
                           <tbody>
                             @foreach ($products as $product)
                               <tr>
                                 <td>{{ $product->code }}</td>
                                 <td  class="border px-14 py-1">
                                    <img src="/image/{{$product->image}}" width="40%">
                                 </td>                        
                                 <td>{{ $product->marca }}</td>
                                 <td>{{ $product->linea }}</td>
                                 <td>{{ $product->especificaciones }}</td>
                                 <td>{{ $product->price }} {{ $currency }}</td>
                                 <td>{{ $product->stock }}</td>
                                                          
                                 <td class="inline-flex">
                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                <a class="inline-flex bg-teal-300 text-black rounded-full h-6 px-3 justify-center items-center" href="{{ route('products.edit', $product->id) }}">{{trans('Editar')}}</a>
                                            </div>
                                        </div>

                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['products.destroy', $product->id]]) !!}
                                                {!! Form::submit(trans('Eliminar')) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="p-2">
                                        <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                        <form action="{{route('StatusProduct', $product->id) }}"method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">@if($product->status == 'enable')
                                            Desactivar 
                                        @else
                                            Activar
                                        @endif</button>
                                        </form>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($product->status == 'enable')
                                            Producto Activo
                                        @else
                                            Producto Inactivo
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
                title: '¿Confirma la Eliminación del Producto?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El Producto ha sido Eliminado Exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>
