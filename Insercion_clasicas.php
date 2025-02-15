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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Distancia"])) {
    if (isset($_REQUEST["Distancia"])) {
        $Carrera = $_REQUEST["Carrera"];
        $Distancia = $_REQUEST["Distancia"];
        $sql1 ="INSERT INTO Carrera_de_un_dia (Carrera_Nombre, Distancia_Recorrida) VALUES (:nom,:dist)";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_INT);
        $cons1 -> execute();
        $sal = "Valores insertados correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $Carrera = $_REQUEST["Carrera"];
        $sql1 ="SELECT * FROM Carrera_de_un_dia WHERE Carrera_Nombre = :nom";
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
