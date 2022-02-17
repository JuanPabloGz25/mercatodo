<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CREAR NUEVO PRODUCTO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">CÓDIGO:</label>
                            <input name="code" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">MARCA:</label>
                            <input name="marca" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">LÍNEA:</label>
                            <input name="linea" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">ESPECIFICACIONES:</label>
                            <input name="especificaciones" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">PRECIO:</label>
                            <input name="price" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">STOCK:</label>
                            <input name="stock" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                    </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <img id="imagenSeleccionada" style="max-height: 300px;">
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold mb-1">SUBIR IMAGEN</label>
                            <div class='flex items-center justify-center w-full'>
                                <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                    <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>SELECCIONE LA IMAGEN</p>
                                    </div>
                                <input name="image" id="image" type='file' class="hidden" />
                                </label>
                            </div>
                        </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('products.index') }}" class='w-auto bg-blue-500 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>CANCELAR</a>
                        <button type="submit" class='w-auto bg-blue-500 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>GUARDAR</button>
                    </div>

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
