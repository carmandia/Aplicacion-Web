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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Etapa"])) {
    if (isset($_REQUEST["Dist"]) && isset($_REQUEST["Alt"])) {
        $Carrera = $_REQUEST["Carrera"];
        $Etp = $_REQUEST["Etapa"];
        $Distancia = $_REQUEST["Dist"];
        $Alt = $_REQUEST["Alt"];
        $sql1 ="INSERT INTO etapa (Carrera_nombre, Distancia,Altimetria,nº_etapa) VALUES (:nom,:dist,:alt,:n)";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_INT);
        $cons1-> bindParam(':alt',$Alt,PDO::PARAM_INT);
        $cons1-> bindParam(':n',$Etp,PDO::PARAM_INT);
        $cons1 -> execute();
        $sal = "Valores insertados correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $Carrera = $_REQUEST["Carrera"];
        $Etp = $_REQUEST["Etapa"];
        $sql1 ="INSERT INTO Carrera (Carrera_nombre,nº_etapa) VALUES (:nom,:n)";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':n',$Etp,PDO::PARAM_STR);
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
