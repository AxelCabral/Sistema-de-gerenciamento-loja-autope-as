<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/managment_icon.svg">
    <title>Página Inicial</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="background">
        <div class="title">
            <h1>Sistema de Gerenciamento de Negócio</h1>
        </div>
        <div class="support">
            <img src="img/support_icon.png" alt="support">
        </div>
        <div class="support-content">
            <div class="support-content-text">
                <h3>Despesas</h3><p>Nesta sessão existem as seguintes funcionalidades:</p>
                <ul>
                    <li>
                        Listagem de todas as despesas registradas das mais recentes para as mais antigas.
                    </li>
                    <li>
                        Registrar novas despesas como Água, Luz, Internet e etc.
                    </li>
                    <li>
                        Editar ou Excluir despesas já registradas.
                    </li>
                </ul>
            </div>
            <div class="support-content-text">
                <h3>Compras</h3><p>Nesta sessão existem as seguintes funcionalidades:</p>
                <ul>
                    <li>
                        Listagem de todas as compras registradas das mais recentes para as mais antigas.
                    </li>
                    <li>
                        Registrar novas compras.
                    </li>
                    <li>
                        Editar ou Excluir compras já registradas.
                    </li>
                </ul>
            </div>
            <div class="support-content-text">
                <h3>Vendas</h3><p>Nesta sessão existem as seguintes funcionalidades:</p>
                <ul>
                    <li>
                        Listagem de todas as vendas registradas das mais recentes para as mais antigas.
                    </li>
                    <li>
                        Registrar novas vendas.
                    </li>
                    <li>
                        Editar ou Excluir vendas já registradas.
                    </li>
                </ul>
            </div>
            <div class="support-content-text">
                <h3>Dados Mensais</h3><p>Nesta sessão existem as seguintes funcionalidades:</p>
                <ul>
                    <li>
                        Listagem do total de gastos do mês, sendo de despesas ou de compras.
                    </li>
                    <li>
                        Listagem de entrada de caixa e lucros obtidos do mês.
                    </li>
                    <li>
                        Listagem das peças mais compradas do mês.
                    </li>
                    <li>
                        Listagem de todas as despesas, compras e vendas registradas do mês.
                    </li>
                </ul>
            </div>
        </div>
        <div class="options">
            <div class="option1">
                <a href="expenses.php"><img src="img/expense_icon.svg" alt="isometric-art"></a>
                <a href="expenses.php" class="text-link">Despesas</a>
            </div>
            <div class="option2">
                <a href="shopping.php"><img src="img/shopping_icon.svg" alt="isometric-art"></a>
                <a href="shopping.php" class="text-link">Compras</a>
            </div>
            <div class="option3">
                <a href="sales.php"><img src="img/sales_icon.svg" alt="isometric-art"></a>
                <a href="sales.php" class="text-link">Vendas</a>
            </div>
            <div class="option4">
                <a href="month_data.php"><img src="img/data_icon.svg" alt="isometric-art"></a>
                <a href="month_data.php" class="text-link">Dados Mensais</a>
            </div>
        </div>
        <div class="effect">
            <img src="img/header_effect.png" alt="effect">
        </div>
    </div>
</body>
</html>