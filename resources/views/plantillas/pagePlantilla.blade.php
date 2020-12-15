<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{config('app.name', 'Informatik')}}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

	<!-- Font Awesome if you need it -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<!--Replace with your tailwind.css once created-->

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

	<!-- Define your gradient here - use online tools to find a gradient matching your branding-->
	<style>
		.gradient {
			/*background: linear-gradient(90deg, #d53369 0%, #daae51 100%);*/
			background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 20%, rgba(0,212,255,1) 100%);
		}
	</style>

</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">

<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 text-white">

	<div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
			
		<div class="pl-4 flex items-center">
			<a class="toggleColour text-white no-underline hover:no-underline font-bold text-3xl lg:text-3xl xl:text-4xl"  href="#"> 
				<img id="logo" class="h-10 w-10 inline" src="img/logoBlanco.png" alt="logo"> INFORMATIK CHICLAYO
			</a>
		</div>

		<div class="block lg:hidden pr-4">
			<button id="nav-toggle" class="flex items-center p-1 text-gray-300 hover:text-white">
				<svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					<a id="nav-link1" class="nav-link1 inline-block py-2 px-4 text-gray-300 hover:text-white no-underline {{request()->is('/') ? 'font-bold' : 'font-normal'}}" href="/">Inicio</a>
				</li>
				<!-- <li class="mr-3">
					<a id="nav-link2" class="nav-link1 inline-block text-gray-300 no-underline hover:text-white hover:text-underline py-2 px-4" href="#">Don Fisgón</a>
				</li>
				<li class="mr-3">
					<a id="nav-link3" class="nav-link1 inline-block text-gray-300 no-underline hover:text-white hover:text-underline py-2 px-4" href="#">Doña Cautelosa</a>
                </li>
                <li class="mr-3">
					<a id="nav-link4" class="nav-link1 inline-block text-gray-300 no-underline hover:text-white hover:text-underline py-2 px-4" href="#">Master Wifi</a>
				</li> -->
				<li class="mr-3">
					<a id="nav-link2" class="nav-link1 inline-block text-gray-300 no-underline hover:text-white hover:text-underline py-2 px-4 {{request()->is('proforma') ? 'font-bold' : 'font-normal'}}" href="{{route('proformas.index')}}">PROFORMA</a>
				</li>
            </ul>
            @if (Route::has('login'))
                <!--<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">-->
                    @auth
                        <a href="{{ route('index') }}" class="nav-link1 inline-block text-gray-300 no-underline hover:text-white hover:text-underline py-2 px-4">Sistema</a>
                    @else
                        <a href="{{ route('login') }}" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">Iniciar sesión</a>
                        <!--@if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif-->
                    @endif
                <!--</div>-->
            @endif            
			<!--<button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">Iniciar sesión</button>-->
		</div>
	</div>
	
	<hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>

@yield('content')


<!--Footer-->
@include('plantillas.plantillaPage.footer')

  <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
