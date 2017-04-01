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
        echo 'PHP está funcionado1!!!';
        phpinfo();
        $msq=new mysqli("us-cdbr-iron-east-03.cleardb.net","bb87881e7a2166","dc7e8234","ad_643556e1444d091");
        echo 'PHP está funcionado10!!!';
        $link = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "bb87881e7a2166", "dc7e8234") or die("No se pudo conectar: " . mysqli_error());
        echo 'PHP está funcionado2!!!';
        $conexion = mysqli_select_db($link, 'ad_643556e1444d091') or die('No se pudo seleccionar la base de datos');
        $nombre = "";
        echo "PHP está funcionado3!!!";
        echo "PHP está funcionado4!!!";
        $user = $_POST['usuario'];
        $pass = $_POST['pass'];
        echo "PHP está funcionado5!!!";
        $result = mysqli_query($link, 'SELECT username,pass FROM usuario where username=' . '"' . $user . '" && pass=' . '"' . $pass . '"');
        echo "PHP está funcionado6!!!";
        $rows = mysqli_num_rows($result);
        echo "PHP está funcionado7!!!";
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
        <?PHP
    }
        echo "FUNCIONANDO";
    ?>
        </body>
</html>

