<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h1 class="uppercase text-center text-4xl text-black font-bold" style="font-family: 'Merriweather', cursive;">¡ESTOS SON NUESTROS VEHÍCULOS DISPONIBLES!</h1>
    </x-slot>
    <div class="border-b-2 border-red-700">
        <h1 class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 text-center font-semibold text-black text-xl uppercase p-6" style="font-family: 'Merriweather', cursive;">Utiliza Nuestros Filtros Para Que Encuentres Tu Vehículo Más Rápido.</h1>
    </div>
    <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-4 flex items-center justify-center">
        <div class="grid grid-cols-7 gap-2">
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <div class="form-group d-inline-flex">
                        <input type="text" class="form-control rounded-3xl w-36 border-2 border-red-700 bg-blue-200" name="search" placeholder="" value="{{ request()->input('search') }}">
                        <span class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                        <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-12 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mr-6 mt-4">{{trans('Buscar')}}</button>
                    </div>
                </form>
            </div>
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <select name="category" id="category" class="form-control input-lg dynamic rounded-3xl border-red-700 bg-blue-200 font-semibold" data-dependent="state">
                        <option value="">Categoría</option>
                        @foreach($filters as $product)
                            <option> {{ $product->category }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="form-group">
                    <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-10 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mt-4">{{trans('Filtrar')}}</button>
                </div>
            </div>
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <select name="brand" id="brand" class="form-control input-lg dynamic rounded-3xl border-red-700 bg-blue-200 font-semibold" data-dependent="state">
                        <option value="">Marca</option>
                        @foreach($filters as $product)
                            <option> {{ $product->brand }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="form-group">
                    <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-8 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mt-4">{{trans('Filtrar')}}</button>
                </div>
            </div>
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <select name="model" id="model" class="form-control input-lg dynamic rounded-3xl border-red-700 bg-blue-200 font-semibold" data-dependent="state">
                        <option value="">Modelo</option>
                        @foreach($filters as $product)
                            <option> {{ $product->model }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="form-group">
                    <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-8 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mt-4">{{trans('Filtrar')}}</button>
                </div>
            </div>
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <select name="color" id="color" class="form-control input-lg dynamic rounded-3xl border-red-700 bg-blue-200 font-semibold" data-dependent="state">
                        <option value="">Color</option>
                        @foreach($filters as $product)
                            <option> {{ $product->color }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="form-group">
                    <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-8 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mt-4">{{trans('Filtrar')}}</button>
                </div>
            </div>
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <select name="transmission" id="transmission" class="form-control input-lg dynamic rounded-3xl border-red-700 bg-blue-200 font-semibold" data-dependent="state">
                        <option value="">Transmisión</option>
                        @foreach($filters as $product)
                            <option> {{ $product->transmission }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="form-group">
                    <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-12 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mt-4">{{trans('Filtrar')}}</button>
                </div>
            </div>
            <div class="bg-transparent">
                <form action="{{route('catalogo')}}" method="GET">
                    <select name="fuel" id="fuel" class="form-control input-lg dynamic rounded-3xl border-red-700 bg-blue-200 font-semibold" data-dependent="state">
                        <option value="">Combustible</option>
                        @foreach($filters as $product)
                            <option> {{ $product->fuel }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="form-group">
                    <button type="submit" class="bg-yellow-400 rounded-full font-bold text-black px-12 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mt-4">{{trans('Filtrar')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-4 min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-3 gap-8 flex-around">
            @foreach($products as $product)
            <div class="col-span-1 bg-gradient-to-r from-blue-500 via-yellow-200 to-blue-500 p-8 rounded-3xl border-4 border-blue-900 justify-items-center">
                <img  src="/image/{{ $product->image }}" class="border-2 border-yellow-400 rounded-3xl"/>
                <br>
                <h3 class="uppercase font-bold text-center text-3xl text-black" style="font-family: 'Merriweather', cursive;">{{$product->brand}} {{$product->line}}</h3>
                <br>
                <h3 class="uppercase font-semibold text-center text-lg text-black" style="font-family: 'Merriweather', cursive;">{{$product->category}}</h3>
                <br>
                <h3 class="uppercase font-semibold text-black text-center"> ${{$product->formatted_price}} COP </h3>
                <br>
                <div class="flex justify-around">
                    <form action="{{ route('products.show', $product) }}" method="GET">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <button class="uppercase font-semibold px-4 text-lg text-black bg-gradient-to-r from-yellow-400 to-yellow-200 hover:from-indigo-300 hover:to-indigo-100 rounded-3xl border-2 border-black" style="font-family: 'Merriweather', cursive;">Descripción</button>
                    </form>
                    <br>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <button class="uppercase font-semibold px-4 text-lg text-black bg-gradient-to-r from-green-400 to-green-700 hover:from-pink-500 hover:to-yellow-500 rounded-3xl border-2 border-black" style="font-family: 'Merriweather', cursive;">Comprar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="pagination justify-content-end bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6 font-bold">
        {!! $products->links() !!}
    </div>
</x-app-layout>




