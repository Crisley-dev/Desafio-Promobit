<?php
require(dirname(__DIR__) . DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR . 'connection.php');
//Session start

session_start();
// Gets user and password sent by form
$_SESSION['login'] = $_POST['user_login'];
$_SESSION['pass'] = $_POST['user_pass'];


//get from database the user and password
$sql = "select login, password from users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();
$db_user_login = $data['login'];
$db_user_pass = $data['password'];


//End Session if user from form don't match with the user registered on db
if (($_SESSION['login'] !== $db_user_login) or ($_SESSION['pass'] !== $db_user_pass))
{

unset($_SESSION['login']);
unset($_SESSION['pass']);
session_destroy();

//redirect page to login if failed
header('Location: page_login.php?msg=failed');
} else 
{
//redirect page if login success

    header('Location: products/prod_list.php');
}

?>