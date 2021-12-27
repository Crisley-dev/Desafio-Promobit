<?php

include_once("../../connection.php");

$product_id = filter_input(INPUT_POST, 'product_id');

try{
    $sql = "DELETE from product_tag where product_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    $stmt = NULL;

    $sql = "DELETE from product where id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    $stmt = NULL;
    

    echo "success";
}catch(Exception $e){
    echo $e;
}