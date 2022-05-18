<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/sales.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/managment_icon.svg">
    <title>Vendas</title>
</head>
<body>
    <div class="return">
        <a href="index.php" title="Voltar">
            <img src="img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Vendas</h1>
    </div>
    <div class="new_sale">
        <a href="new_sale.php" title="Registrar novas vendas">
            <img src="img/plus_icon.png" alt="add_sale">
        </a>
    </div>
    <div class="sale_list_out">
        <div class="sale_list">
            <table>
                <tr>
                    <th>Caixa do dia</th><th>Valor</th><th>Opções</th>
                </tr>
        <?php
            include_once ('pdo/connection.php');
            include_once ('pdo/DAO/sale_DAO.php');

            $c = new connection();
            $conn = $c->connect();

            $select = new sale_DAO();
            $stmt = $select->sale_list($conn);

            if($stmt == null){
                echo "<tr><td>-</td><td>-</td><td>-</td></tr>";
            }
            else{
                foreach($stmt as $sale){
                    echo "<tr>
                        <td>",date('d/m/Y', strtotime($sale->data)),'</td>
                        <td>$U ',number_format($sale->valor , 0, ' ', '.'),"</td>
                        <td><a href='pdo/edit_sale.php?id=",$sale->id,"' title='Editar'>
                            <img src='img/edit_icon.png' alt='edit'>
                        </a>
                        <a href='pdo/delete_sale.php?id=",$sale->id,"' title='Deletar'>
                            <img src='img/delete_icon.png' alt='delete'>
                        </a></td>
                    </tr>";
                }
            }
        ?>
            </table>
        </div>
    </div>
</body>
</html>