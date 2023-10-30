<?php
include("./conexion.php");

// Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['edit_data'])) {
    // recuperar datos del formulario
    $id = $_POST['edit_id'];
    $idpedido= $_POST['edit_idpedido'];
    $idproduto = $_POST['edit_idproducto'];
    $cantiidad = $_POST['edit_cantiidad'];
    $precio = $_POST['edit_precio'];
    $subtotal = $_POST['edit_subtotal'];
    $descuento = $_POST['edit_descuento'];
    $impuesto = $_POST['edit_impuesto'];
    $total = $_POST['edit_total'];
    
    // consulta
    $sql = "UPDATE pedido SET idpedido='$idpedido', idproducto='$idproduto', cantiidad='$cantiidad', precio='$precio', subtotal='$subtotal', descuento='$descuento', impuesto='$impuesto', total ='$total' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    //¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Acceso prohibido...");
