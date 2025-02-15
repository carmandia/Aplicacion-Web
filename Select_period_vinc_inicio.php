<?php
    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
    $user = 'root';
    $pass = '';
    $conn = new PDO($db,$user,$pass);
    $sql1 = "SELECT distinct Año_inicio_vinc from periodo";
    //$sql2 = "SELECT distinct Año_fin_vinc from periodo";
    $consulta1 = $conn->query($sql1);
    //$consulta2 = $conn->query($sql2);
    $sal1 = "<option value = ''></option>";
    foreach ($consulta1 -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal1 .= "<option value='" . $fila["Año_inicio_vinc"] . "'>" . $fila["Año_inicio_vinc"] . "</option>";
    }
    /*$sal2 = "<option value = ''></option>";
    foreach ($consulta2 -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal2 .= "<option value='" . $fila["Año_fin_vinc"] . "'>" . $fila["Año_fin_vinc"] . "</option>";
    }*/
    echo $sal1;
    $conn=null;
?>