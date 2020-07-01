<div class="container-fluid">
    <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">
            Painel geral
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end">
        <form class="navbar-form">
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">assignment_ind</i>
                    <p class="d-lg-none d-md-block">
                        Minha conta
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="verDadosPerfil dropdown-item" href="#" id="<?=$this->session->userdata('user')['id_us'];?>">
                        <i class="material-icons">account_circle </i>&nbsp;Perfíl
                    </a>
                    <a class="alteraAcessoPerfil dropdown-item" href="#" id="<?=$this->session->userdata('user')['id_us'];?>">
                        <i class="material-icons">lock </i>&nbsp;Acesso
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('sair') ?>"><i class="material-icons">power_settings_new</i>&nbsp;Sair</a>
                </div>
            </li>
        </ul>
    </div>
</div>