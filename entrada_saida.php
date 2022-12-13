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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrangeiros</title>
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

    
      
    <script src="assets/js/jquery.min.js"></script>     

</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo" style="margin-left: 35%">
                            <a href=""><img src="assets/images/logo/logo_dcta.png" alt="Logo" srcset="" style="height: 5rem"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <?php include 'ppside-bar.php';?>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <?php include 'navbar.php';?>                
            </header>
            <div id="main-content">
                <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Entrada e Saída de Estrangeiros</h3>                            
                        </div>
                </div> 
                 
                <div class="page-heading">                   
                    <section class="section">     
                        <div class="card" style="display: none" id="area_controle">
                        
                            <div class="card-header">
                                <h6>Estrangeiros</h6>
                            </div>
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabela_controle">
                                        <thead>
                                            <tr>  
                                                <th>Portão</th>                                              
                                                <th>Nome</th>  
                                                <th>Data / Hora entrada</th> 
                                                <th>Data / Hora saida</th> 
                                                <th>Acompanhante</th>
                                                <th>Equipe de Serviço</th> 
                                                <th>Obs Entrada</th>  
                                                <th>AÇÕES</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </div> 
                            
                            
                        </div>                        
                    </section>
                </div>
                

                <div class="page-heading">                   
                    <section class="section">     
                        <div class="card" style="display: none" id="area_entrada_saida">
                        
                            <div class="card-header">
                                <h6>Estrangeiros</h6>
                            </div>
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabela_entrada_saida">
                                        <thead>
                                            <tr>  
                                                <th>Portão</th>                                                
                                                <th>NOME</th>  
                                                <th>Data Entrada</th> 
                                                <th>Acompanhante Entrada</th>
                                                <th>Cpf Entrada</th>
                                                <th>Equipe Serviço</th>
                                                <th>Obs Entrada</th>
                                                <th>Data Saida</th>
                                                <th>Acompanhante Saida</th>
                                                <th>Cpf Saida</th>
                                                <th>Equipe Serviço</th>
                                                <th>Obs Saida</th>                                         
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </div> 

                            <button type="button" id="btn_abrir_modal" data-bs-toggle="modal" data-bs-target="#estrangeiros" hidden></button>

                            <div class="modal fade text-left" id="estrangeiros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <form id="form" name="form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="acao" id="acao">

                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white" id="myModalLabel160">
                                                    Novo Estrangeiro
                                                </h5>
                                                <button type="button" class="close"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="modal-body" id="area_cadastrar_estrangeiro" style="display: flex;flex-direction: column;align-items: center">
                                                
                                                <?php
                                                $SQL = "select * from paises";
                                                $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 1");
                                                ?>
                                             
                                                <div class="col-12" style="display:none" id="area_editar_estrangeiro"></div>                                                                                               
                                            </div>

                                            <div class="modal-footer">  
                                                <button type="button" class="btn btn-light-secondary"                                                   data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none" id="btn_fechar_modal"></i>
                                                    <span class="d-none d-sm-block">Cancelar</span>
                                                </button>
                                                <input type="submit" id="btn_salvar" form="form" class="btn btn-primary ml-1" value="Salvar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            
                        </div>                        
                    </section>
                </div>
                
                <?php include 'footer.php';?>
            </div>
        </div>
    </div>
   
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/toastify/toastify.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/functions.js"></script>

    <script>

    var tabela_entrada_saida = document.querySelector('#tabela_entrada_saida');
    var dataTable = '';

    function busca_entrada_saida(){
        if (dataTable){ dataTable.destroy(); }
    
        dataTable = new simpleDatatables.DataTable(tabela_entrada_saida, {
            ajax: {
                url: "assets/ajax/buscar_entrada_saida.php"                   
            }
        }); 
        
        $('#area_entrada_saida').show();
    }    

    
   
  


    busca_entrada_saida()
    </script>                     

    <script src="assets/js/main.js"></script>    
</body>

</html>