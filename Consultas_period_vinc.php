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
if (isset($_REQUEST["metodo"]) && isset($_REQUEST["Ano"])) {
    $metodo = $_REQUEST["metodo"];
    $Ano = $_REQUEST["Ano"];
    switch ($metodo) {
        case "Ini":
            $sql ="SELECT * FROM periodo WHERE Año_inicio_vinc = :ini";
            $cons = $conn->prepare($sql);
            $cons-> bindParam(':ini',$Ano,PDO::PARAM_INT);
            $cons -> execute();
            $sal = $cons->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($sal);
            $conn = null;
            break;
        case "Fin":
            $sql ="SELECT * FROM periodo WHERE Año_fin_vinc = :fin";
            $cons = $conn->prepare($sql);
            $cons-> bindParam(':fin',$Ano,PDO::PARAM_INT);
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
