<?php
require_once "./config/config.php";
class Conexion{
    public static function connect (){
        $mysql=new mysqli(BD_HOST, BD-USER, BD_PASSWORD,BD_NAME);
        $mysql->set_charset(BD_CHARSET);
        if(mysqli_connect_errno()){
            echo"Error de conexiones:"
            mysqli_connect-error();

        }
        return $mysql;
    }
}
?>