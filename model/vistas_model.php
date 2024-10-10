<?php
class vistaModelo{

    protected static function obtener_vista($vista){
        $palabras_primitivas =['usuarios','nuevo_usuario','usuario','producto','maquillajes','perfumes','tratamiento','joyeria','cuidadoPersonal','ofertas','descripcion','descripcion2','carrito1'];
        if (in_array($vista,$palabras_primitivas)){
            if(is_file("./views/".$vista.".php")){
                $contenido ="./views/".$vista.".php";
            }else{
                $contenido ="404";
            
            }
        }elseif ($vista=="login"|| $vista=="index") {

            $contenido = "login";
        }else{
            $contenido ="404";
        }
        return $contenido;
        }

            }

        

    





?>