<?php
require_once 'bdConexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
function obtenerMatriz()
{

    try {
        $consulta = "SELECT matriz.nombre as matrices FROM matriz";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerCliente()
{
    try {
        $consulta = "SELECT matriz.nombre as matriz, cliente.nombre as cliente, cliente.id as id FROM matriz INNER JOIN cliente ON matriz.id = cliente.idMatriz";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}

function obtenerUnCliente($idCliente)
{
    try {
        $consulta = "SELECT matriz.nombre as matriz, cliente.nombre as cliente, cliente.id as id FROM matriz INNER JOIN cliente ON matriz.id = cliente.idMatriz WHERE cliente.id = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerContacto($idCliente)
{
    try {
        $consulta = "SELECT * FROM contacto WHERE contacto.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerVPN($idCliente)
{
    try {
        $consulta = "SELECT * FROM soportevpn WHERE soportevpn.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerServidor($idCliente)
{
    try {
        $consulta = "SELECT * FROM soporteservidores WHERE soporteservidores.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSonicwall($idCliente)
{
    try {
        $consulta = "SELECT sonicwall.id, sonicwall.ubicacion, sonicwall.modelo, sonicwall.numeroSerie, sonicwall.versionDeFirmware, sonicwall.comentarios FROM sonicwall WHERE sonicwall.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSonicwallCredenciales($idSonicwall)
{
    try {
        $consulta = "SELECT credencialessonicwall.usuario, credencialessonicwall.contrasena FROM credencialessonicwall WHERE credencialessonicwall.idSonicwall = $idSonicwall";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSonicwallAcceso($idSonicwall)
{
    try {
        $consulta = "SELECT * FROM accesossonicwall WHERE accesossonicwall.idSonicwall = $idSonicwall";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSonicwallInterfaz($idSonicwall)
{
    try {
        $consulta = "SELECT * FROM interfazsonicwall WHERE interfazsonicwall.idSonicwall = $idSonicwall";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSwitch($idCliente)
{
    try {
        $consulta = "SELECT switch.id, switch.nombre, switch.ubicacion, switch.ip, switch.acceso, switch.comentarios FROM switch WHERE switch.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSwitchCredenciales($idSwitch)
{
    try {
        $consulta = "SELECT credencialesswitch.usuario, credencialesswitch.contrasena FROM credencialesswitch WHERE credencialesswitch.idSwitch = $idSwitch";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerSwitches($idSwitch)
{
    try {
        $consulta = "SELECT switches.id, switches.marca, switches.modelo, switches.numeroSerie, switches.mac FROM switches WHERE switches.idSwitch = $idSwitch";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerControladora($idCliente)
{
    try {
        $consulta = "SELECT controladora.id, controladora.ip, controladora.nombre, controladora.ubicacion, controladora.modelo, controladora.numeroSerie, controladora.mac, controladora.firmware, controladora.puerto, controladora.comentarios, controladora.idSwitch FROM controladora WHERE controladora.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerControladoraCredenciales($idControladora)
{
    try {
        $consulta = "SELECT * FROM credencialescontroladora WHERE credencialescontroladora.idControladora = $idControladora";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerAPS($idCliente)
{
    try {
        //id, ubicacion, ip, marca, modelo, nombre, estatus, numeroSerie, puerto, mac, comentarios 
        $consulta = "SELECT * FROM aps WHERE aps.idCliente = $idCliente";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}
function obtenerAPSCredenciales($idaps)
{
    try {
        $consulta = "SELECT * FROM credencialesaps WHERE credencialesaps.idaps = $idaps";
        $resultado = $GLOBALS['conexion']->prepare($consulta);
       $resultado->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return array();
    }
    return $resultado;
}

