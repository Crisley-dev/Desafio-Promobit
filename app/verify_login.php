<?php

//verify if session login exist, if not then redirect to login page
session_start();
if(!$_SESSION['login']) {
	header('Location: ../page_login.php');
	exit();
}