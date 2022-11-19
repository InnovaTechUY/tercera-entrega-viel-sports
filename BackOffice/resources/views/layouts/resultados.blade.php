@extends('layouts.base')


@section('content')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/registro.css');  }}">
@endsection

<style>
    .formulario-registro{
        width: 95%;
    }   
    h1 {
        text-align: center;
    }
</style>
<h1>Resultados Deportivos</h1>
  <form class="formulario-registro" method="POST" action="{{ route('eventos.auth')}}" >
    @csrf
    <h2>Crear Evento</h2>
        <label class="label" for="eventoNombre">
        <input class="input" id="eventoNombre" type="text" name="eventoNombre" placeholder="Nombre Evento" >
        </label>

        <label class="label" for="eventoLugar">
        <input class="input" id="eventoLugar" type="text" name="eventoLugar" placeholder="Nombre lugar" >
        </label>

        <label class="label" for="eventoFecha">
        <input class="input" id="eventoFecha" type="date" name="eventoFecha" placeholder="fecha" >
        </label>

        <label class="label mn-bottom" for="eventoHorario">
        <input class="input " id="eventoHorario" type="time" name="eventoHorario" placeholder="horario" >
        </label>
        <!-- No funciona el time en firefox -->

        <select class="pais input mn-bottom" id="deporteEvento" name="deporteEvento">
            <option value=""> -- Deportes --</option>
                @foreach ($deportes as $deporte)
                        <option value="{{$deporte->idDeporte}}"> {{$deporte->nombreDeporte}} </option>
                @endforeach
        </select>
        
        <div class="equipos-evento">
            <div class="equipos-evento-contenido">
                <h5>Equipo Local</h5>
                <select class="pais input" id="eventoEquipoLocal" name="eventoEquipoLocal">
                    <option value=""> -- Seleccione Equipo Local --</option>
                    @foreach ($equiposEventos as $equipoEvento)
                        <option value="{{$equipoEvento->idEquipo}}"> {{$equipoEvento->nombreEquipo}} </option>
                    @endforeach
                </select>
            </div>

            <div class="equipos-evento-contenido">
                <h5>Equipo Visitante</h5>
                <select class="pais input" id="eventoEquipoVisitante" name="eventoEquipoVisitante">
                    <option value=""> -- Seleccione Equipo Visitante --</option>
                    @foreach ($equiposEventos as $equipoEvento)
                        <option value="{{$equipoEvento->idEquipo}}"> {{$equipoEvento->nombreEquipo}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="equipos-evento-individual">
                <h5>Lista de Equipos</h5>
            <div class="equipos-evento-individual-contenido">
                <select class="pais input " id="eventoEquipoIndividual" name="eventoEquipoIndividual">
                    <option value=""> -- Seleccione Equipo --</option>
                    @foreach ($equiposEventos as $equipoEvento)
                        <option value="{{$equipoEvento->idEquipo}}"> {{$equipoEvento->nombreEquipo}} </option>
                    @endforeach
                </select>
                <button type="button" name="add" id="" class="btn btn-outline-primary">Añadir equipo</button>
            </div>
            <select class="pais input" id="jugadorEvento" name="jugadorEvento">
                <option value=""> -- Seleccione Jugador --</option>
            </select>
        </div>
        
    <div class="contenedor-button-registro">
        <input class="button button-enviar" type="submit" value="Enviar">
        <input class="button button-borrar" type="reset" value="Borrar">
    </div>

    </form>


    <form class="formulario-registro" method="POST" action="{{ route('deportes.auth')}}" >
    @csrf
    <h2>Crear Deporte</h2>
        
        <label class="label" for="deporteNombre">
        <input class="input" id="deporteNombre" type="text" name="deporteNombre" placeholder="Nombre Deporte" >
        </label>

        <select class="pais input" id="sistemaPuntaje" name="sistemaPuntaje">
            <option value=""> -- Sistema Puntaje --</option>
                @foreach ($sistemaPuntaje as $sistema)
                        <option value="{{$sistema->idSistema}}"> {{$sistema->sistema}} </option>
                @endforeach
        </select>

    <div class="contenedor-button-registro">
        <input class="button button-enviar" type="submit" value="Enviar">
        <input class="button button-borrar" type="reset" value="Borrar">
    </div> 

    </form>

    <form class="formulario-registro" method="POST" action="{{ route('equipos.auth')}}" >
        @csrf
        <h2>Crear Equipo</h2>
            
            <label class="label" for="equipoNombre">
            <input class="input" id="equipoNombre" type="text" name="equipoNombre" placeholder="Nombre Equipo" >
            </label>

            <select  class="pais input" id="DTequipo" name="DTequipo">
                <option value=""> -- Director Tecnico --</option>
                @foreach ($directores as $director)
                    <option value="{{$director->idDT}}"> {{$director->nombre}} </option>
                @endforeach
            </select>
    
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 

    </form>

    <form class="formulario-registro" method="POST" action="{{ route('jugadores.auth')}}" >
        @csrf
        <h2>Crear jugador</h2>
            
        <label class="label" for="jugadorNombre">
        <input class="input" id="jugadorNombre" type="text" name="jugadorNombre" placeholder="Nombre jugador" >
        </label>

        <label class="label" for="jugadorApellido">
        <input class="input" id="jugadorApellido" type="text" name="jugadorApellido" placeholder="Apellido jugador" >
        </label>

        <select class="pais input" name="jugadorPais">
              <option value="Elegir" id="AF">Seleccione su país</option>
              <option value="Afganistán" id="AF">Afganistán</option>
              <option value="Albania" id="AL">Albania</option>
              <option value="Alemania" id="DE">Alemania</option>
              <option value="Andorra" id="AD">Andorra</option>
              <option value="Angola" id="AO">Angola</option>
              <option value="Anguila" id="AI">Anguila</option>
              <option value="Antártida" id="AQ">Antártida</option>
              <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
              <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
              <option value="Argelia" id="DZ">Argelia</option>
              <option value="Argentina" id="AR">Argentina</option>
              <option value="Armenia" id="AM">Armenia</option>
              <option value="Aruba" id="AW">Aruba</option>
              <option value="Australia" id="AU">Australia</option>
              <option value="Austria" id="AT">Austria</option>
              <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
              <option value="Bahamas" id="BS">Bahamas</option>
              <option value="Bahrein" id="BH">Bahrein</option>
              <option value="Bangladesh" id="BD">Bangladesh</option>
              <option value="Barbados" id="BB">Barbados</option>
              <option value="Bélgica" id="BE">Bélgica</option>
              <option value="Belice" id="BZ">Belice</option>
              <option value="Benín" id="BJ">Benín</option>
              <option value="Bermudas" id="BM">Bermudas</option>
              <option value="Bhután" id="BT">Bhután</option>
              <option value="Bielorrusia" id="BY">Bielorrusia</option>
              <option value="Birmania" id="MM">Birmania</option>
              <option value="Bolivia" id="BO">Bolivia</option>
              <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
              <option value="Botsuana" id="BW">Botsuana</option>
              <option value="Brasil" id="BR">Brasil</option>
              <option value="Brunei" id="BN">Brunei</option>
              <option value="Bulgaria" id="BG">Bulgaria</option>
              <option value="Burkina Faso" id="BF">Burkina Faso</option>
              <option value="Burundi" id="BI">Burundi</option>
              <option value="Cabo Verde" id="CV">Cabo Verde</option>
              <option value="Camboya" id="KH">Camboya</option>
              <option value="Camerún" id="CM">Camerún</option>
              <option value="Canadá" id="CA">Canadá</option>
              <option value="Chad" id="TD">Chad</option>
              <option value="Chile" id="CL">Chile</option>
              <option value="China" id="CN">China</option>
              <option value="Chipre" id="CY">Chipre</option>
              <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
              <option value="Colombia" id="CO">Colombia</option>
              <option value="Comores" id="KM">Comores</option>
              <option value="Congo" id="CG">Congo</option>
              <option value="Corea" id="KR">Corea</option>
              <option value="Corea del Norte" id="KP">Corea del Norte</option>
              <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
              <option value="Costa Rica" id="CR">Costa Rica</option>
              <option value="Croacia" id="HR">Croacia</option>
              <option value="Cuba" id="CU">Cuba</option>
              <option value="Dinamarca" id="DK">Dinamarca</option>
              <option value="Djibouri" id="DJ">Djibouri</option>
              <option value="Dominica" id="DM">Dominica</option>
              <option value="Ecuador" id="EC">Ecuador</option>
              <option value="Egipto" id="EG">Egipto</option>
              <option value="El Salvador" id="SV">El Salvador</option>
              <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
              <option value="Eritrea" id="ER">Eritrea</option>
              <option value="Eslovaquia" id="SK">Eslovaquia</option>
              <option value="Eslovenia" id="SI">Eslovenia</option>
              <option value="España" id="ES">España</option>
              <option value="Estados Unidos" id="US">Estados Unidos</option>
              <option value="Estonia" id="EE">Estonia</option>
              <option value="c" id="ET">Etiopía</option>
              <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
              <option value="Filipinas" id="PH">Filipinas</option>
              <option value="Finlandia" id="FI">Finlandia</option>
              <option value="Francia" id="FR">Francia</option>
              <option value="Gabón" id="GA">Gabón</option>
              <option value="Gambia" id="GM">Gambia</option>
              <option value="Georgia" id="GE">Georgia</option>
              <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
              <option value="Ghana" id="GH">Ghana</option>
              <option value="Gibraltar" id="GI">Gibraltar</option>
              <option value="Granada" id="GD">Granada</option>
              <option value="Grecia" id="GR">Grecia</option>
              <option value="Groenlandia" id="GL">Groenlandia</option>
              <option value="Guadalupe" id="GP">Guadalupe</option>
              <option value="Guam" id="GU">Guam</option>
              <option value="Guatemala" id="GT">Guatemala</option>
              <option value="Guayana" id="GY">Guayana</option>
              <option value="Guayana francesa" id="GF">Guayana francesa</option>
              <option value="Guinea" id="GN">Guinea</option>
              <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
              <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
              <option value="Haití" id="HT">Haití</option>
              <option value="Holanda" id="NL">Holanda</option>
              <option value="Honduras" id="HN">Honduras</option>
              <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
              <option value="Hungría" id="HU">Hungría</option>
              <option value="India" id="IN">India</option>
              <option value="Indonesia" id="ID">Indonesia</option>
              <option value="Irak" id="IQ">Irak</option>
              <option value="Irán" id="IR">Irán</option>
              <option value="Irlanda" id="IE">Irlanda</option>
              <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
              <option value="Isla Christmas" id="CX">Isla Christmas</option>
              <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
              <option value="Islandia" id="IS">Islandia</option>
              <option value="Islas Caimán" id="KY">Islas Caimán</option>
              <option value="Islas Cook" id="CK">Islas Cook</option>
              <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
              <option value="Islas Faroe" id="FO">Islas Faroe</option>
              <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
              <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
              <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
              <option value="Islas Marshall" id="MH">Islas Marshall</option>
              <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
              <option value="Islas Palau" id="PW">Islas Palau</option>
              <option value="Islas Salomón" d="SB">Islas Salomón</option>
              <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
              <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
              <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
              <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
              <option value="Israel" id="IL">Israel</option>
              <option value="Italia" id="IT">Italia</option>
              <option value="Jamaica" id="JM">Jamaica</option>
              <option value="Japón" id="JP">Japón</option>
              <option value="Jordania" id="JO">Jordania</option>
              <option value="Kazajistán" id="KZ">Kazajistán</option>
              <option value="Kenia" id="KE">Kenia</option>
              <option value="Kirguizistán" id="KG">Kirguizistán</option>
              <option value="Kiribati" id="KI">Kiribati</option>
              <option value="Kuwait" id="KW">Kuwait</option>
              <option value="Laos" id="LA">Laos</option>
              <option value="Lesoto" id="LS">Lesoto</option>
              <option value="Letonia" id="LV">Letonia</option>
              <option value="Líbano" id="LB">Líbano</option>
              <option value="Liberia" id="LR">Liberia</option>
              <option value="Libia" id="LY">Libia</option>
              <option value="Liechtenstein" id="LI">Liechtenstein</option>
              <option value="Lituania" id="LT">Lituania</option>
              <option value="Luxemburgo" id="LU">Luxemburgo</option>
              <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
              <option value="Madagascar" id="MG">Madagascar</option>
              <option value="Malasia" id="MY">Malasia</option>
              <option value="Malawi" id="MW">Malawi</option>
              <option value="Maldivas" id="MV">Maldivas</option>
              <option value="Malí" id="ML">Malí</option>
              <option value="Malta" id="MT">Malta</option>
              <option value="Marruecos" id="MA">Marruecos</option>
              <option value="Martinica" id="MQ">Martinica</option>
              <option value="Mauricio" id="MU">Mauricio</option>
              <option value="Mauritania" id="MR">Mauritania</option>
              <option value="Mayotte" id="YT">Mayotte</option>
              <option value="México" id="MX">México</option>
              <option value="Micronesia" id="FM">Micronesia</option>
              <option value="Moldavia" id="MD">Moldavia</option>
              <option value="Mónaco" id="MC">Mónaco</option>
              <option value="Mongolia" id="MN">Mongolia</option>
              <option value="Montserrat" id="MS">Montserrat</option>
              <option value="Mozambique" id="MZ">Mozambique</option>
              <option value="Namibia" id="NA">Namibia</option>
              <option value="Nauru" id="NR">Nauru</option>
              <option value="Nepal" id="NP">Nepal</option>
              <option value="Nicaragua" id="NI">Nicaragua</option>
              <option value="Níger" id="NE">Níger</option>
              <option value="Nigeria" id="NG">Nigeria</option>
              <option value="Niue" id="NU">Niue</option>
              <option value="Norfolk" id="NF">Norfolk</option>
              <option value="Noruega" id="NO">Noruega</option>
              <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
              <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
              <option value="Omán" id="OM">Omán</option>
              <option value="Panamá" id="PA">Panamá</option>
              <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
              <option value="Paquistán" id="PK">Paquistán</option>
              <option value="Paraguay" id="PY">Paraguay</option>
              <option value="Perú" id="PE">Perú</option>
              <option value="Pitcairn" id="PN">Pitcairn</option>
              <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
              <option value="Polonia" id="PL">Polonia</option>
              <option value="Portugal" id="PT">Portugal</option>
              <option value="Puerto Rico" id="PR">Puerto Rico</option>
              <option value="Qatar" id="QA">Qatar</option>
              <option value="Reino Unido" id="UK">Reino Unido</option>
              <option value="República Centroafricana" id="CF">República Centroafricana</option>
              <option value="República Checa" id="CZ">República Checa</option>
              <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
              <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
              <option value="República Dominicana" id="DO">República Dominicana</option>
              <option value="Reunión" id="RE">Reunión</option>
              <option value="Ruanda" id="RW">Ruanda</option>
              <option value="Rumania" id="RO">Rumania</option>
              <option value="Rusia" id="RU">Rusia</option>
              <option value="Samoa" id="WS">Samoa</option>
              <option value="Samoa occidental" id="AS">Samoa occidental</option>
              <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
              <option value="San Marino" id="SM">San Marino</option>
              <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
              <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
              <option value="Santa Helena" id="SH">Santa Helena</option>
              <option value="Santa Lucía" id="LC">Santa Lucía</option>
              <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
              <option value="Senegal" id="SN">Senegal</option>
              <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
              <option value="Sychelles" id="SC">Seychelles</option>
              <option value="Sierra Leona" id="SL">Sierra Leona</option>
              <option value="Singapur" id="SG">Singapur</option>
              <option value="Siria" id="SY">Siria</option>
              <option value="Somalia" id="SO">Somalia</option>
              <option value="Sri Lanka" id="LK">Sri Lanka</option>
              <option value="Suazilandia" id="SZ">Suazilandia</option>
              <option value="Sudán" id="SD">Sudán</option>
              <option value="Suecia" id="SE">Suecia</option>
              <option value="Suiza" id="CH">Suiza</option>
              <option value="Surinam" id="SR">Surinam</option>
              <option value="Svalbard" id="SJ">Svalbard</option>
              <option value="Tailandia" id="TH">Tailandia</option>
              <option value="Taiwán" id="TW">Taiwán</option>
              <option value="Tanzania" id="TZ">Tanzania</option>
              <option value="Tayikistán" id="TJ">Tayikistán</option>
              <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
              <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
              <option value="Timor Oriental" id="TP">Timor Oriental</option>
              <option value="Togo" id="TG">Togo</option>
              <option value="Tonga" id="TO">Tonga</option>
              <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
              <option value="Túnez" id="TN">Túnez</option>
              <option value="Turkmenistán" id="TM">Turkmenistán</option>
              <option value="Turquía" id="TR">Turquía</option>
              <option value="Tuvalu" id="TV">Tuvalu</option>
              <option value="Ucrania" id="UA">Ucrania</option>
              <option value="Uganda" id="UG">Uganda</option>
              <option value="Uruguay" id="UY">Uruguay</option>
              <option value="Uzbekistán" id="UZ">Uzbekistán</option>
              <option value="Vanuatu" id="VU">Vanuatu</option>
              <option value="Venezuela" id="VE">Venezuela</option>
              <option value="Vietnam" id="VN">Vietnam</option>
              <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
              <option value="Yemen" id="YE">Yemen</option>
              <option value="Zambia" id="ZM">Zambia</option>
              <option value="Zimbabue" id="ZW">Zimbabue</option>
            </select>

        <select class="pais input" id="equipoJugador" name="equipoJugador">
            <option value=""> -- Seleccione Equipo --</option>
            @foreach ($equipos as $equipo)
            <option value="{{$equipo->idEquipo}}"> {{$equipo->nombreEquipo}} </option>
            @endforeach
        </select>

        @isset($error)
                <div class="alert alert-danger" role="success">{{ $mensajeErrorError }} </div>
        @endisset
    
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 
    </form>

    <form class="formulario-registro" method="POST" action="{{ route('director.auth')}}" >
        @csrf
        <h2>Crear Director Tecnico</h2>
            
        <label class="label" for="DTnombre">
        <input class="input" id="DTnombre" type="text" name="DTnombre" placeholder="Nombre Director Tecnico" >
        </label>
        <label class="label" for="DTapellido">
        <input class="input" id="DTapellido" type="text" name="DTapellido" placeholder="Apellido Director Tecnico" >
        </label>
        <select class="pais input" name="DTpais">
              <option value="Elegir" id="AF">Seleccione su país</option>
              <option value="Afganistán" id="AF">Afganistán</option>
              <option value="Albania" id="AL">Albania</option>
              <option value="Alemania" id="DE">Alemania</option>
              <option value="Andorra" id="AD">Andorra</option>
              <option value="Angola" id="AO">Angola</option>
              <option value="Anguila" id="AI">Anguila</option>
              <option value="Antártida" id="AQ">Antártida</option>
              <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
              <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
              <option value="Argelia" id="DZ">Argelia</option>
              <option value="Argentina" id="AR">Argentina</option>
              <option value="Armenia" id="AM">Armenia</option>
              <option value="Aruba" id="AW">Aruba</option>
              <option value="Australia" id="AU">Australia</option>
              <option value="Austria" id="AT">Austria</option>
              <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
              <option value="Bahamas" id="BS">Bahamas</option>
              <option value="Bahrein" id="BH">Bahrein</option>
              <option value="Bangladesh" id="BD">Bangladesh</option>
              <option value="Barbados" id="BB">Barbados</option>
              <option value="Bélgica" id="BE">Bélgica</option>
              <option value="Belice" id="BZ">Belice</option>
              <option value="Benín" id="BJ">Benín</option>
              <option value="Bermudas" id="BM">Bermudas</option>
              <option value="Bhután" id="BT">Bhután</option>
              <option value="Bielorrusia" id="BY">Bielorrusia</option>
              <option value="Birmania" id="MM">Birmania</option>
              <option value="Bolivia" id="BO">Bolivia</option>
              <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
              <option value="Botsuana" id="BW">Botsuana</option>
              <option value="Brasil" id="BR">Brasil</option>
              <option value="Brunei" id="BN">Brunei</option>
              <option value="Bulgaria" id="BG">Bulgaria</option>
              <option value="Burkina Faso" id="BF">Burkina Faso</option>
              <option value="Burundi" id="BI">Burundi</option>
              <option value="Cabo Verde" id="CV">Cabo Verde</option>
              <option value="Camboya" id="KH">Camboya</option>
              <option value="Camerún" id="CM">Camerún</option>
              <option value="Canadá" id="CA">Canadá</option>
              <option value="Chad" id="TD">Chad</option>
              <option value="Chile" id="CL">Chile</option>
              <option value="China" id="CN">China</option>
              <option value="Chipre" id="CY">Chipre</option>
              <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
              <option value="Colombia" id="CO">Colombia</option>
              <option value="Comores" id="KM">Comores</option>
              <option value="Congo" id="CG">Congo</option>
              <option value="Corea" id="KR">Corea</option>
              <option value="Corea del Norte" id="KP">Corea del Norte</option>
              <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
              <option value="Costa Rica" id="CR">Costa Rica</option>
              <option value="Croacia" id="HR">Croacia</option>
              <option value="Cuba" id="CU">Cuba</option>
              <option value="Dinamarca" id="DK">Dinamarca</option>
              <option value="Djibouri" id="DJ">Djibouri</option>
              <option value="Dominica" id="DM">Dominica</option>
              <option value="Ecuador" id="EC">Ecuador</option>
              <option value="Egipto" id="EG">Egipto</option>
              <option value="El Salvador" id="SV">El Salvador</option>
              <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
              <option value="Eritrea" id="ER">Eritrea</option>
              <option value="Eslovaquia" id="SK">Eslovaquia</option>
              <option value="Eslovenia" id="SI">Eslovenia</option>
              <option value="España" id="ES">España</option>
              <option value="Estados Unidos" id="US">Estados Unidos</option>
              <option value="Estonia" id="EE">Estonia</option>
              <option value="c" id="ET">Etiopía</option>
              <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
              <option value="Filipinas" id="PH">Filipinas</option>
              <option value="Finlandia" id="FI">Finlandia</option>
              <option value="Francia" id="FR">Francia</option>
              <option value="Gabón" id="GA">Gabón</option>
              <option value="Gambia" id="GM">Gambia</option>
              <option value="Georgia" id="GE">Georgia</option>
              <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
              <option value="Ghana" id="GH">Ghana</option>
              <option value="Gibraltar" id="GI">Gibraltar</option>
              <option value="Granada" id="GD">Granada</option>
              <option value="Grecia" id="GR">Grecia</option>
              <option value="Groenlandia" id="GL">Groenlandia</option>
              <option value="Guadalupe" id="GP">Guadalupe</option>
              <option value="Guam" id="GU">Guam</option>
              <option value="Guatemala" id="GT">Guatemala</option>
              <option value="Guayana" id="GY">Guayana</option>
              <option value="Guayana francesa" id="GF">Guayana francesa</option>
              <option value="Guinea" id="GN">Guinea</option>
              <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
              <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
              <option value="Haití" id="HT">Haití</option>
              <option value="Holanda" id="NL">Holanda</option>
              <option value="Honduras" id="HN">Honduras</option>
              <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
              <option value="Hungría" id="HU">Hungría</option>
              <option value="India" id="IN">India</option>
              <option value="Indonesia" id="ID">Indonesia</option>
              <option value="Irak" id="IQ">Irak</option>
              <option value="Irán" id="IR">Irán</option>
              <option value="Irlanda" id="IE">Irlanda</option>
              <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
              <option value="Isla Christmas" id="CX">Isla Christmas</option>
              <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
              <option value="Islandia" id="IS">Islandia</option>
              <option value="Islas Caimán" id="KY">Islas Caimán</option>
              <option value="Islas Cook" id="CK">Islas Cook</option>
              <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
              <option value="Islas Faroe" id="FO">Islas Faroe</option>
              <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
              <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
              <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
              <option value="Islas Marshall" id="MH">Islas Marshall</option>
              <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
              <option value="Islas Palau" id="PW">Islas Palau</option>
              <option value="Islas Salomón" d="SB">Islas Salomón</option>
              <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
              <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
              <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
              <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
              <option value="Israel" id="IL">Israel</option>
              <option value="Italia" id="IT">Italia</option>
              <option value="Jamaica" id="JM">Jamaica</option>
              <option value="Japón" id="JP">Japón</option>
              <option value="Jordania" id="JO">Jordania</option>
              <option value="Kazajistán" id="KZ">Kazajistán</option>
              <option value="Kenia" id="KE">Kenia</option>
              <option value="Kirguizistán" id="KG">Kirguizistán</option>
              <option value="Kiribati" id="KI">Kiribati</option>
              <option value="Kuwait" id="KW">Kuwait</option>
              <option value="Laos" id="LA">Laos</option>
              <option value="Lesoto" id="LS">Lesoto</option>
              <option value="Letonia" id="LV">Letonia</option>
              <option value="Líbano" id="LB">Líbano</option>
              <option value="Liberia" id="LR">Liberia</option>
              <option value="Libia" id="LY">Libia</option>
              <option value="Liechtenstein" id="LI">Liechtenstein</option>
              <option value="Lituania" id="LT">Lituania</option>
              <option value="Luxemburgo" id="LU">Luxemburgo</option>
              <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
              <option value="Madagascar" id="MG">Madagascar</option>
              <option value="Malasia" id="MY">Malasia</option>
              <option value="Malawi" id="MW">Malawi</option>
              <option value="Maldivas" id="MV">Maldivas</option>
              <option value="Malí" id="ML">Malí</option>
              <option value="Malta" id="MT">Malta</option>
              <option value="Marruecos" id="MA">Marruecos</option>
              <option value="Martinica" id="MQ">Martinica</option>
              <option value="Mauricio" id="MU">Mauricio</option>
              <option value="Mauritania" id="MR">Mauritania</option>
              <option value="Mayotte" id="YT">Mayotte</option>
              <option value="México" id="MX">México</option>
              <option value="Micronesia" id="FM">Micronesia</option>
              <option value="Moldavia" id="MD">Moldavia</option>
              <option value="Mónaco" id="MC">Mónaco</option>
              <option value="Mongolia" id="MN">Mongolia</option>
              <option value="Montserrat" id="MS">Montserrat</option>
              <option value="Mozambique" id="MZ">Mozambique</option>
              <option value="Namibia" id="NA">Namibia</option>
              <option value="Nauru" id="NR">Nauru</option>
              <option value="Nepal" id="NP">Nepal</option>
              <option value="Nicaragua" id="NI">Nicaragua</option>
              <option value="Níger" id="NE">Níger</option>
              <option value="Nigeria" id="NG">Nigeria</option>
              <option value="Niue" id="NU">Niue</option>
              <option value="Norfolk" id="NF">Norfolk</option>
              <option value="Noruega" id="NO">Noruega</option>
              <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
              <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
              <option value="Omán" id="OM">Omán</option>
              <option value="Panamá" id="PA">Panamá</option>
              <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
              <option value="Paquistán" id="PK">Paquistán</option>
              <option value="Paraguay" id="PY">Paraguay</option>
              <option value="Perú" id="PE">Perú</option>
              <option value="Pitcairn" id="PN">Pitcairn</option>
              <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
              <option value="Polonia" id="PL">Polonia</option>
              <option value="Portugal" id="PT">Portugal</option>
              <option value="Puerto Rico" id="PR">Puerto Rico</option>
              <option value="Qatar" id="QA">Qatar</option>
              <option value="Reino Unido" id="UK">Reino Unido</option>
              <option value="República Centroafricana" id="CF">República Centroafricana</option>
              <option value="República Checa" id="CZ">República Checa</option>
              <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
              <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
              <option value="República Dominicana" id="DO">República Dominicana</option>
              <option value="Reunión" id="RE">Reunión</option>
              <option value="Ruanda" id="RW">Ruanda</option>
              <option value="Rumania" id="RO">Rumania</option>
              <option value="Rusia" id="RU">Rusia</option>
              <option value="Samoa" id="WS">Samoa</option>
              <option value="Samoa occidental" id="AS">Samoa occidental</option>
              <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
              <option value="San Marino" id="SM">San Marino</option>
              <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
              <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
              <option value="Santa Helena" id="SH">Santa Helena</option>
              <option value="Santa Lucía" id="LC">Santa Lucía</option>
              <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
              <option value="Senegal" id="SN">Senegal</option>
              <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
              <option value="Sychelles" id="SC">Seychelles</option>
              <option value="Sierra Leona" id="SL">Sierra Leona</option>
              <option value="Singapur" id="SG">Singapur</option>
              <option value="Siria" id="SY">Siria</option>
              <option value="Somalia" id="SO">Somalia</option>
              <option value="Sri Lanka" id="LK">Sri Lanka</option>
              <option value="Suazilandia" id="SZ">Suazilandia</option>
              <option value="Sudán" id="SD">Sudán</option>
              <option value="Suecia" id="SE">Suecia</option>
              <option value="Suiza" id="CH">Suiza</option>
              <option value="Surinam" id="SR">Surinam</option>
              <option value="Svalbard" id="SJ">Svalbard</option>
              <option value="Tailandia" id="TH">Tailandia</option>
              <option value="Taiwán" id="TW">Taiwán</option>
              <option value="Tanzania" id="TZ">Tanzania</option>
              <option value="Tayikistán" id="TJ">Tayikistán</option>
              <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
              <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
              <option value="Timor Oriental" id="TP">Timor Oriental</option>
              <option value="Togo" id="TG">Togo</option>
              <option value="Tonga" id="TO">Tonga</option>
              <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
              <option value="Túnez" id="TN">Túnez</option>
              <option value="Turkmenistán" id="TM">Turkmenistán</option>
              <option value="Turquía" id="TR">Turquía</option>
              <option value="Tuvalu" id="TV">Tuvalu</option>
              <option value="Ucrania" id="UA">Ucrania</option>
              <option value="Uganda" id="UG">Uganda</option>
              <option value="Uruguay" id="UY">Uruguay</option>
              <option value="Uzbekistán" id="UZ">Uzbekistán</option>
              <option value="Vanuatu" id="VU">Vanuatu</option>
              <option value="Venezuela" id="VE">Venezuela</option>
              <option value="Vietnam" id="VN">Vietnam</option>
              <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
              <option value="Yemen" id="YE">Yemen</option>
              <option value="Zambia" id="ZM">Zambia</option>
              <option value="Zimbabue" id="ZW">Zimbabue</option>
            </select>
    
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 
    </form>

    <form class="formulario-registro" method="POST" action="{{ route('arbitro.auth')}}" >
        @csrf
        <h2>Crear arbitro</h2>
            
        <label class="label" for="nombreArbitro">
        <input class="input" id="nombreArbitro" type="text" name="nombreArbitro" placeholder="Nombre arbitro" >
        <label class="label" for="apellidoArbitro">
        <input class="input" id="apellidoArbitro" type="text" name="apellidoArbitro" placeholder="Apellido arbitro" >
        </label>
        <select class="pais input" name="paisArbitro">
              <option value="Elegir" id="AF">Seleccione su país</option>
              <option value="Afganistán" id="AF">Afganistán</option>
              <option value="Albania" id="AL">Albania</option>
              <option value="Alemania" id="DE">Alemania</option>
              <option value="Andorra" id="AD">Andorra</option>
              <option value="Angola" id="AO">Angola</option>
              <option value="Anguila" id="AI">Anguila</option>
              <option value="Antártida" id="AQ">Antártida</option>
              <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
              <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
              <option value="Argelia" id="DZ">Argelia</option>
              <option value="Argentina" id="AR">Argentina</option>
              <option value="Armenia" id="AM">Armenia</option>
              <option value="Aruba" id="AW">Aruba</option>
              <option value="Australia" id="AU">Australia</option>
              <option value="Austria" id="AT">Austria</option>
              <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
              <option value="Bahamas" id="BS">Bahamas</option>
              <option value="Bahrein" id="BH">Bahrein</option>
              <option value="Bangladesh" id="BD">Bangladesh</option>
              <option value="Barbados" id="BB">Barbados</option>
              <option value="Bélgica" id="BE">Bélgica</option>
              <option value="Belice" id="BZ">Belice</option>
              <option value="Benín" id="BJ">Benín</option>
              <option value="Bermudas" id="BM">Bermudas</option>
              <option value="Bhután" id="BT">Bhután</option>
              <option value="Bielorrusia" id="BY">Bielorrusia</option>
              <option value="Birmania" id="MM">Birmania</option>
              <option value="Bolivia" id="BO">Bolivia</option>
              <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
              <option value="Botsuana" id="BW">Botsuana</option>
              <option value="Brasil" id="BR">Brasil</option>
              <option value="Brunei" id="BN">Brunei</option>
              <option value="Bulgaria" id="BG">Bulgaria</option>
              <option value="Burkina Faso" id="BF">Burkina Faso</option>
              <option value="Burundi" id="BI">Burundi</option>
              <option value="Cabo Verde" id="CV">Cabo Verde</option>
              <option value="Camboya" id="KH">Camboya</option>
              <option value="Camerún" id="CM">Camerún</option>
              <option value="Canadá" id="CA">Canadá</option>
              <option value="Chad" id="TD">Chad</option>
              <option value="Chile" id="CL">Chile</option>
              <option value="China" id="CN">China</option>
              <option value="Chipre" id="CY">Chipre</option>
              <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
              <option value="Colombia" id="CO">Colombia</option>
              <option value="Comores" id="KM">Comores</option>
              <option value="Congo" id="CG">Congo</option>
              <option value="Corea" id="KR">Corea</option>
              <option value="Corea del Norte" id="KP">Corea del Norte</option>
              <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
              <option value="Costa Rica" id="CR">Costa Rica</option>
              <option value="Croacia" id="HR">Croacia</option>
              <option value="Cuba" id="CU">Cuba</option>
              <option value="Dinamarca" id="DK">Dinamarca</option>
              <option value="Djibouri" id="DJ">Djibouri</option>
              <option value="Dominica" id="DM">Dominica</option>
              <option value="Ecuador" id="EC">Ecuador</option>
              <option value="Egipto" id="EG">Egipto</option>
              <option value="El Salvador" id="SV">El Salvador</option>
              <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
              <option value="Eritrea" id="ER">Eritrea</option>
              <option value="Eslovaquia" id="SK">Eslovaquia</option>
              <option value="Eslovenia" id="SI">Eslovenia</option>
              <option value="España" id="ES">España</option>
              <option value="Estados Unidos" id="US">Estados Unidos</option>
              <option value="Estonia" id="EE">Estonia</option>
              <option value="c" id="ET">Etiopía</option>
              <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
              <option value="Filipinas" id="PH">Filipinas</option>
              <option value="Finlandia" id="FI">Finlandia</option>
              <option value="Francia" id="FR">Francia</option>
              <option value="Gabón" id="GA">Gabón</option>
              <option value="Gambia" id="GM">Gambia</option>
              <option value="Georgia" id="GE">Georgia</option>
              <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
              <option value="Ghana" id="GH">Ghana</option>
              <option value="Gibraltar" id="GI">Gibraltar</option>
              <option value="Granada" id="GD">Granada</option>
              <option value="Grecia" id="GR">Grecia</option>
              <option value="Groenlandia" id="GL">Groenlandia</option>
              <option value="Guadalupe" id="GP">Guadalupe</option>
              <option value="Guam" id="GU">Guam</option>
              <option value="Guatemala" id="GT">Guatemala</option>
              <option value="Guayana" id="GY">Guayana</option>
              <option value="Guayana francesa" id="GF">Guayana francesa</option>
              <option value="Guinea" id="GN">Guinea</option>
              <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
              <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
              <option value="Haití" id="HT">Haití</option>
              <option value="Holanda" id="NL">Holanda</option>
              <option value="Honduras" id="HN">Honduras</option>
              <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
              <option value="Hungría" id="HU">Hungría</option>
              <option value="India" id="IN">India</option>
              <option value="Indonesia" id="ID">Indonesia</option>
              <option value="Irak" id="IQ">Irak</option>
              <option value="Irán" id="IR">Irán</option>
              <option value="Irlanda" id="IE">Irlanda</option>
              <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
              <option value="Isla Christmas" id="CX">Isla Christmas</option>
              <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
              <option value="Islandia" id="IS">Islandia</option>
              <option value="Islas Caimán" id="KY">Islas Caimán</option>
              <option value="Islas Cook" id="CK">Islas Cook</option>
              <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
              <option value="Islas Faroe" id="FO">Islas Faroe</option>
              <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
              <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
              <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
              <option value="Islas Marshall" id="MH">Islas Marshall</option>
              <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
              <option value="Islas Palau" id="PW">Islas Palau</option>
              <option value="Islas Salomón" d="SB">Islas Salomón</option>
              <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
              <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
              <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
              <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
              <option value="Israel" id="IL">Israel</option>
              <option value="Italia" id="IT">Italia</option>
              <option value="Jamaica" id="JM">Jamaica</option>
              <option value="Japón" id="JP">Japón</option>
              <option value="Jordania" id="JO">Jordania</option>
              <option value="Kazajistán" id="KZ">Kazajistán</option>
              <option value="Kenia" id="KE">Kenia</option>
              <option value="Kirguizistán" id="KG">Kirguizistán</option>
              <option value="Kiribati" id="KI">Kiribati</option>
              <option value="Kuwait" id="KW">Kuwait</option>
              <option value="Laos" id="LA">Laos</option>
              <option value="Lesoto" id="LS">Lesoto</option>
              <option value="Letonia" id="LV">Letonia</option>
              <option value="Líbano" id="LB">Líbano</option>
              <option value="Liberia" id="LR">Liberia</option>
              <option value="Libia" id="LY">Libia</option>
              <option value="Liechtenstein" id="LI">Liechtenstein</option>
              <option value="Lituania" id="LT">Lituania</option>
              <option value="Luxemburgo" id="LU">Luxemburgo</option>
              <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
              <option value="Madagascar" id="MG">Madagascar</option>
              <option value="Malasia" id="MY">Malasia</option>
              <option value="Malawi" id="MW">Malawi</option>
              <option value="Maldivas" id="MV">Maldivas</option>
              <option value="Malí" id="ML">Malí</option>
              <option value="Malta" id="MT">Malta</option>
              <option value="Marruecos" id="MA">Marruecos</option>
              <option value="Martinica" id="MQ">Martinica</option>
              <option value="Mauricio" id="MU">Mauricio</option>
              <option value="Mauritania" id="MR">Mauritania</option>
              <option value="Mayotte" id="YT">Mayotte</option>
              <option value="México" id="MX">México</option>
              <option value="Micronesia" id="FM">Micronesia</option>
              <option value="Moldavia" id="MD">Moldavia</option>
              <option value="Mónaco" id="MC">Mónaco</option>
              <option value="Mongolia" id="MN">Mongolia</option>
              <option value="Montserrat" id="MS">Montserrat</option>
              <option value="Mozambique" id="MZ">Mozambique</option>
              <option value="Namibia" id="NA">Namibia</option>
              <option value="Nauru" id="NR">Nauru</option>
              <option value="Nepal" id="NP">Nepal</option>
              <option value="Nicaragua" id="NI">Nicaragua</option>
              <option value="Níger" id="NE">Níger</option>
              <option value="Nigeria" id="NG">Nigeria</option>
              <option value="Niue" id="NU">Niue</option>
              <option value="Norfolk" id="NF">Norfolk</option>
              <option value="Noruega" id="NO">Noruega</option>
              <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
              <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
              <option value="Omán" id="OM">Omán</option>
              <option value="Panamá" id="PA">Panamá</option>
              <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
              <option value="Paquistán" id="PK">Paquistán</option>
              <option value="Paraguay" id="PY">Paraguay</option>
              <option value="Perú" id="PE">Perú</option>
              <option value="Pitcairn" id="PN">Pitcairn</option>
              <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
              <option value="Polonia" id="PL">Polonia</option>
              <option value="Portugal" id="PT">Portugal</option>
              <option value="Puerto Rico" id="PR">Puerto Rico</option>
              <option value="Qatar" id="QA">Qatar</option>
              <option value="Reino Unido" id="UK">Reino Unido</option>
              <option value="República Centroafricana" id="CF">República Centroafricana</option>
              <option value="República Checa" id="CZ">República Checa</option>
              <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
              <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
              <option value="República Dominicana" id="DO">República Dominicana</option>
              <option value="Reunión" id="RE">Reunión</option>
              <option value="Ruanda" id="RW">Ruanda</option>
              <option value="Rumania" id="RO">Rumania</option>
              <option value="Rusia" id="RU">Rusia</option>
              <option value="Samoa" id="WS">Samoa</option>
              <option value="Samoa occidental" id="AS">Samoa occidental</option>
              <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
              <option value="San Marino" id="SM">San Marino</option>
              <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
              <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
              <option value="Santa Helena" id="SH">Santa Helena</option>
              <option value="Santa Lucía" id="LC">Santa Lucía</option>
              <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
              <option value="Senegal" id="SN">Senegal</option>
              <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
              <option value="Sychelles" id="SC">Seychelles</option>
              <option value="Sierra Leona" id="SL">Sierra Leona</option>
              <option value="Singapur" id="SG">Singapur</option>
              <option value="Siria" id="SY">Siria</option>
              <option value="Somalia" id="SO">Somalia</option>
              <option value="Sri Lanka" id="LK">Sri Lanka</option>
              <option value="Suazilandia" id="SZ">Suazilandia</option>
              <option value="Sudán" id="SD">Sudán</option>
              <option value="Suecia" id="SE">Suecia</option>
              <option value="Suiza" id="CH">Suiza</option>
              <option value="Surinam" id="SR">Surinam</option>
              <option value="Svalbard" id="SJ">Svalbard</option>
              <option value="Tailandia" id="TH">Tailandia</option>
              <option value="Taiwán" id="TW">Taiwán</option>
              <option value="Tanzania" id="TZ">Tanzania</option>
              <option value="Tayikistán" id="TJ">Tayikistán</option>
              <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
              <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
              <option value="Timor Oriental" id="TP">Timor Oriental</option>
              <option value="Togo" id="TG">Togo</option>
              <option value="Tonga" id="TO">Tonga</option>
              <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
              <option value="Túnez" id="TN">Túnez</option>
              <option value="Turkmenistán" id="TM">Turkmenistán</option>
              <option value="Turquía" id="TR">Turquía</option>
              <option value="Tuvalu" id="TV">Tuvalu</option>
              <option value="Ucrania" id="UA">Ucrania</option>
              <option value="Uganda" id="UG">Uganda</option>
              <option value="Uruguay" id="UY">Uruguay</option>
              <option value="Uzbekistán" id="UZ">Uzbekistán</option>
              <option value="Vanuatu" id="VU">Vanuatu</option>
              <option value="Venezuela" id="VE">Venezuela</option>
              <option value="Vietnam" id="VN">Vietnam</option>
              <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
              <option value="Yemen" id="YE">Yemen</option>
              <option value="Zambia" id="ZM">Zambia</option>
              <option value="Zimbabue" id="ZW">Zimbabue</option>
            </select>
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div>
    </form>

    <form class="formulario-registro" method="POST" action="{{ route('resultado.auth')}}" >
        @csrf
        <h2>Crear Resultado</h2>

        <select class="pais input seccion mn-bottom" id="eventoResultado" name="eventoResultado">
            <option value=""> -- Seleccione Evento --</option>
            @foreach ($eventos as $evento)
            <option value="{{$evento->idEvento}}"> {{$evento->nombreEvento}} </option>
            @endforeach
        </select>

            <table class="table table-bordered mn-bottom" id="dynamicAddRemove">
                <tr>
                    <th>Número set</th>
                    <th>Nombre local</th>
                    <th>Puntos Local</th>
                    <th>Nombre Visitante</th>
                    <th>Puntos visitante</th>
                </tr>
                <tr id="set">
                    <td><input type="text" name="Set[0][nro_set]" placeholder="Nro set" class="form-control" /></td>
                    <td><input type="text" name="Equipolocalset" placeholder="Equipo local" class="form-control" disabled/></td> 
                    <td><input type="text" name="Set[0][puntos_local]" placeholder="Puntos local" class="form-control" /></td>
                    <td><input type="text" name="Equipolocalvisitante" placeholder="Equipo visitante" class="form-control" disabled/></td>
                    <td><input type="text" name="Set[0][puntos_visitante]" placeholder="Puntos visitante" class="form-control" /></td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Añadir Set</button></td>
                </tr>
            </table>
            
            <table class="table table-bordered mn-bottom" id="dynamicAddRemove2">

                <tr>
                    <th>Equipo</th>
                    <th>Jugador</th>
                    <th>Marca</th>
                    <th>Nueva marca</th>
                </tr>
                    <tr id="0">
                        <td>
                            <select class="pais input" id="equipoMarca" name="Marca[0][equipoMarca]">
                                <option value=""> -- Seleccione Equipo --</option>
                                @foreach ($equipos as $equipo)
                                    <option value="{{$equipo->idEquipo}}"> {{$equipo->nombreEquipo}} </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select class="pais input" id="jugadorMarca" name="Marca[0][jugadorMarca]">
                                <option value=""> -- Seleccione Jugador --</option>
                            </select>
                        </td>

                        <td id="marca">
                            <input type="text" name="Marca[0][marca]" placeholder="Ingrese marca" class="form-control" />
                        </td>

                        <td>
                            <button type="button" name="add" id="dynamic-ar2" class="btn btn-outline-primary">Añadir nueva marca</button>
                        </td>
                    </tr>
            </table>

            <table class="table table-bordered mn-bottom" id="dynamicAddRemove3">
                <tr>
                    <th>Nombre local</th>
                    <th>Tantos local</th>
                    <th>Nombre visitante</th>
                    <th>Tantos visitante</th>
                </tr>
                <tr id="tanto">
                    <td><input type="text" name="NombreTantoLocal" placeholder="Equipo local" class="form-control" disabled /></td>
                    <td><input type="text" name="Tanto[tanto_local]" placeholder="Ingrese tanto local" class="form-control" /></td>
                    <td><input type="text" name="NombreTantoVisitante" placeholder="Equipo Visitante" class="form-control" disabled /></td>
                    <td><input type="text" name="Tanto[tanto_visitante]" placeholder="Ingrese tanto visitante" class="form-control" /></td>
                </tr>
            </table>

        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>


@endsection