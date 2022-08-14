<?php
include('db.php');

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query = "DELETE FROM productos WHERE id = '$id'";

$result = mysqli_query($conn, $query);

 if(!$result){
        die("Eliminacion Fallida");
    }

    $_SESSION['message'] = 'Producto Eliminada con exito';
    $_SESSION['message_type'] = 'danger';

// lo llevo al inicio
    header('Location: index.php');

}
?>