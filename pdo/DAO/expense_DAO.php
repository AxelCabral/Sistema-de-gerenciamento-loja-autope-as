<?php
class expense_DAO{
    public function insert_expense($expense, $connection){
        
        include_once ("classes/expense.php");

        try{
            $stmt = $connection->prepare("INSERT INTO gastos(nome, valor, data) VALUES(:nome, :valor, :data)");
            $stmt->bindValue(":nome", $expense->getName());
            $stmt->bindValue(":valor", $expense->getValue());
            $stmt->bindValue(":data", $expense->getDate());
        
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();

            return false;
        }
    }
    public function expense_list($connection){
        try{
            $stmt = $connection->query("SELECT * FROM gastos ORDER BY data DESC LIMIT 100")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function delete($id, $connection){
        try{
            $stmt = $connection->prepare("DELETE FROM gastos WHERE id = :id");
            $stmt->bindValue(":id", $id);

            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function edit_expense_info($id, $connection){
        try{
            $stmt = $connection->query("SELECT * FROM gastos WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function edit_expense($id, $expense, $connection){

        include_once ("classes/expense.php");

        try{
            $stmt = $connection->prepare("UPDATE gastos SET nome = ?, valor = ?, data = ? WHERE id = ?");

            $stmt->bindValue(1, $expense->getName());
            $stmt->bindValue(2, $expense->getValue());
            $stmt->bindValue(3, $expense->getDate());
            $stmt->bindValue(4, $id);

            $stmt->execute();

            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();

            return false;
        }
    }
    public function total_expense($connection, $m, $y){

        include_once ("sum_values.php");

        try{
            $stmt = $connection->query("SELECT valor FROM gastos WHERE month(data) = $m 
            AND year(data) = $y")->fetchAll(PDO::FETCH_OBJ);

            $sum = sum_all($stmt);

            return $sum;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function expense_list_month($connection, $m, $y){
        try{
            $stmt = $connection->query("SELECT * FROM gastos WHERE month(data) = $m AND year(data) 
            = $y ORDER BY data DESC")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
