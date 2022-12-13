<?php
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$hoje = date('d/m/Y');

$id = $_POST['id'];
$acao = $_POST['acao'];

if($acao == 'selecionar_estrangeiro'){
//CONVERTER A DATA DIRETO NO MYSQL
    $SQL = "select *, STR_TO_DATE(datarec,'%d/%m/%Y') as data_rec, STR_TO_DATE(datain,'%d/%m/%Y') as data_in, STR_TO_DATE(dataterm,'%d/%m/%Y') as data_term from estrangeiro where ID = $id";             
    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 002");
    $rows = mysqli_fetch_array($result);

    $nome = $rows['nome'];
    $nacionalidade = $rows['nacionalidade'];
    $passaport = $rows['passaport'];
    $empresa = $rows['empresa'];
    $instituto = $rows['instituto'];
    $fcv = $rows['fcv'];
    $fvp = $rows['fvp'];
    $oficio = $rows['oficio'];
    $om = $rows['om'];
    $vezesom = $rows['vezesom'];
    $relacao = $rows['relacao'];
    $chegoubem = $rows['chegoubem'];
    $quemrecebeu = $rows['quemrecebeu'];
    $alerta = $rows['alerta'];
    $datarec = $rows['data_rec'];
    //$datarec = date("Y-m-d", strtotime($datarec));
    $datain = $rows['data_in'];
    //$datain = date("Y-m-d", strtotime($datain));
    $dataterm = $rows['data_term'];
    //$dataterm = date("Y-m-d", strtotime($dataterm));
    $motivo = $rows['pesquisaint'];
    $arquivo = $rows['imagem'];
    $termos = $rows['arquivo2'];

    $SQL_paises = "select * from paises where nome <> '$nacionalidade'";
    $result_paises = @mysqli_query($conexao,$SQL_paises) or die("Ocorreu um problema! Código: 1");
    ?>
    
    <input type="hidden" id="id_edt" name="id_edt" value="<?=$id?>">                                                                
    
    <div class="col-12">
        <h6>Nome</h6>
        <div class="form-group position-relative">
            <input type="text" id="nome_edt" name="nome_edt" class="form-control" value="<?=$nome?>">                                                                
        </div>
        </div> 
        <div class="col-12">
            <h6>Nacionalidade</h6>
            <div class="form-group position-relative">
                <select class="form-select" name="nacionalidade_edt" id="nacionalidade_edt"> 
                    <option value="<?=$nacionalidade?>" selected><?=$nacionalidade?></option> 
                    <?php while($rows_paises = mysqli_fetch_array($result_paises)){ ?>
                        <option value="<?=$rows_paises['nome']?>"><?=utf8_encode($rows_paises['nome'])?></option>                                                                                                                                                                                                                             
                    <?php } ?>
                </select>  
            </div>                                        
        </div> 
        
        <div class="row">
            <div class="col-6">
                <h6>Passaporte</h6>
                <div class="form-group position-relative">
                    <input type="text" id="passaport_edt" name="passaport_edt" value="<?=$passaport?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>Empresa</h6>
                <div class="form-group position-relative">
                    <input type="text" id="empresa_edt" name="empresa_edt" value="<?=$empresa?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>Instituição</h6>
                <div class="form-group position-relative">
                    <input type="text" id="instituto_edt" name="instituto_edt" value="<?=$instituto?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>nº FCV</h6>
                <div class="form-group position-relative">
                    <input type="text" id="fcv_edt" name="fcv_edt" value="<?=$fcv?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>nº FVP</h6>
                <div class="form-group position-relative">
                    <input type="text" id="fvp_edt" name="fvp_edt" value="<?=$fvp?>" class="form-control">                                                                
                </div>
            </div>
            </div>
            <div class="col-6">
                <h6>nº Oficio</h6>
                <div class="form-group position-relative">
                    <input type="text" id="oficio_edt" name="oficio_edt" value="<?=$oficio?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>OM Visitada</h6>
                <div class="form-group position-relative">
                    <input type="text" id="om_edt" name="om_edt" value="<?=$om?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>Ofício de Autorização</h6>
                <div class="form-group position-relative">
                    <input type="text" id="vezesom_edt" name="vezesom_edt" value="<?=$vezesom?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>nº do Relatório de Visita</h6>
                <div class="form-group position-relative">
                    <input type="text" id="relacao_edt" name="relacao_edt" value="<?=$relacao?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>Chegou ao Destino</h6>
                <div class="form-group position-relative">
                    <input type="text" id="chegoubem_edt" name="chegoubem_edt" value="<?=$chegoubem?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>Quem Recebeu</h6>
                <div class="form-group position-relative">
                    <input type="text" id="quemrecebeu_edt" name="quemrecebeu_edt" value="<?=$quemrecebeu?>" class="form-control">                                                                
                </div>
            </div>
            <div class="col-6">
                <h6>Alerta</h6>
                <div class="form-group position-relative">
                    <input type="text" id="alerta_edt" name="alerta_edt" value="<?=$alerta?>" class="form-control">                                                                
                </div>
            </div>

            <div class="col-6">
                <h6>Data Recebimento</h6>
                <div class="form-group position-relative">
                    <input type="date" id="datarec_edt" name="datarec_edt" value="<?=$datarec?>" class="form-control">                                                                
                </div>
            </div>

            <div class="col-6">
                <h6>Data início</h6>
                <div class="form-group position-relative">
                    <input type="date" id="datain_edt" name="datain_edt" value="<?=$datain?>" class="form-control">                                                                
                </div>
            </div>

            <div class="col-6">
                <h6>Data fim</h6>
                <div class="form-group position-relative">
                    <input type="date" id="dataterm_edt" name="dataterm_edt" value="<?=$dataterm?>" class="form-control">                                                                
                </div>
            </div> 
            <div class="col-12"> 
                <h6>Motivo da Visita</h6>

                <div class="form-group position-relative">
                    <textarea class="form-control" name="pesquisaint_edt" rows="3" cols="22" id="pesquisaint_edt"><?=$motivo?></textarea>
                </div>  

            </div> 
        </div> 
    </div>

    <?php if($arquivo <> ''){ ?>
        <div class="alert alert-light-secondary color-secondary">
            <i class="bi bi-file-earmark-text"></i><a href="/estrangeiros/assets/uploads/<?=$arquivo?>" target="_blank">Clique aqui para visualizar o arquivo atual</a>
        </div>
    <?php } ?>
    
    <div class="mb-3">
        <h6>Substituir arquivo atual</h6>    
        <input class="form-control" type="file" id="arquivo_edt" name="arquivo_edt">
    </div>

    <?php if($termos <> ''){ ?>
        <div class="alert alert-light-secondary color-secondary">
            <i class="bi bi-file-earmark-text"></i><a href="/estrangeiros/assets/uploads/<?=$termos?>" target="_blank">Clique aqui para visualizar o arquivo atual</a>
        </div>
    <?php } ?>
    
    <div class="mb-3">
        <h6>Substituir Termo atual</h6>    
        <input class="form-control" type="file" id="termo_edt" name="termo_edt">
    </div>
    
    <?php
    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";
    echo "<input type='hidden' name='selecionar' id='selecionar' value='unica'>";

    //Controle de Entrda e Saida
} else if ($acao == 'entrada_estrangeiro'){

    $SQL = "select *, STR_TO_DATE(datarec,'%d/%m/%Y') as data_rec, STR_TO_DATE(datain,'%d/%m/%Y') as data_in, STR_TO_DATE(dataterm,'%d/%m/%Y') as data_term from estrangeiro where ID = $id";             
    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 002");
    $rows = mysqli_fetch_array($result);

    $nome = $rows['nome'];
    $nacionalidade = $rows['nacionalidade'];
    ?>
    <input type="hidden" name="nome" value="<?=$nome?>">
    <input type="hidden" name="msg" id="msg" value="Entrada cadastrada com sucesso.">
    <div class="col-12">
        <h6>Nome</h6>
        <div class="form-group position-relative">
            <input type="text" id="nome_exibicao" name="nome_exibicao" class="form-control" value="<?=$nome?>" disabled>                                                                
        </div>
        </div> 
        <div class="col-12">
            <h6>Nacionalidade</h6>
            <div class="form-group position-relative">
                <select class="form-select" name="nacionalidade" id="nacionalidade" disabled> 
                    <option value="<?=$nacionalidade?>" selected><?=$nacionalidade?></option> 
                    <?php while($rows_paises = mysqli_fetch_array($result_paises)){ ?>
                        <option value="<?=$rows_paises['nome']?>"><?=utf8_encode($rows_paises['nome'])?></option>                                                                                                                                                                                                                             
                    <?php } ?>
                </select>  
            </div>                                        
        </div> 
        <div class="col-12">
            <h6>Portão OM</h6>
            <div class="form-group position-relative">
                <input type="text" id="portao" name="portao" class="form-control">                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>Acompanhante</h6>
            <div class="form-group position-relative">
                <input type="text" id="acompanhante" name="acompanhante" class="form-control">                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>CPF do Acompanhante</h6>
            <div class="form-group position-relative">
                <input type="text" id="cpf" name="cpf" class="form-control" required>                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>Nome de Guerra Posto e Graduação do (OF, ADJ ou CMT)</h6>
            <div class="form-group position-relative">
                <input type="text" id="equipe_servico" name="equipe_servico" class="form-control">                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>Observações</h6>
            <div class="form-group position-relative">
            <textarea class="form-control" rows="3" name="obs_entrada" id="obs_entrada"></textarea>
            </div>
        </div>
    </div>
    <?php
    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";
    echo "<input type='hidden' name='selecionar' id='selecionar' value='unica'>";    
    
} else if ($acao == 'saida_estrangeiro'){

    $id = $_POST['id'];

    $SQL = "select * from controle where id = $id";             
    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 002");
    $rows = mysqli_fetch_array($result);

    $nome = $rows['nomeestrangeiro'];
    $obs_entrada = $rows['obsent'];
    $portao = $rows['portao'];
    
    ?>
    <input type="hidden" name="msg" id="msg" value="Saída cadastrada com sucesso.">
    <input type="hidden" name="id_controle" id="id_controle" value="<?=$id?>">
    <h5 class="modal-title white" id="myModalLabel160">
    Saida Estrangeiro
    </h5>
    <div class="col-12">
        <h6>Nome</h6>
        <div class="form-group position-relative">
            <input type="text" id="nome_exibicao" name="nome_exibicao" class="form-control" value="<?=$nome?>" disabled>                                                                
        </div>
    </div> 

    <div class="col-12">
        <h6>Observações Entrada</h6>
        <div class="form-group position-relative">
            <textarea class="form-control" rows="3" name="obs_entrada" id="obs_entrada" disabled><?=$obs_entrada?></textarea>
        </div>
    </div>
    <div class="col-12">
            <h6>Portão OM</h6>
            <div class="form-group position-relative">
            <input type="text" id="portao" name="portao" class="form-control" value="<?=$portao?>" disabled>                                                              
            </div>
        </div>

        <div class="col-12">
            <h6>Acompanhante</h6>
            <div class="form-group position-relative">
                <input type="text" id="acompanhantesaida" name="acompanhantesaida" class="form-control">                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>CPF do Acompanhante</h6>
            <div class="form-group position-relative">
                <input type="text" id="cpfsaida" name="cpfsaida" class="form-control" required>                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>Nome de Guerra Posto e Graduação do (OF, ADJ ou CMT)</h6>
            <div class="form-group position-relative">
                <input type="text" id="equipesaida" name="equipesaida" class="form-control">                                                                
            </div>
        </div>
        <div class="col-12">
            <h6>Observações</h6>
            <div class="form-group position-relative">
            <textarea class="form-control" rows="3" name="obssaida" id="obssaida"></textarea>
            </div>
        </div>
    </div>
    <?php
    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";
    echo "<input type='hidden' name='selecionar' id='selecionar' value='unica'>";    
}
?>