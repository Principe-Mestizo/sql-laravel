<?php

namespace App\Http\Controllers;

use App\Models\personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $session=session('usuario');
        if($session != null){

            $datos=DB::select('CALL SP_personal()');
            $perfil=DB::select('CALL SP_perfil()');
            $area=DB::select('CALL SP_area()');

            return view('paginas/rpersonal',compact('perfil','area','datos'));

                
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
        $datos = DB::select('CALL SP_Validacionusuario(?)', array($request->post('cod')));
        
        $session=session('usuario');
        if($session != null){
            if($datos != null){

                Session::flash('error', 'Usuario ya Existe.');
                return redirect()->route("personal.index");
            
            }else{

                DB::select('CALL SP_Regpersonal(?,?,?,?,?,?)',array($request->post('cod'),$request->post('nom'),$request->post('ape'),
                $request->post('per'),$request->post('ar'),$request->post('cla')));
                Session::flash('success', 'Usuario Guardado.');
                return redirect()->route("personal.index");
                
                
            }

        }else{
            return redirect()->route('login.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(personal $personal)
    {
        $session=session('usuario');
        if($session != null){

            $datos=DB::select('CALL SP_Listarpersonal()');
            
            return view('paginas/reportpersonal',compact('datos'));

                
        }else{
            return redirect()->route('login.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, personal $personal)
    {
        $session=session('usuario');
        if($session != null){
            DB::select('CALL SP_Actpersonal(?,?,?,?,?,?)',array($request->post('cod'),$request->post('nom'),$request->post('ape'),
            $request->post('per'),$request->post('ar'),$request->post('cla')));
            Session::flash('success', 'Usuario Actualizado.');
            return redirect()->route("personal.index");
        }else{
            return redirect()->route('login.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{

            $session=session('usuario');
            if($session != null){
            DB::select('CALL SP_Delpersonal(?)',array($request->post('cod')));
            Session::flash('error', 'Usuario Eliminado.');
            return redirect()->route("personal.index");
            
            }else{
            return redirect()->route('login.index');
            }

        }catch(\Exception $e){
            Session::flash('error', 'El Usuario tiene asistencias Registradas.');
            return redirect()->route("personal.index");
            

        }
        
    }
}
