<?php
include_once("../../connection.php");

$oldTag = filter_input(INPUT_POST, "old_tag");
$tag = filter_input(INPUT_POST, "newTag");


try {

/* --------------------------- update tag name -------------------------- */

$pname = "UPDATE tag set name = ? where name = ?";
$stmt = $pdo->prepare($pname);
$stmt->execute([$tag,$oldTag]);
$stmt = NULL;


echo "success";
} catch (Exception $e){
    echo $e;
}






?>