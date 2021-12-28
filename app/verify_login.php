<?php

session_start();
if(!$_SESSION['login']) {
	header('Location: ../page_login.php');
	exit();
}