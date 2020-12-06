<?php

namespace App\Http\Controllers;

use App\Models\camInterna;
use Illuminate\Http\Request;

class CamInternaController extends Controller
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

        $camInternas = camInterna::orderBy('id','DESC')->nombre($nombre)->paginate(10);

        return view('camInternas.index',compact('camInternas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $camInterna = new camInterna;
        $title = __('Agregar producto');
        $textButton = __('Agregar');
        $route = route('camInternas.store');
        return view('camInternas.create',compact('title','textButton','route','camInterna'));
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
            'nombre'=>'required|max:50|unique:cam_internas',
            'descripcion'=>'required|string|min:10',
            'precio'=>'required',
        ]);
        camInterna::create($request->only('nombre','descripcion','precio'));
        return redirect(route('camInternas.index'))->with('success','ok');
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
    public function edit(camInterna $camInterna)
    {
        $update = true;
        $title = __('Editar producto');
        $textButton = __('Actualizar');
        $route = route('camInternas.update', ['camInterna' => $camInterna]);
        return view('camInternas.edit',compact('update','title','textButton','route','camInterna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, camInterna $camInterna)
    {
        $this->validate($request, [
            'nombre'=>'required|unique:cam_internas,nombre,' . $camInterna->id,
            'descripcion'=>'nullable|string|min:10',
            'precio'=>'required',
        ]);
        $camInterna->fill($request->only('nombre','descripcion','precio'))->save();
        return redirect(route('camInternas.index'))->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(camInterna $camInterna)
    {
        $camInterna->delete();
        return back()->with('delete','ok');
    }
}
