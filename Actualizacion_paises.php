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

if (isset($_REQUEST["nombre_prim"]) && isset($_REQUEST["nombre_sec"])) {
    $nombre_inicio = $_REQUEST["nombre_prim"];
    $nombre_act = $_REQUEST["nombre_sec"];
    $sql1 ="UPDATE pais SET Nombre = :nom_act WHERE Nombre = :nom_prim";
    $cons1 = $conn->prepare($sql1);
    $cons1-> bindParam(':nom_act',$nombre_act,PDO::PARAM_STR);
    $cons1-> bindParam(':nom_prim',$nombre_inicio,PDO::PARAM_STR);
    $cons1 -> execute ();
    $sql2 ="SELECT * FROM pais WHERE Nombre = :nom";
    $cons2 = $conn->prepare($sql2);
    $cons2-> bindParam(':nom',$nombre_act,PDO::PARAM_STR);
    $cons2 -> execute();
    $sal = $cons2->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($sal);
    $conn = null;
} else {
    $sal = "Devuelva un valor que sea valido";
    echo json_encode($sal);
    $conn = null;
}
?>
