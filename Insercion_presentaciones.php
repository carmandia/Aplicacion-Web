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

if (isset($_REQUEST["Corredor"]) && isset($_REQUEST["Equipo"]) && isset($_REQUEST["Carrera"])) {
    if (isset($_REQUEST["Dorsal"]) && isset($_REQUEST["Puntos"]) && isset($_REQUEST["Clasificacion"])) {
        $Corredor = $_REQUEST["Corredor"];
        $Equipo = $_REQUEST["Equipo"];
        $Carrera = $_REQUEST["Carrera"];
        $Dorsal = $_REQUEST["Dorsal"];
        $Puntos = $_REQUEST["Puntos"];
        $Clasificacion = $_REQUEST["Clasificacion"];
        $sql ="INSERT INTO Presentacion (Dorsal,Equipo_nombre,Carrera_nombre,Corredor_Id,PosicionGen,Ptos_UCI_posicionGen) values (:dor,:equip,:carrera,:corredor,:pos,:ptos)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':dor',$Dorsal,PDO::PARAM_INT);
        $cons-> bindParam(':equip',$Equipo,PDO::PARAM_STR);
        $cons-> bindParam(':carrera',$Carrera,PDO::PARAM_STR);
        $cons-> bindParam(':corredor',$Corredor,PDO::PARAM_INT);
        $cons-> bindParam(':pos',$Clasificacion,PDO::PARAM_INT);
        $cons-> bindParam(':ptos',$Puntos,PDO::PARAM_INT);
        $cons -> execute();
        $sal = "Insercion realizada correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $Corredor = $_REQUEST["Corredor"];
        $Equipo = $_REQUEST["Equipo"];
        $Carrera = $_REQUEST["Carrera"];
        $sql ="INSERT INTO Presentacion (Equipo_nombre,Carrera_nombre,Corredor_Id) values (:equip,:carrera,:corredor)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':equip',$Equipo,PDO::PARAM_STR);
        $cons-> bindParam(':carrera',$Carrera,PDO::PARAM_STR);
        $cons-> bindParam(':corredor',$Corredor,PDO::PARAM_INT);
        $cons -> execute();
        $sal = "Insercion realizada correctamente";
        echo json_encode($sal);
        $conn = null;
        } 
} else {
            $sal = "Debe insertar los valore de Carrera, Corredor y Equipo";
            echo json_encode($sal);
            $conn = null;
        }
?>
