<?php

    include_once ("connection.php");
    include_once ("DAO/expense_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $b = new expense_DAO();
    $stmt = $b->edit_expense_info($id, $conn);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/expense_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/managment_icon.svg">
    <title>Editor de Despesas</title>
</head>
<body>
    <div class="return">
        <a href="../expenses.php" title="Voltar">
            <img src="../img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Editar Despesa</h1>
    </div>
    <div class="art">
        <img src="../img/isometric_expenses.png" alt="isometric">
    </div>
    <div class="form">
        <form action="confirm_edit_expense.php" method="post">
        <?php
        foreach($stmt as $expense){
            echo"
            <label for='name'>Tipo de despesa:</label>
            <input type='text' name='name' value='",$expense->nome,"'>

            <label for='value'>Valor:</label>
            <input type='number' name='value' step='2' value='",$expense->valor,"'>

            <label for='date'>Data:</label>
            <input type='date' name='date' value='",$expense->data,"'>

            <input type='hidden' name='id' value='",$expense->id,"'>
            ";
        }
        ?>
            <input type="submit" class="button" value="Confirmar">
        </form>
    </div>
</body>
</html>