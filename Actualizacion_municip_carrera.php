<?php
header ('Content-type: application/json');
function conectarBD() {
    $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
    $user = 'root';
    $pass = '';
    $conn = new PDO($db,$user,$pass);
    return($conn);
}

$conn = conectarBD();
if (count($_REQUEST) == 0) {
    $_REQUEST = json_decode(file_get_contents('php://input'), TRUE);
    }

if (isset($_REQUEST["CarIni"]) && isset($_REQUEST["MunIni"]) && isset($_REQUEST["CarFin"]) && isset($_REQUEST["MunFin"])) {
    $lider_actual = $_REQUEST["CarIni"];
    $greg_actual = $_REQUEST["MunIni"];
    $lider_nuevo = $_REQUEST["CarFin"];
    $greg_nuevo = $_REQUEST["MunFin"];
    $sql1 ="UPDATE pasa_por SET Carrera_Nombre = :lider_nuevo, Municipio_Nombre = :greg_nuevo WHERE Carrera_Nombre = :lider_act and Municipio_Nombre = :greg_act";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':lider_nuevo',$lider_nuevo,PDO::PARAM_STR);
    $cons1-> bindParam(':greg_nuevo',$greg_nuevo,PDO::PARAM_STR);
    $cons1-> bindParam(':lider_act',$lider_actual,PDO::PARAM_STR);
    $cons1-> bindParam(':greg_act',$greg_actual,PDO::PARAM_STR);
    $cons1 -> execute();
    $sal = "Actualizacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Proporcione todos los campos";
    echo json_encode($sal);
    $conn = null;
}
?>
