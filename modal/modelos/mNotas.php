<?php

if ($_POST['accion'] == 'crear') {
    require_once('../../includes/bdConexion.php');
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    //Validar entradas, se realiza un filtro de la informacion
    $nombreNota = filter_var($_POST['nombreNota'], FILTER_SANITIZE_STRING);
    $descrpcionNota = filter_var($_POST['descrpcionNota'], FILTER_SANITIZE_STRING);

    $idCliente = filter_var($_POST['idCliente'], FILTER_SANITIZE_NUMBER_INT);
    try{
        
        $consulta = "INSERT INTO soportenotas (nombre, descripcion, idCliente) VALUES (?, ?, ?)";    
        $stmt = $conexion->prepare($consulta);
        
        $stmt -> bindParam(1, $nombreNota, PDO::PARAM_STR);
        $stmt -> bindParam(2, $descrpcionNota, PDO::PARAM_STR);
        $stmt -> bindParam(3, $idCliente, PDO::PARAM_INT);
        $stmt->execute(); 
       
        $id = $conexion->lastInsertId();
        if($stmt->rowCount() == 1){
            
            $respuesta = array(
                'respuesta' => 'correcto',
                'datos' => array(
                    'nombreNota' => $nombreNota,
                    'descrpcionNota' => $descrpcionNota,
                    'id_insertado' => $id
                )
            ); 
        }
        $stmt = null;
        $conexion = null;
    }catch(Exception $e){
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
}
echo json_encode($respuesta);








// if($accion == 'crear'){
    
//     include '../includes/bdConexion.php';
//     $objeto = new Conexion();
//     $conexion = $objeto->Conectar(); 
    


//     echo json_encode($respuesta);
   
// }
