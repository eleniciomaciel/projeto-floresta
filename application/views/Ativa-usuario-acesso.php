<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ativar acesso</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/css/demo_1/style.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/recupera_senha/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/recupera_senha/images/favicon.png" />
    <style>
        .img_my_logo1 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            animation: rotation 3s infinite linear;
        }

        @keyframes rotation {
            100% {
                transform: rotatey(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="flip-container">
                            <div class="flip-this">
                                <img src="assets/images/logo-desb.png" alt="logo" class="img_my_logo1 img-responsive">
                            </div>
                        </div>
                        <h2 class="text-center mb-4">Registrar acesso</h2>
                        <div class="auto-form-wrapper">
                            <form method="post" id="contact_form" autocomplete="off">
                                <?php
                                    $csrf = array(
                                        'name' => $this->security->get_csrf_token_name(),
                                        'hash' => $this->security->get_csrf_hash()
                                    );
                                ?>
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <div class="form-group">
                                    <label for="">Email pessoal:</label>
                                    <div class="input-group">
                                        <input type="email" name="db_mail_pessoal" id="db_mail_pessoal" class="form-control" placeholder="Cole seu email aqui..." value="eleniciotea@outlook.com">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span id="email_error" class="card-title text-danger"></span>
                                </div>

                                <div class="form-group">
                                <label for="">login:</label>
                                    <div class="input-group">
                                        <input type="email" name="db_login" id="db_login" class="form-control" placeholder="Cole seu login aqui..." value="nicio@desbravador.com">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span id="login_error" class="card-title text-danger"></span>
                                </div>

                                <div class="form-group">
                                <label for="">Token:</label>
                                    <div class="input-group">
                                        <input type="text" name="db_token" id="db_token" class="form-control" placeholder="Cole seu tokem aqui..." title="Cole aqui seu tokem recebido pelo email." value="$2y$10$G4JU3mzawKzrhON2Tip95.Du4A7D10tOZa4hxjReUVnkzrSBaLK2.">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span id="token_error" class="card-title text-danger"></span>
                                </div>

                                <div class="form-group">
                                <label for="">Senha pessoal:</label>
                                    <div class="input-group">
                                        <input type="text" name="db_senha" id="db_senha" class="form-control" placeholder="Sua Senha aqui.." value="Ali!12345">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span id="senha_error" class="card-title text-danger"></span>
                                </div>
                                <div class="form-group">
                                <label for="">Confirmação da senha:</label>
                                    <div class="input-group">
                                        <input type="text" name="db_senha1" id="db_senha1" class="form-control" placeholder="Confirmar sua senha">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                        <span class="card-title text-danger" id="senha1_error"></span>
                                    
                                </div>
                                <div class="form-group">
                                    <button class="bt_add_conta btn btn-primary submit-btn btn-block" id="verify_conta">Verificar</button>
                                </div>
                            </form>
                            <span id="success_message"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/recupera_senha/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url() ?>assets/recupera_senha/vendors/js/vendor.bundle.addons.js"></script>
    <script>
        $(document).ready(function() {

            $('#contact_form').on('submit', function(event) {
                event.preventDefault();

                $('#verify_conta').html('<img src="<?=base_url('_assets/img/103.gif');?>"/"> <span>Verificando, aguarde</span>').prop("disabled", true);
				$(".bt_add_conta").prop("disabled", true);

                $.ajax({
                    url: "<?=site_url('valida-acesso-novo-usuarios')?>",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('#contact').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        if (data.error) {
                            $('#verify_conta').html('<i class="fa fa-save"></i> Verificar');
							$(".bt_add_conta").prop("disabled", false);

                            if (data.email_error != '') {
                                $('#email_error').html(data.email_error);
                            } else {
                                $('#email_error').html('');
                            }
                            if (data.login_error != '') {
                                $('#login_error').html(data.login_error);
                            } else {
                                $('#login_error').html('');
                            }
                            if (data.token_error != '') {
                                $('#token_error').html(data.token_error);
                            } else {
                                $('#token_error').html('');
                            }
                            if (data.senha_error != '') {
                                $('#senha_error').html(data.senha_error);
                            } else {
                                $('#senha_error').html('');
                            }
                            if (data.senha1_error != '') {
                                $('#senha1_error').html(data.senha1_error);
                            } else {
                                $('#senha1_error').html('');
                            }
                        }
                        if (data.success) {
                            $('#success_message').html(data.success);
                            $('#email_error').html('');
                            $('#login_error').html('');
                            $('#token_error').html('');
                            $('#senha_error').html('');
                            $('#senha1_error').html('');
                            $('#contact_form')[0].reset();

                            $('#verify_conta').html('<i class="fa fa-save"></i> Verificar');
							$(".bt_add_conta").prop("disabled", false);
                        }
                        $('#contact').attr('disabled', false);
                    }
                })
            });

        });
    </script>
</body>

</html>