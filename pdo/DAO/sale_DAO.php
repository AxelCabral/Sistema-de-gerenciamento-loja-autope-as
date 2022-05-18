<?php
class sale_DAO{
    public function insert_sale($sale, $connection){
        
        include_once ("classes/sale.php");

        try{
            $stmt = $connection->prepare("INSERT INTO vendas(valor, data) VALUES(:valor, :data)");
            $stmt->bindValue(":valor", $sale->getValue());
            $stmt->bindValue(":data", $sale->getDate());
        
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();

            return false;
        }
    }
    public function sale_list($connection){
        try{
            $stmt = $connection->query("SELECT * FROM vendas ORDER BY data DESC LIMIT 100")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function delete($id, $connection){
        try{
            $stmt = $connection->prepare("DELETE FROM vendas WHERE id = :id");
            $stmt->bindValue(":id", $id);

            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function edit_sale_info($id, $connection){
        try{
            $stmt = $connection->query("SELECT * FROM vendas WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function edit_sale($id, $expense, $connection){

        include_once ("classes/expense.php");

        try{
            $stmt = $connection->prepare("UPDATE vendas SET valor = ?, data = ? WHERE id = ?");

            $stmt->bindValue(1, $expense->getValue());
            $stmt->bindValue(2, $expense->getDate());
            $stmt->bindValue(3, $id);

            $stmt->execute();

            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();

            return false;
        }
    }
    public function total_sales($connection, $m, $y){

        include_once ("sum_values.php");

        try{
            $stmt = $connection->query("SELECT valor FROM vendas WHERE month(data) = $m 
            AND year(data) = $y")->fetchAll(PDO::FETCH_OBJ);

            $sum = sum_all($stmt);

            return $sum;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function sale_list_month($connection, $m, $y){
        try{
            $stmt = $connection->query("SELECT * FROM vendas WHERE month(data) = $m AND year(data) 
            = $y ORDER BY data DESC")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}