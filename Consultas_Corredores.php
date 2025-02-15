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

if (isset($_REQUEST["Corredor"])) {
    $Corredor = $_REQUEST["Corredor"];
    $sql1 ="SELECT * FROM corredor WHERE Id = :nom";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':nom',$Corredor,PDO::PARAM_INT);
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
