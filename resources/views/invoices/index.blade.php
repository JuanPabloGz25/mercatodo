<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h1 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;">Historial de Compras</h1>
    </x-slot>
    <div class="py-6 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 h-screen">
        <div class="text-center px-4">
            <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 overflow-hidden shadow-xl">
                <table class="w-full table text-black border-separate border-4 border-transparent text-sm rounded-3xl mt-4">
                    <thead class="uppercase font-bold text-center bg-yellow-500 text-black">
                    <tr>
                        <th class="p-2 rounded-3xl">FECHA</th>
                        <th class="p-2 rounded-3xl">REFERENCIA</th>
                        <th class="p-2 rounded-3xl">ID PAGO</th>
                        <th class="p-2 rounded-3xl">TOTAL</th>
                        <th class="p-2 rounded-3xl">ESTADO</th>
                        <th class="p-2 rounded-3xl">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($remittances as $remittance)
                        <tr class="bg-yellow-200 text-black text-center font-semibold">
                            <td class="p-2 rounded-3xl">{{ $remittance->payment_date }}</td>
                            <td class="p-2 rounded-3xl">{{ $remittance->reference }}</td>
                            <td class="p-2 rounded-3xl">{{ $remittance->request_id }}</td>
                            <td class="p-2 rounded-3xl">{{ $remittance->total }}</td>
                            <td class="p-2 rounded-3xl">{{ $remittance->status }}</td>
                            <td class="p-2 rounded-3xl">
                                @if($remittance->status == 'successful')
                                <form method="GET" action="{{route('external-api.show', $remittance)}}}">
                                <div class="inline-flex p-2">
                                    <button class="bg-gradient-to-r from-green-600 to-green-300 hover:from-green-200 hover:to-green-100 rounded-3xl border-2 border-black px-2">
                                        <h1 class="uppercase font-semibold text-black">Ver Factura</h1>
                                    </button>
                                </div>
                                </form>
                                @endif
                                @if($remittance->status == 'rejected')
                                <form method="POST" action="{{route('tryRemittance', $remittance)}}}">
                                    @csrf
                                    <div class="inline-flex p-2">
                                        <button class="bg-gradient-to-r from-red-600 to-red-300 hover:from-pink-400 hover:to-pink-100 rounded-3xl border-2 border-black px-2">
                                            <h1 class="uppercase font-semibold text-black">Reintentar Pago</h1>
                                        </button>
                                    </div>
                                </form>
                                @endif
                                @if($remittance->status == 'pending')
                                    <h1 class="bg-gradient-to-r from-blue-600 to-blue-300 text-white uppercase font-semibold rounded-3xl">Transacción en Revisión</h1>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Centramos la paginacion a la derecha -->
                <div class="pagination justify-content-end">
                    {!! $remittances->links() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
