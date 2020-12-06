
<h1 class="text-3xl text-black pb-6">{{ $title }}</h1>

<div class="w-5/6 mx-auto">
    
    <!--form dvr-->
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ $route }}" method="POST">
        @csrf

        @isset($update)
            @method('PUT')
        @endisset        

        <div class="mb-3">
            <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Nombre del producto')}}<samp class="text-red-500">*</samp></label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" name="nombre" type="text" value="{{old('nombre') ?? $camInterna->nombre}}">            
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
            <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Descripción')}}</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" name="descripcion" type="text">{{old('descripcion') ?? $camInterna->descripcion}}</textarea>             
            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">                        
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
            <label class="block text-gray-700 text-sm font-bold mb-2 uppercase">{{__('Precio Unitario')}}<samp class="text-red-500">*</samp></label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="precio" name="precio" type="number" value="{{old('precio') ?? $camInterna->precio}}">                      
            @error('precio')
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
                <i class="fas fa-check xl:mr-2"></i>{{ $textButton }}
            </button>
            <a href="{{route('camInternas.index')}}" class="bg-red-500 hover:bg-red-400 text-white font-bold mx-1 py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="reset">
                <i class="fas fa-times xl:mr-2"></i>{{ __('Cancelar') }}
            </a>            
        </div>
    </form>
</div>