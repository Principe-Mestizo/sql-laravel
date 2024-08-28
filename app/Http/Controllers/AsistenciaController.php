<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('paginas/regasistencia');
    }

    public function inicio()
    {


        $session = session('usuario');
        if ($session != null) {

            $fechaActual = Carbon::now();
            $datos = DB::select('CALL SP_Asistingreso(?)', array($fechaActual));
            return view('paginas/ingreso', compact('datos'));
        } else {
            return redirect()->route('login.index');
        }
    }

    public function salida()
    {


        $session = session('usuario');
        if ($session != null) {

            $fechaActual = Carbon::now();
            $datos1 = DB::select('CALL SP_Asistsalida(?)', array($fechaActual));
            return view('paginas/salida', compact('datos1'));
        } else {
            return redirect()->route('login.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $session = session('usuario');
        if ($session != null) {

            $datos = DB::select('CALL SP_Mostrarasist()');


            return view('paginas/asisthoras', compact('datos'));
        } else {
            return redirect()->route('login.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $session = session('usuario');
        if ($session != null) {
            $fechaActual = Carbon::now();
            $hora = $fechaActual->format('H:i:s');
            $lat = $request->input('lat');
            $lng = $request->input('lon');
            $accuracy = $request->input('pre');

            DB::select('CALL SP_Regingreso(?,?,?,?,?,?,?,?,?,?,?)', array(
                $session,
                $hora,
                $hora,
                $fechaActual,
                $hora,
                $accuracy,
                $accuracy,
                $lat,
                $lng,
                $lat,
                $lng
            ));
            Session::flash('success', 'Asistencia Registrada.');
            return redirect()->route("asistper.index");
        } else {
            return redirect()->route('login.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $session = session('usuario');
        if ($session != null) {
            $fechaActual = Carbon::now();
            $hora = $fechaActual->format('H:i:s');
            $lat = $request->input('lat');
            $lng = $request->input('lon');
            $accuracy = $request->input('pre');

            DB::select('CALL SP_Regsalida(?,?,?,?,?,?)', array($session, $hora, $fechaActual, $accuracy, $lat, $lng));
            Session::flash('success', 'Salida Registrada.');
            return redirect()->route("asistper.index");
        } else {
            return redirect()->route('login.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asistencia $asistencia)
    {
        //
    }

    public function reportin()
    {


        $session = session('usuario');
        if ($session != null) {


            $datos = DB::select('CALL SP_Reportingreso');
            Session::flash('success', 'Reporte Generado.');
            return view('paginas/reportingreso', compact('datos'));
        } else {
            return redirect()->route('login.index');
        }
    }
    public function reportout()
    {


        $session = session('usuario');
        if ($session != null) {


            $datos = DB::select('CALL SP_Reportsalida');
            Session::flash('success', 'Reporte Generado.');
            return view('paginas/reportsalida', compact('datos'));
        } else {
            return redirect()->route('login.index');
        }
    }
    public function reportgen()
    {


        $session = session('usuario');
        if ($session != null) {


            $datos = DB::select('CALL SP_Reportgeneral');
            Session::flash('success', 'Reporte Generado.');
            return view('paginas/reportgeneral', compact('datos'));
        } else {
            return redirect()->route('login.index');
        }
    }
    public function getAllItems()
    {
        $datos = DB::select('CALL SP_Reportingreso');
        return response()->json($datos);
    }

    public function getAllItemso()
    {
        $datos = DB::select('CALL SP_Reportsalida');
        return response()->json($datos);
    }

    public function getAllItemsg()
    {
        $datos = DB::select('CALL SP_Reportgeneral');
        return response()->json($datos);
    }

    public function filtroin(Request $request)
    {
        $session = session('usuario');
        if ($session != null) {
            $query1 = $request->input('fechain');
            $query2 = $request->input('fechaout');
            $datos = DB::select('CALL SP_Filtroingreso(?,?)', array($query1, $query2));
            return view('paginas/reportingreso', ['datos' => $datos, 'query1' => $query1, 'query2' => $query2]);
        } else {
            return redirect()->route('login.index');
        }
    }
    public function filtroout(Request $request)
    {
        $session = session('usuario');
        if ($session != null) {
            $query1 = $request->input('fechain');
            $query2 = $request->input('fechaout');
            $datos = DB::select('CALL SP_Filtrosalida(?,?)', array($query1, $query2));
            return view('paginas/reportsalida', ['datos' => $datos, 'query1' => $query1, 'query2' => $query2]);
        } else {
            return redirect()->route('login.index');
        }
    }
    public function filtrogen(Request $request)
    {
        $session = session('usuario');
        if ($session != null) {
            $query1 = $request->input('fechain');
            $query2 = $request->input('fechaout');
            $datos = DB::select('CALL SP_Filtrogeneral(?,?)', array($query1, $query2));
            return view('paginas/reportgeneral', ['datos' => $datos, 'query1' => $query1, 'query2' => $query2]);
        } else {
            return redirect()->route('login.index');
        }
    }


    public function reporteperusu()
    {
        $session = session('usuario');
        if ($session != null) {

            $datos = DB::select('CALL SP_resportusuario(?)', array($session));
            return view('paginas/regasistencia', compact('datos'));
        } else {
            return redirect()->route('login.index');
        }
    }
}
