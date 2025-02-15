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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Etapa"])) {
    $Carrera = $_REQUEST["Carrera"];
    $Etapa = $_REQUEST["Etapa"];
    $sql1 ="DELETE FROM etapa WHERE Carrera_nombre = :nom and nº_etapa=:etp";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
    $cons1-> bindParam(':etp',$Etapa,PDO::PARAM_STR);
    $cons1 -> execute();
    $sal = "Eliminacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Devuelva un valor que sea valido";
    echo json_encode($sal);
    $conn = null;
}
?>
