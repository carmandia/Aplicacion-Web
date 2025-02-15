<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Pag_Inicio.css">
    <link rel="stylesheet" href="Pag_Img.css">
    <link rel="stylesheet" href="General.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container ml-4">
        <main>
            <h1><a href="#Inicio_pag" class="navbar-brand d-flex justify-content-center">Ciclismo. Un deporte infravalorado</a></h1>
        </main>
        <nav class="navbar navbar-expand bg-dark navbar-dark">
            <h1><a href="#Inicio_pag" class="navbar-brand d-flex justify-content-center">Ciclismo. Un deporte infravalorado</a></h1>
            <ul class="navbar-nav nav">
                <li class="nav-item">
                <a href="#Inicio_pag" class="nav-link active" data-bs-toggle="tab">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="#Equipos_pag" class="nav-link" data-bs-toggle="tab">Equipos</a>
                </li>
                <li class="nav-item">
                    <a href="#Juego" class="nav-link" data-bs-toggle="tab">Juego</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#informacion" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Informacion</a>
                    <div class="dropdown-menu">
                        <a href="#form_equipo" class="dropdown-item" data-bs-toggle="tab">Equipos</a>
                        <a href="#form_corredor" class="dropdown-item" data-bs-toggle="tab">Corredores</a>
                        <a href="#form_carrera" class="dropdown-item" data-bs-toggle="tab">Carreras</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#Enlaces" class="nav-link" data-bs-toggle="tab">Informacion adicional</a>
                </li>
                <div class="d-flex justify-content-end">
                    <form class="form-inline d-flex space-between">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </ul>
        </nav>
        <div class="tab-content mt-3">
            <div id="Inicio_pag" class="tab-pane active">
                <div id="carrusel_inicio" class="carousel slide mt-2" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carrusel_inicio" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carrusel_inicio" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carrusel_inicio" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Imagenes/img_informacion.jpg" class="d-block w-60">
                        </div>
                        <div class="carousel-item">
                            <img src="Imagenes/Carrusel_2.webp" class="d-block w-60">
                        </div>
                        <div class="carousel-item">
                            <img src="Imagenes/carrusel_3.jpg" class="d-block w-60">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carrusel_inicio" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carrusel_inicio" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
                <div id="Parrafos_pag_inicio">
                    <p>
                    Todos hemos escuchado las tipicas frases como que aburrido es el ciclismo, lo unico bueno que tiene es que me puedo echar la siesta
                    viendo el Tour de Francia, o los corredores van todos dopados porque nadie aguantaria esos niveles de esfuerzo sin meterse cosas.
                    Sin embargo muy pocos ponen en valor la belleza de este deporte, el cual combina la emocion de unas personas yendo al limite de su capacidad
                    por carreteras en las que casi nadie es capaz de atreverse a afrontar, como los sectores de paves en carreras como la Roubaix o el mitico 
                    Zoncolan en el Giro d'Italia, junto con una ristra de paisajes que permite a las organizaciones mostrar el distintos lugares para atraer 
                    el turismo a esa region, a parte de inculcar a la gente el uso de la bicicleta como medio sostenible de movilidad en estos tiempos.
                    </p>
                    <p>
                    A lo largo de esta pagina podra consultar informacion acerca de los equipos corredores, carreras e incluso jugar a un juego si se hacerlo.
                    En ella podra, ademas de acceder a esa informacion, actualizarla respecto a la nuevas situaciones que se vayan generando en el mundo del ciclismo,
                    insertar nuevos elementos  y modificar elementos si no los cree adecuado
                    </p>
                </div>
            </div>
            <div id="Equipos_pag" class="tab-pane">
                <div class="row">
                    <?php
                    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
                    $user = 'root';
                    $pass = '';
                    $conn = new PDO($db,$user,$pass);
                    $sql = "SELECT distinct nombre, abreviacion, maillot FROM equipo";
                    $cons = $conn->query($sql);
                    $res = $cons->fetchAll(PDO::FETCH_ASSOC);/* Con esto decidimos como recorrer los elementos*/
                    foreach ($res as $fila) {
                        echo "<div class='col-md-4 mt-2'>";
                        echo "<div class='card cartel'  style='width: 18rem;'>";
                                echo "<img src=" .$fila['maillot']. " class=' maillot' alt='Espere a que cargue la imagen'>";
                                echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'>" . $fila['abreviacion'] . "</h5>";
                                    echo "<p class='card-text'>" . $fila['nombre'] . "</p>";
                                    echo "<a href='#' class='btn btn-primary'>Go somewhere</a>";
                                echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    };
                    $conn=null;
                    ?>
                </div>
            </div>
            <div id="Juego" class="tab-pane">
                <ul class="nav nav-tabs bg-dark">
                    <li class="nav-item">
                        <a href="#Clasica" class="nav-link active" data-bs-toggle="tab">Clasica</a>
                    </li>
                    <li>
                        <a href="#Vuelta" class="nav-link" data-bs-toggle="tab">Vuelta por etapas</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="Clasica" class="tab-pane active">
                        <p>En este apartado podra confeccionar una alineacion de 7 corredores para una clasica</p>
                    </div>
                    <div id="Vuelta" class="tab-pane">
                    <p>En este apartado podra confeccionar una alineacion de 8 corredores para una vuelta por etapa</p>
                    </div>
                </div>
            </div>
            <div id="form_equipo" class="tab-pane">
                <p>
                    En este apartado podra realizar acciones respecto a los distintos equipos ciclistas.
                </p>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Consultar
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="equipos.php" method="post">
                                <label for="" class="form-cotrol">Nombre</label>
                                <select name="nombre" id="nombre" class="form-select">
                                    <?php
                                        $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
                                        $user = 'root';
                                        $pass = '';
                                        $conn = new PDO($db,$user,$pass);
                                        $sql = "SELECT * FROM equipo";
                                        $sal = null;
                                        foreach ($conn->query($sql) as $fila){
                                            $sal .= "<option value='" . $fila["Nombre"] . "'>" . $fila["Nombre"] . "</option>";
                                        }
                                        echo $sal;
                                        $conn=null;
                                    ?>
                                </select>
                                <div class="d-flex justify-content-end mt-1">
                                <button type="submit" name="Con" class="btn btn-dark">Enviar</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Insertar
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Actualizar
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Eliminar
                        </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    </div>
            </div>
            <div id="Enlaces" class="tab-pane">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#indep" role="button" aria-expanded="false" aria-controls="indep">
                    Paginas independientes
                </a>
                <a class="btn btn-primary" data-toggle="collapse" href="#indep" role="button" aria-expanded="false" aria-controls="indep">
                    Paginas independientes
                </a>

            </p>
            <div id="indep" class="collapse">
                <ul id="ul_indep">
                    <li>
                        <a href="https://www.procyclingstats.com/index.php">Pro cycling stats</a>
                    </li>
                    <li>
                        <a href="https://www.ciclo21.com/">Ciclo21</a>
                    </li>
                </ul>
            </div>
            <div id="pag_of">
                <ul id="ul_pag_of">
                    <li>
                        <a href="https://www.lavuelta.es/es">Vuelta a España</a>
                    </li>
                    <li>
                        <a href="https://www.letour.fr/es">Tour de Francia</a>
                    </li>
                    <li>
                        <a href="https://www.giroditalia.it/es/">Giro d'Italia</a>
                    </li>
                </ul>
            </div>
                <ul>
                    
                    <li>
                        
                    </li>
                    <li>
                        <ul id="periodicos">
                            <li>
                                <a href="https://as.com/ciclismo/?omnil=mpal">As</a>
                            </li>  
                            <li>
                                <a href="https://www.marca.com/ciclismo.html?intcmp=MENUPROD&s_kw=ciclismo">Marca</a>
                            </li>
                            <li>
                                <a href="https://www.mundodeportivo.com/ciclismo">Mundo Deportivo</a>
                            </li>  
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
