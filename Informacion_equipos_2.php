<?php
try {
    if (isset($_REQUEST["equipo"])) {
        $db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
        $user = 'root';
        $pass = '';
        $conn = new PDO($db,$user,$pass);
        $sql = "SELECT * FROM equipo WHERE nombre = '$_REQUEST[nombre]'";
        $sal = "<table class='table table-hover mt-2
        '><thead><tr class='bg-secondary'><th>Nombre</th><th>Abreviacion</th><th>Marca de bici</th><th>Puntos UCI totales</th><th>Nacionalidad</th></tr></thead><tbody>";
        foreach ($conn->query($sql) as $fila){
            $sal .= "<tr><td>" . $fila["Nombre"] . "</td><td>" . $fila["Abreviacion"] . "</td><td>" . $fila["Marca_bici"] . "</td><td>" . $fila["Nº_puntos_UCI_totales"] . "</td><td>" . $fila["Nacionalidad"] . "</td></tr>";
        }
        $sal .= "</tbody></table>";
        echo $sal;
        $conn=null;
    }
} catch (PDOException $e) {
    echo [$e->getMessage(),$e-> getCode()];
}
?>

</body>
</html>