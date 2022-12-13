<?php
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$hoje = date('d/m/Y');
$acao = $_POST['acao'];

$cpf_servidor = $_SESSION['cpf'];
$nome = $_POST['nome'];
$nacionalidade = $_POST['nacionalidade'];
$passaport = $_POST['passaport'];
$empresa = $_POST['empresa'];
$instituto = $_POST['instituto'];
$fcv = $_POST['fcv'];
$fvp = $_POST['fvp'];
$oficio = $_POST['oficio'];
$om = $_POST['om'];
$vezesom = $_POST['vezesom'];
$relacao = $_POST['relacao'];
$chegoubem = $_POST['chegoubem'];
$quemrecebeu = $_POST['quemrecebeu'];
$alerta = $_POST['alerta'];
$datarec = $_POST['datarec'];
$datarec = date("d/m/Y", strtotime($datarec));
$datain = $_POST['datain'];
$datain = date("d/m/Y", strtotime($datain));
$dataterm = $_POST['dataterm'];
$dataterm = date("d/m/Y", strtotime($dataterm));
$motivo = $_POST['pesquisaint'];

//EXTENSÕES ACEITAS PARA UPLOAD
$valid_extensions = array('jpeg', 'jpg', 'png','pdf','jfif','doc','docx'); 

$path = '../uploads/'; 
$path2 = '../uploads/';
$arquivo = '';
$termos = '';


if ($acao == "cadastrar"){

    if($_FILES['arquivo']){
        $arq = $_FILES['arquivo']['name'];
        $tmp = $_FILES['arquivo']['tmp_name'];
        
        $ext = strtolower(pathinfo($arq, PATHINFO_EXTENSION));
        
        $final_arq = rand(1000,1000000).$arq;
        
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final_arq); 
            if(move_uploaded_file($tmp,$path)) 
            {
                $arquivo = strtolower($final_arq);
            } else {
                $arquivo = '';
            }
        } else {
            $arquivo = '';
        }
    }
    
    if($_FILES['termo']){
        $arquivo2 = $_FILES['termo']['name'];
        $tmp2 = $_FILES['termo']['tmp_name'];
        
        $ext = strtolower(pathinfo($arquivo2, PATHINFO_EXTENSION));
        
        $final_arq = rand(1000,1000000).$arquivo2;
        
        if(in_array($ext, $valid_extensions)) 
        { 
            $path2 = $path2.strtolower($final_arq); 
            if(move_uploaded_file($tmp2,$path2)) 
            {
                $termos = strtolower($final_arq);
            } else {
                $termos = '';
            }
        } else {
            $termos = '';
        }
    }

    $SQL = "insert into estrangeiro(nome,nacionalidade,passaport,empresa,instituto,fcv,fvp,oficio,om,vezesom,relacao,chegoubem,quemrecebeu,datarec,alerta,datain,dataterm,pesquisaint,imagem,arquivo2) values ('$nome','$nacionalidade','$passaport','$empresa','$instituto','$fcv','$fvp','$oficio','$om','$vezesom','$relacao','$chegoubem','$quemrecebeu','$datarec','$alerta','$datain','$dataterm','$motivo','$arquivo','$termos')";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  
    
    $id_cadastrado = mysqli_insert_id($conexao); 

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";

} else if ($acao == "editar"){

    $id = $_POST['id_edt'];
    $nome = $_POST['nome_edt'];    
    $nacionalidade = $_POST['nacionalidade_edt'];
    $passaport = $_POST['passaport_edt'];
    $empresa = $_POST['empresa_edt'];
    $instituto = $_POST['instituto_edt'];
    $fcv = $_POST['fcv_edt'];
    $fvp = $_POST['fvp_edt'];
    $om = $_POST['om_edt'];
    $vezesom = $_POST['vezesom_edt'];
    $relacao = $_POST['relacao_edt'];
    $chegoubem = $_POST['chegoubem_edt'];
    $quemrecebeu = $_POST['quemrecebeu_edt'];
    $alerta = $_POST['alerta_edt'];
    $datarec = $_POST['datarec_edt'];
    $datarec = date("d/m/Y", strtotime($datarec));
    $datain = $_POST['datain_edt'];
    $datain = date("d/m/Y", strtotime($datain));    
    $dataterm = $_POST['dataterm_edt'];    
    $dataterm = date("d/m/Y", strtotime($dataterm));
    $motivo = $_POST['pesquisaint_edt']; 
    

    if($_FILES['arquivo_edt']){
        $arq = $_FILES['arquivo_edt']['name'];
        $tmp = $_FILES['arquivo_edt']['tmp_name'];
        
        $ext = strtolower(pathinfo($arq, PATHINFO_EXTENSION));
        
        $final_arq = rand(1000,1000000).$arq;
        
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final_arq); 
            if(move_uploaded_file($tmp,$path)) 
            {
                $arquivo = strtolower($final_arq);
                $arquivo_antigo = strtolower($final_arq);
                unlink($arquivo_antigo_url);

            } else {
                $arquivo = '';
            }
        } else {
            $arquivo = '';
        }
    }

    

    if($arquivo==''){$incremento=",imagem='$arquivo'";} else {$incremento = '';}


    if($_FILES['termo_edt']){
        $arquivo2 = $_FILES['termo_edt']['name'];
        $tmp2 = $_FILES['termo_edt']['tmp_name'];
        
        $ext = strtolower(pathinfo($arquivo2, PATHINFO_EXTENSION));
        
        $final_arq = rand(1000,1000000).$arquivo2;
        
        if(in_array($ext, $valid_extensions)) 
        { 
            $path2 = $path2.strtolower($final_arq); 
            if(move_uploaded_file($tmp2,$path2)) 
            {
                $termos = strtolower($final_arq);
                $termos_antigo = strtolower($final_arq);
                unlink($termos_antigo_url);
            } else {
                $termos = '';
            }
        } else {
            $termos = '';
        }
    }

    

    if($termos==''){$incremento2=",arquivo2='$termos'";} else {$incremento2 = '';}

    $SQL = "update estrangeiro set nome='$nome',nacionalidade='$nacionalidade',passaport='$passaport',empresa='$empresa',instituto='$instituto',fcv='$fcv',fvp='$fvp',om='$om',vezesom='$vezesom',relacao='$relacao',chegoubem='$chegoubem',quemrecebeu='$quemrecebeu',alerta='$alerta',datarec='$datarec',datain='$datain',dataterm='$dataterm',pesquisaint='$motivo',arquivo2='$termos' where ID=$id";

    //$SQL = "update estrangeiro set nome='$nome',nacionalidade='$nacionalidade',passaport='$passaport',empresa='$empresa',instituto='$instituto' where ID=$id";
    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 2");    

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";    
    


} else if ($acao == 'excluir'){

    $id = $_POST['id'];

    $SQL = "delete from estrangeiro where ID=$id"; 
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";   

} else {
    echo "<input type='hidden' name='sucesso' id='sucesso' value='0'>";    
}
?>