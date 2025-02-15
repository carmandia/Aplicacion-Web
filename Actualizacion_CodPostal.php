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

if (isset($_REQUEST["CodPost"]) && isset($_REQUEST["Munipio"])) {
        $Cod = $_REQUEST["CodPost"];
        $Municipio = $_REQUEST["Munipio"];
        $sql1 ="UPDATE `Cod.Postal` SET Municipio_Nombre = :mun WHERE Codigo = :cod";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':mun',$Municipio,PDO::PARAM_STR);
        $cons1-> bindParam(':cod',$Cod,PDO::PARAM_INT);
        $cons1 -> execute();
        $sal = "Valores ACTUALIZADOS correctamente";
        echo json_encode($sal);
        $conn = null;
} else {
    $sal = "Tiene que dar todos los valores";
    echo json_encode($sal);
    $conn = null;
}
?>
