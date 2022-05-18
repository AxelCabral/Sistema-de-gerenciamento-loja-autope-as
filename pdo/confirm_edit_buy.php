<?php
    include_once ("classes/buy.php");
    include_once ("connection.php");
    include_once ("DAO/buy_DAO.php");

    if(isset($_POST['id'], $_POST['name'], $_POST['unitys'], $_POST['date'], $_POST['value'], $_POST['company'])
    && $_POST['id'] != "" && $_POST['name'] != "" && $_POST['unitys'] != "" && $_POST['value'] != "" &&
    $_POST['company'] != "" && $_POST['date'] !=""){

        $id = $_POST['id'];

        $c = new connection();
        $conn = $c->connect();

        $b = new buy();
        $b->setCode($_POST['name']);
        $b->setUnitys($_POST['unitys']);
        $b->setDate($_POST['date']);
        $b->setValue($_POST['value']);
        $b->setCompany($_POST['company']);

        $edit = new buy_DAO();
        $result = $edit->edit_buy($id, $b, $conn);

        if($result === true){
            $message = "Compra editada com sucesso!";
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
    <link rel="stylesheet" type="text/css" href="../css/buy_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/managment_icon.svg">
    <title>Editar Compra</title>
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
        <div class="confirm">
            <p class="message"><?= $message ?></p>
            <a href="../shopping.php"><button class="button_2">Voltar às compras</button></a>
        </div>
    </div>
</body>
</html>