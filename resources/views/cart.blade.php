<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
<x-slot name="header">
    <h1 class="uppercase text-center text-4xl text-black font-bold" style="font-family: 'Merriweather', cursive;">ESTE ES TU CARRITO DE COMPRAS</h1>
</x-slot>

<div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-12 min-h-screen">
    <div class="container p-8 bg-blue-200 min-h-screen rounded-3xl border-2 border-red-800">
        <div class="uppercase text-center font-semibold flex flex-col w-full p-8 text-black bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 shadow-lg rounded-3xl">
            @if ($message = Session::get('success'))
                <div class="p-4 mb-3 bg-green-400 rounded">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
            @endif
            <h3 class="text-5xl text-bold text-white" style="font-family: 'Merriweather', cursive;">Mi Pedido</h3>
            <br>
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-center text-2xl" style="font-family: 'Merriweather', cursive;">{{ trans('NOMBRE') }}</th>
                        <th class="pl-5 text-center lg:text-center lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline text-center text-2xl" style="font-family: 'Merriweather', cursive;">CANTIDAD</span>
                        </th>
                        <th class="uppercase hidden text-2xl text-right md:table-cell" style="font-family: 'Merriweather', cursive;"> {{ trans('Precio') }} </th>
                        <th class="hidden text-CENTER md:table-cell"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                    <img  src="/image/{{ $product->attributes->image }}" class="w-48 rounded" alt="Thumbnail">
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    <p class="mb-2 md:ml-4 rounded-3xl" style="font-family: 'Merriweather', cursive;">{{ $product->name }}</p>
                                </a>
                            </td>
                            <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-14">
                                    <div class="relative flex flex-row w-full h-8">

                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id}}" >
                                            <div class="relative flex flex-row w-full h-8">
                                                <input type="number" name="quantity" value="{{ $product->quantity }}"
                                                       class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black"/>
                                            </div>
                                            <button type="submit"><img src="https://cdn0.iconfinder.com/data/icons/Pry_Black_png/256/Graphics_Pen_Black.png" alt="" class="w-10 h-10 mt-6"></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden text-center md:table-cell ml-4">
                                <span class="text-sm font-medium lg:text-base" style="font-family: 'Merriweather', cursive;">
                                    ${{ $product->price }}
                                </span>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <button><img src="https://cdn2.iconfinder.com/data/icons/humano2/128x128/actions/edit-delete.png" alt="" class="w-10 h-10"></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                <br>
                <div>
                    Total: ${{ Cart::getTotal() }}
                </div>
                <br>
                <div>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="px-6 py-2 text-black bg-gradient-to-r from-white to-white hover:from-pink-300 hover:to-pink-200 font-semibold rounded-3xl border border-black">ELIMINAR TODO EL CARRITO</button>
                    </form>
                </div>
                <br>
                <div>
                    <form action="{{ route('external-api.store') }}" method="POST">
                        @csrf
                        <button class="px-6 py-2 text-black bg-gradient-to-r from-white to-white hover:from-pink-300 hover:to-pink-200 font-semibold rounded-3xl border border-black">PROCEDE AL PAGO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
