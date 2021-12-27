<?php
include_once("../../connection.php");

$product = filter_input(INPUT_POST, "product");
$old_product = filter_input(INPUT_POST, "old_product");
$tag = filter_input(INPUT_POST, "newTagId");
$tagId = filter_input(INPUT_POST, "tagId");
$productId = filter_input(INPUT_POST, "productId");

try {

/* --------------------------- update product name -------------------------- */

$pname = "UPDATE product set name = ? where name = ?";
$stmt = $pdo->prepare($pname);
$stmt->execute([$product,$old_product]);
$stmt = NULL;

/* ----------------------------- associated tags ---------------------------- */

$assoc = "UPDATE product_tag set tag_id = ? where product_id = ? and tag_id = ?";
$stmt = $pdo->prepare($assoc);
$stmt->execute([$tag,$productId,$tagId]);
$stmt = NULL;

echo "success";
} catch (Exception $e){
    echo $e;
}






?>