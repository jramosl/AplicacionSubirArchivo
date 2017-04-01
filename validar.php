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
        $user = "tdouavjf";
        $password = "GcuGUoBz0JhG3mmVtYkcbNjOGjtPvQh6";
        $dbname = "tdouavjf";
        $port = "5432";
        $host = "echo.db.elephantsql.com";
        $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
        $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
        echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";
        $query = "select username from usuario";
        $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
        $numReg = pg_num_rows($resultado);
        if($numReg>0){
        while ($fila=pg_fetch_array($resultado)) {
        echo "<p>".$fila['username']."</p>";
        }
        }else{
                echo "No hay Registros";
        }
     
        $nombre = "";
        echo "PHP está funcionado3!!!";
        echo "PHP está funcionado4!!!";
        $user = $_POST['usuario'];
        $pass = $_POST['pass'];
        echo "PHP está funcionado5!!!";
        echo "PHP está funcionado6!!!";
        echo "PHP está funcionado7!!!";
        if ($numReg == 1) {
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

