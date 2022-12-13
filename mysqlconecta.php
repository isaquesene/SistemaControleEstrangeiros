<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD","Password01");
define("DB_DATABASE", "aidcta");
// Conecta-se com o MySQL
$conexao = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
mysqli_select_db($conexao,"aidcta");
?>
