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
    if (isset($_REQUEST["Corredor"])) {
        $sql ="UPDATE Presentacion SET Corredor_Id = :corredor WHERE Id = :Id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':corredor',$_REQUEST["Corredor"],PDO::PARAM_INT);
        $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Equipo"])) {
        $sql ="UPDATE Presentacion SET Equipo_nombre = :equipo WHERE Id = :Id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':equipo',$_REQUEST["Equipo"],PDO::PARAM_STR);
        $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Carrera"])) {
        $sql ="UPDATE Presentacion SET Carrera_nombre= :carrera WHERE Id = :Id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':carrera',$_REQUEST["Carrera"],PDO::PARAM_STR);
        $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Dorsal"])) {
        $sql ="UPDATE Presentacion SET Dorsal = :dorsal  WHERE Id = :Id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':dorsal',$_REQUEST["Dorsal"],PDO::PARAM_INT);
        $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Puntos"])) {
        $sql ="UPDATE Presentacion SET Ptos_UCI_posicionGen = :puntos =  WHERE Id = :Id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':puntos',$_REQUEST["Puntos"],PDO::PARAM_INT);
        $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    if (isset($_REQUEST["Clasificacion"])) {
        $sql ="UPDATE Presentacion SET PosicionGen = :posicion WHERE Id = :Id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':posicion',$_REQUEST["Clasificacion"],PDO::PARAM_INT);
        $cons-> bindParam(':Id',$Id,PDO::PARAM_INT);
        $cons -> execute();
    }
    $sal = "Actualizacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
            $sal = "Debe proporcionar el id de la presentacion";
            echo json_encode($sal);
            $conn = null;
        }
?>
