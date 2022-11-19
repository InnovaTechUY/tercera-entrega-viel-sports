$(document).ready(function () {

    $("#arrow1").click(function (event) {

        event.preventDefault();
        arrow1("#arrow1", "#contenido-arrow1", "#informacion1")
    });

    $("#arrow2").click(function (event) {

        event.preventDefault();
        arrow2("#arrow2", "#contenido-arrow2", ".preguntas__contenido")
    });

    $("#arrow3").click(function (event) {

        event.preventDefault();
        arrow1("#arrow3", "#contenido-arrow3", "#informacion3")
    });


    function arrow1(id1, id2, id3) {
        let contenido = $(`${id2}`);
        let texto = $(`${id3}.nosotros__headding`);

        contenido.slideToggle("slow");

        $(id1).toggleClass('arrow__transformacion')

    }

    function arrow2(id1, id2, id3) {
        let contenido = $(`${id2}.contenido-arrow`);
        let texto = $(`${id3}`);

        $coso = contenido.slideToggle("slow", function () {

        });

        setTimeout(() => {
            $(id3).animate({ opacity: 1.0 }, 300);
        }, 800);


        $(id1).toggleClass('arrow__transformacion');

    }

    $(function () {
        ListadoDeportes();
    });

    async function ListadoDeportes() {

        const listaDeportes = 'http://localhost:8002/api/deportes';

        //fetch(listaDeportes)

        const resultadoDeportes = await fetch(listaDeportes);
        const datosDeportes = await resultadoDeportes.json();

        var deportes = datosDeportes.deportes;

        const listadoDeportes = deportes.map(elemento =>
            `<li id="${elemento.idDeporte}" class="resultados__enlace ">${elemento.nombreDeporte}</li>`
        );

        $('#seccion-resultados').append(listadoDeportes);


        var enlace = $('div.seccion-resultados > li.resultados__enlace');

        enlace.click(function () {
            var deporte = $(this).attr('id');

            async function eventos() {
                const listaEventos = `http://localhost:8002/api/eventos/${deporte}`;

                //fetch(listaEventos)

                const resultadoEventos = await fetch(listaEventos);
                const datosEventos = await resultadoEventos.json();

                var eventos = datosEventos.eventos;

                /*----------------------------------------------------------------------------------*/

                const idEventos = eventos.map(elemento =>
                    elemento.idEvento
                );

                const listaEquipos = `http://localhost:8002/api/equipos/${idEventos}`;


                //fetch(listaEquipos)

                const resultadoEquipos = await fetch(listaEquipos);
                const datosEquipos = await resultadoEquipos.json();

                var local = datosEquipos.local.map(element =>
                    `
                    <div class="equipo">
                        <p>${element.nombreEquipo}</p>
                        <p class="puntaje">0</p>
                    </div>
                    `
                );

                var visitante = datosEquipos.visitante.map(element =>
                    `
                    <div class="equipo">
                        <p>${element.nombreEquipo}</p>
                        <p class="puntaje">0</p>
                    </div>
                `);

                const listadoEventos = eventos.map(elemento =>
                    `              
                    <section id="${elemento.idEvento}" class="contenedor__resultados filtro"> 
                    <div class="contenido__resultados box-shadow ">
                        <h5>${elemento.nombreEvento}</h5>
                        <div class="resultados__info">
                            <div class="resultado">
                                ${local}
                                ${visitante}
                        </div>
                        </div>
                
                        <div class="resultado">
                            <div class="resultados__datos">
                                <h6>Fecha:</h6>
                                <p id="fecha">${elemento.fechaEvento}</p>
                            </div>
                        
                            <div class="resultados__datos">
                                <h6>Lugar:</h6>  
                            <p id="lugar">${elemento.lugarEvento}</p>
                            </div>
                        
                            <div class="resultados__datos">
                                <h6>Horario:</h6>  
                                <p id="horario">${elemento.horarioEvento}</p>
                            </div>

                        </div>
                    </div>
                </section>
                `);
                const contenedor = $('#deporte');
                contenedor.empty();
                contenedor.append(listadoEventos);

            }

            eventos();

        })
        $(function () {
            datosUsuario();
        });

        async function datosUsuario() {

            var correo = $('#correo').text();

            const Usuario = `http://localhost:8000/api/usuario/${correo}`;

            const resultadoUsuario = await fetch(Usuario);
            const datosUsuario = await resultadoUsuario.json();

            var usuario = datosUsuario.usuario;
            var UsuarioSuscripto = datosUsuario.usuarioSuscripto;

            console.log(UsuarioSuscripto);

            const usuarioNormal = usuario.map(element =>
                `
                <div class="contenido-info">
                    <h4>Nombre:</h4>
                    <p>${element.name}</p>
                </div>
                `
            );

            const usuarioSuscripto = UsuarioSuscripto.map(element =>

                `<div class="contenido-info">
                    <h4>fecha de nacimiento:</h4>
                <p>${element.fechaNacimiento}</p>
                </div>
    
                <div class="contenido-info">
                    <h4>telefono:</h4>
                <p>${element.telefono}</p>
                </div>
    
                <div class="contenido-info">
                    <h4>Pais:</h4>
                    <p>${element.pais}</p> 
                </div>
    
                <div class="contenido-info">
                    <h4>Documento Identificador:</h4>
                    <p>${element.documento_identificador}</p> 
                </div>
              `
            );

            $('#nombreUsuario').append(usuarioNormal);

            $('#datosUsuario').append(usuarioSuscripto);
        }





    }

});

