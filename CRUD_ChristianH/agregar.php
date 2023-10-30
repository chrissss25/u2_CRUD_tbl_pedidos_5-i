<?php
include("./conexion.php");

//Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['tambah'])) {
    // recuperar datos del formulario
    $idpedido = $_POST['idpedido'];
    $idproducto = $_POST['idproducto'];
    $cantiidad = $_POST['cantiidad'];
    $precio = $_POST['precio'];
    $subtotal = $_POST['subtotal'];
    $descuento = $_POST['descuento'];
    $impuesto = $_POST['impuesto'];
    $total = $_POST['total'];

    //consulta
    $sql = "INSERT INTO pedido(idpedido,idproducto,cantiidad,precio,subtotal,descuento,impuesto,total)
    VALUES('$idpedido', '$idproducto', '$cantiidad', '$precio', '$subtotal', '$descuento', '$impuesto', '$total')";
    $query = mysqli_query($db, $sql);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Acceso prohibido...");
