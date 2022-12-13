<?php 
include "include/valida_session_usuario.php";
include "include/mysqlconecta.php";

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$cpf_servidor = $_SESSION['cpf'];
$hoje = date('d/m/Y');


$SQL = "select * from efetivo where cpf='$cpf_servidor'";    
$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$rows = mysqli_fetch_array($result_id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/logo/ico.ico" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">    

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Relatório semanal Estrangeiros</title>
</head>
<body class="bg-light">
    <div class="container bg-primary text-white p-3 rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h2>
                <a href="relatorio.php" class="text-white text-decoration-none"><i class="bi bi-globe2"></i>  Relatório Semanal de Visitas</a>
            </h2>
            <button>Add Visita</button>
        </div>
    </div>
</body>
</html>