@yield('js')
<script>

	var scrollpos = window.scrollY;
	var header = document.getElementById("header");
	var navcontent = document.getElementById("nav-content");
	var navaction = document.getElementById("navAction");
	var brandname = document.getElementById("brandname");
	var toToggle = document.querySelectorAll(".toggleColour");
	var navtoggle = document.getElementById("nav-toggle");
    var navlink1 = document.getElementById("nav-link1");
    var navlink2 = document.getElementById("nav-link2");
    /* var navlink3 = document.getElementById("nav-link3");
    var navlink4 = document.getElementById("nav-link4"); */
    var logo = document.getElementById("logo");

	document.addEventListener('scroll', function() {

		/*Apply classes for slide in bar*/
		scrollpos = window.scrollY;

		if(scrollpos > 20){
		header.classList.add("bg-white");
		navaction.classList.remove("bg-white");
		navaction.classList.add("gradient");
		navaction.classList.remove("text-gray-800");
		navaction.classList.add("text-white");      
		//Use to switch toggleColour colours
		for (var i = 0; i < toToggle.length; i++) {
			toToggle[i].classList.add("text-gray-800");
			toToggle[i].classList.remove("text-white");
		}
		header.classList.add("shadow");
		navcontent.classList.remove("bg-gray-900");
		navcontent.classList.add("bg-white");
		
		navtoggle.classList.remove("text-gray-300");
		navtoggle.classList.add("text-gray-800");
		navtoggle.classList.remove("hover:text-white");
		navtoggle.classList.add("hover:text-black");

		navlink1.classList.remove("text-gray-300");
		navlink1.classList.add("text-black");
		navlink1.classList.remove("hover:text-white");
		navlink1.classList.add("hover:text-gray-300");
		
		navlink2.classList.remove("text-gray-300");
		navlink2.classList.add("text-black");
		navlink2.classList.remove("hover:text-white");
		navlink2.classList.add("hover:text-gray-300");

		/* navlink3.classList.remove("text-gray-300");
		navlink3.classList.add("text-black");
		navlink3.classList.remove("hover:text-white");
		navlink3.classList.add("hover:text-gray-300");

		navlink4.classList.remove("text-gray-300");
		navlink4.classList.add("text-black");
		navlink4.classList.remove("hover:text-white");
		navlink4.classList.add("hover:text-gray-300"); */

		logo.removeAttribute("src");
		logo.setAttribute("src","img/logoNegro.png");
		}
		else {
		header.classList.remove("bg-white");
		navaction.classList.remove("gradient");
		navaction.classList.add("bg-white");
		navaction.classList.remove("text-white");
		navaction.classList.add("text-gray-800");      
		//Use to switch toggleColour colours
		for (var i = 0; i < toToggle.length; i++) {
			toToggle[i].classList.add("text-white");
			toToggle[i].classList.remove("text-gray-800");
		}	  
		header.classList.remove("shadow");
		navcontent.classList.remove("bg-white");
		navcontent.classList.add("bg-gray-900");

		navtoggle.classList.remove("text-gray-800");
		navtoggle.classList.add("text-gray-300");
		navtoggle.classList.remove("hover:text-black");
		navtoggle.classList.add("hover:text-white");

		navlink1.classList.remove("text-black");
		navlink1.classList.add("text-gray-300");
		navlink1.classList.remove("hover:text-gray-300");
		navlink1.classList.add("hover:text-white");

		navlink2.classList.remove("text-black");
		navlink2.classList.add("text-gray-300");
		navlink2.classList.remove("hover:text-gray-300");
		navlink2.classList.add("hover:text-white");

		/* navlink3.classList.remove("text-black");
		navlink3.classList.add("text-gray-300");
		navlink3.classList.remove("hover:text-gray-300");
		navlink3.classList.add("hover:text-white");
		
		navlink4.classList.remove("text-black");
		navlink4.classList.add("text-gray-300");
		navlink4.classList.remove("hover:text-gray-300");
		navlink4.classList.add("hover:text-white"); */

		logo.removeAttribute("src");
		logo.setAttribute("src","img/logoBlanco.png");
		}
	});
	
</script>

<script>	
	
	/*Toggle dropdown list*/
	/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
	
	var navMenuDiv = document.getElementById("nav-content");
	var navMenu = document.getElementById("nav-toggle");
	
	document.onclick = check;
	function check(e){
	  var target = (e && e.target) || (event && event.srcElement);
	  
	  //Nav Menu
	  if (!checkParent(target, navMenuDiv)) {
		// click NOT on the menu
		if (checkParent(target, navMenu)) {
		  // click on the link
		  if (navMenuDiv.classList.contains("hidden")) {
			navMenuDiv.classList.remove("hidden");
		  } else {navMenuDiv.classList.add("hidden");}
		} else {
		  // click both outside link and outside menu, hide menu
		  navMenuDiv.classList.add("hidden");
		}
	  }	  
	}
	function checkParent(t, elm) {
	  while(t.parentNode) {
		if( t == elm ) {return true;}
		t = t.parentNode;
	  }
	  return false;
	}
</script>

</body>

</html>
