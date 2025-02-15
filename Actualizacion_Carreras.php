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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Pais"]) && isset($_REQUEST["Escala"])) {
        $Carrera = $_REQUEST["Carrera"];
        $Distancia = $_REQUEST["Pais"];
        $Net = $_REQUEST["Escala"];
        $sql1 ="UPDATE Carrera SET Pais =:dist and Escala =:n WHERE Nombre = :nom";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':nom',$Carrera,PDO::PARAM_STR);
        $cons1-> bindParam(':dist',$Distancia,PDO::PARAM_STR);
        $cons1-> bindParam(':n',$Net,PDO::PARAM_STR);
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
