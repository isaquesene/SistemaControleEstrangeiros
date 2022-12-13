<?php
session_start();

//VALIDADE DA SESSÃO 1800 SEGUNDOS (320 MINUTOS)
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
     session_unset();
     session_destroy(); 
     header("Location: ./logout.php?e=se");
     exit;
}
$_SESSION['LAST_ACTIVITY'] = time();

if(!isset($_SESSION["cpf"])) {    
     header("Location: ./logout.php");
     exit;   
}