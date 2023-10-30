<?php include("./conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>apple</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">apple</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Inicio Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form agregar apple -->
        <div class="card mb-5">
            <!-- <div class="card-header">
               Práctica CRUD de PHP y MySQL
            </div> -->
            <!-- agregar datos -->
            <div class="card-body">
                <h3 class="card-title">Christian david heredia heredia 5-I</h3>
                <p class="card-text">Tabla pedidos</p>

                <!-- mostrar mensaje de éxito agregado -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos agregados exitosamente!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="agregar.php" method="POST">

                    <div class="col-md-4">
                        <label for="idpedido" class="form-label">idpedido</label>
                        <input type="text" name="idpedido" class="form-control" placeholder="id pedido" required>
                    </div>
                    <div class="col-md-4">
                        <label for="idproducto" class="form-label">idproducto</label>
                        <input type="text" name="idproducto" class="form-control" placeholder="id provedoor" required>
                    </div>

                    <div class="col-md-4">
                        <label for="cantiidad" class="form-label">cantidad</label>
                        <input type="text" name="cantiidad" class="form-control" placeholder="cantidad" required>
                    </div>

                    <div class="col-md-4">
                        <label for="precio" class="form-label">precio</label>
                        <input type="text" name="precio" class="form-control" placeholder="precio" required>
                    </div>

                    <div class="col-md-4">
                        <label for="subtotal" class="form-label">subtotal</label>
                        <input type="text" name="subtotal" class="form-control" placeholder="subtotal" required>
                    </div>

                    <div class="col-md-4">
                        <label for="descuento" class="form-label">descuento</label>
                        <input type="text" name="descuento" class="form-control" placeholder="descuento" required>
                    </div>

                    <div class="col-md-4">
                        <label for="impuesto" class="form-label">impuesto</label>
                        <input type="text" name="impuesto" class="form-control" placeholder="impuesto" required>
                    </div>

                    <div class="col-md-4">
                        <label for="total" class="form-label">total</label>
                        <input type="text" name="total" class="form-control" placeholder="total" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Agregar datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- título de la tabla -->
        <h5 class="mb-3">LISTA DE PEDIDOS</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!--mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos eliminados exitosamente!</strong>!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar un mensaje de edición exitosa -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos actualizados exitosamente!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>Id pedido</th>";
            echo "<th scope='col'>Id producto</th>";
            echo "<th scope='col'>cantidad</th>";
            echo "<th scope='col'>precio</th>";
            echo "<th scope='col'>subtotal</th>";
            echo "<th scope='col'>descuento</th>";
            echo "<th scope='col'>impuesto</th>";
            echo "<th scope='col'>total</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_awal = ($pagina > 1) ? ($pagina * $batas) - $batas : 0;

            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($db, "SELECT * FROM pedido");
            $jumlah_data = mysqli_num_rows($data);
            $total_pagina = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM pedido LIMIT $pagina_awal, $batas");
            $no = $pagina_awal + 1;

            // $sql = "SELECT * FROM bellezaorgsanica";
            // $query = mysqli_query($db, $sql);




            while ($apple = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $apple['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $apple['idpedido'] . "</td>";
                echo "<td>" . $apple['idproducto'] . "</td>";
                echo "<td>" . $apple['cantiidad'] . "</td>";
                echo "<td>" . $apple['precio'] . "</td>";
                echo "<td>" . $apple['subtotal'] . "</td>";
                echo "<td>" . $apple['descuento'] . "</td>";
                echo "<td>" . $apple['impuesto'] . "</td>";
                echo "<td>" . $apple['total'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                //boton borrar
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total $jumlah_data de datos</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagina -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Capital Editar-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos del pedido</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM pedido";
                    $query = mysqli_query($db, $sql);
                    $apple = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_idpedido" class="form-label">Id Producto</label>
                                <input type="text" name="edit_idpedido" id="edit_idpedido" class="form-control" placeholder="..." required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_idproducto" class="form-label">Id Provedoor</label>
                                <input type="text" name="edit_idproducto" id="edit_idproducto" class="form-control" placeholder="123" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_cantiidad" class="form-label">Precio Paquete</label>
                                <input type="text" name="edit_cantiidad" id="edit_cantiidad" class=" form-control" placeholder="$" required>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_precio" class="form-label">precio</label>
                                <input type="text" name="edit_precio" id="edit_precio" class=" form-control" placeholder="a base de aloe vera etc" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_subtotal" class="form-label">Precio Unidad</label>
                                <input type="text" name="edit_subtotal" class="form-control" id="edit_subtotal" placeholder="$" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_descuento" class="form-label">descuento</label>
                                <input type="text" name="edit_descuento" id="edit_descuento" class=" form-control" placeholder="skincare" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_impuesto" class="form-label">impuesto</label>
                                <input type="text" name="edit_impuesto" id="edit_impuesto" class=" form-control" placeholder="5000" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_total" class="form-label">total</label>
                                <input type="text" name="edit_total" id="edit_total" class=" form-control" placeholder="agua de rosas" required>
                            </div>

                        </div>
                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Actualizar datos</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- capital eliminar-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- cerrar el contenedor -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- editar function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // no lo uso, porque es sólo un número incremental
                // $('#no').val(datos[1]);
                $('#edit_idpedido').val(data[2]);
                $('#edit_idproducto').val(data[3]);
                $('#edit_cantiidad').val(data[4]);
                $('#edit_precio').val(data[5]);
                $('#edit_subtotal').val(data[6]);
                $('#edit_descuento').val(data[7]);
                $('#edit_impuesto').val(data[8]);
                $('#edit_total').val(data[9]);


            });
        });
    </script>

    <!-- eliminar function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>