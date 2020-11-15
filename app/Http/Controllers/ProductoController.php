<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\producto;
use App\Models\categoria;

class ProductoController extends Controller
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

        $productos = producto::orderBy('id','DESC')->nombre($nombre)->paginate(10);

        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categorias = categoria::all();
        
        $producto = new producto;
        $title = __('Crear producto');
        $textButton = __('Crear');
        $route = route('productos.store');
        return view('productos.create',compact('title','textButton','route','producto','categorias'));
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
            'nombre'=>'required|max:50|unique:productos',
            'descripcion'=>'required|string|min:10',
            'precio'=>'required',
            'categoria_id'=>'required',
        ]);
        producto::create($request->only('nombre','descripcion','precio','categoria_id'));
        return redirect(route('productos.index'))->with('success','ok');
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
    public function edit(producto $producto)
    {
        $categorias = App\Models\categoria::all();

        $update = true;
        $title = __('Editar producto');
        $textButton = __('Actualizar');
        $route = route('productos.update', ['producto' => $producto]);
        return view('productos.edit',compact('update','title','textButton','route','producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        $this->validate($request, [
            'nombre'=>'required|unique:productos,nombre,' . $producto->id,
            'descripcion'=>'nullable|string|min:10',
            'precio'=>'required',
            'categoria_id'=>'required',
        ]);
        $producto->fill($request->only('nombre','descripcion','precio','categoria_id'))->save();
        return redirect(route('productos.index'))->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        $producto->delete();
        return back()->with('delete','ok');
    }
}
