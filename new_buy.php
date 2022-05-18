<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/buy_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/managment_icon.svg">
    <title>Nova Compra</title>
</head>
<body>
    <div class="return">
        <a href="shopping.php" title="Voltar">
            <img src="img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Nova Compra</h1>
    </div>
    <div class="art">
        <img src="img/isometric_buy.png" alt="isometric">
    </div>
    <div class="form">
        <form action="pdo/confirm_buy.php" method="post">
            <label for="name">Nome/Código do Produto:</label>
            <input type="text" name="name" placeholder="Ex: #001">

            <label for="unitys">Quantidade:</label>
            <input type="number" name="unitys" placeholder="Ex: 5">

            <label for="value">Valor:</label>
            <input type="number" name="value" placeholder="Ex: 1000">

            <label for="date">Data:</label>
            <input type="date" name="date">
                
            <label for="company">Empresa:</label>
            <input type="text" name="company" placeholder="Ex: Nicolussi Eletricidad">

            <input type="submit" class="button" value="Confirmar">
        </form>
    </div>
</body>
</html>