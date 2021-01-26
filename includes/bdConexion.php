<?php
 class Conexion {
   
     public static function Conectar(){
         
         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host="."localhost:3300".";dbname="."bdci", "root", "", $opciones);             
            return $conexion; 
         }
         catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         } 
                 
     }
    
 }
