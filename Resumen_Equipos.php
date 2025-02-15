<?php
$db = 'mysql:host=localhost;dbname=mydb;charset=utf8';
$user = 'root';
$pass = '';
$conn = new PDO($db,$user,$pass);
$sql = "SELECT distinct nombre, abreviacion, maillot FROM equipo";
$cons = $conn->query($sql);
$res = $cons->fetchAll(PDO::FETCH_ASSOC);/* Con esto decidimos como recorrer los elementos*/
foreach ($res as $fila) {
    echo "<div class='col-md-4 mt-2 tarjeta' style='display:flex; justify-content:center;'>";
    echo "<div class='card cartel bg-dark'  style='width: 18rem;border: dashed 2px black;color: white;'>";
            echo "<img src=" .$fila['maillot']. " class='maillot' alt='Espere a que cargue la imagen'>";
            echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $fila['abreviacion'] . "</h5>";
                echo "<p class='card-text'>" . $fila['nombre'] . "</p>";
            echo "</div>";
    echo "</div>";
    echo "</div>";
};
$conn=null;
