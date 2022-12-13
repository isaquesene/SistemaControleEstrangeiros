<?php
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$hoje = date('d/m/Y');
$acao = $_POST['acao'];

$cpf_servidor = $_SESSION['cpf'];
$portao = $_POST['portao'];
$nome = $_POST['nome'];
$acompanhante = $_POST['acompanhante'];
$cpf = $_POST['cpf'];
$equipe_servico = $_POST['equipe_servico'];
$obs_entrada = $_POST['obs_entrada'];

if ($acao == "entrada"){
    
    $SQL = "insert into controle(portao,nomeestrangeiro,dataentrada,acompanhanteent,cpf,equipeent,obsent) values ('$portao','$nome',now(),'$acompanhante','$cpf','$equipe_servico','$obs_entrada')";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  
    
    $id_cadastrado = mysqli_insert_id($conexao); 

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";
    exit;

}
if($acao == 'saida'){

    $id_controle = $_POST['id_controle'];
    $acompanhantesaida = $_POST['acompanhantesaida'];
    $cpfsaida = $_POST['cpfsaida'];
    $equipesaida = $_POST['equipesaida'];
    $obssaida = $_POST['obssaida'];

    $SQL = "update controle set datasaida=now(),acompanhantesaida='$acompanhantesaida',cpfsaida='$cpfsaida',equipesaida='$equipesaida',obssaida='$obssaida' where id = $id_controle";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";
    exit;
}
if($acao == 'nao'){
    $sql = "insert into controle(nao,obsnao) values ('$nao','$obsnao')";
}
?>