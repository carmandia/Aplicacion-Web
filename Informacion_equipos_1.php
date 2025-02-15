<?php
    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
    $user = 'root';
    $pass = '';
    $conn = new PDO($db,$user,$pass);
    $sql = "SELECT * FROM equipo";
    $consulta = $conn->query($sql);
    $sal = "";
    foreach ($consulta -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal .= "<option value='" . $fila["Nombre"] . "'>" . $fila["Nombre"] . "</option>";
    }
    echo $sal;
    $conn=null;
?>