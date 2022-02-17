<x-app-layout>
    <x-slot name="header">
        <h2 class="bg-gray-300 font-black text-center text-3xl text-black-800 leading-tight">
            {{ trans('VEHÍCULOS DISPONIBLES') }}
        </h2>
    </x-slot>
    <br>
    <div class="pb-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('catalogo')}}" method="GET">
                <div class="form-group d-inline-flex">
                    <input type="text" class="form-control" name="search" placeholder="" value="{{ request()->input('search') }}">
                    <span class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                    <button type="submit" class="bg-blue-600 rounded-full font-bold text-black px-2 py-2 transition duration-300 ease-in-out hover:bg-blue-400 mr-6">{{trans('BUSCAR')}}</button>
                </div>
            </form>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                    <div class="px-10 py-12 bg-gray-300 grid gap-20 lg:grid-cols-3">
                        @foreach($products as $product)
                            <div class="p-4 border-8 border-black max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer">
                                {{--                        <td>{{$product->id}}</td>--}}
                                <div>
                                    <img  src="/image/{{ $product->image }}"/>
                                </div>
                                <div class="py-4 px-4 bg-blue-50">
                                    <td class="font-bold"> {{$product->marca}} {{$product->linea}}</td>
                                    <h3 class="text-md text-white"></h3>
                                    <br>
                                    <td class="mt-4 text-lg font-thin">{{$product->especificaciones}}</td>
                                    <br>
                                    <br>
                                    <td> ${{$product->price}} COP </td>
                                    <br>

                                    <span class="flex items-center justify-center mt-4 w-full bg-blue-600 hover:bg-blue-400 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <button class="font-semibold text-black-800">COMPRAR</button>
                            </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination justify-content-end">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>




