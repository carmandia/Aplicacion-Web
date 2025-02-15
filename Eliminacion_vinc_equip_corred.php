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

if (isset($_REQUEST["Corredor"]) && isset($_REQUEST["Equipo"]) && isset($_REQUEST["Inicio"]) && isset($_REQUEST["Fin"])) {
    $Corredor = $_REQUEST["Corredor"];
    $Equipo = $_REQUEST["Equipo"];
    $Inicio = $_REQUEST["Inicio"];
    $Fin = $_REQUEST["Fin"];
    $sql ="DELETE FROM esta_vinculado WHERE Equipo_Nombre =:a and Corredor_Id=:b and Periodo_Año_inicio_vinc=:c and Periodo_Año_fin_vinc=:d";
    $cons = $conn->prepare($sql);
    $cons-> bindParam(':a',$Corredor,PDO::PARAM_STR);
    $cons-> bindParam(':b',$Equipo,PDO::PARAM_STR);
    $cons-> bindParam(':c',$Inicio,PDO::PARAM_INT);
    $cons-> bindParam(':d',$Fin,PDO::PARAM_INT);
    $cons -> execute();
    $sal = "Eliminacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
            $sal = "Debe dar todos los valores";
            echo json_encode($sal);
            $conn = null;
        }
?>
