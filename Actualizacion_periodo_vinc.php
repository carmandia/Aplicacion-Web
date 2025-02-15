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

if (isset($_REQUEST["IniAct"]) && isset($_REQUEST["FinAct"]) && isset($_REQUEST["IniFin"]) && isset($_REQUEST["FinFin"])) {
    $inicio_actual = $_REQUEST["IniAct"];
    $fin_actual = $_REQUEST["FinAct"];
    $inicio_nuevo = $_REQUEST["IniFin"];
    $fin_nuevo = $_REQUEST["FinFin"];
    $sql1 ="UPDATE periodo SET Año_inicio_vinc = :ini_nuevo, Año_fin_vinc = :fin_nuevo WHERE Año_inicio_vinc = :ini_act and Año_fin_vinc = :fin_act";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':ini_nuevo',$inicio_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':fin_nuevo',$fin_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':ini_act',$inicio_actual,PDO::PARAM_INT);
    $cons1-> bindParam(':fin_act',$fin_actual,PDO::PARAM_INT);
    $cons1 -> execute();
    $sal = "Actualizacion realizada con exito";
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Proporcione todos los campos";
    echo json_encode($sal);
    $conn = null;
}
?>
