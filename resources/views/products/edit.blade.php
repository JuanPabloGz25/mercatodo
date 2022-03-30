<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('EDICIÓN DE PRODUCTOS') }}
        </h2>
    </x-slot>
    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-min-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-200 overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Código:</label>
                            <input name="code" id="code" value="{{ $product->code }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Categoría:</label>
                            <input name="category" id="category" value="{{ $product->category }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Marca:</label>
                            <input name="brand" id="brand" value="{{ $product->brand }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Línea:</label>
                            <input name="line" id="line" value="{{ $product->line }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Modelo:</label>
                            <input name="model" id="model" value="{{ $product->model }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Color:</label>
                            <input name="color" id="color" value="{{ $product->color }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Transmisión:</label>
                            <input name="transmission" id="transmission" value="{{ $product->transmission }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Kilometraje:</label>
                            <input name="kilometre" id="kilometre" value="{{ $product->kilometre }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Motor:</label>
                            <input name="engine" id="engine" value="{{ $product->engine }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Combustible:</label>
                            <input name="fuel" id="fuel" value="{{ $product->fuel }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Torque:</label>
                            <input name="torque" id="torque" value="{{ $product->torque }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Potencia:</label>
                            <input name="power" id="power" value="{{ $product->power }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Precio:</label>
                            <input name="price" id="price" value="{{ $product->price }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Stock:</label>
                            <input name="stock" id="stock" value="{{ $product->stock }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold">Información Adicional:</label>
                            <input name="description" id="description" value="{{ $product->description }}" class="py-2 px-3 rounded-lg border-2 border-blue-500 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <img src="/image/{{ $product->image }}" width="200px" id="imageSelected">
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-black-500 text-light font-semibold mb-1">Subir Imagen</label>
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <p class='uppercase text-sm text-blue-700 font-bold group-hover:text-purple-600 pt-1 tracking-wider'>SELECCIONE LA IMAGEN</p>
                                </div>
                                <input name="image" id="image" type='file' class="hidden" />

                            </label>
                        </div>
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('products.index') }}" class='w-auto bg-blue-500 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>CANCELAR</a>
                        <button type="submit" class='w-auto bg-blue-500 hover:bg-blue-100 rounded-lg shadow-xl font-medium text-white px-4 py-2'>GUARDAR</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>


<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imageSelected').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
