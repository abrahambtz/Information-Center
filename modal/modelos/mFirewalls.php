<?php
if ($_POST['accion'] == 'crear') {
    require_once('../../includes/bdConexion.php');
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    //Validar entradas, se realiza un filtro de la informacion
    $ubicacionFirewall = filter_var($_POST['ubicacionFirewall'], FILTER_SANITIZE_STRING);

    $acceso = filter_var($_POST['acceso'], FILTER_SANITIZE_STRING);

    $usuarioFirewall = filter_var($_POST['usuarioFirewall'], FILTER_SANITIZE_STRING);
    $contrasenaFirewall = filter_var($_POST['contrasenaFirewall'], FILTER_SANITIZE_STRING);

    $modelo = filter_var($_POST['modelo'], FILTER_SANITIZE_STRING);

    $nsFirewall = filter_var($_POST['nsFirewall'], FILTER_SANITIZE_STRING);
    $firmwareFirewall = filter_var($_POST['firmwareFirewall'], FILTER_SANITIZE_STRING);

    $interfaz = filter_var($_POST['interfaz'], FILTER_SANITIZE_STRING);
    $puerto = filter_var($_POST['puerto'], FILTER_SANITIZE_STRING);

    $accion = filter_var($_POST['accion'], FILTER_SANITIZE_STRING);

    $comentarios = filter_var($_POST['comentarios'], FILTER_SANITIZE_STRING);

    $idCliente = filter_var($_POST['idClienteFirewall'], FILTER_SANITIZE_NUMBER_INT);
    //$ = filter_var($_POST[''], FILTER_SANITIZE_STRING);
    







    try {
     

        $consultaInsertaFirewall = "INSERT INTO sonicwall (ubicacion, modelo, numeroSerie, versionDeFirmware, comentarios, idCliente) VALUES (?, ?, ?, ?, ?, ?)";
        $consultaInsertaInterfaz = "INSERT INTO interfazsonicwall (idSonicwall, nombre, ip) VALUES (?, ?, ?)";
        $consultaInsertaCredenciales = "INSERT INTO credencialessonicwall (usuario, contrasena, idSonicwall) VALUES (?, ?, ?)";
        $consultaInsertaAccesos = "INSERT INTO accesossonicwall (idSonicwall, ip) VALUES (?, ?)";

        $stmt = $conexion->prepare($consultaInsertaFirewall);
        $stmt_i = $conexion->prepare($consultaInsertaInterfaz);
        $stmt_c = $conexion->prepare($consultaInsertaCredenciales);
        $stmt_a = $conexion->prepare($consultaInsertaAccesos);

        $stmt->bindParam(1, $ubicacionFirewall, PDO::PARAM_STR);
        $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
        $stmt->bindParam(3, $nsFirewall, PDO::PARAM_STR);
        $stmt->bindParam(4, $firmwareFirewall, PDO::PARAM_STR);
        $stmt->bindParam(5, $comentarios, PDO::PARAM_STR);
        $stmt->bindParam(6, $idCliente, PDO::PARAM_INT);
        $stmt->execute();
        $idFirewall = $conexion->lastInsertId();



        $stmt_a->bindParam(1, $idFirewall, PDO::PARAM_STR);
        $stmt_a->bindParam(2, $acceso, PDO::PARAM_STR);
        $stmt_a->execute();

        $stmt_i->bindParam(1, $idFirewall, PDO::PARAM_STR);
        $stmt_i->bindParam(2, $puerto, PDO::PARAM_STR);
        $stmt_i->bindParam(3, $interfaz, PDO::PARAM_STR);
        $stmt_i->execute();

        $stmt_c->bindParam(1, $usuarioFirewall, PDO::PARAM_STR);
        $stmt_c->bindParam(2, $contrasenaFirewall, PDO::PARAM_STR);
        $stmt_c->bindParam(3, $idFirewall, PDO::PARAM_STR);
        $stmt_c->execute();
        //Interfaces
        $tomarDatos['cantidadInterfaz'] =  $_POST['cantidadInterfaz'];
        $array_num = $_POST['cantidadInterfaz'];
        $i = 0;
        while ($i < $array_num) {
            
            $test1 = filter_var($_POST['interfaz' . $i], FILTER_SANITIZE_STRING);
            $tomarDatos['interfaz'.$i] = $test1;
            $i++;
            
            $test2 = filter_var($_POST['puerto' . $i], FILTER_SANITIZE_STRING);
            $tomarDatos['puerto'.$i] = $test2;
            $i++;
            $stmt_i->bindParam(1, $idFirewall, PDO::PARAM_STR);
            $stmt_i->bindParam(2, $test1, PDO::PARAM_STR);
            $stmt_i->bindParam(3, $test2, PDO::PARAM_STR);
            $stmt_i->execute();
        }
        //Credenciales
        $tomarDatos['cantidadCredenciales'] =  $_POST['cantidadCredenciales'];
        $array_num = $_POST['cantidadCredenciales'];
        $i = 0;
        while ($i < $array_num) {
            $test1 = filter_var($_POST['usuarioFirewall' . $i], FILTER_SANITIZE_STRING);
            $tomarDatos['usuarioFirewall'.$i] = $test1;
            $i++;
            $test2 = filter_var($_POST['contrasenaFirewall' . $i], FILTER_SANITIZE_STRING);
            $tomarDatos['contrasenaFirewall'.$i] = $test1;
            $i++;
            $stmt_c->bindParam(3, $idFirewall, PDO::PARAM_STR);
            $stmt_c->bindParam(2, $test1, PDO::PARAM_STR);
            $stmt_c->bindParam(1, $test2, PDO::PARAM_STR);
            $stmt_c->execute();
        }
        //Accesos.
        $tomarDatos['cantidadAccesos'] =  $_POST['cantidadAccesos'];
        $array_num = $_POST['cantidadAccesos'];
        $i = 0;
        while ($i < $array_num) {
            $test1 = filter_var($_POST['acceso' . $i], FILTER_SANITIZE_STRING);
            $tomarDatos['acceso'.$i] = $test1;
            $i++;
            $stmt_a->bindParam(1, $idFirewall, PDO::PARAM_STR);
            $stmt_a->bindParam(2, $test1, PDO::PARAM_STR);
            $stmt_a->execute();
        }
        if ($stmt->rowCount() == 1) {
            $datos = array(
                    'ubicacionFirewall' => $ubicacionFirewall,
                    'acceso' => $acceso,
                    'usuarioFirewall' => $usuarioFirewall,
                    'contrasenaFirewall' => $contrasenaFirewall,
                    'modelo' => $modelo,
                    'nsFirewall' => $nsFirewall,
                    'firmwareFirewall' => $firmwareFirewall,
                    'interfaz' => $interfaz,
                    'puerto' => $puerto,
                    'comentarios' => $comentarios,
                    'id_insertado' => $idFirewall
            );

            $datos = array_merge($datos, $tomarDatos );
            $respuesta = array(
                'respuesta' => 'correcto'
            );
           $respuesta['datos'] = $datos;
        }
        $stmt = null;
        $conexion = null;
    } catch (Exception $e) {
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
}
echo json_encode($respuesta);


