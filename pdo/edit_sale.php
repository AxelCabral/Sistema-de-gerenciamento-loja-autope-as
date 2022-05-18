<?php

    include_once ("connection.php");
    include_once ("DAO/sale_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $b = new sale_DAO();
    $stmt = $b->edit_sale_info($id, $conn);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/sale_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/managment_icon.svg">
    <title>Editor de Vendas</title>
</head>
<body>
    <div class="return">
        <a href="../sales.php" title="Voltar">
            <img src="../img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Editar Caixa</h1>
    </div>
    <div class="art">
        <img src="../img/isometric_sales.png" alt="isometric">
    </div>
    <div class="form">
        <form action="confirm_edit_sale.php" method="post">
        <?php
        foreach($stmt as $sale){
            echo"
            <label for='value'>Valor:</label>
            <input type='number' name='value' step='2' value='",$sale->valor,"'>

            <label for='date'>Data:</label>
            <input type='date' name='date' value='",$sale->data,"'>

            <input type='hidden' name='id' value='",$sale->id,"'>
            ";
        }
        ?>
            <input type="submit" class="button" value="Confirmar">
        </form>
    </div>
</body>
</html>