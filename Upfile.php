<?PHP
session_start();
$target_path = "Archivos/";
$name_file = basename($_FILES['archivo']['name']);
$usr = $_SESSION['usuario'];
$target_path = $target_path . $name_file;
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {
    $link = mysqli_connect('us-cdbr-iron-east-03.cleardb.net', 'bb87881e7a2166', 'dc7e8234') or die('No se pudo conectar: ' . mysqli_error());
    $conexion = mysqli_select_db($link, "ad_643556e1444d091") or die('No se pudo seleccionar la base de datos');
    mysqli_query($link, "INSERT INTO archivo(nombre,userid) VALUES('$name_file','$usr')");
    header("Location: IndexUser.php?op=ok");
} else {
    header("Location: IndexUser.php?op=er");
}
?>
