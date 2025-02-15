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

if (isset($_REQUEST["Corredor"]) && isset($_REQUEST["Equipo"]) && isset($_REQUEST["Inicio"]) && isset($_REQUEST["Fin"])) {
    $Corredor = $_REQUEST["Corredor"];
    $Equipo = $_REQUEST["Equipo"];
    $Inicio = $_REQUEST["Inicio"];
    $Fin = $_REQUEST["Fin"];
    $sql ="INSERT INTO esta_vinculado values (:a,:b,:c,:d)";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':a',$Corredor,PDO::PARAM_STR);
    $cons-> bindParam(':b',$Equipo,PDO::PARAM_STR);
    $cons-> bindParam(':c',$Inicio,PDO::PARAM_INT);
    $cons-> bindParam(':d',$Fin,PDO::PARAM_INT);
    $cons -> execute();
    $sal = "Insercion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
            $sal = "Debe insertar todos los valores";
            echo json_encode($sal);
            $conn = null;
        }
?>
