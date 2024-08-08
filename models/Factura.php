<?php 
//TODO: model productos
require_once('../config/config.php');
error_reporting(0);
class Factura{
    public function todos() //select * from provedores
    {
        $con = new ClaseConectar();
        $con = $con->conectarBaseDatos();
        $cadena = "SELECT * FROM `factura`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idFactura) //select * from factura where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->conectarBaseDatos();
        $cadena = "SELECT * FROM `factura` WHERE `idFactura`=$idFactura";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar( $Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $idClientes) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "INSERT INTO `factura`(`Fecha`, `Sub_total`, `Sub_total_iva`, `Valor_IVA`, `Clientes_idClientes`) 
            VALUES ('$Fecha',$Sub_total,$Sub_total_iva,$Valor_IVA,$idClientes)";
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
    public function actualizar( $idFactura,$Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $idClientes) //update provedores set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "UPDATE `factura` SET ,`Fecha`='$Fecha',`Sub_total`='$Sub_total',`Sub_total_iva`='$Sub_total_iva',`Valor_IVA`='$Valor_IVA',`Clientes_idClientes`='$idClientes'
            WHERE `idFactura`='$idFactura'";
            if (mysqli_query($con, $cadena)) {
                return $idFactura;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    
    public function eliminar($idFactura) //delete from clientes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "DELETE FROM `factura` WHERE `idFactura`='$idFactura'";
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