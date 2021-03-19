<?php
if ($_POST['accionContacto'] == 'crear') {
    require_once('../../includes/bdConexion.php');
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    //Validar entradas, se realiza un filtro de la informacion
    $nombreContacto = filter_var($_POST['nombreContacto'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $extencion = filter_var($_POST['extencion'], FILTER_SANITIZE_NUMBER_INT);
    $celular = filter_var($_POST['celular'], FILTER_SANITIZE_NUMBER_INT);
    $idCliente = filter_var($_POST['idCliente'], FILTER_SANITIZE_NUMBER_INT);
    try{
        $consulta = "INSERT INTO contacto (nombre, correo, telefono, extencion, celular, idCliente) VALUES (?, ?, ?, ?, ?, ?)";    
        $stmt = $conexion->prepare($consulta);
        
        $stmt -> bindParam(1, $nombreContacto, PDO::PARAM_STR);
        $stmt -> bindParam(2, $correo, PDO::PARAM_STR);
        $stmt -> bindParam(3, $telefono, PDO::PARAM_INT);
        $stmt -> bindParam(4, $extencion, PDO::PARAM_INT);
        $stmt -> bindParam(5, $celular, PDO::PARAM_INT);
        $stmt -> bindParam(6, $idCliente, PDO::PARAM_INT);
        $stmt->execute(); 
       
        $id = $conexion->lastInsertId();
        if($stmt->rowCount() == 1){
            
            $respuesta = array(
                'respuesta' => 'correcto',
                'datos' => array(
                    'nombreContacto' => $nombreContacto,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'extencion' => $extencion,
                    'celular' => $celular,
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
