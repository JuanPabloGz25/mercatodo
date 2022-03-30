<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h1 class="uppercase text-center text-4xl text-black font-bold" style="font-family: 'Merriweather', cursive;">MANTENTE INFORMADO CON LA ACTUALIDAD AUTOMOTRIZ</h1>
    </x-slot>
    <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-12 min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-2 gap-8 flex-around">
            @foreach($news as $new)
            <div class="col-span-1 bg-gradient-to-r from-blue-500 via-yellow-200 to-blue-500 p-8 rounded-3xl border-4 border-blue-900 justify-items-center">
                <h3 class="uppercase font-bold text-center text-3xl text-black" style="font-family: 'Merriweather', cursive;">{{$new->title}}</h3>
                <br>
                <img  src="/image/{{ $new->image }}" class="border-2 border-red-700 rounded-full"/>
                <br>
                <h3 class="uppercase font-semibold text-center text-lg text-black" style="font-family: 'Merriweather', cursive;">{{$new->description}}</h3>
                <br>
                <h3 class="uppercase font-light text-black text-right"> {{$new->author}} {{$new->date}} </h3>
                <br>
                <form action="{{ route('news.show', $new) }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $new->id }}" name="new_id">
                    <button class="uppercase font-semibold text-lg px-56 py-2 text-black bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 rounded-3xl border-2 border-black" style="font-family: 'Merriweather', cursive;">Leer Completo</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    <div class="pagination justify-content-end bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6 font-bold">
        {!! $news->links() !!}
    </div>
</x-app-layout>
