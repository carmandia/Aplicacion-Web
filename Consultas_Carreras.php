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

if (isset($_REQUEST["Carrera"])) {
    $Carrera = $_REQUEST["Carrera"];
    $sql1 ="SELECT * FROM Carrera WHERE Nombre = :nom";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
    $cons1 -> execute();
    $sal = $cons1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Devuelva un valor que sea valido";
    echo json_encode($sal);
    $conn = null;
}
?>
