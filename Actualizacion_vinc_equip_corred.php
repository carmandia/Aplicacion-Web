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

if (isset($_REQUEST["CorredorAct"]) && isset($_REQUEST["CorredorNue"]) && isset($_REQUEST["EquipoAct"]) && isset($_REQUEST["EquipoNue"]) && isset($_REQUEST["InicioAct"]) && isset($_REQUEST["InicioNue"]) && isset($_REQUEST["FinNue"]) && isset($_REQUEST["FinAct"])) {
    $Corredor_actual = $_REQUEST["CorredorAct"];
    $Equipo_actual = $_REQUEST["EquipoAct"];
    $Corredor_nuevo = $_REQUEST["CorredorNue"];
    $Equipo_nuevo = $_REQUEST["EquipoNue"];
    $Inicio_actual = $_REQUEST["InicioAct"];
    $Fin_actual = $_REQUEST["FinAct"];
    $Inicio_nuevo = $_REQUEST["InicioNue"];
    $Fin_nuevo = $_REQUEST["FinNue"];
    $sql1 ="UPDATE esta_vinculado SET Corredor_Id = :IdNue, Equipo_Nombre=:EquipNue ,Periodo_Año_inicio_vinc=:IniNue , Periodo_Año_fin_vinc =:FinNue  WHERE Corredor_Id = :IdAct AND  Equipo_Nombre=:EquipAct AND Periodo_Año_inicio_vinc=:IniAct AND  Periodo_Año_fin_vinc =:FinAct";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':IdNue',$Corredor_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':EquipNue',$Equipo_nuevo,PDO::PARAM_STR);
    $cons1-> bindParam(':IniNue',$Inicio_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':FinNue',$Fin_nuevo,PDO::PARAM_INT);
    $cons1-> bindParam(':IdAct',$Corredor_actual,PDO::PARAM_INT);
    $cons1-> bindParam(':EquipAct',$Equipo_actual,PDO::PARAM_STR);
    $cons1-> bindParam(':IniAct',$Inicio_actual,PDO::PARAM_INT);
    $cons1-> bindParam(':FinAct',$Fin_actual,PDO::PARAM_INT);
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
