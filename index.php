<?php include("db.php")?>




<!-- los ponemos en codigos -->
<?php include("incluir/header.php")?>


<main div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- menssaje -->
            <!-- validacion en php -->
            <?php if(isset($_SESSION['message'])){ ?>

            <!-- // poner el color -->
            <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                <?= $_SESSION['message']?>

                <button type=" buttom" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>


            </div>
            <?php
            // CERRAR SESION, ESTE ALERAT LO INICIA PHP PERO SIRVE PARA MOSTRAR TCUANDO SE AGUARDE

            session_unset(); }?>

            <!-- termina la validacion -->
            <div class="card card-body">


                <!-- formulario, enviar a clase guardar con metodo post -->
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto"
                            autofocus>

                    </div>
                    <div class="form-group">

                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Descripcion del Producto"></textarea>
                    </div>

                    <!-- <div class="form-group">
                        <input type="text" name="tipo" class="form-control" placeholder="Tipo de Producto">

                    </div> -->

                    <div class="form-group">
                        <label for="cars">Tipo de Producto</label>
                        <select id="cars" name="tipo">
                            <option value="">Seleccione</option>
                            <option value="Bienes de consumo">Bienes de consumo</option>
                            <option value="Servicios">Servicios</option>
                            <option value="Bienes de uso común">Bienes de uso común</option>
                            <option value="Bienes de emergencia">Bienes de emergencia</option>
                            <option value="Bienes durables">Bienes durables</option>
                            <option value="Bienes de especialidad">Bienes de especialidad</option>

                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">
                </form>
            </div>
        </div>
        <!-- bajar de linea -->
        <!-- <br> -->





        <!-- tabla para datos -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Descripcion del Producto</th>
                        <th>Tipo</th>
                        <th>Fecha de Ingreso</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <!-- llenar tabla -->
                <tbody>
                    <?php
                        $query = "SELECT * FROM productos";
                        $result_tareas = mysqli_query($conn, $query);

                        // recorrer para llenar por fila
                        while($row = mysqli_fetch_array($result_tareas)){?>

                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['fecha_creacion']; ?></td>
                        <td>

                            <!-- hacer el boton para editar, obtener id ,,..... se modifica para modo icono-->
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">


                                <!-- <a href="editar.php?id=<?php echo $row['id']?>"> -->
                                <!--
                                en lugar de este texto usamos iconoes
                                Editar -->
                                <i class="fas fa-marker"></i>

                            </a>

                            <!-- boton eliminar -->
                            <a href="borrar.php?id=<?php echo $row['id']?>" class="btn btn-danger">

                                <!-- en lugar de este texto usamos iconoes

                                Borrar
                                 -->

                                <i class="far fa-trash-alt"></i>


                            </a>

                        </td>
                    </tr>
                    <?php } ?>

                </tbody>

            </table>

        </div>
    </div>

</main>

<?php include("incluir/footer.php")?>