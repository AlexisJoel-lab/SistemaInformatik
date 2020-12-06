@extends('plantillas.pagePlantilla')
@section('content')
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">                
                <h1 class="my-4 text-5xl font-bold leading-tight mx-auto">{{__('¡Don Fisgón!')}}</h1>
                <p class="leading-normal text-2xl mb-8 mx-auto text-center">Un especialista en cámaras de seguridad y vigilancia que lo apoya en el monitoreo a distancia de su hogar o empresa...</p>
                <button class="mx-auto hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg">Seguir Leyendo... </button>                
            </div>
            
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center">
                <img class="m-auto w-3/4 sm:w-auto md:w-full lg:w-5/6 xl:w-3/4 z-50" src="img/supervise.jpg">
            </div>
        </div>
    </div>

    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
            </g>
            </g>
        </svg>
    </div>

    <section class="bg-white border-b py-8 text-gray-800" onchange="ShowSelected();">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">Proforma</h1>
        <div class="w-full mb-8">	
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="w-4/5 md:w-3/5 mx-auto">
            <!-- <div class="flex mb-4">
                <div class="w-1/2 p-2 bg-gray-400 text-center">
                    <input type="radio" name="kit" value="4" checked>
                    <label class="inline text-gray-700 text-sm font-bold mb-2 uppercase">{{__('4')}}</label>
                    
                    <input type="radio" name="kit" value="8">
                    <label class="inline text-gray-700 text-sm font-bold mb-2 uppercase">{{__('8')}}</label>

                    <input type="radio" name="kit" value="16">
                    <label class="inline text-gray-700 text-sm font-bold mb-2 uppercase">{{__('16')}}</label>
                </div>
                <div class="w-1/2 p-2 bg-gray-500 text-center">
                    <input type="radio" name="resolucion" value="hd" checked>
                    <label class="inline text-gray-700 text-sm font-bold mb-2 uppercase">{{__('HD')}}</label>
                    
                    <input type="radio" name="resolucion" value="fullHd">
                    <label class="inline text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Full HD')}}</label>
                </div>
            </div> -->

            <div class="flex mb-8 relative">
                <select name="valor" id="valor" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="0">******** SELECCIONAR KIT ********</option>
                    <option value="1">KIT DE 4 CÁMARAS HD + INSTALACIÓN</option>
                    <option value="2">KIT DE 8 CÁMARAS HD + INSTALACIÓN</option>                    
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div class="overflow-auto mb-8">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Cantidad</th>
                            <th class="px-4 py-2">Categoria</th>
                            <th class="px-4 py-2">Producto</th>                    
                            <th class="px-4 py-2">Precio</th>
                            <th class="px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                            
                            <td class="px-4 py-2">
                                <input class="appearance-none rounded w-full text-gray-700 leading-tight focus:outline-none" id="cantGrab" name="cantGrab" type="number" min="0" value="1">
                            </td>
                            <td class="px-4 py-2">
                                <label class="block text-gray-700 text-md mb-2" id="catGrab">Grabador</label>
                            </td>                    
                            <td class="px-4 py-2">                                
                                <div class="relative">
                                    <select name="grabador_id" id="grabador_id" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">                                        
                                        @foreach ($grabadors as $grabador)    
                                            <option value="{{$grabador->id}}">{{ $grabador->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <span>S/.</span>
                                <label class="block text-gray-700 text-md mb-2" id="precGrab">{{ $grabador->precio }}</label>
                            </td>
                            <td class="px-4 py-2 flex">
                                <span>S/.</span>
                                <label class="block text-gray-700 text-md mb-2" id="totalGrab"> </label>
                            </td>
                            
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="px-4 py-2">
                                <input class="appearance-none rounded w-full bg-gray-100 text-gray-700 leading-tight focus:outline-none" id="cantHdd" name="cantHdd" type="number" min="0" value="1">
                            </td>
                            <td class="px-4 py-2">Disco Duro</td>
                            <td class="px-4 py-2">HDD 1TB WESTERN DIGITAL</td>
                            <td class="px-4 py-2">S/. 190</td>
                            <td class="px-4 py-2">
                                <span>S/. </span>
                                <label class="block text-gray-700 text-md mb-2" id="total2"></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">
                                <input class="appearance-none rounded w-full text-gray-700 leading-tight focus:outline-none" id="num1" name="num1" type="number" min="0" max="8" value="0">
                            </td>
                            <td class="px-4 py-2">Cámara interior</td>
                            <td class="px-4 py-2">DOMO PLASTICO 720P</td>
                            <td class="px-4 py-2">S/. 65</td>
                            <td class="px-4 py-2">
                                <span>S/. </span>
                                <label class="block text-gray-700 text-md mb-2" id="total3"></label>
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="px-4 py-2">
                                <input class="appearance-none rounded w-full bg-gray-100 text-gray-700 leading-tight focus:outline-none" id="num2" name="num2" type="number"min="0" max="8" value="0">
                            </td>
                            <td class="px-4 py-2">Cámara exterior</td>
                            <td class="px-4 py-2">TUBO PLASTICO 720P</td>
                            <td class="px-4 py-2">S/. 65</td>
                            <td class="px-4 py-2">
                                <span>S/. </span>
                                <label class="block text-gray-700 text-md mb-2" id="total4"></label>
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="px-4 py-2">
                                <input class="appearance-none rounded w-full bg-gray-100 text-gray-700 leading-tight focus:outline-none" id="num2" name="num2" type="number"min="0" max="8" value="0">
                            </td>
                            <td class="px-4 py-2">Otros</td>
                            <td class="px-4 py-2">TUBO PLASTICO 720P</td>
                            <td class="px-4 py-2">S/. 65</td>
                            <td class="px-4 py-2">
                                <span>S/. </span>
                                <label class="block text-gray-700 text-md mb-2" id="total4"></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">
                                <input id="check" type="checkbox" class="form-checkbox" onclick="checkup();" value="1">
                            </td>
                            <td class="px-4 py-2">Audio</td>
                            <td class="px-4 py-2">MICROFONO, ACCESORIOS, INSTALACION</td>
                            <td class="px-4 py-2">S/. 60</td>
                            <td class="px-4 py-2 flex">
                                <span>S/. </span>
                                <label class="block text-gray-700 text-md mb-2" id="aud">0</label>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <label class="block text-gray-700 text-3xl mb-2 uppercase" id="totalF"><span>S/. </span></label>
            </div>
            <!-- <label class="block text-gray-700 text-sm font-bold mb-2 uppercase" id="texto"></label> -->
        </div>
    </section>
    <section class="bg-white border-b py-8 text-gray-800">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">Dejanos tus datos</h1>
        <div class="w-full mb-8">	
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="w-4/5 sm:w-3/5 mx-auto">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('proforma.store') }}" method="POST">
                @csrf      

                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Nombre')}}<samp class="text-red-500">*</samp></label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" name="nombre" type="text" value="{{old('nombre')}}">            
                    @error('nombre')
                        <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">                        
                            <span class="block sm:inline">{{ $message }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500 close" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" data-dismiss="alert" aria-label="Close">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Correo electrónico')}}<samp class="text-red-500">*</samp></label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" value="{{old('email')}}">
                    @error('email')
                        <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">                        
                            <span class="block sm:inline">{{ $message }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500 close" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" data-dismiss="alert" aria-label="Close">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Celular')}}<samp class="text-red-500">*</samp></label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" type="text" value="{{old('phone')}}" maxlength="9" onkeypress='return validaNumericos(event)'>
                    @error('phone')
                        <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">                        
                            <span class="block sm:inline">{{ $message }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500 close" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" data-dismiss="alert" aria-label="Close">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button id="form" class="bg-green-500 hover:bg-green-400 text-white font-bold mx-1 py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded focus:outline-none" type="submit">
                        <i class="fas fa-whatsapp-square xl:mr-2"></i>{{ __('WhatsApp') }}
                    </button>
                    <a href="{{route('categorias.index')}}" class="bg-red-500 hover:bg-red-400 text-white font-bold mx-1 py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="reset">
                        <i class="fas fa-envelope-square xl:mr-2"></i>{{ __('Correo') }}
                    </a>            
                </div>
            </form>
            @if ($errors)
                <script>
                    var scrollpos = window.scrollY;
                    document.addEventListener('wheel', function() {
                        scrollpos = 400;
                    });
                </script>
            @endif
            @if (session('info'))
                <script>
                    Swal.fire(
                        '¡Enviado!',
                        'Tu registro a sido eliminado exitosamente.',
                        'success'
                    )
                </script>
            @endif

        </div>
    </section>
@endsection
@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
    
    var audio = 60;
    var accesorios = 22;
    var cableado = 28;
    var otros = 45;

    function ShowSelected(){
        /* Para obtener el valor */
        var val = document.getElementById("valor").value;
        
        if (val == 1) {
            document.getElementById("num1").value = 2;
            document.getElementById("num2").value = 2;
        }else if (val == 2) {
            document.getElementById("num1").value = 4;
            document.getElementById("num2").value = 4;
        }
               
        /* Para obtener el texto */
        /* var combo = document.getElementById("valor");
        var selected = combo.options[combo.selectedIndex].text;
        alert(selected); */
    }

    function checkup(){
        var ck = document.getElementById("check");
        
        if (ck.checked == true) {
            document.getElementById("aud").innerHTML = audio;
        }else if (ck.checked == false){
            document.getElementById("aud").innerHTML = 0;
        }
    }

    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
            return true;
        }
        return false;        
    }
    
    /* function validaNumericos(){
        var inputtxt = document.getElementById('phone'); 
        var valor = inputtxt.value;
        for(i=0;i<valor.length;i++){
            var code=valor.charCodeAt(i);
            if(code<=48 || code>=57){          
                inputtxt.value=""; 
                return;
            }    
        }        
    } */
    
</script>
@endsection