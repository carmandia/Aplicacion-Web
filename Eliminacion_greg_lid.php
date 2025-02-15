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

if (isset($_REQUEST["Lider"]) && isset($_REQUEST["Gregario"])) {
    $lider = $_REQUEST["Lider"];
    $gregario = $_REQUEST["Gregario"];
    $sql ="DELETE FROM es WHERE Id_lider = :lid AND Id_gregario = :greg";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':lid',$lider,PDO::PARAM_INT);
    $cons-> bindParam(':greg',$gregario,PDO::PARAM_INT);
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
