<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <x-slot name="header">
        <h1 class="uppercase text-center text-5xl text-black font-bold" style="font-family: 'Merriweather', cursive;"> Conoce Más Sobre Nosotros</h1>
    </x-slot>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6">
        <h1 class="uppercase text-center text-4xl text-white font-bold" style="font-family: 'Merriweather', cursive;">Nuestras Líneas de Negocio</h1>
    </section>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6 border-b-2 border-red-700">
        <div class="flex justify-between">
            <div class="mr-2">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Venta de Vehículos</h1>
                <img src="https://images.unsplash.com/photo-1574067081958-78008c91de31?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="border-2 border-white rounded-3xl text-center text-lg text-black mt-4">Comercializamos vehículos nuevos y usados para todos los gustos, clases y presupuestos.</p>
            </div>
            <div class="mr-2">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Importación de Vehículos</h1>
                <img src="https://images.unsplash.com/photo-1605705658744-45f0fe8f9663?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="border-2 border-white rounded-3xl text-center text-lg text-black mt-4">Importamos el vehículo que desees a corto tiempo, tenemos diversas alianzas con concesionarios de todo el mundo.</p>
            </div>
            <div class="mr-2">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Servicio Técnico</h1>
                <img src="https://images.unsplash.com/photo-1581092163144-b7ae3c00adbc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="border-2 border-white rounded-3xl text-center text-lg text-black mt-4">Ofrecemos servicio técnico para cualquier vehículo, tenemos especialistas en mecánica automotriz.</p>
            </div>
            <div class="mr-2">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Renta de Vehículos</h1>
                <img src="https://images.unsplash.com/photo-1611448746128-7c39e03b71e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=449&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="border-2 border-white rounded-3xl text-center text-lg text-black mt-4">Contamos con una gama de 10 vehículos para la renta, si requieres uno, vísitanos y elige el que más te guste.</p>
            </div>
            <div class="mr-2">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Trámites</h1>
                <img src="https://images.unsplash.com/photo-1534706438758-534c634c4591?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=382&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="border-2 border-white rounded-3xl text-center text-lg text-black mt-4">Brindamos asesoria en los diferentes trámites que tiene el sector automotor colombiano.</p>
            </div>
            <div class="mr-2">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Accesorios</h1>
                <img src="https://images.unsplash.com/photo-1609950692056-bd02e61b5227?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="border-2 border-white rounded-3xl text-center text-lg text-black mt-4">Tenemos gran variedad de accesorios para que consientas tu vehículo y le des ese toque especial.</p>
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6">
        <h1 class="uppercase text-center text-4xl text-white font-bold" style="font-family: 'Merriweather', cursive;">Nuestros Medios de Pago y Métodos de Financiación</h1>
    </section>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6 px-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Entidades Bancarias.</h1>
                <img src="https://images.unsplash.com/photo-1592210635198-2f12ff425df7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="text-center text-lg text-black mt-4">Contamos con una gran cantidad de bancos aliados para que adquieras nuestros productos. Las mejores tasas del mercado y poca cuota inicial.</p>
            </div>
            <div>
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Financiación Directa.</h1>
                <img src="https://images.unsplash.com/photo-1577415124269-fc1140a69e91?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="text-center text-lg text-black mt-4">También puedes obtener una financiación directamente con nosotros. Acercate a nuestras oficinas para conocer más sobre este proceso.</p>
            </div>
            <div class="ml-8">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Plataformas de Pagos Electrónicos.</h1>
                <img src="https://images.unsplash.com/photo-1578670812003-60745e2c2ea9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="text-center text-lg text-black mt-4">Hemos realizado alianzas con PlaceToPay y PSE para que puedas realizar tus transacciones de forma segura, desde cualquier tipo de tarjeta.</p>
            </div>
        </div>
    </section>
    <section class="border-b-2 border-red-700 bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700">
        <div class="flex justify-center bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 mb-4">
            <div>
                <img src="https://cdn4.iconfinder.com/data/icons/payment-method/160/payment_method_card_visa-256.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
            <div>
                <img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/206_Mastercard_Credit_Card_logo_logos-256.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
            <div>
                <img src="https://cdn4.iconfinder.com/data/icons/simple-peyment-methods/512/amex_american_express-256.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
            <div>
                <img src="https://marcas-logos.net/wp-content/uploads/2021/06/Bancolombia-Logo-2006.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
            <div>
                <img src="https://www.nautilostravel.com/wp-content/uploads/2020/01/placetopay-logo-square-e1579017395818.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
            <div>
                <img src="https://eca.edu.co/wp-content/uploads/2020/04/logo-pse-300x300.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
            <div>
                <img src="https://corporacionmatamoros.org/wp-content/uploads/bfi_thumb/corporacion-matamoros-aliados-davivienda-2zo1bk4yj5xvvzcixpyv1mjziw4msnkn9gyl81qdzpb67eif6.png" alt="" class="w-16 h-16 mr-4 rounded-full">
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6">
        <h1 class="uppercase text-center text-4xl text-white font-bold" style="font-family: 'Merriweather', cursive;">Conoce Nuestras Sedes</h1>
    </section>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 p-6 px-6 border-b-2 border-red-700">
        <div class="flex justify-between">
            <div class="mr-4">
                <h1 class="text-xl text-center text-black font-semibold mb-4"style="font-family: 'Merriweather', cursive;">Nuestra Sede en Rionegro.</h1>
                <img src="https://images.unsplash.com/photo-1563161084-b4c9f34d60ae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="text-center text-lg text-black mt-4">Esta es nuestra sede enfocada en vehículos deportivos, alejada de la ciudad para que puedas hacer tu prueba de ruta sin problemas.</p>
            </div>
            <div class="mr-4">
                <h1 class="text-xl text-center text-black font-semibold mb-4" style="font-family: 'Merriweather', cursive;">Nuestra Sede en Medellín.</h1>
                <img src="https://images.unsplash.com/photo-1633627372073-71d53698cdd9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="text-center text-lg text-black mt-4">Nuestra sede principal, acá encontrarás nuestras oficinas principales y el showroom de autos más hermoso del país.</p>
            </div>
            <div class="ml-8">
                <h1 class="text-xl text-center text-black font-semibold mb-4 mr-4" style="font-family: 'Merriweather', cursive;">Proximamente en Bogotá.</h1>
                <img src="https://images.unsplash.com/photo-1593313637552-29c2c0dacd35?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="rounded-3xl border-2 border-white">
                <p class="text-center text-lg text-black mt-4 mr-2">Nos expandiremos proximamente a Bogotá, donde podrás encontrar una gran variedad de autos deportivos, de offroad y de uso diario.</p>
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700">
        <div class="flex justify-center bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700">
            <div>
                <img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Whatsapp2_colored_svg-256.png" alt="" class="w-12 h-12 mr-4 rounded-full mt-6">
            </div>
            <div>
                <img src="https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/facebook-256.png" alt="" class="w-12 h-12 mr-4 rounded-full mt-6">
            </div>
            <div>
                <img src="https://cdn0.iconfinder.com/data/icons/social-media-circle-6/1024/instagram-256.png" alt="" class="w-12 h-12 rounded-full mt-6">
            </div>
        </div>
        <div class="bg-gradient-to-r from-blue-700 via-blue-300 to-blue-700 text-center p-4">
            <h3 class="text-sm">Copyright &copy; Juan Pablo Gómez Zapata 2022</h3>
        </div>
    </section>
</x-app-layout>
