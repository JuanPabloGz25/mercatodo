<nav x-data="{ open: false }" class="bg-gray-800 border-b-2 border-red-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('INICIO') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('catalogo')" :active="request()->routeIs('catalogo')">
                        <img src="https://cdn4.iconfinder.com/data/icons/LUMINA/transportation/png/256/muscle_car.png" alt="" class="w-12 h-12">
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('actualidad')" :active="request()->routeIs('actualidad')">
                        <img src="https://cdn3.iconfinder.com/data/icons/eziconic-v1-0/256/02.png" alt="" class="w-12 h-12">
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('cart.store')" :active="request()->routeIs('cart.store')">
                       <img src="https://cdn4.iconfinder.com/data/icons/e-commerce/empty-shopping-cart.png" alt="" class="w-10 h-10">
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('external-api.index')" :active="request()->routeIs('external-api.index')">
                        <img src="https://cdn0.iconfinder.com/data/icons/ie_Financial_set/256/08.png" alt="" class="w-10 h-10">
                    </x-nav-link>
                </div>
                @can('ver-historial')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('pagos')" :active="request()->routeIs('pagos')">
                        <img src="https://cdn4.iconfinder.com/data/icons/free-large-boss-icon-set/256/Admin.png" alt="" class="w-10 h-10">
                    </x-nav-link>
                </div>
                @endcan
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-yellow-400 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="uppercase font-bold text-yellow-400">{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        @can('ver-usuarios')
                        <form method="GET" action="{{ route('users.index') }}">
                            @csrf

                            <x-dropdown-link :href="route('roles.index')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Gestión de Usuarios') }}
                            </x-dropdown-link>
                        </form>
                        @endcan
                        @can('ver-productos')
                        <form method="GET" action="{{ route('products.index') }}">
                            @csrf

                            <x-dropdown-link :href="route('roles.index')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Gestión de Productos') }}
                            </x-dropdown-link>
                        </form>
                        @endcan
                        @can('ver-noticias')
                        <form method="GET" action="{{ route('news.index') }}">
                            @csrf

                            <x-dropdown-link :href="route('roles.index')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Gestión de Noticias') }}
                            </x-dropdown-link>
                        </form>
                        @endcan
                        @can('ver-roles')
                        <form method="GET" action="{{ route('roles.index') }}">
                            @csrf

                            <x-dropdown-link :href="route('roles.index')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Gestión de Roles') }}
                            </x-dropdown-link>
                        </form>
                        @endcan
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
