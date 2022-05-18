<?php
    include_once ("connection.php");
    include_once ("classes/sale.php");
    include_once ("DAO/sale_DAO.php");

    if(isset($_POST['value'], $_POST['date']) && $_POST['value'] != "" && $_POST['date'] != ""){

        $c = new connection();
        $conn = $c->connect();

        $s = new sale();
        $s->setValue($_POST['value']);
        $s->setDate($_POST['date']);

        $insert = new sale_DAO();
        $result = $insert->insert_sale($s, $conn);

        if($result === true){
            $message = "Caixa registrado com sucesso!";
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
    <link rel="stylesheet" type="text/css" href="../css/sale_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/managment_icon.svg">
    <title>Registro de Vendas</title>
</head>
<body>
    <div class="return">
        <a href="../sales.php" title="Voltar">
            <img src="../img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Registro de Caixa</h1>
    </div>
    <div class="art">
        <img src="../img/isometric_sales.png" alt="isometric">
    </div>
    <div class="form">
        <div class="confirm">
            <p class="message"><?= $message ?></p>
            <a href="../new_sale.php"><button class="button_2">Registrar outro caixa</button></a>
        </div>
    </div>
</body>
</html>