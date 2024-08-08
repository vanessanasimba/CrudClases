<?php
require_once('../models/Unidad_Medida.php');

$unidad_Medida = new Unidad_Medida(); 

switch ($_GET["op"]){
//TODO: operaciones de productos
    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $unidad_Medida->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $datos = array();
        $datos = $unidad_Medida->uno($idUnidad_Medida);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos = $unidad_Medida->insertar($Detalle,$Tipo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos = $unidad_Medida->actualizar($idUnidad_Medida,$Detalle,$Tipo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $datos = array();
        $datos = $unidad_Medida->eliminar($idUnidad_Medida);
        echo json_encode($datos);
        break;
}

?>