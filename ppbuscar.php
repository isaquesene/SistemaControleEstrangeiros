<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$SQL = "select * from estrangeiro where relacao='agendada'"; 
$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 1");

$linhas_json = array();

while ($rows = mysqli_fetch_array($result_id)){
    
    $id = $rows['ID'];
    $nome = $rows['nome'];
    $datain = $rows['datain'];
    $dataterm = $rows['dataterm'];
    $om = $rows['om'];
    $fcv = $rows['fcv'];
    $fvp = $rows['fvp'];
    $chegoubem = $rows['chegoubem'];


    $arquivo = $rows['arquivo2'];

    //$arquivos = $rows['imagem'];
             
    $btn = "<a onclick='entradaEstrangeiro($id)' class='btn badge bg-primary'>Entrada</a>
    <a href='./assets/uploads/$arquivo' target='_blank' class='btn badge bg-primary'>Visualizar</a>";
    
    $linha_json = array(
        'nome'=>mb_convert_encoding($nome, 'UTF-8', 'UTF-8'),
        'om'=>mb_convert_encoding($om, 'UTF-8', 'UTF-8'),
        'fcv'=>mb_convert_encoding($fcv, 'UTF-8', 'UTF-8'),
        'fvp' =>mb_convert_encoding($fvp, 'UTF-8', 'UTF-8'),
        'datain'=>mb_convert_encoding($datain, 'UTF-8', 'UTF-8'),
        'dataterm'=>mb_convert_encoding($dataterm, 'UTF-8', 'UTF-8'),
        'chegoubem'=>mb_convert_encoding($chegoubem, 'UTF-8', 'UTF-8'),
        'btn'=>$btn        
    ); 

    $linhas_json[] = $linha_json; 
    $btn = '';
}

echo json_encode($linhas_json);   

//<a href='./assets/uploads/$arquivo' target='_blank' class='btn badge bg-primary'>Visualizar</a>