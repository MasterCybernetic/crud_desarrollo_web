<?php

include('db.php');
if(isset($_POST['guardar'])){

    // los traemos desde el formulario
    $nombre_ = $_POST['nombre'];
    $descripcion_ = $_POST['description'];
    $tipo_ = $_POST['tipo'];

    // echo $title;
    // echo $descripcion;

    // insertar en la base de datos
    $query = "INSERT INTO productos(nombre, descripcion, tipo) VALUES ('$nombre_','$descripcion_', '$tipo_')";

    // ejecutando la consulta
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Consulta Fallida");
    }

    // echo 'Guardado';
$_SESSION['message'] = 'Producto guardado con exito';
$_SESSION['message_type'] = 'success';

    // llevarlo de nuevo al menu
    header("location: index.php");
}
?>