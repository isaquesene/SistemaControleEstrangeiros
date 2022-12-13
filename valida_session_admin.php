<?php

//VERIFICA SE É ADMIN
if ($_SESSION['user_type'] !== 'admin'){
     header("Location: ./logout.php");
     exit;   
}