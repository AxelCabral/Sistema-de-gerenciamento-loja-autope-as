<?php
class buy_DAO{
    public function insert_buy($buy, $connection){

        include_once ("classes/buy.php");

        try{
            $stmt = $connection->prepare("INSERT INTO compras(cod, quantidade, empresa, valor, data) 
            VALUES(:cod, :quantidade, :empresa, :valor, :data)");
            $stmt->bindValue(":cod", $buy->getCode());
            $stmt->bindValue(":quantidade", $buy->getUnitys());
            $stmt->bindValue(":empresa", $buy->getCompany());
            $stmt->bindValue(":valor", $buy->getValue());
            $stmt->bindValue(":data", $buy->getDate());

            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();

            return false;
        }
    }
    public function shopping_list($connection){
        try{
            $stmt = $connection->query("SELECT * FROM compras ORDER BY data DESC LIMIT 100")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function delete($id, $connection){
        try{
            $stmt = $connection->prepare("DELETE FROM compras WHERE id = :id");
            $stmt->bindValue(":id", $id);

            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function edit_buy_info($id, $connection){
        try{
            $stmt = $connection->query("SELECT * FROM compras WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function edit_buy($id, $buy, $connection){

        include_once ("classes/buy.php");

        try{
            $stmt = $connection->prepare("UPDATE compras SET cod = ?, quantidade = ?, valor = ?,
            empresa = ?, data = ? WHERE id = ?");

            $stmt->bindValue(1, $buy->getCode());
            $stmt->bindValue(2, $buy->getUnitys());
            $stmt->bindValue(3, $buy->getValue());
            $stmt->bindValue(4, $buy->getCompany());
            $stmt->bindValue(5, $buy->getDate());
            $stmt->bindValue(6, $id);

            $stmt->execute();

            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();

            return false;
        }
    }
    public function total_shopping($connection, $m, $y){

        include_once ("sum_values.php");

        try{
            $stmt = $connection->query("SELECT valor FROM compras WHERE month(data) = $m 
            and year(data) = $y")->fetchAll(PDO::FETCH_OBJ);

            $sum = sum_all($stmt);

            return $sum;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function piece_list($connection, $m, $y){
        try{
            $stmt = $connection->query("SELECT cod, quantidade FROM compras WHERE month(data) = $m
            AND year(data) = $y")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    public function shopping_list_month($connection, $m, $y){
        try{
            $stmt = $connection->query("SELECT * FROM compras WHERE month(data) = $m AND year(data) 
            = $y ORDER BY data DESC")->fetchAll(PDO::FETCH_OBJ);

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
