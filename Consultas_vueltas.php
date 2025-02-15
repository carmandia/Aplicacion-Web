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

if (isset($_REQUEST["Vuelta"])) {
    $Carrera = $_REQUEST["Vuelta"];
    $sql1 ="SELECT * FROM Carrera_por_etapas WHERE Carrera_Nombre = :nom";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
    $cons1 -> execute();
    $sal = $cons1->fetchAll(PDO::FETCH_ASSOC);
    $salida=$sal[0];
    $exito = TRUE;
    echo json_encode(["Carrera" => $salida, "Exito" => $exito]);
    $conn = null;
} else {
    $sal = "Devuelva un valor que sea valido";
    $Exito= FALSE;
    echo json_encode($sal);
    $conn = null;
}
?>
