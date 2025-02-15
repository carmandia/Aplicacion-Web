<?php
    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
    $user = 'root';
    $pass = '';
    $conn = new PDO($db,$user,$pass);
    $sql1 = "SELECT distinct Id_lider from es";
    //$sql2 = "SELECT distinct Id_gregario from es";
    $consulta1 = $conn->query($sql1);
    //$consulta2 = $conn->query($sql2);
    $sal1 = "<option value = ''></option>";
    foreach ($consulta1 -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal1 .= "<option value='" . $fila["Id_lider"] . "'>" . $fila["Id_lider"] . "</option>";
    }
    /*$sal2 = "<option value = ''></option>";
    foreach ($consulta2 -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal2 .= "<option value='" . $fila["Id_gregario"] . "'>" . $fila["Id_gregario"] . "</option>";
    }*/
    echo $sal1;
    $conn=null;
?>