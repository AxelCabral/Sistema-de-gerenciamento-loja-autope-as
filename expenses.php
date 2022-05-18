<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/expenses.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/managment_icon.svg">
    <title>Despesas Mensais</title>
</head>
<body>
    <div class="return">
        <a href="index.php" title="Voltar">
            <img src="img/return_icon.png" alt="return">
        </a>
    </div>
    <div class="title">
        <h1>Despesas</h1>
    </div>
    <div class="new_expense">
        <a href="new_expense.php" title="Registrar nova despesa">
            <img src="img/plus_icon.png" alt="add_expense">
        </a>
    </div>
    <div class="expense_list_out">
        <div class="expense_list">
            <table>
                <tr>
                    <th>Nome</th><th>Valor</th><th>Data</th><th>Opções</th>
                </tr>
        <?php
            include_once ('pdo/connection.php');
            include_once ('pdo/DAO/expense_DAO.php');

            $c = new connection();
            $conn = $c->connect();

            $select = new expense_DAO();
            $stmt = $select->expense_list($conn);

            if($stmt == null){
                echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
            }
            else{
                foreach($stmt as $expense){
                    echo "<tr>
                        <td>",$expense->nome,'</td>
                        <td>$U ',number_format($expense->valor , 0, ' ', '.'),"</td>
                        <td>",date('d/m/Y', strtotime($expense->data)),"</td>
                        <td><a href='pdo/edit_expense.php?id=",$expense->id,"' title='Editar'>
                            <img src='img/edit_icon.png' alt='edit'>
                        </a>
                        <a href='pdo/delete_expense.php?id=",$expense->id,"' title='Deletar'>
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