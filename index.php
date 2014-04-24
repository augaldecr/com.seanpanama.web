<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
/* @var $op type */
$op = $_GET["op"];
switch ($op) {
    case "historia":
        $contenido = "php/historia.php";
        $titulo = "Historia de Sean Panamá";
        break;

    case "cursos":
        $contenido = "php/cursos.php";
        $titulo = "Cursos disponibles";
        break;

    case "contacto":
        $contenido = "php/contacto.php";
        $titulo = "Contacto con Sean Panamá";
        break;

    case "registro":
        $contenido = "php/registro.php";
        $titulo = "Registro de tutores";
        break;

    default:
        $contenido = "php/inicio.php";
        $titulo = "Bienvenido al sitio web de Sean Panamá";
        break;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href="css/seanpanama.css" />
        <link rel="stylesheet" href="css/normalizr.css" />
        <link rel="icon" type="image/jpeg" href="images/favicon.jpg" />
    </head>
    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>
            !window.jQuery && document.write("<script src='js/jquery.min.js'><\/script>");
        </script>
        <script src="js/js.js"></script>
        <header>
            <div class="logo">
                <img class="logo_sean" src="images/logo.gif" />
            </div>
            <div class="lema">
                <h1>Educación cristiana por medio de sean en Panamá</h1>
            </div>  
        </header>
        <nav>
            <ul>
                <li class="link"><a class="vinculo" href="index.php">Inicio</a></li>
                <li class="link"><a class="vinculo" href="?op=historia">Historia</a></li>
                <li class="link"><a class="vinculo" href="?op=cursos">Cursos</a></li>
                <li class="link"><a class="vinculo" href="?op=registro">Registro</a></li>
                <li class="link"><a class="vinculo" href="?op=contacto">Cont&aacute;ctenos</a></li>
            </ul>
        </nav>
    </div>
    <section>
        <?php include($contenido); ?>
    </section>
    <footer>
        <div class="footer_social">
            <ul>
                <li><a class="vinculo_social" id="facebook" href="#">Facebook</a></li>
                <li><a class="vinculo_social" id="twitter" href="#">Twitter</a></li>
                <li><a class="vinculo_social" id="google" href="#">Google+</a></li>
            </ul>
        </div>
        <div class="footer_copy">
            2014 Sean Panam&aacute;, fucebi@gmail.com
        </div>
    </footer>
</body>
</html>
