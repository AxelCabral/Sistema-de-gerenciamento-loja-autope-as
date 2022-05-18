<?php

    include_once ("connection.php");
    include_once ("DAO/buy_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $b = new buy_DAO();
    $stmt = $b->edit_buy_info($id, $conn);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/buy_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/managment_icon.svg">
    <title>Editor de Compras</title>
</head>
<body>
    <div class="return">
        <a href="../shopping.php" title="Voltar">
            <img src="../img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Editar Compra</h1>
    </div>
    <div class="art">
        <img src="../img/isometric_buy.png" alt="isometric">
    </div>
    <div class="form">
        <form action="confirm_edit_buy.php" method="post">
        <?php
        foreach($stmt as $buy){
            echo"
            <label for='name'>Nome/Código do Produto:</label>
            <input type='text' name='name' value='",$buy->cod,"'>

            <label for='unitys'>Quantidade:</label>
            <input type='number' name='unitys' value='",$buy->quantidade,"'>

            <label for='value'>Valor:</label>
            <input type='number' name='value' value='",$buy->valor,"'>

            <label for='date'>Data:</label>
            <input type='date' name='date' value='",$buy->data,"'>

            <label for='company'>Empresa:</label>
            <input type='text' name='company' value='",$buy->empresa,"'>

            <input type='hidden' name='id' value='",$buy->id,"'>
            ";
        }
        ?>

            <input type="submit" class="button" value="Confirmar">
        </form>
    </div>
</body>
</html>