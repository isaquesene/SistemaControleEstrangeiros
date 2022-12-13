<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$SQL = "select * from controle where datasaida = '0000-00-00 00:00:00'"; 
$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 1");

$linhas_json = array();

while ($rows = mysqli_fetch_array($result_id)){
    
    $id = $rows['id'];
    $portao = $rows['portao'];
    $nome = $rows['nomeestrangeiro'];
    
    $dataent = $rows['dataentrada'];
    if(!is_null($dataent)){
        $dataent = (new DateTime($dataent))->format('d/m/Y H:i'); 
    }

    $datasaida = $rows['datasaida'];
    $acompanhanteent = $rows['acompanhanteent'];
    $equipeent = $rows['equipeent'];
    $obsent = $rows['obsent'];
    
    
    $btn = "<a id='btn_editar' onclick='saidaEstrangeiro($id)' class='btn badge bg-danger'>Saida</a>";

    $linha_json = array(
        'portao'=>mb_convert_encoding($portao, 'UTF-8', 'UTF-8'),
        'nomeestrangeiro'=>mb_convert_encoding($nome, 'UTF-8', 'UTF-8'),
        'dataent'=>mb_convert_encoding($dataent, 'UTF-8', 'UTF-8'),
        'datasaida'=>mb_convert_encoding($datasaida, 'UTF-8', 'UTF-8'),
        'acompanhanteent'=>mb_convert_encoding($acompanhanteent, 'UTF-8', 'UTF-8'),
        'equipeent'=>mb_convert_encoding($equipeent, 'UTF-8', 'UTF-8'),
        'obsent' =>mb_convert_encoding($obsent, 'UTF-8', 'UTF-8'),
        'btn'=>$btn        
    ); 

    $linhas_json[] = $linha_json; 
    $btn = '';
}

echo json_encode($linhas_json);   


