<?php
try {
    $db='mysql:host=localhost;dbname=mydb;charset=utf8';
    $user='root';
    $pass='';
    $conn=new PDO($db,$user,$pass);
    switch ($_REQUEST["accion"]) {
        case 'Ins':
            if (isset($_REQUEST["nombre"])) {
                if (isset($_REQUEST["abreviacion"])) {
                    if (isset($_REQUEST["marca_bici"])) {
                        if (isset($_REQUEST["ptos_tot"])) {
                            if (isset($_REQUEST["nacionalidad"])) {
                                $sql="INSERT INTO equipo values (':nombre',':abrev',':marca',':num',':nacionalidad')";
                                $cons=$conn -> prepare($sql);
                                $cons->bindParam(':nombre',$_REQUEST["nombre"],PDO::PARAM_STR);
                                $cons->bindParam(':abrev',$_REQUEST["abreviacion"],PDO::PARAM_STR);
                                $cons->bindParam(':marca',$_REQUEST["marca_bici"],PDO::PARAM_STR);
                                $cons->bindParam(':nacionalidad',$_REQUEST["nacionalidad"],PDO::PARAM_STR);
                                $cons->bindParam(':num',$_REQUEST["ptos_tot"],PDO::PARAM_INT);
                                $cons->execute();
                            }
                            else {
                                $sql="INSERT INTO equipo ('Nombre','Abreviacion','Marca_bici','Nº_ptos_UCI_totales') values (':nombre',':abrev',':marca',':num')";
                                $cons=$conn -> prepare($sql);
                                $cons->bindParam(':nombre',$_REQUEST["nombre"],PDO::PARAM_STR);
                                $cons->bindParam(':abrev',$_REQUEST["abreviacion"],PDO::PARAM_STR);
                                $cons->bindParam(':marca',$_REQUEST["marca_bici"],PDO::PARAM_STR);
                                $cons->bindParam(':num',$_REQUEST["ptos_tot"],PDO::PARAM_INT);
                                $cons->execute();
                            }
                        }
                        else {
                            $sql="INSERT INTO equipo ('Nombre','Abreviacion','Marca_bici') values (:nombre,:abrev,:marca)";
                            $cons=$conn -> prepare($sql);
                            $cons->bindParam(':nombre',$_REQUEST["nombre"],PDO::PARAM_STR);
                            $cons->bindParam(':abrev',$_REQUEST["abreviacion"],PDO::PARAM_STR);
                            $cons->bindParam(':marca',$_REQUEST["marca_bici"],PDO::PARAM_STR);
                            $cons->execute();
                        }
                    } else {
                        $sql="INSERT INTO equipo ('Nombre','Abreviacion') values (':nombre',':abrev')";
                        $cons=$conn -> prepare($sql);
                        $cons->bindParam(':nombre',$_REQUEST["nombre"],PDO::PARAM_STR);
                        $cons->bindParam(':abrev',$_REQUEST["abreviacion"],PDO::PARAM_STR);
                        $cons->execute();
                    }
                } else {
                    $sql="INSERT INTO equipo ('Nombre') values (':nombre')";
                    $cons=$conn -> prepare($sql);
                    $cons->bindParam(':nombre',$_REQUEST["nombre"],PDO::PARAM_STR);
                    $cons->execute();
                }
            } else {
                echo "Proporcione al menos el nombre del equipo"
            }
            break;
        case 'Eli':
            if (isset($_REQUEST["nombre"])) {
                $sql="DELETE * FROM equipo where nombre=:nombre";
                $cons=conn->prepare($sql);
                $cons->bindParam(':nombre',$_REQUEST["nombre"],PDO::PARAM_STR);
                $cons->execute();
            } else {
                echo "Proporcione el nombre del equipo al menos para borrar"
            }
            break;
        case 'Act':
            if (isset($_REQUEST["nombre"])) {
                $sql="UPDATE equipo SET Nombre=':nombre_act', Abreviacion=':abrev',Marca_bici=':marca_bici',Nº_ptos_UCI_totales=':ptos_tot' WHERE Nombre=':nombre'";
            } else {
                echo "Para actualizar se necesita el nombre del equipo"
            }
            break;
        default:
            # code...
            break;
    }
    $conn=null;
} catch (\Throwable $th) {
    //throw $th;
}

?>