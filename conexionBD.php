<?php
class conexionBD {

    public function crearConexion() {
        if ($link == null) {
            $link = mysqli_connect('us-cdbr-iron-east-03.cleardb.net', 'bb87881e7a2166', 'dc7e8234') or die('No se pudo conectar: ' . mysqli_error());
            $conexion = mysqli_select_db($link, "ad_643556e1444d091") or die('No se pudo seleccionar la base de datos');
            return $link;
        } else {
            return $link;
        }
    }

}
?>
