<?php
    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
    $user = 'root';
    $pass = '';
    $conn = new PDO($db,$user,$pass);
    $sql = "SELECT * FROM pais";
    $consulta = $conn->query($sql);
    $sal = "<option value = ''></option>";
    foreach ($consulta -> fetchAll(PDO::FETCH_ASSOC) as $fila){
        $sal .= "<option value='" . $fila["Nombre"] . "'>" . $fila["Nombre"] . "</option>";
    }
    echo $sal;
    $conn=null;
?>