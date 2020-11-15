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

    <section class="bg-white border-b py-8 text-gray-800">
        <div class="w-5/6 mx-auto">
            <div class="flex mb-4">
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
            </div>
            <div class="flex mb-4">
                <table class="table-auto">
                    <thead>
                        <tr>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Producto</th>                    
                        <th class="px-4 py-2">Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Adam</td>
                            <td class="border px-4 py-2">Intro to CSS</td>                    
                            <td class="border px-4 py-2">858</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="border px-4 py-2">Adam</td>
                            <td class="border px-4 py-2">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>                    
                            <td class="border px-4 py-2">112</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Chris</td>
                            <td class="border px-4 py-2">Intro to JavaScript</td>                    
                            <td class="border px-4 py-2">1,280</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="border px-4 py-2">Chris</td>
                            <td class="border px-4 py-2">Intro to JavaScript</td>                    
                            <td class="border px-4 py-2">1,280</td>
                        </tr>
                    </tbody>
                </table>

                <!-- <form class="w-full max-w-lg">            
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                City
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                State
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                Zip
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid" type="text" placeholder="90210">
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </section>
@endsection