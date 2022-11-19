<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ResultadosController extends Controller
{

    public function getDeportes()
    {

        $listaDeportes = DB::table('deporte')
            ->join('evento', 'deporte.idDeporte', '=', 'evento.idDeporte')
            ->select('deporte.idDeporte', 'deporte.nombreDeporte')
            ->whereColumn('deporte.idDeporte', 'evento.idDeporte')
            ->distinct()
            ->get();
        return ['deportes' => $listaDeportes];

    }

    public function getEventos($idDeporte)
    {

        $listaEventos = DB::table('evento')
            ->join('deporte', 'evento.idDeporte', '=', 'deporte.idDeporte')
            ->select('evento.idEvento', 'evento.nombreEvento', 'evento.lugarEvento', 'evento.fechaEvento', 'evento.horarioEvento')
            ->where('deporte.idDeporte', $idDeporte)
            ->get();

        return ['eventos' => $listaEventos];

    }

    public function getEquipos($idEvento)
    {

        $listaEquiposLocal = DB::table('equipo')
            ->join('local', 'equipo.idEquipo', '=', 'local.idEquipo')
            ->join('evento', 'local.idEvento', '=', 'evento.idEvento')
            ->select('equipo.idEquipo', 'equipo.nombreEquipo')
            ->where('evento.idEvento', $idEvento)
            ->get();

        $listaEquiposVisitante = DB::table('equipo')
            ->join('visitante', 'equipo.idEquipo', '=', 'visitante.idEquipo')
            ->join('evento', 'visitante.idEvento', '=', 'evento.idEvento')
            ->select('equipo.idEquipo', 'equipo.nombreEquipo')
            ->where('evento.idEvento', $idEvento)
            ->get();

        return [
            'local' => $listaEquiposLocal,
            'visitante' => $listaEquiposVisitante,
        ];
    }

}
