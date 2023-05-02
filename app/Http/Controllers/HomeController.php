<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notificaciones= DB::select('SELECT visitantes.nombre, visitantes.a_paterno, visitantes.a_materno, periodos.hora_inicio from visitantes
        INNER JOIN visitas ON visitas.visitante_id = visitantes.id
        INNER JOIN periodos ON visitas.periodo_id = periodos.id WHERE periodos.fecha = CURDATE()');
        $num=1;
        return view('home', compact('notificaciones', 'num'));
    }
}
