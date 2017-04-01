<?PHP
session_start();
$target_path = "Archivos/";
$name_file = basename($_FILES['archivo']['name']);
$usr = $_SESSION['usuario'];
$target_path = $target_path . $name_file;
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {
    require_once './conexionBD.php';
    $obj = new conexionBD();
    $enlace = $obj->crearConexion();
    mysqli_query($enlace, "INSERT INTO archivo(nombre,userid) VALUES('$name_file','$usr')");
    header("Location: IndexUser.php?op=ok");
} else {
    header("Location: IndexUser.php?op=er");
}
?>
