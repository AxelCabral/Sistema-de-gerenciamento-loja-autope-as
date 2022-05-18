<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/month_data.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/managment_icon.svg">
    <title>Dados Mensais</title>
</head>
<body>
    <div class="return">
        <a href="index.php" title="Voltar">
            <img src="img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Dados Mensais</h1>
    </div>
    <div class="art">
        <img src="img/isometric_analysis.png" alt="isometric">
    </div>  
    <div class="form">
        <form action="unit_data.php" method="get">
            <label for="month">Mês:</label>
            <select name="month" required>
                <option value=""></option>
                <option value="Janeiro">Janeiro</option>
                <option value="Fevereiro">Fevereiro</option>
                <option value="Março">Março</option>
                <option value="Abril">Abril</option>
                <option value="Maio">Maio</option>
                <option value="Junho">Junho</option>
                <option value="Julho">Julho</option>
                <option value="Agosto">Agosto</option>
                <option value="Setembro">Setembro</option>
                <option value="Outubro">Outubro</option>
                <option value="Novembro">Novembro</option>
                <option value="Dezembro">Dezembro</option>
            </select>
            <label for="year">Ano:</label>
            <input type="number" value="2020" name="year" required>
            <input type="submit" class="button" value="Confirmar">
        </form>
    </div>
</body>
</html>