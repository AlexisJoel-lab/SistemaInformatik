<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscar');

        $categorias = App\Models\Categoria::orderBy('id','DESC')
            ->nombre($nombre)
            ->paginate(10);

        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categoria = new categoria;
        $title = __('Crear categoría');
        $textButton = __('Crear');
        $route = route('categorias.store');
        return view('categorias.create',compact('title','textButton','route','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'=>'required|max:50|unique:categorias',
            'descripcion'=>'required|string|min:10',
        ]);
        categoria::create($request->only('nombre','descripcion'));
        return redirect(route('categorias.index'))->with('success','ok');     
        
        /* $catNueva = new App\Models\Categoria();
        $catNueva->nombre = $request->nombre;
        $catNueva->descripcion = $request->descripcion;
        $catNueva->save();

        //return back()->with('mensaje','Categoria agregada!');
        return back()->with('enviar','ok'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $update = true;
        $title = __('Editar categoría');
        $textButton = __('Actualizar');
        $route = route('categorias.update', ['categoria' => $categoria]);
        return view('categorias.edit',compact('update','title','textButton','route','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $this->validate($request, [
            'nombre'=>'required|unique:categorias,nombre,' . $categoria->id,
            'descripcion'=>'nullable|string|min:10'
        ]);
        $categoria->fill($request->only('nombre','descripcion'))->save();
        return redirect(route('categorias.index'))->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with('delete','ok');
    }
}
