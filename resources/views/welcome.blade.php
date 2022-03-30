<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Zenith Luxury Cars</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <!-- Header -->
    <div class="bg-blue-900 p-2 flex justify-between items-center border-b-4 border-white">
        <div class="flex items-center">
            <h2 class="inline-block p-6 ml-36 text-white font-bold text-5xl uppercase" style="font-family: 'Merriweather', cursive;">Zenith Luxury Cars</h2>
        </div>
        <div>
            <a href="{{ route('login') }}" class="inline-block py-2 px-4 text-white bg-blue-800 hover:bg-blue-200
        hover:text-blue-700 rounded-full transition ease-in duration-150 uppercase font-bold border-4 border-black" style="font-family: 'Merriweather', cursive;">Inicia Sesión</a>
            <a href="{{ route('register') }}" class="inline-block py-2 px-6 text-white bg-blue-800 hover:bg-blue-200
        hover:text-blue-700 rounded-full transition ease-in duration-150 uppercase font-bold border-4 border-black" style="font-family: 'Merriweather', cursive;">Regístrate</a>
        </div>
    </div>
    <!-- First Section -->
    <div class="flex justify-between py-10 px-10 bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900">
        <div class="mb-20 text-block">
            <h2 class="text-6xl text-center text-black mb-6 font-bold uppercase mt-48" style="font-family: 'Merriweather', cursive;">Bienvenid@ a Zenith.</h2>
        </div>
        <div>
            <img class="rounded-3xl"
                src="https://images.unsplash.com/photo-1544468607-e7b3e848ff87?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=650&q=80" alt="" class="shadow-2xl">
        </div>
    </div>
    <!-- First Section -->
    <div class="py-2 px-10 bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900">
        <div class="text-block mb-2">
            <h2 class="text-4xl text-center text-white mb-6 font-bold uppercase mt-2 mb-2" style="font-family: 'Merriweather', cursive;">QUIÉNES SOMOS.</h2>
        </div>
    </div>
    <div class="py-2 px-10 bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900">
        <div class="text-block mb-14">
            <h2 class="text-lg text-center text-black mb-6 font-bold uppercase mb-4" style="font-family: 'Merriweather', cursive;">Una vitrina especializada en autos de gama alta en Medellín y Rionegro. En Zenith amamos los carros de lujo y disfrutamos compartiendo esta pasión, por esto buscamos unir el carro ideal con la persona ideal basándonos en las expectativas y necesidades de nuestros clientes y amigos, acercándolos también a nuestro catálogo de servicios.</h2>
        </div>
    </div>
    <!-- Second Section -->
    <div class="flex bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900">
        <div class="mr-1">
            <img class="rounded-2xl mb-4"
                src="https://images.unsplash.com/photo-1561299593-7633f311838a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <p class="uppercase text-center text-white font-bold" style="font-family: 'Merriweather', cursive;">Venta de Vehículos</p>
        </div>
        <div class="mr-1 mt-8">
            <img class="rounded-2xl mb-4"
                src="https://images.unsplash.com/photo-1613859492095-85d9944f09f6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <p class="uppercase text-center text-white font-bold" style="font-family: 'Merriweather', cursive;">Importación de Vehículos</p>
        </div>
        <div class="mr-1">
            <img class="rounded-2xl mb-4"
                src="https://images.unsplash.com/photo-1615906655593-ad0386982a0f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <p class="uppercase text-center text-white font-bold" style="font-family: 'Merriweather', cursive;">Servicio Técnico</p>
        </div>
        <div class="mr-1 mt-8">
            <img class="rounded-2xl mb-4"
                src="https://images.unsplash.com/photo-1611633235555-45e252fe48c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <p class="uppercase text-center text-white font-bold" style="font-family: 'Merriweather', cursive;">Accesorios</p>
        </div>
        <div class="mr-1">
            <img class="rounded-2xl mb-4"
                src="https://images.unsplash.com/photo-1564846824194-346b7871b855?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <p class="uppercase text-center text-white font-bold" style="font-family: 'Merriweather', cursive;">Trámites</p>
        </div>
        <div class="mt-8">
            <img class="rounded-2xl mb-4"
                src="https://images.unsplash.com/photo-1533558701576-23c65e0272fb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
            <p class="uppercase text-center text-white font-bold" style="font-family: 'Merriweather', cursive;">Renta de Vehículos</p>
        </div>
    </div>
    <!-- Third Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900 p-10 text-center">
        <h3 class="text-black font-bold text-3xl uppercase mb-4">Información de Contacto</h3>
        <h3 class="text-lg">Dirección Sede Medellín:  Cra. 43A #11b-115</h3>
        <h3 class="text-lg">Dirección Sede Rionegro:  Km 1 vía Llanogrande-Rionegro, Ant.</h3>
        <h3 class="text-lg">Teléfono Medellín: 3222121 ó 3007224250</h3>
        <h3 class="text-lg">Teléfono Rionegro: 3245151 ó 3005925211</h3>
        <h3 class="text-lg">Línea Única Nacional: 018000754120</h3>
        <h3 class="text-lg">Correo Electrónico: relacioneshumanas@zenith.com </h3>
    </div>
    <!-- Fourth Section -->
    <div class="flex justify-center bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900">
        <div>
            <img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Whatsapp2_colored_svg-256.png" alt="" class="w-12 h-12 mr-4 rounded-full">
        </div>
        <div>
            <img src="https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/facebook-256.png" alt="" class="w-12 h-12 mr-4 rounded-full">
        </div>
        <div>
            <img src="https://cdn0.iconfinder.com/data/icons/social-media-circle-6/1024/instagram-256.png" alt="" class="w-12 h-12 rounded-full">
        </div>
    </div>
    <div class="bg-gradient-to-r from-blue-900 via-blue-400 to-blue-900 text-center p-4">
        <h3 class="text-sm">Copyright &copy; Juan Pablo Gómez Zapata 2022</h3>
    </div>
</head>
