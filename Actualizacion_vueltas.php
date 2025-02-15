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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Distancia"]) && isset($_REQUEST["NEtp"])) {
        $Carrera = $_REQUEST["Carrera"];
        $Distancia = $_REQUEST["Distancia"];
        $Net = $_REQUEST["NEtp"];
        $sql1 ="UPDATE Carrera_por_etapas SET Distancia_Recorrida =:dist and nº_etapas =:n WHERE Carrera_Nombre = :nom";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_INT);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_INT);
        $cons1 -> execute();
        $sal = "Valores actualizados correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
    $sal = "Tiene que dar el valor de una carrera";
    echo json_encode($sal);
    $conn = null;
}
?>
