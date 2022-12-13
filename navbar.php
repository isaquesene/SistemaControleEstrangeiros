<nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!--ÁREA DE NOTIFICAÇÕES-->            

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="nao_ha_notificacao">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Notificações</h6>
                        </li>
                        <li><a class="dropdown-item">Não há notificações...</a></li>
                    </ul>
                </li>                
            </ul>


            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600"><?php echo $_SESSION['posto'] ." ". $_SESSION['nomeguerra']; ?></h6>
                            <p class="mb-0 text-sm text-gray-600"><?php echo $_SESSION['cpf']; ?></p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">                                                
                                <?php 
                                if($_SESSION['foto_nao_encontrada']){
                                    echo '<img src="' . $_SESSION['foto_perfil'] . '" />'; 
                                } else {
                                    echo '<img src="data:image/jpg;base64,' . $_SESSION['foto_perfil'] . '" />'; 
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">

                    <li><a class="dropdown-item" href="logout.php"><i
                                class="icon-mid bi bi-box-arrow-left me-2"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>