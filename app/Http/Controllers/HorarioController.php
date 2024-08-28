<?php

namespace App\Http\Controllers;

use App\Models\horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $session=session('usuario');
        if($session != null){

            $datos=DB::select('CALL SP_horario()');
            

            return view('paginas/hpersonal',compact('datos'));

                
        }else{
            return redirect()->route('login.index');
        }
    }

    public function hor()
    {
        $session=session('usuario');
        if($session != null){

            $datos=DB::select('CALL SP_Listarhorario()');
            

            return view('paginas/reporthorario',compact('datos'));

                
        }else{
            return redirect()->route('login.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $session=session('usuario');
        if($session != null){
            DB::select('CALL SP_GuardarHor(?,?,?)',array($request->post('cod'),$request->post('hi'),$request->post('hs')));
            Session::flash('success', 'Registro Guardado.');
            return redirect()->route("horario.index");
        }else{
            return redirect()->route('login.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, horario $horario)
    {
        $session=session('usuario');
        if($session != null){
            DB::select('CALL SP_ActHor(?,?,?)',array($request->post('codh'),$request->post('hi'),$request->post('hs')));
            Session::flash('success', 'Registro Actualizado.');
            return redirect()->route("horario.index");
        }else{
            return redirect()->route('login.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $session=session('usuario');
        if($session != null){
            DB::select('CALL SP_Delhor(?)',array($request->post('codh')));
            Session::flash('error', 'Registro Eliminado.');
            return redirect()->route("horario.index");
        }else{
            return redirect()->route('login.index');
        }
    }

    public function getAllItemsh()
    {
        $datos=DB::select('CALL SP_horario');
        return response()->json($datos);
    }
}
