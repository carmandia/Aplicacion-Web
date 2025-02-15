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

if (isset($_REQUEST["Id"])) {
    $Id = $_REQUEST["Id"];
    $sql ="DELETE FROM Presentacion WHERE Id = :Id";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
    $cons -> execute();
    $sal = "Eliminacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
            $sal = "Debe insertar ambos valores";
            echo json_encode($sal);
            $conn = null;
        }
?>
