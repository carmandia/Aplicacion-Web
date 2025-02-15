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

if (isset($_REQUEST["Pais"]) && isset($_REQUEST["Provincia"])) {
        $Provincia = $_REQUEST["Provincia"];
        $Pais = $_REQUEST["Pais"];
        $sql1 ="UPDATE Provincia SET  Pais_Nombre = :pais WHERE Nombre = :pro";
        $cons1 = $conn->prepare($sql1);
        $cons1-> bindParam(':pais',$Pais,PDO::PARAM_STR);
        $cons1-> bindParam(':pro',$Provincia,PDO::PARAM_STR);
        $cons1 -> execute();
        $sal = "Valores actualizados correctamente";
        echo json_encode($sal);
        $conn = null;
} else {
    $sal = "Tiene que dar todos los valores";
    echo json_encode($sal);
    $conn = null;
}
?>
