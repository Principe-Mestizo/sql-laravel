<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;
/*use Illuminate\Contracts\Session\Session;*/
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('paginas/login');
    }

    public function adm()
    {
        $session = session('usuario');
        if ($session != null) {

            return view('paginas/inicio');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function col()
    {
        $session = session('usuario');
        if ($session != null) {

            return view('paginas/regasistencia');
        } else {
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $fechaActual = Carbon::now();
        $datos = DB::select('CALL SP_Login(?,?)', array($request->post('cod'), $request->post('pass')));
        $asistencia = DB::select('CALL SP_total_asistencia(?)', array($fechaActual));
        $tardanzas = DB::select('CALL SP_total_tardanza(?)', array($fechaActual));
        $faltas = DB::select('CALL SP_total_faltas(?)', array($fechaActual));


        if ($datos != null) {

            $sessionData = [
                'usuario' => $datos[0]->codigo,
                'perfil' => $datos[0]->id_perfil,
                'asistencia' => $asistencia[0]->total_asit,
                'tardanza' => $tardanzas[0]->total_tardanza,
                'personal' => $faltas[0]->total_personal,
                'faltas' => $faltas[0]->total_asistencias,




            ];
            $request->session()->put($sessionData);
            $perfil = session('perfil');
            if ($perfil == 1) {
                return redirect()->route("inicio.adm");
            } else {
                return redirect()->route("iniciom.col");
            }
        } else {
            Session::flash('error', 'Error de usuario y/o clave.');
            return redirect()->route("login.index");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login $login)
    {
        session()->flush();
        return redirect()->route('login.index');
    }
}
