$(document).ready(function () {
    var i = 0;
    var i2 = 0;


    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove")
            .append('<tr><td><input type="text" name="Set['+i+'][nro_set]" placeholder="Nro set" class="form-control" required /></td>'+
            '<td><input type="text" name="" placeholder="Equipo local" class="form-control" disabled required/></td>'+
            '<td><input type="text" name="Set['+i+'][puntos_local]" placeholder="Puntos local" class="form-control" required/></td>'+
            '<td><input type="text" name="" placeholder="Equipo Visitante" class="form-control" disabled required/></td>'+
            '<td><input type="text" name="Set['+i+'][puntos_visitante]" placeholder="Puntos visitante" class="form-control" required/></td>'+
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            )

    });


    $(function () {
        
        $("#dynamic-ar2").click(function () {
            i2++;
            listaEquipos();
/* 
            console.log($('#equipoMarca'));
            
            console.log($(`#${i2}`));
            
            console.log($(`#dynamicAddRemove2 > tbody > #${i2}`));
        
            var equipos = $(`#equipoMarca${i2}`).map(element => {
                console.log(element);
            });
 */
            //console.log(equipos); 
            
        });



        

       // console.log($('#equipos'));
     $('#equipoMarca').on('change',ActualizarDatos);  

     $('#eventoEquipoIndividual').on('change',ActualizarEquiposEventos);

    });

    async function listaEquipos() {

        const archivo = 'http://localhost:8004/api/resultados/equipos';

        //fetch(archivo)

        const resultado = await fetch(archivo);
        const datos = await resultado.json();

        const listadoEquipos = datos.map( elemento => 

            `
            <option value="${elemento.idEquipo}"> ${elemento.nombreEquipo} </option>
            ` 
            );

        const cadaSelectito = `
                    <select class="pais input select_equipos" id="equipoMarca${i2}" name="Marca[${i2}][equipoMarca]" required>
                        <option value=""> -- Seleccione un Equipo --</option>
                        ${listadoEquipos}
                    </select>
        `;

        const listitaEquipito = 
                `
                <tr id="${i2}">
                    <td>
                         ${cadaSelectito}
                    </td>


                    <td>
                        <select class="pais input" id="jugadorMarca${i2}" name="Marca[${i2}][jugadorMarca] required">
                            <option value=""> -- Seleccione Jugador --</option>
                        </select>
                    </td>

                    <td id="marca${i2}">
                        <input type="text" name="Marca[${i2}][marca]" placeholder="Ingrese marca" class="form-control" required/>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger remove-input-field block">Delete</button>
                    </td>
                </tr>`;

               $("#dynamicAddRemove2 > tbody").append(listitaEquipito); 
            
       
    }

    
    async function ActualizarDatos() {

    var id = $(this).val();

    const archivo = `http://localhost:8004/api/resultados/${id}`;

        //fetch(archivo)

        const resultado = await fetch(archivo);
        const datos = await resultado.json();

        $('#jugadorMarca').empty();
        $('#jugadorMarca').append('<option value=""> -- Seleccione Jugador --</option>')
        datos.forEach(element => {
            var jugadores = $('#jugadorMarca');
            jugadores.append(`<option value="${element.idPersona}"> ${element.nombre} </option>`)
            
        }); 
  
    }

    async function ActualizarEquiposEventos() {

    var id = $(this).val();

    const archivo = `http://localhost:8004/api/resultados/${id}`;

        //fetch(archivo)

        const resultado = await fetch(archivo);
        const datos = await resultado.json();

        $('#jugadorEvento').empty();
        $('#jugadorEvento').append('<option value=""> -- Seleccione Jugador --</option>')
        datos.forEach(element => {
            var jugadores = $('#jugadorEvento');
            jugadores.append(`<option value="${element.idPersona}"> ${element.nombre} </option>`)
            
        }); 
    
    }

    $("#eventoResultado").change(function () {
        
        //$("#set > td > input,button,select").prop("disabled",true);
        //$("#dynamicAddRemove2 > #tbody2 > tr > td > select,input,button ").prop("disabled",true);
        //$("#tanto > td > input,button").prop("disabled",true);
        $(this).prop("disabled",false);
       // uno.prop("disabled");

        /* $("input").prop( "disabled", false);
        
        var selectedSubject = $("#seccion option:selected").val();

        var coso = $(`div:not(#${selectedSubject}) > input` );
        coso.prop( "disabled", true);
        coso.val(""); */


    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

});
