<?PHP
session_start();
require_once './conexionBD.php';
$usr = $_SESSION['usuario'];
$obj = new conexionBD();
$enlace = $obj->crearConexion();
$opcion = $_GET['op'];
$result = mysqli_query($enlace, 'SELECT nombre from archivo,usuario where username=' . '"' . $usr . '" && userid=username');
$rows = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stls.css">
        <title>Mis archivos</title>
    </head>
    <body>
        <div class="container-fluid" style="margin: 0 auto;">
            <div class="panel-group" id="acordeon">
                <?PHP
                if($usr){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading" id="aux">
                        <div><strong>Bienvenido </strong><span class="label label-success"><?PHP echo $_SESSION['usuario'] ?></span></div>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading" id="aux2">
                        <a data-toggle="collapse" data-parent="#acordeon" href="#encoger2">Subir un archivo a su cuenta</a>
                    </div>
                    <div class="panel-collapse collapse" id="encoger2">
                        <div class="panel-body">
                            <form class="form-horizontal" action="Upfile.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="archivo">Seleccione un archivo:</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" id="archivo" name="archivo">
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-4 col-sm-6">
                                        <button type="submit" class="btn btn-default">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?PHP
                }
                ?>
                <div class="panel panel-success">
                    <div class="panel-heading" id="aux1">
                        <a data-toggle="collapse" data-parent="#acordeon" href="#encoger3">Ver mis archivos <span class="badge"><?PHP echo $rows; ?></span></a>
                    </div>
                    <div class="panel-collapse collapse" id="encoger3">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre del archivo</th>
                                        <th>Visualizar</th>
                                    </tr>
                                </thead>
                                <?PHP
                                while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $var = "Archivos/" . $res['nombre'];
                                    echo "<tr>";
                                    echo "<td>" . $res['nombre'] . "</td>";
                                    echo "<td><a href='$var' target='_blank'>Ver archivo</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading" id="aux3">
                        <a href="salir.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin: 0 auto;">
            <?PHP
            if ($opcion == "ok") {
                ?>
                <div class="alert alert-info alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Carga exitosa!</strong> El archivo ha sido almacenado exitosamente.
                </div>
                <?PHP
            }
            ?>
            <?PHP
            if ($opcion == "er") {
                ?>
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Carga fallida!</strong> El archivo no se pudo cargar correctamente.
                </div>
                <?PHP
            }
            ?>
        </div>
    </body>
</html>