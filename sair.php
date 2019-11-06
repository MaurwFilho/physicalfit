<?php 

session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);
session_destroy();

header('Location: login.php');


 ?>