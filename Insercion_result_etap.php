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

if (isset($_REQUEST["Carrera"]) && isset($_REQUEST["Corredor"]) && isset($_REQUEST["Etapa"])) {
    if (isset($_REQUEST["Pos"]) && isset($_REQUEST["Ptos"]) ) {
        $Corredor = $_REQUEST["Corredor"];
        $Etapa = $_REQUEST["Etapa"];
        $Carrera = $_REQUEST["Carrera"];
        $Pos = $_REQUEST["Pos"];
        $Puntos = $_REQUEST["Ptos"];
        $sql ="INSERT INTO corre values (:Carrera,:n,:id,:pos,:ptos)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':pos',$Pos,PDO::PARAM_INT);
        $cons-> bindParam(':n',$Etapa,PDO::PARAM_INT);
        $cons-> bindParam(':Carrera',$Carrera,PDO::PARAM_STR);
        $cons-> bindParam(':id',$Corredor,PDO::PARAM_INT);
        $cons-> bindParam(':ptos',$Puntos,PDO::PARAM_INT);
        $cons -> execute();
        $sal = "Insercion realizada correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $Corredor = $_REQUEST["Corredor"];
        $Etp = $_REQUEST["Etapa"];
        $Carrera = $_REQUEST["Carrera"];
        $sql ="INSERT INTO corre (Etapa_Carrera_nombre,Etapa_nº_etapa,Presentacion_Id) values (:carrera,:etp,:id)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':carrera',$CarreraPDO::PARAM_STR);
        $cons-> bindParam(':etp',$Etapa,PDO::PARAM_INT);
        $cons-> bindParam(':id',$Corredor,PDO::PARAM_INT);
        $cons -> execute();
        $sal = "Insercion realizada correctamente";
        echo json_encode($sal);
        $conn = null;
        } 
} else {
            $sal = "Debe insertar los valore de Carrera, Etapa y Equipo";
            echo json_encode($sal);
            $conn = null;
        }
?>
