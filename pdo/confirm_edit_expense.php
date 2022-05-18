<?php
    include_once ("classes/expense.php");
    include_once ("connection.php");
    include_once ("DAO/expense_DAO.php");

    if(isset($_POST['id'], $_POST['name'], $_POST['value'], $_POST['date']) && $_POST['id'] != "" 
    && $_POST['name'] != "" && $_POST['value'] != "" && $_POST['date'] != ""){

        $id = $_POST['id'];

        $c = new connection();
        $conn = $c->connect();

        $e = new expense();
        $e->setName($_POST['name']);
        $e->setValue($_POST['value']);
        $e->setDate($_POST['date']);

        $edit = new expense_DAO();
        $result = $edit->edit_expense($id, $e, $conn);

        if($result === true){
            $message = "Despesa editada com sucesso!";
        }
        else{
            $message = "Ocorreu um erro no precedimento, verifique se o Servidor foi iniciado.";
        }
    }
    else{
        $message = "As informações enviadas não são válidas";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/expense_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/managment_icon.svg">
    <title>Editar Despesa</title>
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
        <div class="confirm">
            <p class="message"><?= $message ?></p>
            <a href="../expenses.php"><button class="button_2">Voltar às despesas</button></a>
        </div>
    </div>
</body>
</html>