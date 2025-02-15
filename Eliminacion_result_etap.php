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
        $Corredor = $_REQUEST["Corredor"];
        $Etapa = $_REQUEST["Etapa"];
        $Carrera = $_REQUEST["Carrera"];
        $sql ="DELETE FROM corre WHERE Etapa_Carrera_nombre =:Carrera and Etapa_nº_etapa =:n and Presentacion_Id =:id";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':n',$Etapa,PDO::PARAM_INT);
        $cons-> bindParam(':Carrera',$Carrera,PDO::PARAM_STR);
        $cons-> bindParam(':id',$Corredor,PDO::PARAM_INT);
        $cons -> execute();
        $sal = "Eliminacion realizada correctamente";
        echo json_encode($sal);
        $conn = null;
} else {
            $sal = "De todos los valores";
            echo json_encode($sal);
            $conn = null;
        }
?>
