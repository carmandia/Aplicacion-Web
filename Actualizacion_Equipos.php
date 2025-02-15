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

if (isset($_REQUEST["Equipo"])) {
    $Equipo = $_REQUEST["Equipo"];
    if (isset($_REQUEST["Abreviacion"])) {
        $sql ="UPDATE equipo SET Abreviacion = :abrev WHERE Nombre = :Equipo";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':abrev',$_REQUEST["Abreviacion"],PDO::PARAM_STR);
        $cons-> bindParam(':Equipo',$Equipo,PDO::PARAM_STR);
        $cons -> execute();
    }
    if (isset($_REQUEST["Bici"])) {
        $sql ="UPDATE equipo SET Marca_bici = :bici WHERE Nombre = :Equipo";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':Equipo',$Equipo,PDO::PARAM_STR);
        $cons-> bindParam(':bici',$_REQUEST["Bici"],PDO::PARAM_STR);
        $cons -> execute();
    }
    if (isset($_REQUEST["Puntos"])) {
        $sql ="UPDATE equipo SET Nº_puntos_UCI_totales= :ptos WHERE Nombre = :Equipo";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':ptos',$_REQUEST["Puntos"],PDO::PARAM_INT);
        $cons-> bindParam(':Equipo',$Equipo,PDO::PARAM_STR);
        $cons -> execute();
    }
    if (isset($_REQUEST["Nacionalidad"])) {
        $sql ="UPDATE equipo SET Nacionalidad = :nacion  WHERE Nombre = :Equipo";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':nacion',$_REQUEST["Nacionalidad"],PDO::PARAM_STR);
        $cons-> bindParam(':Equipo',$Equipo,PDO::PARAM_STR);
        $cons -> execute();
    }
    if (isset($_REQUEST["Maillot"])) {
        $sql ="UPDATE equipo SET maillot = :maillot   WHERE Nombre = :Equipo";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':maillot',$_REQUEST["Maillot"],PDO::PARAM_STR);
        $cons-> bindParam(':Equipo',$Equipo,PDO::PARAM_STR);
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
