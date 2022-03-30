<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://rsms.me/inter/inter.css');
        .sf { font-family: 'Inter', sans-serif; }
        .sign { font-family: 'Homemade Apple', cursive; }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
    <title>Invoice. #0196023</title>
</head>
<body class="bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900 print:bg-white md:flex lg:flex xl:flex print:flex md:justify-center lg:justify-center xl:justify-center print:justify-center sf">
<div class="lg:w-1/12 xl:w-1/4"></div>
<div class="w-full bg-white lg:w-full xl:w-2/3 lg:mt-20 lg:mb-20 lg:shadow-xl xl:mt-02 xl:mb-20 xl:shadow-xl print:transform print:scale-90">
    <header class="flex flex-col items-center px-8 pt-20 text-lg text-center bg-white border-t-8 border-green-700 md:block lg:block xl:block print:block md:items-start lg:items-start xl:items-start print:items-start md:text-left lg:text-left xl:text-left print:text-left print:pt-8 print:px-2 md:relative lg:relative xl:relative print:relative">
        <img class="w-3/6 h-auto md:w-1/4 lg:ml-12 xl:ml-12 print:px-0 print:py-0" src="" />
        <div class="flex flex-row mt-12 mb-2 ml-0 text-2xl font-bold md:text-3xl lg:text-4xl xl:text-4xl print:text-2xl lg:ml-12 xl:ml-12">FACTURA
            <div class="text-green-700">
                <span class="mr-4 text-sm">■ </span> #
            </div>
            <span id="invoice_id" class="text-gray-500">{{ $remittance->request_id }}</span>
        </div>
        <div class="flex flex-col lg:ml-12 xl:ml-12 print:text-sm">
            <span>FECHA DE PAGO: {{ $remittance->payment_date }}</span>
        </div>
        <div class="px-8 py-2 mt-16 text-3xl font-bold text-green-700 border-4 border-green-700 border-dotted md:absolute md:right-0 md:top-0 md:mr-12 lg:absolute lg:right-0 lg:top-0 xl:absolute xl:right-0 xl:top-0 print:absolute print:right-0 print:top-0 lg:mr-20 xl:mr-20 print:mr-2 print:mt-8">PAID</div>
        <contract class="flex flex-col m-12 text-center lg:m-12 md:flex-none md:text-left md:relative md:m-0 md:mt-16 lg:flex-none lg:text-left lg:relative xl:flex-none xl:text-left xl:relative print:flex-none print:text-left print:relative print:m-0 print:mt-6 print:text-sm">
            <span class="font-extrabold">CREADOR</span>
            <from class="flex flex-col">
                <span id="company-name" class="font-medium">Zenith Luxury Cars S.A</span>
                <span id="company-country"><span class="flag-icon flag-icon-co"></span> Colombia</span>
                <div class="flex-row">
                    <span id="c-city">Medellín</span>,
                    <span id="c-postal">ANT 05004</span>
                </div>
                <span id="company-address">Cra. 43A #11b-115</span>
                <span id="company-phone">3007224250</span>
                <span id="company-mail">info@zenith.com</span>
            </from>
            <span class="mt-12 font-extrabold md:hidden lg:hidden xl:hidden print:hidden">TO</span>
            <to class="flex flex-col md:absolute md:right-0 md:text-right lg:absolute lg:right-0 lg:text-right print:absolute print:right-0 print:text-right">
                <span class="font-extrabold">DESTINATARIO</span>
                <span id="person-name" class="font-medium">{{ $remittance->user->name }} {{ $remittance->user->lastname }}</span>
                <span id="person-country"><span class="flag-icon flag-icon-co"></span> Colombia</span>
                <div class="flex-row">
                    <span id="p-postal">Cliente</span>
                    <span id="p-city">10124</span>
                </div>
                <span id="person-address">CC: {{ $remittance->user->document }}</span>
                <span id="person-phone">{{ $remittance->user->phone }}</span>
                <span id="person-mail">{{ $remittance->user->email }}</span>
            </to>
        </contract>
    </header>
    <hr class="border-gray-300 md:mt-8 print:hidden">
    <content>
        <div id="content" class="flex justify-center md:p-8 lg:p-20 xl:p-20 print:p-2">
            <table class="w-full text-left table-auto print:text-sm" id="table-items">
                <thead>
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                    <th class="px-4 py-2 text-center">Item</th>
                    <th class="px-4 py-2 text-center">Q</th>
                    <th class="px-4 py-2 text-center">Precio Unitario</th>
                    <th class="px-4 py-2 text-center">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $product->name }}</td>
                    <td class="px-4 py-2 text-center border tabular-nums slashed-zero">{{ $product->quantity }}</td>
                    <td class="px-4 py-2 text-center border tabular-nums slashed-zero">${{ $product->price }}</td>
                    <td class="px-4 py-2 text-center border tabular-nums slashed-zero">${{ $remittance->total }} COP</td>
                </tr>
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black" >
                    <td class="invisible"></td>
                    <td class="invisible"></td>
                    <td class="px-4 py-2 text-right border"><span class="flag-icon flag-icon-co print:hidden"></span> IVA</td>
                    <td class="px-4 py-2 text-right border tabular-nums slashed-zero">19%</td>
                </tr>
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black" >
                    <td class="invisible"></td>
                    <td class="invisible"></td>
                    <td class="px-4 py-2 text-right border">Total de IVA</td>
                    <td class="px-4 py-2 text-right border tabular-nums slashed-zero">Vehículo Libre de IVA</td>
                </tr>
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black" >
                    <td class="invisible"></td>
                    <td class="invisible"></td>
                    <td class="px-4 py-2 font-extrabold text-right border">Total</td>
                    <td class="px-4 py-2 text-right border tabular-nums slashed-zero">${{ $remittance->total }} COP</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </content>
    <payment-history>
        <div class="mt-4 mb-20 print:mb-2 print:mt-2">
            <h2 class="text-xl font-semibold text-center print:text-sm">Historial de Pago</h2>
            <div class="flex flex-col items-center text-center print:text-sm">
                <p class="font-medium">  {{ $remittance->payment_date }} <span class="font-light"><i class="lab la-cc-mastercard la-lg inline-block"></i> Credit Card Payment: ${{ $remittance->total }} (Mastercard XXXX-XXXX-XXXX-1111)</span></p>
            </div>

        </div>
    </payment-history>
    <div class="flex flex-col items-center mb-12 leading-relaxed print:mt-0 print:mb-0">
        <span class="w-64 text-4xl text-center text-black border-b-2 border-black border-dotted opacity-75 sign print:text-lg">{{ $remittance->user->name }} {{ $remittance->user->lastname }}.</span>
        <span class="text-center">Comprador</span>
    </div>
    <footer class="flex flex-col items-center justify-center pb-8 leading-loose text-white bg-gray-700 print:bg-white print:pb-0">
        <span class="mt-4 text-xs print:mt-0">{{ $remittance->created_at }}</span>
        <span class="mt-4 text-base print:text-xs">© 2022 Zenith Luxury Cars.  Todos Los Derechos Reservados.</span>
        <span class="print:text-xs">COL - Medellín, ANT 05004.</span>
    </footer>
<div class="flex justify-items-center px-56 mb-4">
    <form action="{{ route('external-api.index') }}" method="GET">
        @csrf
        <button class="px-6 py-2 text-white bg-green-500 font-semibold rounded-3xl mt-4 mr-8">Vuelve a la Web</button>
    </form>
    <form action="{{ route('external-api.index') }}" method="GET">
        @csrf
        <button class="px-6 py-2 text-white bg-blue-500 font-semibold rounded-3xl mt-4">Imprimir Factura</button>
    </form>
</div>
</div>
<div class="lg:w-1/12 xl:w-1/4"></div>
</body>
</html>
