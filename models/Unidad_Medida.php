<?php 
//TODO: model unidad_medida
require_once('../config/config.php');
error_reporting(0);
class Unidad_Medida{
    public function todos() //select * from unidad_medida
    {
        $con = new ClaseConectar();
        $con = $con->conectarBaseDatos();
        $cadena = "SELECT * FROM `unidad_medida`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idUnidad_Medida) //select * from unidad_medida where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->conectarBaseDatos();
        $cadena = "SELECT * FROM `unidad_medida` WHERE `idUnidad_Medida`=$idUnidad_Medida";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Detalle, $Tipo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "INSERT INTO `unidad_medida`(`Detalle`, `Tipo`) VALUES ('$Detalle','$Tipo')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($idUnidad_Medida, $Detalle, $Tipo) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "UPDATE `unidad_medida` SET `Detalle`='$Detalle',`Tipo`='$Tipo' WHERE `idUnidad_Medida`='$idUnidad_Medida'";
            if (mysqli_query($con, $cadena)) {
                return $idUnidad_Medida;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    
    public function eliminar($idUnidad_Medida) //delete from unidad medida where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "DELETE FROM `unidad_medida` WHERE `idUnidad_Medida`='$idUnidad_Medida'";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }


}

?>