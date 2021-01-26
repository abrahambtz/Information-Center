<?php
echo json_encode($_POST);





// if($accion == 'crear'){
    
//     include '../includes/bdConexion.php';
//     $objeto = new Conexion();
//     $conexion = $objeto->Conectar(); 
    
//     $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
//     $matriz = filter_var($_POST['matriz'], FILTER_SANITIZE_STRING);
//     try{
//         $objeto = new Conexion();
//         $conexion = $objeto->Conectar(); 
//         $consulta = "INSERT INTO cliente (nombre, idMatriz) VALUES (?, ?)";    
//         $stmt = $conexion->prepare($consulta);
//         $stmt -> bindParam(1, $nombre, PDO::PARAM_STR);
//         $stmt -> bindParam(2, $matriz, PDO::PARAM_STR);
//         $stmt->execute();  
//         $respuesta = array(
//             'respuesta' => 'correcto',
//             'info' => $stmt->affected_rows

//         );
//     }catch(Exception $e){
//         $respuesta = array(
//             'error' => $e->getMessage()
//         );
//     }
//     echo json_encode($respuesta);
   
// }




?>