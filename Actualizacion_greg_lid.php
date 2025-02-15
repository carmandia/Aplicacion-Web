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

if (isset($_REQUEST["Lid1"]) && isset($_REQUEST["Gre1"]) && isset($_REQUEST["Lid2"]) && isset($_REQUEST["Gre2"])) {
    $lider_actual = $_REQUEST["Lid1"];
    $greg_actual = $_REQUEST["Gre1"];
    $lider_nuevo = $_REQUEST["Lid2"];
    $greg_nuevo = $_REQUEST["Gre2"];
    $sql1 ="UPDATE es SET Id_lider = :lider_nuevo, Id_gregario = :greg_nuevo WHERE Id_lider = :lider_act and Id_gregario = :greg_act";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':lider_nuevo',$lider_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':greg_nuevo',$greg_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':lider_act',$lider_actual,PDO::PARAM_INT);
    $cons1-> bindParam(':greg_act',$greg_actual,PDO::PARAM_INT);
    $cons1 -> execute();
    $sal = "Actualizacion realizada correctamente";
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Proporcione todos los campos";
    echo json_encode($sal);
    $conn = null;
}
?>
