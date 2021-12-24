<?php

include_once("../../connection.php");

$product = filter_input(INPUT_POST, 'product');
$tag = filter_input(INPUT_POST, 'tag');


try{
    $query_prod = "insert into product (name) values (?)";
    $stmt = $pdo->prepare($query_prod);
    $stmt->execute([$product]);
    $lid = $pdo->lastInsertId();
    
    
    $query_tag = "select name, id from tag where id in($tag)";
    $stmt = $pdo->prepare($query_tag);
    $stmt->execute();
    $data = $stmt->fetchAll();
    
    
    
    foreach($data as $id)
    {
        $ins = "INSERT INTO product_tag (product_id, tag_id) values (?,?)";
        $stmt_pt = $pdo->prepare($ins);
        $stmt_pt->execute([$lid, $id['id']]);
    
    }
    echo 'success';
} catch(Exception $e){
    echo $e;
}


/*

*/

