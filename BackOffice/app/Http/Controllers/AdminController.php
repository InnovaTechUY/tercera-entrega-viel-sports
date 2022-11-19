<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\JugadorEquipoEvento;
use App\Models\Local;
use App\Models\Visitante;
use App\Models\Banner;
use App\Models\DTEquipo;
use App\Models\Jugador;
use App\Models\Director;
use App\Models\Arbitro;
use App\Models\Equipo;
use App\Models\EquipoJugador;
use App\Models\PorMarca;
use App\Models\Set;
use App\Models\Por_set;
use App\Models\TipoResultado;
use App\Models\Evento;
use App\Models\Deporte;
use App\Models\Por_Tanto;
use App\Models\Persona;
use App\Models\Marca;

use \Illuminate\Database\QueryException;

class AdminController extends Controller
{

    public function AuthUser(Request $request){
        
        $response = Http::post('http://localhost:8000/api/login',[
            'email' => $request -> post('email'),
            'password' => $request -> post('password'),
        ]);
        
        $autenticacion = json_decode($response,true);

         try {
            if($autenticacion["Status"] == false) 
                return view("layouts.login",[ 'error' => true, 'mensajeError' => $autenticacion ] );
            $request->session()->put('autenticado', true);
            $request->session()->put('nombreUsuario', $request -> post('email'));
            return $this->SessionUser($request);

        } catch (\Throwable $th) {
           return view("layouts.login",[ 'error' => true, 'mensajeError' => $autenticacion ] );
        
        }    
    }

    public function getUsers(){ 
        $usuarios = User::all(); 
        return view('layouts.getUsers',[ 'users' => $usuarios ]);
    }

    public function getBanners() {
        $images = DB::table('banner')->get();
        return view('layouts.getBanners', ['images' => $images]);
    }

    public function postBanners(Request $request){
        $file = $request->file('imagen');

        $originalName = $file->getClientOriginalName(); 
        $fileExtension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        $fileName = Str::random(50) . ".png";

        $destinationPath = 'bannersPublicidad';
        $file->move($destinationPath,$fileName);

        $imagen = new Banner();
        $imagen -> tipo = $request -> post("tipo");
        $imagen -> URL = $fileName;
            
        $imagen -> save();

        return view("layouts.getBanners",[
            'subido' => true,
            'originalName' => $originalName,
            'finalName' => $fileName,
            'fileExtension' => $fileExtension,
            'fileSize' => $fileSize,
            'mimeType' => $mimeType
        ]);

    }
        
    public function getListadosDeportesSistemasPuntajes() {

        $listaEquiposEventos = DB::table('equipo')
            ->join('jugador_equipo', 'equipo.idEquipo', '=', 'jugador_equipo.idEquipo')
            ->select('equipo.idEquipo','equipo.nombreEquipo')
            ->whereColumn('jugador_equipo.idEquipo','equipo.idEquipo')
            ->distinct()
            ->get();

        $listaEquipos = DB::table('equipo')
            ->select('equipo.idEquipo','equipo.nombreEquipo')
            ->get();

        $listaDeportes = DB::table('deporte')
            ->select('idDeporte','nombreDeporte')
            ->get();

        $listaSistemasPuntajes = DB::table('sistema_puntaje')
            ->select('idSistema','sistema')
            ->get();

        $listaEventos = DB::table('evento')
            ->select('evento.idEvento','evento.nombreEvento')
            ->get();
        
        $listaDirectoresTecnicos = DB::table('persona')
            ->join('director_tecnico', 'persona.idPersona', '=', 'director_tecnico.idDT')
            ->select('director_tecnico.idDT','persona.nombre')
            ->get();

            
        return view('layouts.resultados',
        [    
            'deportes' => $listaDeportes,
            'sistemaPuntaje' => $listaSistemasPuntajes,
            'equipos' => $listaEquipos,
            'eventos' => $listaEventos,
            'directores' => $listaDirectoresTecnicos,
            'equiposEventos' => $listaEquiposEventos
        ],);
         
    }

    public function ListajugadoresDeEquipos($idEquipo) {

        $listaJugadores = DB::table('persona')
        ->join('jugador', 'persona.idPersona', '=', 'jugador.idJugador')
        ->join('jugador_equipo', 'jugador.idJugador', '=', 'jugador_equipo.idJugador')
        ->join('equipo', 'jugador_equipo.idEquipo', '=', 'equipo.idEquipo')
        ->select('persona.idPersona','persona.nombre')
        ->where('equipo.idEquipo', $idEquipo)
        ->get();

        return $listaJugadores;
    }

    public function postDT(Request $request) {

        $request->validate([
            'DTnombre' => 'required',
            'DTapellido' => 'required',
            'DTpais' => 'required',
        ]);

        try {
            $persona = Persona::create([
                'nombre' => $request -> post("DTnombre"),
                'apellido' => $request -> post("DTapellido"),
                'pais' => $request -> post("DTpais")
            ]);

            $director = Director::create([
                'idDT' => $persona -> id
            ]);

            return redirect()->back();
            
        } catch(QueryException $e) {
            $error =  $this->handleCreateErrors($e);
            return $error;

            //return view('authentication.resultados',['error' => true,'mensajeError' => $error]);
        }
    }

