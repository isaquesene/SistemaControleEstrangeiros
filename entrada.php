<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
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

    <style>
        #btn_editar{
            border: 2px solid transparent;
            color: #FFF;
            cursor: pointer;
        }   
        #btn_editar:hover{
            border-color: #000;
        }     
        #btn_excluir{
            border: 2px solid transparent;
            color: #FFF;
            cursor: pointer;
        }   
        #btn_excluir:hover{
            border-color: #000;
        }     
    </style>
      
    <script src="assets/js/jquery.min.js"></script>     

</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo" style="margin-left: 35%">
                            <a href="inicio.php"><img src="assets/images/logo/logo_dcta.png" alt="Logo" srcset="" style="height: 5rem"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <?php include 'sidebar-menu.php';?>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <?php include 'navbar.php';?>                
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Estrangeiros - Cadastro</h3>                            
                        </div>
                    </div>                    
                    <section class="section">     
                        
                        <div class="card">                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a onclick="novoEstrangeiro()" class="btn btn-primary">Novo Estrangeiro</a>
                                    </div>   
                                </div>                                                                
                            </div>                            
                        </div>
                        
                        <div class="card" style="display: none" id="area_estrangeiro">
                            <div class="card-header">
                                <h6>Tabela de Estrangeiros</h6>
                            </div>
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabela_estrangeiro">
                                        <thead>
                                            <tr>                                                
                                                <th>NOME</th>  
                                                <th>OM Visitada</th> 
                                                <th>FCV</th>
                                                <th>FVP</th>
                                                <th style="min-width:150px">DATA INICIO</th> 
                                                <th style="min-width:150px">DATA TERMINO</th>                                         
                                                <th style="min-width:250px">AÇÕES</th>
                                            </tr>
                                        </thead>
                                        <tbody id="corpo_tabela_estrangeiro"></tbody>
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

                                                <div class="col-12" id="cadastrar_estrangeiro">
                                                    <div class="col-12">
                                                        <h6>Nome</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="nome" name="nome" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>Passaporte</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="passaport" name="passaport" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>Empresa</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="empresa" name="empresa" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>Instituição</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="instituto" name="instituto" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>nº FCV</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="fcv" name="fcv" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>nº FVP</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="fvp" name="fvp" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>nº Oficio</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="oficio" name="oficio" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>OM Visitada</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="om" name="om" class="form-control">                                                                
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6>nº do Relatório de Visita</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="relacao" name="relacao" class="form-control">                                                                
                                                        </div>
                                                    </div>  
                                                    <div class="col-12">
                                                        <h6>Ofício de Autorização</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="vezesom" name="vezesom" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>Chegou ao Destino</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="chegoubem" name="chegoubem" class="form-control">                                                                
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6>Quem Recebeu</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="quemrecebeu" name="quemrecebeu" class="form-control">                                                                
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <h6>Alerta</h6>
                                                        <div class="form-group position-relative">
                                                            <input type="text" id="alerta" name="alerta" class="form-control">                                                                
                                                        </div>
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6>Data início</h6>
                                                            <div class="form-group position-relative">
                                                                <input type="date" id="datain" name="datain" class="form-control">                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Data fim</h6>
                                                            <div class="form-group position-relative">
                                                                <input type="date" id="dataterm" name="dataterm" class="form-control">                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Data Recebimento</h6>
                                                            <div class="form-group position-relative">
                                                                <input type="date" id="datarec" name="datarec" class="form-control">                                                                
                                                            </div>
                                                        </div> 
                                                    </div>                                                                                                        
                                                </div>                                                
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
                            <div class="card-body"></div> 
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
    $('#entrada').addClass('active');

    function novoEstrangeiro(){
        
        $("#acao:hidden").val('entrada');
        $("#form")[0].reset();
        $('#entrada_estrangeiro').show();
        $('#area_editar_estrangeiro').hide();
        $('#btn_abrir_modal').click()
    }

    var tabela_estrangeiro = document.querySelector('#tabela_estrangeiro');    
    var dataTable = '';   
    
    function busca_estrangeiro(){ 

        if (dataTable){ dataTable.destroy(); }
    
        dataTable = new simpleDatatables.DataTable(tabela_estrangeiro, {
            ajax: {
                url: "assets/ajax/busca_estrangeiro.php"                   
            }
        }); 
        
        $('#area_estrangeiro').show();

        $([document.documentElement, document.body]).animate({
            scrollTop: $("#tabela_estrangeiro").offset().top
        }, 1000);            
        
    }

    $("#form").on('submit',(function(e) {

        e.preventDefault();
        $.ajax({
            url: "assets/ajax/atualiza_estrangeiros.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,        
           
            success: function(data)
            {
                var retorno_sucesso =  $($.parseHTML(data)).filter("#sucesso"); 
                retorno_sucesso = retorno_sucesso.val();

                if(retorno_sucesso === '1'){                    
                    
                    busca_estrangeiro()
                    
                    Toastify({
                        text: 'Cadastro realizado com sucesso.',
                        duration: 3000,
                        close:true,
                        gravity:"top",
                        position: "center",
                        backgroundColor: "#4fbe87",
                    }).showToast();  
                }

                $("#form")[0].reset();
                $("#btn_fechar_modal").click(); 
            },
            error: function(e) 
            {
                $("#err").html(e).fadeIn();
            }          
        });
    })); 
    //Editar Estrangeiro
    function editarEstrangeiro(id) {
        $("#acao:hidden").val('editar');
        
        $.ajax({
            url: 'assets/ajax/selecionar_estrangeiro.php',
            type: 'POST',
            data: jQuery.param({ acao:'selecionar_estrangeiro',id }),
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(data) {               
                               
                $('#area_editar_estrangeiro').html(data);
                $('#cadastrar_estrangeiro').hide();
                $('#area_editar_estrangeiro').show();
                $('#btn_abrir_modal').click()
            },
            error: function () {
                Toastify({
                        text: 'Ocorreu um erro, tente novamente.',
                        duration: 3000,
                        close:true,
                        gravity:"top",
                        position: "center",
                        backgroundColor: "#f3616d",
                }).showToast(); 
            }
        });          
    }

    function excluirEstrangeiro(id){
       
       let confirm_delete = confirm("Deseja remover permanentemente o registro do banco de dados?")
       
       if (confirm_delete){
           $.ajax({
               url: 'assets/ajax/atualiza_estrangeiros.php',
               type: 'POST',
               data: jQuery.param({ acao:'excluir',id }),
               contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
               success: function(data) {

                   var retorno_sucesso =  $($.parseHTML(data)).filter("#sucesso"); 
                   retorno_sucesso = retorno_sucesso.val();

                   if(retorno_sucesso === '1'){                    
                       Toastify({
                           text: 'Remoção realizada com sucesso.',
                           duration: 3000,
                           close:true,
                           gravity:"top",
                           position: "center",
                           backgroundColor: "#4fbe87",
                       }).showToast(); 
                       
                       busca_estrangeiro(); 
                       
                   } else {
                       Toastify({
                           text: 'Ocorreu um erro, tente novamente.',
                           duration: 3000,
                           close:true,
                           gravity:"top",
                           position: "center",
                           backgroundColor: "#f3616d",
                       }).showToast(); 

                   }                   
               },
               error: function () {
                   Toastify({
                           text: 'Ocorreu um erro, tente novamente.',
                           duration: 3000,
                           close:true,
                           gravity:"top",
                           position: "center",
                           backgroundColor: "#f3616d",
                   }).showToast(); 
               }
           });  
       }
    }   

    busca_estrangeiro()

    </script>                     

    <script src="assets/js/main.js"></script>    
</body>

</html>








$('#entrada').addClass('active');

function entradaEstrangeiro(){
    $("#acao:hidden").val('cadastrar');
    $("#form")[0].reset();
    $('#cadastrar_estrangeiro').show();
    $('#btn_abrir_modal').click()
}