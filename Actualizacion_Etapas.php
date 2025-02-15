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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Etapa"]) && isset($_REQUEST["Dist"]) && isset($_REQUEST["Alt"])) {
        $Carrera = $_REQUEST["Carrera"];
        $Distancia = $_REQUEST["Dist"];
        $Etapa = $_REQUEST["Etapa"];
        $Alt = $_REQUEST["Alt"];
        $sql1 ="UPDATE etapa SET Distancia =:dist and Altimetria =:alt WHERE Carrera_nombre = :nom and nº_etapa =:n";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_INT);
        $cons1-> bindParam(':n',$Etapa,PDO::PARAM_INT);
        $cons1-> bindParam(':alt',$Alt,PDO::PARAM_INT);
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
