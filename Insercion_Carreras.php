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
    if (isset($_REQUEST["Pais"]) && isset($_REQUEST["Escala"])) {
        $Carrera = $_REQUEST["Carrera"];
        $Distancia = $_REQUEST["Pais"];
        $Netp = $_REQUEST["Escala"];
        $sql1 ="INSERT INTO Carrera (Nombre, Nombre,EscalaUCI) VALUES (:nom,:dist,:n)";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_STR);
        $cons1-> bindParam(':n',$Netp,PDO::PARAM_STR);
        $cons1 -> execute();
        $sal = "Valores insertados correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $Carrera = $_REQUEST["Carrera"];
        $sql1 ="INSERT INTO Carrera (Nombre) VALUES (:nom)";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1 -> execute();
        $sal = "Valor insertado correctamente";
        echo json_encode($sal);
        $conn = null;
        }
} else {
    $sal = "Tiene que dar el valor de una carrera";
    echo json_encode($sal);
    $conn = null;
}
?>
