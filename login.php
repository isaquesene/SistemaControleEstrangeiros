<?php
session_start();

include "include/mysqlconecta.php";
include "assets/functions/funcoes.php";

$username = $_POST['cpf'];
$password = $_POST['senha'];

$SQL = "select * from efetivo where cpf ='".$username."'";
$result = @mysqli_query($conexao,$SQL) or die("Erro 001 - Contate o administrador.");        
$conta_usuario = mysqli_num_rows($result);

if ($conta_usuario >0){
    
    $rows = mysqli_fetch_array($result);

    if($rows['user_type'] == 'admin'){

        $_SESSION['admin_name'] = $rows['cpf'];
        echo "<script>location.href=\"cadastro.php\";</script>";   
        
    } else {
        
        $_SESSION['user_name'] = $rows['cpf'];
        echo "<script>location.href=\"pp.php\";</script>";   
    }

    $_SESSION["cpf"] = $rows['cpf'];
    $_SESSION["nrordem"] = $rows['nrordem'];             
    $_SESSION["nomeguerra"] = $rows['nomeguerra']; 
    $_SESSION["user_type"] = $rows['user_type'];            

    $nrordem = $_SESSION["nrordem"];
    
    $url = "http://api.servicos.ccarj.intraer/sigpesApi/fotoes/".$nrordem."/";                
    $resultado = json_decode(file_get_contents($url));                 
    $foto_recuperada=$resultado->imFoto;

    if($foto_recuperada==''){ 
        $_SESSION['foto_nao_encontrada'] = true;
        $foto_recuperada = './assets/images/default_avatar.png'; 
    }

    $_SESSION['foto_perfil'] = $foto_recuperada;

    echo "<script>location.href=\"cadastro.php\";</script>";        
 
} else {
    echo "<script>location.href=\"index.php?e=e\";</script>";
    session_destroy();
}
?>