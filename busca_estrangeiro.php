<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$SQL = "select * from estrangeiro"; 
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
    //$arquivo = $rows['imagem'];
            
    $btn = "<a id='btn_editar' onclick='editarEstrangeiro($id)' class='btn badge bg-primary'>Editar</a>
    <a id='btn_excluir' onclick='excluirEstrangeiro($id)' class='badge bg-danger'>Excluir</a>";       
    
    $linha_json = array(
        'nome'=>mb_convert_encoding($nome, 'UTF-8', 'UTF-8'),
        'om'=>mb_convert_encoding($om, 'UTF-8', 'UTF-8'),
        'fcv'=>mb_convert_encoding($fcv, 'UTF-8', 'UTF-8'),
        'fvp' =>mb_convert_encoding($fvp, 'UTF-8', 'UTF-8'),
        'datain'=>mb_convert_encoding($datain, 'UTF-8', 'UTF-8'),
        'dataterm'=>mb_convert_encoding($dataterm, 'UTF-8', 'UTF-8'),
        'btn'=>$btn        
    ); 

    $linhas_json[] = $linha_json; 
    $btn = '';
}

echo json_encode($linhas_json);   