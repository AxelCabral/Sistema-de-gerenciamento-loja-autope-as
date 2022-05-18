<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/shopping.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/managment_icon.svg">
    <title>Compras</title>
</head>
<body>
    <div class="return">
        <a href="index.php" title="Voltar">
            <img src="img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Compras</h1>
    </div>
    <div class="new_buy">
        <a href="new_buy.php" title="Registrar nova compra">
            <img src="img/plus_icon.png" alt="add_buy">
        </a>
    </div>
    <div class="shopping_list_out">
        <div class="shopping_list">
            <table>
                <tr>
                    <th>Peça</th><th>Quantidade</th><th>Empresa</th><th>Valor</th><th>Data</th>
                    <th>Opções</th>
                </tr>
        <?php
            include_once ('pdo/connection.php');
            include_once ('pdo/DAO/buy_DAO.php');

            $c = new connection();
            $conn = $c->connect();

            $select = new buy_DAO();
            $stmt = $select->shopping_list($conn);

            if($stmt == null){
                echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
            }
            else{
                foreach($stmt as $buy){
                    echo "<tr>
                        <td>",$buy->cod,"</td>
                        <td>",$buy->quantidade,"</td>
                        <td>",$buy->empresa,'</td>
                        <td>$U ',number_format($buy->valor , 0, ' ', '.'),"</td>
                        <td>",date('d/m/Y', strtotime($buy->data)),"</td>
                        <td><a href='pdo/edit_buy.php?id=",$buy->id,"' title='Editar'>
                            <img src='img/edit_icon.png' alt='edit'>
                        </a>
                        <a href='pdo/delete_buy.php?id=",$buy->id,"' title='Deletar'>
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