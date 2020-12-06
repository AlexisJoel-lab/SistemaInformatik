<?php

namespace App\Http\Controllers;

use App\Models\camExterna;
use Illuminate\Http\Request;

class CamExternaController extends Controller
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

        $camExternas = camExterna::orderBy('id','DESC')->nombre($nombre)->paginate(10);

        return view('camExternas.index',compact('camExternas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $camExterna = new camExterna;
        $title = __('Agregar producto');
        $textButton = __('Agregar');
        $route = route('camExternas.store');
        return view('camExternas.create',compact('title','textButton','route','camExterna'));
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
            'nombre'=>'required|max:50|unique:cam_externas',
            'descripcion'=>'required|string|min:10',
            'precio'=>'required',
        ]);
        camExterna::create($request->only('nombre','descripcion','precio'));
        return redirect(route('camExternas.index'))->with('success','ok');
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
    public function edit(camExterna $camExterna)
    {
        $update = true;
        $title = __('Editar producto');
        $textButton = __('Actualizar');
        $route = route('camExternas.update', ['camExterna' => $camExterna]);
        return view('camExternas.edit',compact('update','title','textButton','route','camExterna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, camExterna $camExterna)
    {
        $this->validate($request, [
            'nombre'=>'required|unique:cam_externas,nombre,' . $camExterna->id,
            'descripcion'=>'nullable|string|min:10',
            'precio'=>'required',
        ]);
        $camExterna->fill($request->only('nombre','descripcion','precio'))->save();
        return redirect(route('camExternas.index'))->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(camExterna $camExterna)
    {
        $camExterna->delete();
        return back()->with('delete','ok');
    }
}
