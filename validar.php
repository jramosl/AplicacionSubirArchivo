<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stls.css">
    </head>
    <body>
        <?php
        require_once 'conexionBD.php';
        $nombre = "";
        $obj = new conexionBD();
        $enlace = $obj->crearConexion();
        $user = $_POST['usuario'];
        $pass = $_POST['pass'];
        $result = mysqli_query($enlace, 'SELECT username,pass FROM usuario where username=' . '"' . $user . '" && pass=' . '"' . $pass . '"');
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $nombre = $res['username'];
            }
            session_start();
            $_SESSION['usuario'] = $nombre;
            header('Location: IndexUser.php');
        } else {
            ?>
            <div class="alert alert-danger">
                <strong>No se pudo iniciar sesión. </strong> Credenciales inválidas. <a href="inicio.html" class="alert-link">Iniciar sesión</a>.
            </div>
        </body>
        <?PHP
    }
    echo "</html>";
    ?>

