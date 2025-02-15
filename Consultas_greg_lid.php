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
if (isset($_REQUEST["metodo"]) && isset($_REQUEST["Id"])) {
    $metodo = $_REQUEST["metodo"];
    $Id = $_REQUEST["Id"];
    switch ($metodo) {
        case "Lid":
            $sql ="SELECT * FROM es WHERE Id_lider = :lider";
            $cons = $conn->prepare($sql);
            $cons-> bindParam(':lider',$Id,PDO::PARAM_INT);
            $cons -> execute();
            $sal = $cons->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($sal);
            $conn = null;
            break;
        case "Gre":
            $sql ="SELECT * FROM (es inner join presentacion on presentacion.id = es.Id_gregario) inner join corredor on presentacion.Corredor_Id = corredor.Id  WHERE Id_gregario = :gregario";
            $cons = $conn->prepare($sql);
            $cons-> bindParam(':gregario',$Id,PDO::PARAM_INT);
            $cons -> execute();
            $sal = $cons->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($sal);
            $conn = null;
            break;
        default:
            # code...
            break;
    }
} else {
            $sal = "Devuelva un valor que sea valido";
            echo json_encode($sal);
            $conn = null;
        }
?>
