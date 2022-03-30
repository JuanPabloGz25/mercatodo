<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h1 class="uppercase text-center text-4xl text-black font-bold" style="font-family: 'Merriweather', cursive;">¡Zenith Luxury Cars!</h1>
    </x-slot>
    <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-8 min-h-screen">
        <div class="container container p-10 bg-gradient-to-r from-blue-400 via-blue-100 to-blue-400 min-h-screen rounded-3xl border-2 border-yellow-400">
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex justify-around">
                <h1 class="uppercase text-center font-extrabold text-5xl"> {{ $new->title }} </h1>
            </div>
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex justify-around">
                <h1 class="text-center font-semibol text-3xl mt-8"> {{ $new->description }} </h1>
            </div>
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex justify-around">
                <div>
                    <img  src="/image/{{ $new->image }}" class="border-2 border-red-700 rounded-3xl mt-8"/>
                </div>
            </div>
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex justify-around">
                <h1 class="text-center font-serif text-3xl mt-10"> {{ $new->content }} </h1>
            </div>
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 flex justify-around">
                <h1 class="text-left font-serif text-xl mt-6"> {{ $new->author }} {{ $new->date }}</h1>
            </div>
        </div>
    </div>
</x-app-layout>
