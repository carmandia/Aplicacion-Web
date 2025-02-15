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

if (isset($_REQUEST["inicio"]) && isset($_REQUEST["fin"])) {
    $inicio = $_REQUEST["inicio"];
    $fin = $_REQUEST["fin"];
    $sql ="DELETE FROM periodo WHERE Año_inicio_vinc = :inicio AND Año_fin_vinc = :fin";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':inicio',$inicio,PDO::PARAM_INT);
    $cons-> bindParam(':fin',$fin,PDO::PARAM_INT);
    $cons -> execute();
    $sal = "Registro eliminado correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Devuelva un valor que sea valido";
    echo json_encode($sal);
    $conn = null;
}
?>
