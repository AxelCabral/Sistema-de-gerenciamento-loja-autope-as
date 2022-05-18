<?php
    include_once ("connection.php");
    include_once ("DAO/expense_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $b = new expense_DAO();
    $b->delete($id, $conn);

    header("location:../expenses.php");
