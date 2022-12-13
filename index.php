<?php 
    @include 'mysqlconecta.php';

    if(isset($_POST['submit'])){
        
    }
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrangeiros</title>
    
    <link rel="shortcut icon" href="assets/images/logo/ico.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">        
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    
    <script src="assets/js/jquery.min.js"></script>              
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="assets/images/logo/logo_dcta.png" alt="Logo"></a>
                    </div>   
                    <div class="alert alert-primary">
                        <h4 class="alert-heading"style="text-align:center">Estrangeiros</h4>                        
                    </div>         
                    
                    <div class="alert" id="demo" style="display: none"><i class="bi bi-file-excel"></i></div>                    

                    <form action="login.php" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="cpf" class="form-control form-control-xl" placeholder="CPF" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="senha" class="form-control form-control-xl" placeholder="Senha" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button id="botao_login" class="btn btn-primary btn-block btn-lg shadow-lg">Logar</button>
                                            
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/toastify/toastify.js"></script>
    <script>
    var url_string = window.location.href;
    var url = new URL(url_string);
    var msg = url.searchParams.get("e");
    
    if(msg == 'e'){
        Toastify({
            text: "Usuário ou senha incorreto.",
            duration: 3000,
            close:true,
            gravity:"top",
            position: "center",
            backgroundColor: "#f3616d",
        }).showToast();    
    } else if(msg == 'se'){
        Toastify({
              text: "Sua sessão foi expirada por inatividade, faça o login novamente.",
              duration: 3000,
              close:true,
              gravity:"top",
              position: "center",
              backgroundColor: "#f3616d",
          }).showToast(); 
    }
   
    </script>

    <script src="assets/js/main.js"></script>      
</body>

</html>