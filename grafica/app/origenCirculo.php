<?php

$con = mysqli_connect("localhost", "root", "", "infoalumnos");
if($con->connect_error){
    die("Fallo en la conexión: " . $db_conex->connect_error);
} else {
    $result = mysqli_query($con, "SELECT * FROM descalumnos"); 
    while ($row = mysqli_fetch_array($result)) {
        $genero[] = $row['genero'];
        $cantidad[] = $row['cantidad'];
    }
    $respuesta=[
        "genero" => $genero,
        "cantidad" => $cantidad,
    ];
    echo json_encode($respuesta);
}
mysqli_close($con);

?>