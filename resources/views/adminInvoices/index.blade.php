<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h2 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">
            {{ __('Transacciones de E-Commerce') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-screen">
        <div class="text-center px-4">
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 overflow-hidden shadow-xl">
                <table class="w-full table text-black border-separate border-4 border-transparent text-sm rounded-3xl mt-4">
                    <thead class="uppercase font-bold text-center bg-yellow-500 text-black">
                    <tr>
                        <th class="p-2 rounded-3xl">ID</th>
                        <th class="p-2 rounded-3xl">Documento</th>
                        <th class="p-2 rounded-3xl">Referencia</th>
                        <th class="p-2 rounded-3xl">ID de Pago</th>
                        <th class="p-2 rounded-3xl">Fecha</th>
                        <th class="p-2 rounded-3xl">Estado</th>
                        <th class="p-2 rounded-3xl">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($remittances as $remittance)
                        <tr class="bg-yellow-200 text-black text-center font-semibold">
                            <td class="p-2 rounded-3xl"> {{ $remittance->id }} </td>
                            <td class="p-2 rounded-3xl"> {{ $remittance->document }} </td>
                            <td class="p-2 rounded-3xl"> {{ $remittance->reference }} </td>
                            <td class="p-2 rounded-3xl"> {{ $remittance->request_id }} </td>
                            <td class="p-2 rounded-3xl"> {{ $remittance->payment_date }} </td>
                            <td class="p-2 rounded-3xl"> {{ $remittance->status }} </td>
                            <td class="p-2 rounded-3xl"> ${{ $remittance->total }} COP</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $remittances->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
