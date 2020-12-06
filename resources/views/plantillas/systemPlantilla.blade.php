<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'SistemaInformattik')}}</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #090979; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="{{route('index')}}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
            {{ __('Sistema') }}
            </a>            
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('index')}}" class="flex items-center text-white py-4 pl-6 nav-item {{ request()->is('sistemaInformatik') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                <i class="fas fa-tachometer-alt mr-3"></i>
                {{ __('Inicio') }}
            </a>
            <a href="{{route('users.index')}}" class="flex items-center text-white py-4 pl-6 nav-item {{request()->is('usuarios') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                <i class="fas fa-user mr-3"></i>
                {{ __('Usuarios') }}
            </a>
            <a href="{{route('categorias.index')}}" class="flex items-center text-white py-4 pl-6 nav-item {{request()->is('categorias') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                <i class="fas fa-tag mr-3"></i>
                {{ __('Categorías') }}
            </a>
            <div>
                <button type="button" class="w-full flex items-center text-white py-4 pl-6 nav-item {{request()->is('productos') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true" onclick="showMenu();">
                    <i class="fas fa-dolly-flatbed mr-3"></i>    
                        {{ __('Productos') }}
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-sidebar ring-1 ring-black ring-opacity-5">
                <div class="py-1 dropdownContent" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="{{route('grabadors.index')}}" class="submenu block pl-15 py-2 text-sm items-center text-white nav-item {{request()->is('grabadors') ? 'active-nav-link' : 'opacity-75 hover:opacity-100'}}" role="menuitem">{{ __('Grabadores') }}</a>
                    <a href="{{route('hdds.index')}}" class="submenu block pl-15 py-2 text-sm items-center text-white nav-item {{request()->is('hdds') ? 'active-nav-link' : 'opacity-75 hover:opacity-100'}}" role="menuitem">{{ __('Disco Duro') }}</a>
                    <a href="{{route('camExternas.index')}}" class="submenu block pl-15 py-2 text-sm items-center text-white nav-item {{request()->is('camExternas') ? 'active-nav-link' : 'opacity-75 hover:opacity-100'}}" role="menuitem">{{ __('Cámaras Externas') }}</a>
                    <a href="{{route('camInternas.index')}}" class="submenu block pl-15 py-2 text-sm items-center text-white nav-item {{request()->is('camInternas') ? 'active-nav-link' : 'opacity-75 hover:opacity-100'}}" role="menuitem">{{ __('Cámaras Internas') }}</a>
                </div>
            </div>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full flex items-center bg-white py-2 px-6 sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class   ="relative w-1/2 flex justify-end">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                            </button>
                        @else
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Administrar cuenta') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            <i class="fas fa-user-alt mr-3"></i>
                            {{ __('Perfil') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>                        

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                {{ __('Cerrar sesión') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Sistema</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="{{route('index')}}" class="flex items-center text-white py-2 pl-4 nav-item {{ request()->is('sistemaInformatik') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    {{ __('Inicio') }}
                </a>
                <a href="{{route('users.index')}}" class="flex items-center text-white py-2 pl-4 nav-item {{request()->is('users') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                    <i class="fas fa-table mr-3"></i>
                    {{ __('Usuarios') }}
                </a>
                <a href="{{route('categorias.index')}}" class="flex items-center text-white py-2 pl-4 nav-item {{request()->is('categorias') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                    <i class="fas fa-sticky-note mr-3"></i>
                    {{ __('Categorías') }}
                </a>
                <a href="{{route('productos.index')}}" class="flex items-center text-white py-2 pl-4 nav-item {{request()->is('productos') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }}">
                    <i class="fas fa-table mr-3"></i>
                    {{ __('Productos') }}
                </a>
                
            </nav>
        </header>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            @yield('content')

            <!--Footer-->
            @include('plantillas.plantillaSistema.footer')
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- SweetAlertJS 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>-->

    @yield('js')
    <script>
         $('nav a').on('click', function(){
            $('a.active-nav-link').removeClass('active-nav-link');
            $(this).addClass('active-nav-link');
        });

        $('.dropdownContent').hide();

        function showMenu(){
            $('#options-menu').on('click', function(){           
                if($('.dropdownContent').is(':hidden') == true) {
                    $('.dropdownContent').show();
                }else{
                    $('.dropdownContent').hide();
                }
            });
        }
    </script>
    <script>       
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });        
    </script>
</body>
</html>