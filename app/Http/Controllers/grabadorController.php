<?php

namespace App\Http\Controllers;

use App;
use App\Models\grabador;
use Illuminate\Http\Request;

class grabadorController extends Controller
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

        $grabadors = grabador::orderBy('id','DESC')->nombre($nombre)->paginate(10);

        return view('grabadors.index',compact('grabadors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $grabador = new grabador;
        $title = __('Agregar producto');
        $textButton = __('Agregar');
        $route = route('grabadors.store');
        return view('grabadors.create',compact('title','textButton','route','grabador'));
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
            'nombre'=>'required|max:50|unique:grabadors',
            'descripcion'=>'required|string|min:10',
            'precio'=>'required',
        ]);
        grabador::create($request->only('nombre','descripcion','precio'));
        return redirect(route('grabadors.index'))->with('success','ok');
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
    public function edit(grabador $grabador)
    {
        $update = true;
        $title = __('Editar producto');
        $textButton = __('Actualizar');
        $route = route('grabadors.update', ['grabador' => $grabador]);
        return view('grabadors.edit',compact('update','title','textButton','route','grabador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, grabador $grabador)
    {
        $this->validate($request, [
            'nombre'=>'required|unique:productos,nombre,' . $grabador->id,
            'descripcion'=>'nullable|string|min:10',
            'precio'=>'required',
        ]);
        $grabador->fill($request->only('nombre','descripcion','precio'))->save();
        return redirect(route('grabadors.index'))->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(grabador $grabador)
    {
        $grabador->delete();
        return back()->with('delete','ok');
    }
}
