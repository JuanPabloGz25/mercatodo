<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-white font-bold" style="font-family: 'Merriweather', cursive;">
            {{trans('Business Control')}}
        </h2>
    </x-slot>
    <div class="bg-black p-2 border-b-4 border-white">
        <div>
            <h1 class="text-blue-500 bg-black font-semibold uppercase text-center text-2xl" style="font-family: 'Merriweather', cursive;">Exportes de Productos</h1>
        </div>
        <div class="bg-black flex justify-center px-48 py-4">
            <form action="{{ route('export.products') }}" method="GET">
                <label class="uppercase text-white font-semibold">{{trans('By Brand')}}:</label>
                <select name="brand" class="bg-blue-200">
                    <option value=""></option>
                    <option value="mazda">Mazda</option>
                    <option value="toyota">Toyota</option>
                    <option value="ford">Ford</option>
                    <option value="mercedes benz">Mercedes Benz</option>
                    <option value="bmw">BMW</option>
                    <option value="ford">Ford</option>
                </select>
                <div class="mt-4">
                    <label class="uppercase text-white font-semibold">{{trans('Start Date')}}:</label>
                    <input name="startDate" type="date" class="bg-blue-200">
                </div>
                <div class="mt-4">
                    <label class="uppercase text-white font-semibold">{{trans('End Date')}}:</label>
                    <input name="endDate" type="date" class="bg-blue-200">
                </div>
                <button type="submit" class='ml-16 mt-4 flex justify-center w-auto bg-blue-500 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('Export Data')}}</button>
            </form>
        </div>
    </div>
    <div class="bg-black p-2 border-b-4 border-white">
        <div>
            <h1 class="text-blue-500 bg-black font-semibold uppercase text-center text-2xl" style="font-family: 'Merriweather', cursive;">Exportes de Usuarios</h1>
        </div>
        <div class="bg-black flex justify-center px-48 py-4">
            <form action="{{ route('export.users') }}" method="GET">
                <label class="uppercase text-white font-semibold">{{trans('By Gender')}}:</label>
                <select name="gender" class="bg-blue-200">
                    <option value=""></option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
                <div class="mt-4">
                    <label class="uppercase text-white font-semibold">{{trans('Start Date')}}:</label>
                    <input name="startDate" type="date" class="bg-blue-200">
                </div>
                <div class="mt-4">
                    <label class="uppercase text-white font-semibold">{{trans('End Date')}}:</label>
                    <input name="endDate" type="date" class="bg-blue-200">
                </div>
                <button type="submit" class='mt-4 ml-16 w-auto bg-blue-500 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('Export Data')}}</button>
            </form>
        </div>
    </div>
    <div class="bg-black p-2 border-b-4 border-white">
        <div>
            <h1 class="text-blue-500 bg-black font-semibold uppercase text-center text-2xl" style="font-family: 'Merriweather', cursive;">Exportes de Pagos por PlaceToPay</h1>
        </div>
        <div class="bg-black flex justify-center px-48 py-4">
            <form action="{{ route('export.remittances') }}" method="GET">
                <div>
                    <label class="uppercase text-white font-semibold">{{trans('Start Date')}}:</label>
                    <input name="startDate" type="date" class="bg-blue-200">
                </div>
                <div class="mt-4">
                    <label class="uppercase text-white font-semibold">{{trans('End Date')}}:</label>
                    <input name="endDate" type="date" class="bg-blue-200">
                </div>
                <button type="submit" class='mt-4 ml-16 w-auto bg-blue-500 hover:bg-blue-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('Export Data')}}</button>
            </form>
        </div>
    </div>
    <div id="Charts" class="flex justify-center px-8 py-8 bg-black">
    </div>
</x-app-layout>
