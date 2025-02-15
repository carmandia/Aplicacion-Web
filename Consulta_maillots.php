<?php
$db='mysql:host=localhost;dbname=mydb;charset=utf8';
$user='root';
$pass='';
$conn=New PDO($db,$user,$pass);
$sql1="SELECT corredor.nombre, corredor.apellido, presentacion.Carrera_nombre, presentacion.PosicionGen, presentacion.Ptos_UCI_posicionGen FROM presentacion inner join corredor on corredor.id = presentacion.Corredor_Id and presentacion.Equipo_nombre = '$_REQUEST[nombre]'";
$consulta1= $conn->query($sql1);
$sql2="SELECT corredor.nombre, corredor.apellido, esta_vinculado.Periodo_Año_inicio_vinc, esta_vinculado.Periodo_Año_fin_vinc FROM esta_vinculado inner join corredor on corredor.id = esta_vinculado.corredor_id and esta_vinculado.Equipo_nombre = '$_REQUEST[nombre]'";
$consulta2= $conn->query($sql2);
$salida = "<div class='accordion accordion-flush container' id='accordionFlushExample'>
<div class='accordion-item'>
    <h2 class='accordion-header' id='flush-headingOne'>
    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseOne' aria-expanded='false'  aria-controls='flush-collapseOne'>
    Resumen Presentaciones
    </button>
    </h2>
    <div id='flush-collapseOne' class='accordion-collapse collapse' aria-labelledby='flush-headingOne' data-bs-parent='#accordionFlushExample'>
        <div class='accordion-body'>";
$salida .= "<table class='table table-hover table-striped'><thead><tr><th colspan=5>$_REQUEST[nombre]</th></tr><tr><td>Nombre</td><td>Apellido</td><td>Carrera</td><td>Clasificacion general</td><td>Puntos UCI</td></tr></thead><tbody>";
foreach ($consulta1->fetchAll(PDO::FETCH_ASSOC) as $fila){
    $salida .= "<tr><td>" . $fila["nombre"] . "</td><td>" . $fila["apellido"] . "</td><td>" . $fila["Carrera_nombre"] . "</td><td>" . $fila["PosicionGen"] . "</td><td>" . $fila["Ptos_UCI_posicionGen"] ."</td></tr>";
}
$salida .= "</tbody></table>
</div>
        </div>
    </div>
    <div class='accordion-item'>
        <h2 class='accordion-header' id='flush-headingTwo'>
        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseTwo' aria-expanded='false' aria-controls='flush-collapseTwo'>
        Resumen vinculaciones
        </button>
        </h2>
        <div id='flush-collapseTwo' class='accordion-collapse collapse' aria-labelledby='flush-headingTwo' data-bs-parent='#accordionFlushExample'>
            <div class='accordion-body'>";
$salida .= "<table class='table table-hover table-striped'><thead><tr><th colspan=5>$_REQUEST[nombre]</th></tr><tr><td>Nombre</td><td>Apellido</td><td>Año inicio Vinculacion</td><td>Año fin Vinculacion</td></tr></thead><tbody>";
foreach ($consulta2->fetchAll(PDO::FETCH_ASSOC) as $fila){
    $salida .= "<tr><td>" . $fila["nombre"] . "</td><td>" . $fila["apellido"] . "</td><td>" . $fila["Periodo_Año_inicio_vinc"] . "</td><td>" . $fila["Periodo_Año_fin_vinc"] . "</td></tr>";
}
$salida .= "</tbody></table>
            </div>
        </div>
    </div>";
echo $salida;
$conn = null;
?>