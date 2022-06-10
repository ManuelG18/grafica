<?php
/*
// Valores con PHP. Estos podrían venir de una base de datos o de cualquier lugar del servidor
$etiquetas = ["Enero", "Febrero", "Marzo", "Abril"];
$datosVentas = [5000, 1500, 8000, 5102];
// Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
$respuesta = [
    "promedios" => $etiquetas,
    "alumnos" => $datosVentas,
];
echo json_encode($respuesta);
*/
?>

<?php

$con = mysqli_connect("localhost", "root", "", "infoalumnos");
if($con->connect_error){
    die("Fallo en la conexión: " . $db_conex->connect_error);
} else {
    $result = mysqli_query($con, "SELECT * FROM calificaciones ORDER BY promedio ASC"); 
    while ($row = mysqli_fetch_array($result)) {
        $promedio[] = $row['promedio'];
        $alumnos[] = $row['cantidad'];
    }
    $respuesta=[
        "promedios" => $promedio,
        "alumnos" => $alumnos,
    ];
    echo json_encode($respuesta);
}
mysqli_close($con);

?>