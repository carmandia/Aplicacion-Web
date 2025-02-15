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
    if (isset($_REQUEST["Abreviacion"]) && isset($_REQUEST["Bici"]) && isset($_REQUEST["Puntos"]) && isset($_REQUEST["Nacionalidad"]) && isset($_REQUEST["Maillot"])) {
        $sql ="INSERT INTO equipo VALUES (:Equipo,:Abrev,:Bici,:Puntos,:Nacion,:Maillot)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':Abrev',$_REQUEST["Abreviacion"],PDO::PARAM_STR);
        $cons-> bindParam(':Bici',$_REQUEST["Bici"],PDO::PARAM_STR);
        $cons-> bindParam(':Puntos',$_REQUEST["Puntos"],PDO::PARAM_INT);
        $cons-> bindParam(':Nacion',$_REQUEST["Nacionalidad"],PDO::PARAM_STR);
        $cons-> bindParam(':Maillot',$_REQUEST["Maillot"],PDO::PARAM_STR);
        $cons-> bindParam(':Equipo',$_REQUEST["Equipo"],PDO::PARAM_STR);
        $cons -> execute();
        $sal = "Valores insertados correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $sql ="INSERT INTO equipo (Nombre) VALUES (:Equipo)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':Equipo',$_REQUEST["Equipo"],PDO::PARAM_STR);
        $cons -> execute();
        $sal = "Valor insertado correctamente";
    }
    
} else {
            $sal = "Debe proporcionar el nombre del equipo";
            echo json_encode($sal);
            $conn = null;
        }
?>
