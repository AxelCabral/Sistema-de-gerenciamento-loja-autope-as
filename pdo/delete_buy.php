<?php
    include_once ("connection.php");
    include_once ("DAO/buy_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $b = new buy_DAO();
    $b->delete($id, $conn);

    header("location:../shopping.php");