    public function postJugadores(Request $request) {

        $request->validate([
            'jugadorNombre' => 'required',
            'jugadorApellido' => 'required',
            'jugadorPais' => 'required',
            'equipoJugador' => 'required',
        ]);

        try {
            $persona = Persona::create([
                'nombre' => $request -> post("jugadorNombre"),
                'apellido' => $request -> post("jugadorApellido"),
                'pais' => $request -> post("jugadorPais")
            ]);
     
            $jugador = Jugador::create([
                'idJugador' => $persona->id
            ]);

            $equipo = new EquipoJugador();
            $equipo -> idJugador = $jugador->idJugador;
            $equipo -> idEquipo = $request->equipoJugador;
            $equipo -> save();  

    
            return redirect()->back();

        } catch(QueryException $e) {
            $error =  $this->handleCreateErrors($e);
            return view('layouts.resultados',['error' => true,'mensajeError' => $error]);
        }

    }

    public function postArbitro(Request $request) {
        
        $request->validate([
            'nombreArbitro' => 'required',
            'apellidoArbitro' => 'required',
            'paisArbitro' => 'required',
        ]);
        
        try {
            $persona = Persona::create([
                'nombre' => $request -> post("nombreArbitro"),
                'apellido' => $request -> post("apellidoArbitro"),
                'pais' => $request -> post("paisArbitro")
            ]);

            $arbitro = Arbitro::create([
                'idArbitro' => $persona -> id
            ]);

            return redirect()->back();
        
        } catch(QueryException $e) {
            $error =  $this->handleCreateErrors($e);
            return $error;

            //return view('authentication.resultados',['error' => true,'mensajeError' => $error]);
        }
    }

    private function handleCreateErrors($e){
        return [
            "error" => 'Incorrecto',
            "trace" => $e -> getMessage()
        ];
    }

    public function ListaEquiposDeJugadores() {

        $listaEquipos = DB::table('equipo')
        ->join('jugador_equipo', 'equipo.idEquipo', '=', 'jugador_equipo.idEquipo')
        ->select('equipo.idEquipo','equipo.nombreEquipo')
        ->whereColumn('jugador_equipo.idEquipo','equipo.idEquipo')
        ->distinct()
        ->get();

        return $listaEquipos;
    }

    public function postEquipos(Request $request) {

        $request->validate([
            'equipoNombre' => 'required',
            'DTequipo' => 'required',
        ]);

        $equipo = Equipo::create([
            'nombreEquipo' => $request -> post("equipoNombre")
        ]);

        $equipoDT = new DTEquipo();
        $equipoDT -> idDT = $request -> DTequipo;
        $equipoDT -> idEquipo = $equipo -> id;
        $equipoDT -> save();  

        return redirect()->back();
    }


    public function postDeportes(Request $request){

        $request->validate([
            'sistemaPuntaje' => 'required',
            'deporteNombre' => 'required | min:3',
        ]);

        $deporte = new Deporte();
        $deporte -> idSistema = $request->sistemaPuntaje;
        $deporte -> nombreDeporte = $request->deporteNombre;

        $deporte ->save();


        return redirect()->back(); 
    }

    public function postEventos(Request $request){

        $request->validate([
            'eventoNombre' => 'required',
            'eventoLugar' => 'required',
            'eventoFecha' => 'required',
            'eventoHorario' => 'required|Min:00:00|Max:24:00',
            'deporteEvento' => 'required',
        ]);

        $evento = Evento::create([
            'nombreEvento' => $request->eventoNombre,
            'lugarEvento' => $request->eventoLugar,
            'fechaEvento' => $request->eventoFecha,
            'horarioEvento' => $request->eventoHorario,
            'idDeporte' => $request->deporteEvento
        ]);

        $sistemaPuntaje = DB::table('deporte')
        ->select(/* 'evento.idEvento','deporte.idDeporte', */'deporte.idSistema')
        ->where('deporte.idDeporte',$request->deporteEvento)
        ->get();

        $sistema = $sistemaPuntaje[0]->idSistema;

        if($sistema == "3" || $sistema == "4")
            $jugador_equipo_evento = new JugadorEquipoEvento();
            $jugador_equipo_evento -> idEquipo = $equipo -> eventoEquipoIndividual;
            $jugador_equipo_evento -> idJugador = $jugador -> jugadorEvento;
            $jugador_equipo_evento -> idEvento = $evento -> id;
            $jugador_equipo_evento -> save();

        $local = new Local();
        $local -> idEquipo = $request->eventoEquipoLocal;

        $local -> idEvento = $evento -> id;
        $local -> save();
        $visitante = new Visitante();
        $visitante -> idEquipo = $request -> eventoEquipoVisitante;
        $visitante -> idEvento = $evento -> id;
        $visitante -> save();

        return redirect()->back();
    }

