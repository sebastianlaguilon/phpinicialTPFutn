<?php

/*class DataBase{
    public static function connect(){
        $conexion = new mysqli('localhost','root','', 'ziba', 3310) or exit ("No se pudo conectar a la base de datos");
        $conexion->query("SET NAMES 'UTF8'");

        return $conexion;
    }
}*/

class DataBase{
    public static function connect(){
        $conexion = new mysqli('localhost','id20691860_phpinicialtpf','id20691860_phpinicial', 'ao(yL{^dn92*UujK') or exit ("No se pudo conectar a la base de datos");
        $conexion->query("SET NAMES 'UTF8'");

        return $conexion;
    }
}

?>

