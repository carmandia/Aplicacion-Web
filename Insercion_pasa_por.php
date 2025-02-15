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

if (isset($_REQUEST["carrera"]) && isset($_REQUEST["municipio"])) {
    $carrera = $_REQUEST["carrera"];
    $municipio = $_REQUEST["municipio"];
    $sql ="INSERT INTO Pasa_por values (:carrera,:municipio)";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':carrera',$carrera,PDO::PARAM_STR);
    $cons-> bindParam(':municipio',$municipio,PDO::PARAM_STR);
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
