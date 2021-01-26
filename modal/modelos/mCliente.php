<?php

if ($_POST['accion'] == 'crear') {
    require_once('../../includes/bdConexion.php');
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    //Validar entradas, se realiza un filtro de la informacion
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $matriz = filter_var($_POST['matriz'], FILTER_SANITIZE_NUMBER_INT);
    try{
        $consulta = "INSERT INTO cliente (nombre, idMatriz) VALUES (?, ?)";    
        $stmt = $conexion->prepare($consulta);
        
        $stmt -> bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt -> bindParam(2, $matriz, PDO::PARAM_INT);
        $stmt->execute(); 
        $id = $conexion->lastInsertId();
        if($stmt->rowCount() == 1){
            $respuesta = array(
                'respuesta' => 'correcto',
                
                'datos' => array(
                    'nombre' => $nombre,
                    'matriz' => $matriz,
                    'id_insertado' => $id,
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
