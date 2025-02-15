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

if (isset($_REQUEST["ano_inicio"]) && isset($_REQUEST["ano_fin"])) {
    $ini = $_REQUEST["ano_inicio"];
    $fin = $_REQUEST["ano_fin"];
    $sql ="INSERT INTO periodo values (:ini,:fin)";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':fin',$fin,PDO::PARAM_INT);
    $cons-> bindParam(':inicio',$ini,PDO::PARAM_INT);
    $cons -> execute();
    $sal = "Insercion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
            $sal = "Debe insertar ambos valores";
            echo json_encode($sal);
            $conn = null;
        }
?>
