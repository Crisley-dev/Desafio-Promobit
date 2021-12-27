<?php

include_once("../../connection.php");


$tag_id = filter_input(INPUT_POST, 'tag_id');

try{

    $sql = "DELETE from product_tag where tag_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tag_id]);
    $stmt = NULL;
   
    $sql = "DELETE from tag where id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tag_id]);
    $stmt = NULL; 

    echo "success";
}catch(Exception $e){
    echo $e;
}