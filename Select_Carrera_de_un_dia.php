<?php
    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
    $user = 'root';
    $pass = '';
    $conn = new PDO($db,$user,$pass);
    $sql = "SELECT distinct Carrera_Nombre FROM Carrera_de_un_dia";
    $consulta = $conn->query($sql);
    $sal = "<option value = ''></option>";
    foreach ($consulta -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal .= "<option value='" . $fila["Carrera_Nombre"] . "'>" . $fila["Carrera_Nombre"] . "</option>";
    }
    echo $sal;
    $conn=null;
?>