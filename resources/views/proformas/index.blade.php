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

    <form action="{{ route('proformas.store') }}" method="POST">
        @csrf 
        <section class="bg-white border-b py-8 text-gray-800" id="proforma">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">{{ __('Proforma') }}</h1>
            <div class="w-full mb-8">	
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="w-4/5 md:w-3/5 mx-auto">
                <div class="flex mb-8 relative">
                    <select name="kit" id="kit" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="ShowSelected();">
                        <option value="0">******** SELECCIONAR KIT ********</option>
                        <option value="KIT DE 4 CÁMARAS HD + INSTALACIÓN">KIT DE 4 CÁMARAS HD + INSTALACIÓN</option>
                        <option value="KIT DE 8 CÁMARAS HD + INSTALACIÓN">KIT DE 8 CÁMARAS HD + INSTALACIÓN</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

                <div class="overflow-auto mb-8">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="w-10 px-4 py-2">Cantidad</th>
                                <th class="px-4 py-2">Categoria</th>
                                <th class="px-4 py-2">Producto</th>                    
                                <th class="px-4 py-2">Precio</th>
                                <th class="px-4 py-2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>                            
                                <td class="px-4 py-2">
                                    <input class="appearance-none rounded w-full text-gray-700 leading-tight focus:outline-none" id="cantGrab" name="cantGrab" type="number" min="0" value="1" onchange="totalGrab(this.value);">
                                </td>
                                <td class="px-4 py-2">
                                    <label class="block text-gray-700 text-md" id="catGrab">{{ __('Grabador') }}</label>
                                </td>                    
                                <td class="px-4 py-2">                                
                                    <div class="relative">
                                        <select name="grabador_id" id="grabador_id" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="selectGrab();">                                        
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
                                    <span class="text-gray-700 text-md mb-2" id="precGrab" onchange="totalGrab(this.value);">160</span>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/.</span>
                                    <span class="text-gray-700 text-md mb-2" id="totalGrab" onchange="totalProforma(this.value);">160</span>
                                </td>                            
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2">
                                    <input class="appearance-none rounded w-full bg-gray-100 text-gray-700 leading-tight focus:outline-none" id="cantDisco" name="cantDisco" type="number" min="0" value="1" onchange="totalDisco(this.value);">
                                </td>
                                <td class="px-4 py-2">
                                    <label class="block text-gray-700 text-md" id="catDisco">{{ __('Disco Duro') }}</label>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="relative">
                                        <select name="disco_id" id="disco_id" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="selectDisco();">                                        
                                            @foreach ($discos as $disco)    
                                                <option value="{{$disco->id}}">{{ $disco->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/.</span>
                                    <span class="text-gray-700 text-md mb-2" id="precDisco" onchange="totalDisco(this.value);">190</span>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/. </span>
                                    <span class="text-gray-700 text-md mb-2" id="totalDisco" onchange="totalProforma(this.value);">190</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">
                                    <input class="appearance-none rounded w-full text-gray-700 leading-tight focus:outline-none" id="cantCamInt" name="cantCamInt" type="number" min="0" max="8" value="0" onchange="totalCamInt(this.value);">
                                </td>
                                <td class="px-4 py-2">
                                    <label class="block text-gray-700 text-md" id="catCamInt">{{ __('Cámara interior') }}</label>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="relative">
                                        <select name="camInt_id" id="camInt_id" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="selectCamInt(this.value);">                                        
                                            @foreach ($camInternas as $item)    
                                                <option value="{{$item->id}}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/.</span>
                                    <span class="text-gray-700 text-md mb-2" id="precCamInt" onchange="totalCamInt(this.value);">65</span>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/. </span>
                                    <span class="text-gray-700 text-md mb-2" id="totalCamInt" onchange="totalProforma(this.value);">65</span>
                                </td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2">
                                    <input class="appearance-none rounded w-full bg-gray-100 text-gray-700 leading-tight focus:outline-none" id="cantCamExt" name="cantCamExt" type="number"min="0" max="8" value="0" onchange="totalCamExt(this.value);">
                                </td>
                                <td class="px-4 py-2">
                                    <label class="block text-gray-700 text-md" id="catCamExt">{{ __('Cámara exterior') }}</label>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="relative">
                                        <select name="camExt_id" id="camExt_id" data-dependent="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="selectCamExt(this.value);">                                        
                                            @foreach ($camExternas as $item)    
                                                <option value="{{$item->id}}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/.</span>
                                    <span class="text-gray-700 text-md mb-2" id="precCamExt" onchange="totalCamExt(this.value);">65</span>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/.</span>
                                    <span class="text-gray-700 text-md mb-2" id="totalCamExt" onchange="totalProforma(this.value);">65</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">
                                    <span class="text-gray-700 text-md mb-2" id="cantOtros" name="cantOtros" onchange="totalOtros();">0</span>                                
                                </td>
                                <td class="px-4 py-2">
                                    <label class="block text-gray-700 text-md" id="catGrab">{{ __('Otros') }}</label>
                                </td>
                                <td class="px-4 py-2">ACCESORIOS, CABLEADO, INSTALACIÓN</td>
                                <td class="px-4 py-2">
                                    <span>S/.</span>
                                    <span class="text-gray-700 text-md mb-2" id="precOtros"></span>
                                </td>
                                <td class="px-4 py-2">
                                    <span>S/. </span>
                                    <span class="text-gray-700 text-md mb-2" id="totalOtros" onchange="totalProforma(this.value);">0</span>
                                </td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2">
                                    <input id="check" type="checkbox" class="form-checkbox" onclick="checkup();" value="1">
                                </td>
                                <td class="px-4 py-2">Audio</td>
                                <td class="px-4 py-2">MICROFONO, ACCESORIOS, INSTALACIÓN</td>
                                <td class="px-4 py-2">S/. 60</td>
                                <td class="px-4 py-2">
                                    <span>S/. </span>
                                    <span class="text-gray-700 text-md mb-2" id="aud" onchange="totalProforma(this.value);">0</span>
                                </td>
                            </tr>                        
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-end">
                    <span class="block text-gray-700 text-5xl mb-2 uppercase">S/. </span>
                    <input type="text" class="block text-gray-700 text-5xl mb-2 w-24 bg-white" id="precio" name="precio" disabled>
                    <!-- <span class="block text-gray-700 text-5xl mb-2 uppercase" id="precio" name="precio" >0</span> -->
                </div>
            </div>
        </section>

        <section class="bg-white border-b py-8 text-gray-800">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">Dejanos tus datos</h1>
            <div class="w-full mb-8">	
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="w-4/5 sm:w-3/5 mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Nombre y Apellidos')}}<samp class="text-red-500">*</samp></label>
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="correo" name="correo" type="email" value="{{old('correo')}}">
                    @error('correo')
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="celular" name="celular" type="text" value="{{old('celular')}}" maxlength="9" onkeypress='return validaNumericos(event)'>
                    @error('celular')
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
                    <button id="form" class="bg-red-500 hover:bg-red-400 text-white font-bold mx-1 py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded focus:outline-none" type="submit">
                        <i class="fas fa-envelope-square mr-2"></i>{{ __('Correo') }}
                    </button>
                    <!-- <a href="{{route('categorias.index')}}" class="bg-red-500 hover:bg-red-400 text-white font-bold mx-1 py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="reset">
                        <i class="fas fa-envelope-square xl:mr-2"></i>{{ __('Correo') }}
                    </a>  -->           
                </div>
                    <!-- <a href="https://api.whatsapp.com/send?phone=51954424137&text=hola,%20¿qué%20tal%20estás?" class="fas fa-envelope-square xl:mr-2"></a> -->
            </div>
        </section>
    </form>
@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">

        var audio = 60;
        var accesorios = 22;
        var cableado = 28;
        var otros = 45;
        var r = 0;

        document.getElementById("precOtros").innerText = (parseInt(accesorios) + parseInt(cableado) + parseInt(otros));
        totalProforma();
        
        function totalGrab(){
            m1 = document.getElementById("cantGrab").value;
            m2 = document.getElementById("precGrab").innerText;
            r = m1*m2;
            document.getElementById("totalGrab").innerHTML = r;

            totalProforma();
        }

        function totalDisco(){
            m1 = document.getElementById("cantDisco").value;
            m2 = document.getElementById("precDisco").innerText;
            r = m1*m2;
            document.getElementById("totalDisco").innerHTML = r;

            totalProforma();
        }

        function totalCamInt(){

            sumaOtros();

            m1 = document.getElementById("cantCamInt").value;
            m2 = document.getElementById("precCamInt").innerText;
            r = m1*m2;
            document.getElementById("totalCamInt").innerHTML = r;

            totalProforma();
        }

        function totalCamExt(){
            
            sumaOtros();

            m1 = document.getElementById("cantCamExt").value;
            m2 = document.getElementById("precCamExt").innerText;
            r = m1*m2;
            document.getElementById("totalCamExt").innerHTML = r;

            totalProforma();
        }

        function totalOtros(){
            var m1 = 0;
            var m2 = 0;

            m1 = document.getElementById("cantOtros").innerHTML;
            m2 = document.getElementById("precOtros").innerHTML;
            r = (parseInt(m1) * parseInt(m2));
            document.getElementById("totalOtros").innerHTML = r;

            totalProforma();
        }
        
        function ShowSelected(){
            /* Para obtener el valor */
            var val = document.getElementById("kit").value;
            var n1 = 0;
            var n2 = 0;

            if (val == "KIT DE 4 CÁMARAS HD + INSTALACIÓN") {
                document.getElementById("cantCamInt").value = 2;
                document.getElementById("cantCamExt").value = 2;

                n1 = document.getElementById("cantCamInt").value;
                n2 = document.getElementById("cantCamExt").value;
                r = (parseInt(n1) + parseInt(n2));
                document.getElementById("cantOtros").innerHTML = r;

                totalCamInt();
                totalCamExt();
                totalOtros();
                totalProforma();
            }else if (val == "KIT DE 8 CÁMARAS HD + INSTALACIÓN") {
                document.getElementById("cantCamInt").value = 4;
                document.getElementById("cantCamExt").value = 4;

                n1 = document.getElementById("cantCamInt").value;
                n2 = document.getElementById("cantCamExt").value;
                r = (parseInt(n1) + parseInt(n2));
                document.getElementById("cantOtros").innerHTML = r;

                totalCamInt();
                totalCamExt();
                totalOtros();
                totalProforma();
            }               
            /* Para obtener el texto */
            /* var combo = document.getElementById("valor");
            var selected = combo.options[combo.selectedIndex].text;
            alert(selected); */
        }

        function sumaOtros(){
            var n1 = 0;
            var n2 = 0;
            
            n1 = document.getElementById("cantCamInt").value;
            n2 = document.getElementById("cantCamExt").value;
            r = (parseInt(n1) + parseInt(n2));
            document.getElementById("cantOtros").innerHTML = r;
        }

        function selectGrab(){
            var precioGrab = document.getElementById("grabador_id").value;
            
            if (precioGrab == 1) {
                document.getElementById("precGrab").innerHTML = 160;
                totalGrab();
                totalProforma();
            }else if (precioGrab == 2) {
                document.getElementById("precGrab").innerHTML = 220;
                totalGrab();
                totalProforma();
            }
        }

        function selectDisco(){
            var precioDisco = document.getElementById("disco_id").value;
            
            if (precioDisco == 1) {
                document.getElementById("precDisco").innerHTML = 190;
                totalDisco();
                totalProforma();
            }else if (precioDisco == 2) {
                document.getElementById("precDisco").innerHTML = 280;
                totalDisco();
                totalProforma();
            }
        }

        function selectCamInt(){
            var precioCantInt = document.getElementById("camInt_id").value;
            
            if (precioCantInt == 1) {
                document.getElementById("precCamInt").innerHTML = 65;
                totalCamInt();
                totalProforma();
            }else if (precioCantInt == 2) {
                document.getElementById("precCamInt").innerHTML = 90;
                totalCamInt();
                totalProforma();
            }
        }

        function selectCamExt(){
            var precioCantExt = document.getElementById("camExt_id").value;
            
            if (precioCantExt == 1) {
                document.getElementById("precCamExt").innerHTML = 65;
                totalCamExt();
                totalProforma();
            }else if (precioCantExt == 2) {
                document.getElementById("precCamExt").innerHTML = 90;
                totalCamExt();
                totalProforma();
            }
        }
        
        function checkup(){
            var ck = document.getElementById("check");
            
            if (ck.checked == true) {
                document.getElementById("aud").innerHTML = audio;
                totalProforma();
            }else if (ck.checked == false){
                document.getElementById("aud").innerHTML = 0;
                totalProforma();
            }
        }

        function validaNumericos(event) {
            if(event.charCode >= 48 && event.charCode <= 57){
                return true;
            }
            return false;        
        }
        
        function totalProforma(){
            /* var totalSuma = 0;
            valor = parseInt(valor);

            totalSuma = document.getElementById("totalProforma").innerHTML;
            totalSuma = (totalSuma == null || totalSuma == undefined || totalSuma == "") ? 0 : totalSuma;
            totalSuma = (parseInt(totalSuma) + parseInt(valor));

            document.getElementById('totalProforma').innerHTML = totalSuma; */
            var n1 = 0;
            var n2 = 0;
            var n3 = 0;
            var n4 = 0;
            var n5 = 0;
            var n6 = 0;


            n1 = document.getElementById("totalGrab").innerText;
            n2 = document.getElementById("totalDisco").innerText;
            n3 = document.getElementById("totalCamInt").innerText;
            n4 = document.getElementById("totalCamExt").innerText;
            n5 = document.getElementById("totalOtros").innerText;
            n6 = document.getElementById("aud").innerText;
            r = (parseInt(n1) + parseInt(n2) + parseInt(n3) + parseInt(n4) + parseInt(n5) + parseInt(n6));
            document.getElementById("precio").value = r;

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

    @if (session('info') == 'ok')
        <script>    
            Swal.fire(
                '¡Proforma enviada!',
                'Tu proforma a sido enviada a tu correo exitosamente.',
                'success'
            )
        </script>
    @endif
@endsection