<?php
    include_once ("connection.php");
    include_once ("classes/buy.php");
    include_once ("DAO/buy_DAO.php");

    if(isset($_POST['name'], $_POST['unitys'], $_POST['value'], $_POST['date'], $_POST['company']) && 
    $_POST['name'] != "" && $_POST['unitys'] != "" && $_POST['value'] != "" && $_POST['date'] != ""
    && $_POST['company'] != ""){

        $c = new connection();
        $conn = $c->connect();

        $b = new buy();
        $b->setCode($_POST['name']);
        $b->setUnitys($_POST['unitys']);
        $b->setValue($_POST['value']);
        $b->setDate($_POST['date']);
        $b->setCompany($_POST['company']);

        $insert = new buy_DAO();
        $result = $insert->insert_buy($b, $conn);

        if($result === true){
            $message = "Compra registrada com sucesso!";
        }
        else{
            $message = "Ocorreu um erro no procedimento, verifique se o Servidor foi iniciado.";
        }
    }
    else{
        $message = "As informações enviadas não são válidas.";
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
    <title>Nova Compra</title>
</head>
<body>
    <div class="return">
        <a href="../shopping.php" title="Voltar">
            <img src="../img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Nova Compra</h1>
    </div>
    <div class="art">
        <img src="../img/isometric_buy.png" alt="isometric">
    </div>
    <div class="form">
        <div class="confirm">
            <p class="message"><?= $message ?></p>
            <a href="../new_buy.php"><button class="button_2">Registrar outra compra</button></a>
        </div>
    </div>
</body>
</html>