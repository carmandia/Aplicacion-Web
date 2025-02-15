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
$sql ="SELECT * FROM Presentacion";
$cons = $conn->query($sql);
$sal = $cons->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($sal);
$conn = null;