<!DOCTYPE html>
<?php
require_once './conexionBD.php';
$obj = new conexionBD();
$enlace = $obj->crearConexion();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" href="stls.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Registro</title>
    </head>
    <body>
        <?php
        $user = $_POST['usuarioNuevo'];
        $pass1 = $_POST['passNuevo'];
        $pass2 = $_POST['passNuevo2'];
        $mensaje = "";
        $result = mysqli_query($enlace, 'SELECT * FROM usuario where username=' . '"' . $user . '"');
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            if ($pass1 == $pass2 && $pass1 != "" && $user != "" && $pass2 != "")
                $estado = mysqli_query($enlace, "INSERT INTO usuario(username,pass) VALUES('$user','$pass1')");
        } else {
            if ($pass1 != $pass2)
                $mensaje+="Las claves no son iguales" . "<br>";
            $mensaje+="Usuario ya existe en la BD";
        }
        ?>
        <?PHP
        if ($estado) {
            ?>
            <div class="container">
                <div class="alert alert-success">
                    <strong>El registro ha sido exitoso!</strong> Inicia sesión para entrar. <a href="inicio.html" class="alert-link">Iniciar sesión</a>.
                </div>
                <?PHP
            }
            ?>
            <?PHP
            if (!$estado) {
                ?>
                <div class="alert alert-danger">
                    <strong>El registro ha fallado!</strong> Regístrate para ingresar <a href="inicio.html" class="alert-link">Registrarse</a>.
                </div>
                <?PHP
            }
            ?>
        </div>
    </body>
</html>
