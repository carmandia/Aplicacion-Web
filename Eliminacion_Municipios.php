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

if (isset($_REQUEST["Municipio"])) {
    $Municipio = $_REQUEST["Municipio"];
    $sql ="DELETE FROM Municipio WHERE Nombre = :muni";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':muni',$Municipio,PDO::PARAM_STR);
    $cons -> execute();
    $sal = "Registro eliminado";
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Devuelva un valor que sea valido";
    echo json_encode($sal);
    $conn = null;
}
?>
