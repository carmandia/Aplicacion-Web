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

if (isset($_REQUEST["Id"])) {
    $Id = $_REQUEST["Id"];
    if (isset($_REQUEST["Nombre"])) {
        $sql ="UPDATE corredor SET Nombre = :nom WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':nom',$_REQUEST["Nombre"],PDO::PARAM_STR);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Apellido"])) {
        $sql ="UPDATE corredor SET Apellido = :ape WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons-> bindParam(':ape',$_REQUEST["Apellido"],PDO::PARAM_STR);
        $cons -> execute();
    }
    if (isset($_REQUEST["Nacionalidad"])) {
        $sql ="UPDATE corredor SET Nacionalidad= :ptos WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':ptos',$_REQUEST["Nacionalidad"],PDO::PARAM_STR);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Altura"])) {
        $sql ="UPDATE corredor SET Altura = :alt  WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':alt',$_REQUEST["Altura"],PDO::PARAM_INT);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Peso"])) {
        $sql ="UPDATE corredor SET Peso = :peso   WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':peso',$_REQUEST["Peso"],PDO::PARAM_INT);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Fecha"])) {
        $sql ="UPDATE corredor SET Fecha_nacimiento = :nac   WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':nac',$_REQUEST["Fecha"],PDO::PARAM_STR);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Ncor"])) {
        $sql ="UPDATE corredor SET Nº_carreras_corridas = :num   WHERE Id = :id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':num',$_REQUEST["Ncor"],PDO::PARAM_INT);
        $cons-> bindParam(':id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    $sal = "Actualizacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
            $sal = "Debe proporcionar el nombre del equipo";
            echo json_encode($sal);
            $conn = null;
        }
?>
