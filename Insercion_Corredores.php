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

    if (isset($_REQUEST["Nombre"]) && isset($_REQUEST["Apellido"]) && isset($_REQUEST["Nacionalidad"]) && isset($_REQUEST["Altura"]) && isset($_REQUEST["Peso"]) && isset($_REQUEST["Fecha"]) && isset($_REQUEST["Ncor"])) {
        $sql ="INSERT INTO corredor (Nombre,Apellido,Nacionalidad,Altura,Peso,Fecha_nacimiento,Nº_carreras_corridas) VALUES (:Nombre,:Apellido,:Nacionalidad,:Altura,:Peso,:Fecha_nacimiento,:Nº_carreras_corridas)";
        $cons = $conn->prepare($sql);
        $cons-> bindParam(':Nombre',$_REQUEST["Nombre"],PDO::PARAM_STR);
        $cons-> bindParam(':Apellido',$_REQUEST["Apellido"],PDO::PARAM_STR);
        $cons-> bindParam(':Nacionalidad',$_REQUEST["Nacionalidad"],PDO::PARAM_STR);
        $cons-> bindParam(':Altura',$_REQUEST["Altura"],PDO::PARAM_INT);
        $cons-> bindParam(':Peso',$_REQUEST["Peso"],PDO::PARAM_INT);
        $cons-> bindParam(':Fecha_nacimiento',$_REQUEST["Fecha"],PDO::PARAM_STR);
        $cons-> bindParam(':Nº_carreras_corridas',$_REQUEST["Ncor"],PDO::PARAM_INT);
        $cons -> execute();
        $sal = "Valores insertados correctamente";
        echo json_encode($sal);
        $conn = null;
    } else {
        $sal = "Debe proporcionar todos los datos";
            echo json_encode($sal);
            $conn = null;
    }
?>
