<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "infoalumnos";
$db_table_name = "descalumnos";

$ge = $_GET['gen'];
$ca = $_GET['can'];

$db_conex = new mysqli($db_host, $db_user, $db_password, $db_name);
if($db_conex->connect_error){
    die("Fallo en la conexión: " . $db_conex->connect_error);
} else {
    $sql = "UPDATE $db_table_name SET cantidad = $ca WHERE genero = '$ge'";
    if ($db_conex->query($sql) === TRUE) {
        echo '<script>alert("Se ha actualizado la información.")</script> ';
        echo "<script>location.href='control.html'</script>";
    } else {
        echo "<script>alert('Se produjo un error en la conexión: " . $db_conex->error . "')</script>";
    }
}
$db_conex->close();
?>