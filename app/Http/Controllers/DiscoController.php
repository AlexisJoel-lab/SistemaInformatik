<?php

namespace App\Http\Controllers;

use App\Models\disco;
use Illuminate\Http\Request;

class DiscoController extends Controller
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

        $hdds = disco::orderBy('id','DESC')->nombre($nombre)->paginate(10);

        return view('hdds.index',compact('hdds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $hdd = new disco;
        $title = __('Agregar producto');
        $textButton = __('Agregar');
        $route = route('hdds.store');
        return view('hdds.create',compact('title','textButton','route','hdd'));
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
            'nombre'=>'required|max:50|unique:discos',
            'descripcion'=>'required|string|min:10',
            'precio'=>'required',
        ]);
        disco::create($request->only('nombre','descripcion','precio'));
        return redirect(route('hdds.index'))->with('success','ok');
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
    public function edit(disco $hdd)
    {
        $update = true;
        $title = __('Editar producto');
        $textButton = __('Actualizar');
        $route = route('hdds.update', ['hdd' => $hdd]);
        return view('hdds.edit',compact('update','title','textButton','route','hdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, disco $hdd)
    {
        $this->validate($request, [
            'nombre'=>'required|unique:discos,nombre,' . $hdd->id,
            'descripcion'=>'nullable|string|min:10',
            'precio'=>'required',
        ]);
        $hdd->fill($request->only('nombre','descripcion','precio'))->save();
        return redirect(route('hdds.index'))->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(disco $hdd)
    {
        $hdd->delete();
        return back()->with('delete','ok');
    }
}