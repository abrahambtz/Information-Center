<?php

if ($_POST['accionVpn'] == 'crear') {
    require_once('../../includes/bdConexion.php');
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    //Validar entradas, se realiza un filtro de la informacion
    $ipvpn = filter_var($_POST['ipvpn'], FILTER_SANITIZE_STRING);
    $uservpn = filter_var($_POST['uservpn'], FILTER_SANITIZE_STRING);
    $passvpn = filter_var($_POST['passvpn'], FILTER_SANITIZE_STRING);
    $tipovpn = filter_var($_POST['tipovpn'], FILTER_SANITIZE_STRING);
    $sharedsecret = filter_var($_POST['sharedsecret'], FILTER_SANITIZE_STRING);
    $idCliente = filter_var($_POST['idCliente'], FILTER_SANITIZE_NUMBER_INT);
    try{
        $consulta = "INSERT INTO soportevpn (ip, usuario, contrasena, sharedSecret, tipo, idCliente) VALUES (?, ?, ?, ?, ?, ?)";    
        $stmt = $conexion->prepare($consulta);
        
        $stmt -> bindParam(1, $ipvpn, PDO::PARAM_STR);
        $stmt -> bindParam(2, $uservpn, PDO::PARAM_STR);
        $stmt -> bindParam(3, $passvpn, PDO::PARAM_STR);
        $stmt -> bindParam(4, $sharedsecret, PDO::PARAM_STR);
        $stmt -> bindParam(5, $tipovpn, PDO::PARAM_STR);
        $stmt -> bindParam(6, $idCliente, PDO::PARAM_INT);
        $stmt->execute(); 
       
        $id = $conexion->lastInsertId();
        if($stmt->rowCount() == 1){
            
            $respuesta = array(
                'respuesta' => 'correcto',
                'datos' => array(
                    'ipvpn' => $ipvpn,
                    'uservpn' => $uservpn,
                    'passvpn' => $passvpn,
                    'sharedsecret' => $sharedsecret,
                    'tipovpn' => $tipovpn,
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
