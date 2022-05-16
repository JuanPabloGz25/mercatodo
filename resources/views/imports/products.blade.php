<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-white font-bold" style="font-family: 'Merriweather', cursive;">
            {{trans('Products Import')}}
        </h2>
    </x-slot>

            <div class="py-36 bg-black">
                <div class="container mx-auto bg-gradient-to-r from-blue-200 via-blue-100 to-blue-200 rounded-3xl p-14 border-2 border-orange-500">
                    <form action="{{ route('imports') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="sm:flex items-center bg-black rounded-lg overflow-hidden px-2 py-1 justify-between">
                            <input class="text-white flex-grow outline-none px-2 " name="file" type="file"/>
                            <div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto ">
                                <button class="bg-blue-500 hover:from-pink-500 hover:to-yellow-500 text-black font-semibold text-base rounded-lg px-4 py-2 uppercase">{{trans('Upload File')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>
