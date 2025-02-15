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
        case "Cor":
            $sql ="SELECT * FROM esta_vinculado WHERE Corredor_Id = :lider";
            $cons = $conn->prepare($sql);
            $cons-> bindParam(':lider',$Id,PDO::PARAM_INT);
            $cons -> execute();
            $sal = $cons->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($sal);
            $conn = null;
            break;
        case "Ini":
            $sql ="SELECT * FROM esta_vinculado WHERE Periodo_Año_inicio_vinc = :gregario";
            $cons = $conn->prepare($sql);
            $cons-> bindParam(':gregario',$Id,PDO::PARAM_INT);
            $cons -> execute();
            $sal = $cons->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($sal);
            $conn = null;
            break;
        case "Fin":
            $sql ="SELECT * FROM esta_vinculado WHERE Periodo_Año_fin_vinc = :gregario";
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
