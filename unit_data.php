<?php

    include_once ("pdo/connection.php");
    include_once ("pdo/DAO/buy_DAO.php");
    include_once ("pdo/DAO/expense_DAO.php");
    include_once ("pdo/DAO/sale_DAO.php");
    include_once ("month_number.php");
    include_once ("piece_list.php");

    if(isset($_GET['month'], $_GET['year'])&& $_GET['month'] != "" && $_GET['year'] != ""){
        $month = $_GET['month'];
        $year = $_GET['year'];

        $month_number = monthNumber($month);

        $c = new connection();
        $conn = $c->connect();

        $sum = new expense_DAO();
        $total_expense = $sum->total_expense($conn, $month_number, $year);

        $sum = new buy_DAO();
        $total_shopping = $sum->total_shopping($conn, $month_number, $year);

        $total = $total_expense+$total_shopping;

        $sum = new sale_DAO();
        $total_sales = $sum->total_sales($conn, $month_number, $year);

        $total_profit = $total_sales-$total;

        $select = new buy_DAO();
        $stmt = $select->piece_list($conn, $month_number, $year);

        $piece_list_names = pieceListNames($stmt);
        $piece_list_values = pieceListValues($stmt);
        $piece_list_limit = count($piece_list_names);

        if($piece_list_values[0] === 0){
            $piece_list_values[0] = "-";
        }
        
        $select = new buy_DAO();
        $stmt_shopping = $select->shopping_list_month($conn, $month_number, $year);

        $select = new expense_DAO();
        $stmt_expenses = $select->expense_list_month($conn, $month_number, $year);

        $select = new sale_DAO();
        $stmt_sales = $select->sale_list_month($conn, $month_number, $year);

    }else{
        header('Location:month_data.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/final_table.css">
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
    <div class="final_table">
        <div class="title">
            <h1>Dados Mensais - Exibindo dados do mês de <?= $month ?> de <?= $year ?></h1>
        </div>
        <div class="final_list_out">
            <div class="final_list">
                <table>
                    <tr>
                        <th>Total de Despesas Mensais</th><td>$U
                        <?= number_format($total_expense, 0, ' ', '.'); ?></td>   
                    </tr>
                    <tr>
                        <th>Total de Despesas em produtos</th><td>$U
                        <?= number_format($total_shopping , 0, ' ', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Total de Gastos do mês</th><td>$U
                        <?= number_format($total , 0, ' ', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Total em Vendas do mês</th><td>$U
                        <?= number_format($total_sales , 0, ' ', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Total de Lucro do mês</th><td>$U
                        <?= number_format($total_profit , 0, ' ', '.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="compras">
        <div class="title">
            <h1>Peças mais compradas</h1>
        </div>
        <div class="final_list_out">
            <div class="final_list">
                <table>
                    <tr>
                        <th>Peça</th><th>Unidades Compradas</th>
                    </tr>
                    <?php
                        for($i = 0; $i < $piece_list_limit; $i++){
                            echo "<tr>
                                <td>",$piece_list_names[$i],"</td><td>",$piece_list_values[$i],"</td>
                            </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="compras">
        <div class="title">
            <h1>Compras do mês</h1>
        </div>
        <div class="final_list_out">
            <div class="final_list">
                <table>
                    <tr>
                        <th>Peça</th><th>Quantidade</th><th>Empresa</th><th>Valor</th><th>Data</th> 
                    </tr>
            <?php
                if($stmt_shopping == null){
                    echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
                }
                else{
                    foreach($stmt_shopping as $buy){
                        echo "<tr>
                            <td>",$buy->cod,"</td>
                            <td>",$buy->quantidade,"</td>
                            <td>",$buy->empresa,'</td>
                            <td>$U ',number_format($buy->valor , 0, ' ', '.'),"</td>
                            <td>",date('d/m/Y', strtotime($buy->data)),"</td>
                        </tr>";
                    }
                }
            ?>
                </table>
            </div>
        </div>
    </div>
    <div class="compras">
        <div class="title">
            <h1>Despesas do mês</h1>
        </div>
        <div class="final_list_out">
            <div class="final_list">
                <table>
                    <tr>
                        <th>Nome</th><th>Valor</th><th>Data</th>
                    </tr>
            <?php
                if($stmt_expenses == null){
                    echo "<tr><td>-</td><td>-</td><td>-</td></tr>";
                }
                else{
                    foreach($stmt_expenses as $expense){
                        echo "<tr>
                            <td>",$expense->nome,'</td>
                            <td>$U ',number_format($expense->valor , 0, ' ', '.'),"</td>
                            <td>",date('d/m/Y', strtotime($expense->data)),"</td>
                        </tr>";
                    }
                }
            ?>
                </table>
            </div>
        </div>
    </div>
    <div class="compras">
        <div class="title">
            <h1>Caixas do mês</h1>
        </div>
        <div class="final_list_out">
            <div class="final_list">
                <table>
                    <tr>
                        <th>Caixa do dia</th><th>Valor</th>
                    </tr>
            <?php
                if($stmt_sales == null){
                    echo "<tr><td>-</td><td>-</td></tr>";
                }
                else{
                    foreach($stmt_sales as $sale){
                        echo "<tr>
                            <td>",date('d/m/Y', strtotime($sale->data)),'</td>
                            <td>$U ',number_format($sale->valor , 0, ' ', '.'),"</td>
                        </tr>";
                    }
                }
            ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>