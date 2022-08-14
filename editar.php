<?php
include('db.php');

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query = "SELECT * FROM productos WHERE id = $id";


$result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) == 1){
        // echo 'Tu puedes editar';
        
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $tipo = $row['tipo'];

 }

if(isset($_POST['actualizar'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];


     $query = "UPDATE productos set nombre = '$nombre', descripcion = '$descripcion', tipo = '$tipo' WHERE id=$id";
     mysqli_query($conn, $query);
     $_SESSION['message'] = 'Producto actualizada con exito';
     $_SESSION['message_type'] = 'info';
     header("Location: index.php");
}
}
?>

<?php include("incluir/header.php") ?>


<!-- todo lo de abajo es clase de BOOSTRAP -->
<div class="container p-4">

    <div class="row">
        <div class="col-md-4 mx-auto">

            <div class="card card-body">


                <!-- aqui mandar a la opcion edit -->
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                            placeholder="Actualizar Producto">
                    </div>
                    <div class="form-group">

                        <!-- para el text area -->
                        <textarea name="descripcion" class="form-control" cols="30"
                            rows="10"><?php echo $descripcion;?></textarea>
                    </div>

                    <!-- nuevo -->



                    <div class="form-group">
                        <label for="cars">Tipo de Producto</label>
                        <select id="cars" name="tipo">
                            <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                            <option value="Bienes de consumo">Bienes de consumo</option>
                            <option value="Servicios">Servicios</option>
                            <option value="Bienes de uso común">Bienes de uso común</option>
                            <option value="Bienes de emergencia">Bienes de emergencia</option>
                            <option value="Bienes durables">Bienes durables</option>
                            <option value="Bienes de especialidad">Bienes de especialidad</option>

                        </select>
                    </div>



                    <!-- 
                    <div class="form-group">
                        <input type="text" name="tipo" value="<?php echo $tipo; ?>" class="form-control"
                            placeholder="Actualizar Tipo">
                    </div> -->

                    <button class="btn btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

<?php include("incluir/footer.php") ?>