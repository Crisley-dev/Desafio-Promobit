<?php

include_once("../../connection.php");

$tag = filter_input(INPUT_POST, 'tag');


try{
    $query_prod = "insert into tag (name) values (?)";
    $stmt = $pdo->prepare($query_prod);
    $stmt->execute([$tag]);
    
    echo 'success';
} catch(Exception $e){
    echo $e;
}


/*

*/

