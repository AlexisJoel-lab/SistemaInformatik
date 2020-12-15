<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Mail\ProformaMailable;
use App\Models\camExterna;
use App\Models\camInterna;
use App\Models\disco;
use App\Models\grabador;
use App\Models\proforma;
use Illuminate\Support\Facades\Mail;

class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grabadors = grabador::all();
        $discos = disco::all();
        $camExternas = camExterna::all();
        $camInternas = camInterna::all();
        
        /* $productos = producto::all('categoria_id','nombre','precio')->where('id',$producto->id)->first(); */
        return view('proformas.index', compact('grabadors', 'discos','camExternas','camInternas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'celular' => 'required',
        ]);

        $correo = new ProformaMailable($request->all());
        Mail::to($request['correo'])->send($correo);

        proforma::create($request->only('kit','precio','nombre','correo','celular'));
        return redirect()->route('proformas.index')->with('info','ok');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
