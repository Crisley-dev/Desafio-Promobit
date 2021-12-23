<?php
require(dirname(__DIR__) . DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR . 'connection.php');
//Session
session_start();
$_SESSION['login'] = $_POST['user_login'];
$_SESSION['pass'] = $_POST['user_pass'];


$sql = "select login, password from users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();
$db_user_login = $data['login'];
$db_user_pass = $data['password'];






//End Session
if (($_SESSION['login'] !== $db_user_login) or ($_SESSION['pass'] !== $db_user_pass))
{

unset($_SESSION['login']);
unset($_SESSION['pass']);
session_destroy();

//redirect page to login if failed
header('Location: ../page_login.php?msg=failed');
}

?>