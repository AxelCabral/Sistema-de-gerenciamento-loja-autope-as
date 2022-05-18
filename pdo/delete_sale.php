<?php
    include_once ("connection.php");
    include_once ("DAO/sale_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $b = new sale_DAO();
    $b->delete($id, $conn);

    header("location:../sales.php");
