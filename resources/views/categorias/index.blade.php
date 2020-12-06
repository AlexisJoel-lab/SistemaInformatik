@extends('plantillas.systemPlantilla')
@section('content')

<main class="w-full flex-grow p-6">
    <h1 class="text-3xl text-black pb-6">{{ __('Categoría') }}</h1>
    
    <a href="{{ route('categorias.create') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        <i class="fas fa-plus mr-2"></i>{{ __('Nuevo')}}
    </a>

    <!--Table categorías-->
    <div class="w-full mt-12">
        <div class="relative flex">
            <p class="relative text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{ __('Listado de categorías') }}
            </p>

            <!--search form-->    
            <div class="relative flex w-6/12 md:w-5/12 lg:w-4/12 px-4 flex-wrap items-stretch ml-auto">                
                <form action="" class="flex">
                    <div>
                        <button type="submit" class="focus:outline-none">
                            <span class="font-normal leading-snug flex text-center white-space-no-wrap border border-solid border-gray-600 rounded-full text-sm bg-gray-100 items-center rounded-r-none pl-2 py-1 h-8 text-gray-800 border-r-0 placeholder-gray-300">
                                <i class="fas fa-search"></i>
                            </span>
                        </button>
                    </div>
                    <input type="text" class="px-2 py-1 h-8 border border-solid  border-gray-600 rounded-full text-sm leading-snug text-gray-700 bg-gray-100 shadow-none outline-none focus:outline-none w-full font-normal rounded-l-none flex-1 border-l-0 placeholder-gray-300" placeholder="Buscar" id="buscar" name="buscar" type="text" value="{{old('buscar')}}"/>
                </form>
            </div>
        </div>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-10 py-3 px-4 uppercase font-semibold text-sm text-center">{{__('ID')}}</th>
                        <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm text-center">{{__('Nombre de la Categoría')}}</th>
                        <th class="w-1/2 py-3 px-4 uppercase font-semibold text-sm text-center">{{__('Descripción')}}</th>
                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm text-center">{{__('Acciones')}}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($categorias as $item)            
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td class="text-center"><a href="#">{{ $item->nombre }}</a></td>
                            <td>{{ $item->descripcion }}</td>
                            <td class="flex justify-center content-center">
                                <a href="{{route('categorias.edit',['categoria' => $item])}}" class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                                    <i class="fas fa-pencil-alt xl:mr-2"></i><samp class="hidden xl:inline">{{__('Editar')}}</samp>
                                </a>
                                <form action="{{route('categorias.destroy',['categoria' => $item])}}" method="POST" class="form-eliminar inline px-1">
                                    @method('DELETE')
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded focus:outline-none" type="submit">
                                        <i class="fas fa-trash-alt xl:mr-2"></i><samp class="hidden xl:inline">{{__('Eliminar')}}</samp>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
            <br>
            @if($categorias->count())
                <div class="mt-3">
                    {{$categorias->links()}}
                </div>
            @endif 
        </div>        
    </div>
</main>

@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if (session('success') == 'ok')
        <script>    
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Categoria agregada'
            })
        </script>
    @endif

    @if (session('update') == 'ok')
        <script>    
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Categoria actualizada!!!'
            })
        </script>
    @endif

    <script>
        $('.form-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>

    @if (session('delete') == 'ok')
        <script>    
            Swal.fire(
                '¡Eliminado!',
                'Tu registro a sido eliminado exitosamente.',
                'success'
            )
        </script>
    @endif
@endsection