<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h1 class="uppercase text-center text-4xl text-black font-bold" style="font-family: 'Merriweather', cursive;">¡Zenith Luxury Cars!</h1>
    </x-slot>
    <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-8 min-h-screen">
        <div class="container container p-10 bg-gradient-to-r from-blue-200 via-blue-100 to-blue-200 min-h-screen rounded-3xl border-2 border-yellow-400">
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex justify-around rounded-3xl">
                <div>
                    <img  src="/image/{{ $product->image }}" class="border-2 border-yellow-400 rounded-3xl"/>
                </div>
            </div>
            <div>
                <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex items-center justify-center py-6 rounded-3xl">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">Marca</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->brand }}</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">Línea</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->line }}</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">Categoría</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->category }}</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">Color</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->color }}</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">Modelo</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->model }}</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">Kilometraje</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->kilometre }}</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">Motor</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->engine }}</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">Combustible</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->fuel }}</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">Potencia</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->power }}</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">Torque</div>
                        <div class="bg-yellow-300 text-center uppercase text-lg font-bold rounded-3xl">{{ $product->torque }}</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">Precio</div>
                        <div class="bg-yellow-200 text-center uppercase text-lg font-bold rounded-3xl">${{ $product->formatted_price }} COP</div>
                        <div class="col-span-2 bg-yellow-300 text-center uppercase text-sm font-bold rounded-3xl p-12">{{ $product->description }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
