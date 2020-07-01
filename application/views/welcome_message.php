<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login::Clube</title>

	<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>/_assets/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>/_assets/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url()?>/_assets/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/_assets/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url()?>/_assets/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>/_assets/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url()?>/_assets/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>/_assets/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/_assets/img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url()?>/_assets/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/_assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>/_assets/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/_assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?=base_url()?>/_assets/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=base_url()?>/_assets/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.flip-container {
			background: transparent;
			display: inline-block;
		}

		.flip-this {
			position: relative;
			width: 100%;
			height: 100%;
			transition: transform 0.6s;
			transform-style: preserve-3d;
			z-index: 99;
		}

		.flip-container:hover .flip-this {
			transition: 0.9s;
			transform: rotateY(180deg);
		}


		.rotate {
			animation: rotation 8s infinite linear;
		}

		@keyframes rotation {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(359deg);

			}
		}

		.footer {
			position: inherit;
			bottom: 0;
			width: 100%;
			left: 0;
			height: 60px;
			line-height: 60px;
			background-color: #eff31194;
			display: block;
			text-align: center;
		}
	</style>
</head>

<body>
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 login-section-wrapper">
					<div class="brand-wrapper">

						<div class="flip-container">
							<div class="flip-this">
								<img src="assets/images/logo-desb.png" alt="logo" class="rotate logo img-responsive">
							</div>
						</div>

					</div>
					<div class="login-wrapper my-auto">
						<h1 class="login-title text-center"><i class="fa fa-unlock-alt"></i> Login</h1>
						<form id="logForm">
						<?php
							$csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							);
						?>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<div class="form-group">
								<label for="email"><i class="fa fa-envelope-open-o"></i> Email</label>
								<input type="email" name="email_login" id="email_login" class="form-control" placeholder="Ex.: email@examplo.com" required>
							</div>
							<div class="form-group mb-4">
								<label for="password"><i class="fa fa-unlock"></i> Senha</label>
								<input type="password" name="password_login" id="password_login" class="form-control" placeholder="Entre com sua senha" autocomplete="off" required>
							</div>
							<button type="submit" class="btn btn-block login-btn" name="login" id="login">
								 <span id="logText"></span>
							</button>

						</form>

						<div id="responseDiv" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span id="message"></span>
						</div>

						<a href="#!" class="forgot-password-link" data-toggle="modal" data-target="#modalEsqueciSenha">Esqueceu a senha?</a>
						<p class="login-wrapper-footer-text">Sem conta? <a href="#!" class="text-reset" data-toggle="modal" data-target="#inscricaoModal">Registre-se.</a></p>
					</div>
				</div>
				<div class="col-sm-6 px-0 d-none d-sm-block">
					<img src="assets/images/login.jpg" alt="login image" class="login-img">
				</div>
			</div>
		</div>
	</main>

	<footer class="footer">
		<div class="container">
			<span class="text-muted">&copy; 2020 T&E Soluções web. <a href="http://" data-toggle="modal" data-target="#creditosModal">creditos</a></span>
		</div>
	</footer>
	<?php
	$this->load->view('includes');
	?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$(document).ready(function() {

			listaEstadosCadastrados();


			$('select[name="inputEstado"]').on('change', function() {
				var stateID = $(this).val();
				if (stateID) {
					$.ajax({
						url: "<?= site_url('lista-cidades/') ?>" + stateID,
						type: "GET",
						dataType: "json",
						success: function(data) {
							$('select[name="city"]').empty();
							$.each(data, function(key, value) {
								$('select[name="city"]').append('<option value="' + value.id + '">' + value.nome + '</option>');
							});
						}
					});
				} else {
					$('select[name="city"]').empty();
				}
			});


			/**cidade do usuario do clube */
			function listaEstadosCadastrados() {
				$.ajax({
					url: "<?= site_url('lista-estados_cadastradas') ?>",
					type: "GET",
					dataType: "json",
					success: function(data) {
						$('select[name="estadosUserCadastros_uf"]').empty();
						$('select[name="estadosUserCadastros_uf"]').append('<option selected disabled>Selecione aqui...</option>');
						$.each(data, function(key, value) {
							$('select[name="estadosUserCadastros_uf"]').append('<option value="' + value.id + '">' + value.nome + '</option>');
						});
					}
				});
			}

			$('select[name="estadosUserCadastros_uf"]').on('change', function() {
				var idUser = $(this).val();
				if (idUser) {
					$.ajax({
						url: "<?= site_url('lista-cidades-clubes/') ?>" + idUser,
						type: "GET",
						dataType: "json",
						success: function(data) {
							$('select[name="cityUserEstado"]').empty();
							$('select[name="cityUserEstado"]').append('<option value="" selected disabled>Selecione aqui...</option>');
							$.each(data, function(key, value) {
								$('select[name="cityUserEstado"]').append('<option value="' + value.id + '">' + value.nome + '</option>');
							});
						}
					});
				} else {
					$('select[name="cityUserEstado"]').empty();
				}
			});


			/**selecione a região do clube */
			$('select[name="cityUserEstado"]').on('change', function() {
				var id_cidade_clube = $('#cityUserEstado').val();

				if (id_cidade_clube != '') {
					$.ajax({
						url: "<?= site_url('lista-cidades-meu-clubes/') ?>" + id_cidade_clube,
						type: "GET",
						dataType: "json",
						success: function(data) {
							$('select[name="clube_regiao"]').empty();
							$('select[name="clube_regiao"]').append('<option value="" selected disabled>Selecione aqui...</option>');
							$.each(data, function(key, value) {
								$('select[name="clube_regiao"]').append('<option value="' + value.regiao_clube_fl + '">' + value.regiao_clube_fl + ' ª região</option>');
							});
						}
					});
				} else {
					$('#city').html('<option value="">Selecione um clube</option>');
				}
			});


			/**selecione o nome do clube */
			$('select[name="clube_regiao"]').on('change', function() {
				var id_clube_nome = $('#clube_regiao').val();

				if (id_clube_nome != '') {
					$.ajax({
						url: "<?= site_url('lista-nome-meu-clubes/') ?>" + id_clube_nome,
						type: "GET",
						dataType: "json",
						success: function(data) {
							$('select[name="clube_nome_slc"]').empty();
							$('select[name="clube_nome_slc"]').append('<option value="" selected disabled>Selecione aqui...</option>');
							$.each(data, function(key, value) {
								$('select[name="clube_nome_slc"]').append('<option value="' + value.id_fl + '">' + value.nome_clube + '</option>');
							});
						}
					});
				} else {
					$('#city').html('<option value="">Selecione um clube</option>');
				}
			});

			/**inseri clubes */
			$(document).on('submit', '#clube_add_form', function(event) {
				event.preventDefault();

				var inputNomeClube = $("input[name='inputNomeClube']").val();
				var inputRegiao = $("select[name='inputRegiao']").val();
				var inputEstado = $("select[name='inputEstado']").val();
				var city = $("select[name='city']").val();


				$('#salvaClube').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
				$(".bt_add_clube").prop("disabled", true);

				$.ajax({
					url: "<?= site_url('add-clubes-regiao') ?>",
					type: 'POST',
					dataType: "json",
					data: {
						inputNomeClube: inputNomeClube,
						inputRegiao: inputRegiao,
						inputEstado: inputEstado,
						city: city,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					success: function(data) {
						if ($.isEmptyObject(data.error)) {
							$(".print-error-msg").css('display', 'none');
							swal("OK!", data.success, "success");

							$('#salvaClube').html('<i class="fa fa-save"></i> Salvar');
							$(".bt_add_clube").prop("disabled", false);

							listaEstadosCadastrados();

						} else {
							$(".print-error-msg").css('display', 'block');
							$(".print-error-msg").html(data.error);

							$('#salvaClube').html('<i class="fa fa-save"></i> Salvar');
							$(".bt_add_clube").prop("disabled", false);
						}
					}
				});
			});

			/**inseri usuarios  */
			$(document).on('submit', '#formUserClube', function(event) {
				event.preventDefault();

				var nomeUser = $("input[name='nomeUser']").val();
				var inputEmailUser = $("input[name='inputEmailUser']").val();
				var inputCargoUser = $("select[name='inputCargoUser']").val();
				var estadosUserCadastros_uf = $("select[name='estadosUserCadastros_uf']").val();
				var cityUserEstado = $("select[name='cityUserEstado']").val();
				var clube_regiao = $("select[name='clube_regiao']").val();
				var clube_nome_slc = $("select[name='clube_nome_slc']").val();
				var inputLoginUser = $("input[name='inputLoginUser']").val();
				//var inpuPWUser = $("input[name='inpuPWUser']").val();

				$('#salvaClubeUser').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
				$(".bt_add_clubeUser").prop("disabled", true);

				$.ajax({
					url: "<?= site_url('cadastra-usuarios-novos') ?>",
					type: 'POST',
					dataType: "json",
					data: {
						nomeUser: nomeUser,
						inputEmailUser: inputEmailUser,
						inputCargoUser: inputCargoUser,
						estadosUserCadastros_uf: estadosUserCadastros_uf,
						cityUserEstado: cityUserEstado,
						clube_regiao: clube_regiao,
						clube_nome_slc: clube_nome_slc,
						inputLoginUser: inputLoginUser,
						//inpuPWUser: inpuPWUser,
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					success: function(data) {
						if ($.isEmptyObject(data.error)) {
							$(".print-error-msgNewUser").css('display', 'none');
							swal("OK!", data.success, "success");

							$('#salvaClubeUser').html('<i class="fa fa-save"></i> Salvar');
							$(".bt_add_clubeUser").prop("disabled", false);
						} else {
							$(".print-error-msgNewUser").css('display', 'block');
							$(".print-error-msgNewUser").html(data.error);

							$('#salvaClubeUser').html('<i class="fa fa-save"></i> Salvar');
							$(".bt_add_clubeUser").prop("disabled", false);
						}
					}
				});
			});

		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#logText').html('<i class="fa fa-sign-out"></i> Login');
			$('#logForm').submit(function(e) {
				e.preventDefault();
				$('#logText').html('<div class="load"> <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Verificando usuário...<span class="sr-only">Loading...</span> </div>');
				var user = $('#logForm').serialize();
				var login = function() {
					$.ajax({
						type: 'POST',
						url: "<?=site_url('verificando-login-usuario')?>",
						dataType: 'json',
						data: user,
						success: function(response) {
							$('#message').html(response.message);
							$('#logText').html('<i class="fa fa-sign-out"></i> Login');
							if (response.error) {
								$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
							} else {
								$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
								$('#logForm')[0].reset();
								$('#login').hide();

								setTimeout(function() {
									location.reload();
								}, 3000);
							}
						}
					});
				};
				setTimeout(login, 3000);
			});

			$(document).on('click', '#clearMsg', function() {
				$('#responseDiv').hide();
			});
		});
	</script>
</body>

</html>