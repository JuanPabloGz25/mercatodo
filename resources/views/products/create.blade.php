<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-3">
                    
                        <form class="bg-white rounded-lg shadow-sm p-4 text-center flex flex-col gap-5" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3 flex flex-col gap-2">
                            <label for="code">{{ trans('Código') }}</label>
                            <input name="code" type="text" required>
                            @error('code') {{ $message }} @enderror
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <img id="imagenSeleccionada" style="max-height: 300px;">           
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                            <div class='flex items-center justify-center w-full'>
                                <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                    <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la Imagen</p>
                                    </div>
                                <input name="image" id="image" type='file' class="hidden" />
                                </label>
                            </div>
                        </div>

                        <div class="mt-3 flex flex-col gap-2">
                            <label for="marca">{{ trans('Marca') }}</label>
                            <input name="marca" type="text" required>
                            @error('marca') {{ $message }} @enderror
                        </div>
                        <div class="mt-3 flex flex-col gap-2">
                            <label for="linea">{{ trans('Línea') }}</label>
                            <input name="linea" type="text" required>
                            @error('linea') {{ $message }} @enderror
                        </div>
                        <div class="mt-3 flex flex-col gap-2">
                            <label for="especificaciones">{{ trans('Especificaciones') }}</label>
                            <textarea name="especificaciones" type="text" required></textarea>
                            @error('especificaciones') {{ $message }} @enderror
                        </div>
                        <div class="mt-3 flex flex-col gap-2">
                            <label for="price">{{ trans('Precio') }}</label>
                            <input name="price" type="text" required>
                            @error('price') {{ $message }} @enderror
                        </div>
                        <div class="mt-3 flex flex-col gap-2">
                            <label for="stock">{{ trans('Stock') }}</label>
                            <input name="stock" type="text" required>
                            @error('stock') {{ $message }} @enderror
                        </div>
                        <button type="submit" class="btn-primary">{{ trans('Guardar')  }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#image').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