    public function addset(Request $request){ // FORMULARIO CREAR RESULTADO

        $request->validate([
            'Set[0][nro_set]' => 'required',
            'Set[0][puntos_local]' => 'required',
            'Set[0][puntos_visitante]' => 'required',
            'Equipolocalvisitante' => 'required',
            'Equipolocallocal' => 'required',

            'Marca[0][equipoMarca]' => 'required',
            'Marca[0][jugadorMarca]' => 'required',
            'Marca[0][marca]' => 'required',

            'NombreTantoLocal' => 'required',
            'Tanto[tanto_local]' => 'required',
            'NombreTantoVisitante' => 'required',
            'Tanto[tanto_visitante]' => 'required',
        ]);

        $sistemaPuntaje = DB::table('deporte')
        ->join('evento', 'deporte.idDeporte', '=', 'evento.idDeporte')
        ->join('tiporesultado', 'evento.idEvento', '=', 'tiporesultado.idEvento')
        ->select(/* 'evento.idEvento','deporte.idDeporte', */'deporte.idSistema')
        ->where('evento.idEvento',$request->eventoResultado)
        ->get();
        
        $sistema = $sistemaPuntaje[0]->idSistema;
         
        if($sistema == "1")
            return $this->resultadoPorTanto($request);

        if($sistema == "2")
            return $this->resultadoPorSet($request);

        if($sistema == "3")
            return $this->resultadoPorMarcaAscendente($request);

        if($sistema == "4")
            return $this->resultadoPorMarcaDescendente($request);

    } 

    private function resultadoPorTanto($request) {
   
        $resultadoTanto = TipoResultado::create([
            'idEvento' => $request->eventoResultado
        ]);


        $tanto = new Por_Tanto();
        $tanto -> idPorTanto = $resultadoTanto->id;
        $tanto -> tanto_local = $request->Tanto["tanto_local"];
        $tanto -> tanto_visitante = $request->Tanto["tanto_visitante"];
        $tanto -> save();  

    }

    private function resultadoporSet($request) {
        
        $resultadoSet = TipoResultado::create([
            'idEvento' => $request->eventoResultado
        ]);

        $set = new Set();
        $set -> idPorSet = $resultadoSet->id;
        $set -> save();

        foreach ($request->Set as $key => $value) {

            $idPorSet = DB::table('porset')
            ->select('idPorSet')
            ->orderByDesc('idPorSet')
            ->limit(1)
            ->get();

            $idSet =  $idPorSet[0]->idPorSet;

            $porset = new Por_set();
            $porset -> puntos_local = $value['puntos_local'];
            $porset -> puntos_visitante = $value['puntos_visitante'];
            $porset -> nro_set = $value['nro_set'];
            $porset -> idPorSet = $idSet;

            $porset -> save();       
        }
    }

    private function resultadoPorMarcaAscendente($request) {
        $resultadoMarca = TipoResultado::create([
            'idEvento' => $request->eventoResultado
        ]); 

        
        foreach ($request->Marca as $key => $value) {

            $IDsJEE = DB::table('jugador_equipo_evento')
            ->select('idJugador','idEquipo','idEvento')
            ->where('idEvento',$request->eventoResultado)
            ->where('idEquipo',$value['equipoMarca'])
            ->where('idJugador',$value['jugadorMarca'])
            ->get();

            $pormarca = new PorMarca();
            $pormarca -> idPorMarca = $resultadoMarca->id;
            $pormarca -> ascendente = true;
            $pormarca -> save();


            $marca = new Marca();
            $marca -> idPorMarca = $pormarca->idPorMarca;
            $marca -> idJugador = $IDsJEE[0]->idJugador;
            $marca -> idEquipo = $IDsJEE[0]->idEquipo;
            $marca -> idEvento = $IDsJEE[0]->idEvento;
            $marca -> marca = $value['marca'];
            $marca -> save();

        
        }
    }

    private function resultadoPorMarcaDescendente($request) {
          $resultadoMarca = TipoResultado::create([
            'idEvento' => $request->eventoResultado
          ]);
          
          foreach ($request->Marca as $key => $value) {

              $IDsJEE = DB::table('jugador_equipo_evento')
              ->select('idJugador','idEquipo','idEvento')
              ->where('idEvento',$request->eventoResultado)
              ->where('idEquipo',$value['equipoMarca'])
              ->where('idJugador',$value['jugadorMarca'])
              ->get();

              $pormarca = new PorMarca();
              $pormarca -> idPorMarca = $resultadoMarca->id;
              $pormarca -> ascendente = false;
              $pormarca -> save();


              $marca = new Marca();
              $marca -> idPorMarca = $pormarca->idPorMarca;
              $marca -> idJugador = $IDsJEE[0]->idJugador;
              $marca -> idEquipo = $IDsJEE[0]->idEquipo;
              $marca -> idEvento = $IDsJEE[0]->idEvento;
              $marca -> marca = $value['marca'];
              $marca -> save();

          
          }
    }
}
