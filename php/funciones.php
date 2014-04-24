<?php

/* El parametro de $extension determina que tipo de imagen no se borrara, por ejemplo
 * si es jpg, el archivo con dicha extension se conserva, mientras que las que tengan
 * el mismo nombre pero diferente extension se borraran. La funcion file_exist evalua
 * si un archivo existe y la funcion unlink borra un archivo del servidor
 */

function borrar_imagenes($ruta, $extension) {
    switch ($extension) {
        case ".jpg":
            if (file_exists($ruta . ".png")) {
                unlink($ruta . ".png");
            } else if (file_exists($ruta . ".gif")) {
                unlink($ruta . ".gif");
            }
            break;

        case ".gif":
            if (file_exists($ruta . ".png")) {
                unlink($ruta . ".png");
            } else if (file_exists($ruta . ".jpg")) {
                unlink($ruta . ".jpg");
            }
            break;

        case ".png":
            if (file_exists($ruta . ".jpg")) {
                unlink($ruta . ".jpg");
            } else if (file_exists($ruta . ".gif")) {
                unlink($ruta . ".gif");
            }
            break;
    }
}

//Funcion para subir la imagen de perfil del usuario
function subir_imagen($tipo, $imagen, $email) {
    /* strstr($cadena1,$cadena2) sirve para evaluar si en la primer cadena de texto
     * existe la segunda cadena de texto.
     * Si dentro del tipo de archivo se encuentra la palabra image significa que 
     * el archivo es una imagen valida
     */
    if (strstr($tipo, "image")) {
        if (strstr($tipo, "jpeg")) {
            $extension = ".jpg";
        } else if (strstr($tipo, "gif")) {
            $extension = ".gif";
        } else if (strstr($tipo, "png")) {
            $extension = ".png";
        }
        //para saber si la imagen tiene el ancho correcto(420px)

        $tam_img = getimagesize($imagen);
        $ancho_img = $tam_img[0];
        $alto_img = $tam_img[1];

        $ancho_img_deseado = 420;

        //Si el ancho de la imagen es mayor a la deseada (420px), reajusto el tamaño
        if ($ancho_img > $ancho_img_deseado) {
            //Por una regla de 3 obtengo el alto deseado de la imagen de manera proporcional al ancho de 420px
            $nuevo_ancho_img = $ancho_img_deseado;
            $nuevo_alto_img = ($alto_img / $ancho_img) * $nuevo_ancho_img;

            //crea una imagen en color real con las nuevas dimensiones
            $img_reajustada = imagecreatetruecolor($nuevo_ancho_img, $nuevo_alto_img);

            //Creo una imagen basada en la original, dependiendo de la extension
            switch ($extension) {
                case ".jpg":
                    $img_original = imagecreatefromjpeg($imagen);
                    //Reajusto la imagen con respecto a la original
                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
                    //Guardo la imagen reescalada en el servidor
                    $nombre_img_ext = "../img/fotos/" . $email . $extension;
                    $nombre_img = "../img/fotos/" . $email;
                    imagejpeg($img_reajustada, $nombre_img, 100);
                    //Ejecuto la funcion para borrar posibles imagenes dobles
                    borrar_imagenes($nombre_img, ".jpg");
                    break;

                case ".gif":
                    $img_original = imagecreatefromgif($imagen);
                    //Reajusto la imagen con respecto a la original
                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
                    //Guardo la imagen reescalada en el servidor
                    $nombre_img_ext = "../img/fotos/" . $email . $extension;
                    $nombre_img = "../img/fotos/" . $email;
                    imagegif($img_reajustada, $nombre_img, 100);
                    //Ejecuto la funcion para borrar posibles imagenes dobles
                    borrar_imagenes($nombre_img, ".gif");
                    break;

                case ".png":
                    $img_original = imagecreatefrompng($imagen);
                    //Reajusto la imagen con respecto a la original
                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
                    //Guardo la imagen reescalada en el servidor
                    $nombre_img_ext = "../img/fotos/" . $email . $extension;
                    $nombre_img = "../img/fotos/" . $email;
                    imagepng($img_reajustada, $nombre_img);
                    //Ejecuto la funcion para borrar posibles imagenes dobles
                    borrar_imagenes($nombre_img, ".png");
                    break;
            }
        } else {
            //guardo la ruta que tendra la imagen
            $destino = "../img/fotos" . $email . $extension;
            //sube la imagen
            move_uploaded_file($imagen, $destino) or die("No se pudo subir la imagen");
            //Ejecutar funcion para borrar imagenes duplicadas en perfil
            $nombre_img = "../img/fotos/" . $email;
            borrar_imagenes($nombre_img, $extension);
        }
        //Asigna nombre de la imagen que se guardara en la BD como cadena de texto
        $imagen = $email . $extension;
        return $imagen;
    } else {
        return FALSE;
    }
}

?>
