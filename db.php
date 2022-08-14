<?php 

// iniciar una sesion en la aplicacion
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'producto'
);

// if(isset($conn))
// {
// echo "Base de Datos Conectado";

// }

?>