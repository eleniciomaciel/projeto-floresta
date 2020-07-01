<script>
    $(document).ready(function() {
        $(document).on('click', '.verDadosPerfil', function() {
            var id_pf = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('dados-do-perfil-usuario/') ?>" + id_pf,
                method: "GET",
                data: {
                    id_pf: id_pf
                },
                beforeSend: function(){
                    $(".loader").css('display', 'block');
                },
                complete: function () {  
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#usuariosPessolaModal').modal('show');
                    $('#clb_pf_nomee').val(data.clb_pf_nomee);
                    $('#clb_pf_email').val(data.clb_pf_email);
                    $('#clb_pf_cargo').val(data.clb_pf_cargo);
                    $('#clb_pf_estado').val(data.clb_pf_estado);
                    $('#clb_pf_cidade').val(data.clb_pf_cidade);
                    $('#clb_pf_regiao').val(data.clb_pf_regiao);
                    $('#clb_pf_clube').val(data.clb_pf_clube);
                    $('#clb_pf_data').val(data.clb_pf_data);
                    //$('.modal-title').text("Edit User");  
                    $('#id_pf').val(id_pf);
                    // $('#user_uploaded_image').html(data.user_image);  
                    //$('#action').val("Edit");  
                }
            })
        });

        /**altera dados do usuário */
        $(document).on('submit', '#alteraDadosPerfil', function(event) {
            event.preventDefault();
            var clb_pf_nomee = $('#clb_pf_nomee').val();
            var clb_pf_email = $('#clb_pf_email').val();
            var id_pf = $('#id_pf').val();

            $('#add_alt_pf').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_atera_pf").prop("disabled", true);

            swal({
                    title: "Deseja alterar?",
                    text: "Ao confirmar essa ação será permanente!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: $(this).attr("action"),
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                swal(data, {
                                    icon: "success",
                                });

                                $('#add_alt_pf').html('<i class="fa fa-save"></i> Alterar');
                                $(".bt_atera_pf").prop("disabled", false);
                            }
                        });

                    } else {
                        swal("Você desistiu de alterar!");

                        $('#add_alt_pf').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_atera_pf").prop("disabled", false);
                    }
                });
        });

        /**alterando conta */
        $(document).on('click', '.alteraAcessoPerfil', function() {
            var id_pf = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('dados-do-perfil-usuario/') ?>" + id_pf,
                method: "GET",
                data: {
                    id_pf: id_pf
                },
                beforeSend: function(){
                    $(".loader").css('display', 'block');
                },
                complete: function () {  
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#visualizaDadosConta').modal('show');
                    $('#clb_pf_login').val(data.clb_pf_login);
                    $('#id_pf').val(id_pf);
                    $(".loader").css('display', 'block');
                }
            })
        });

        /**valida dados de login */
        $(document).on('submit', '#alteraNewAcesso_form', function(event) {
            event.preventDefault();

            var str_novo_acesso = $("#alteraNewAcesso_form").serialize();

            $('#altera_pw').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_atera_pw").prop("disabled", true);
            swal({
                    title: "Alterar?",
                    text: "Ao confirmar essa ação será permanente!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: $(this).attr("action"),
                            type: 'POST',
                            dataType: "json",
                            data: str_novo_acesso,
                            success: function(data) {
                                if ($.isEmptyObject(data.error)) {
                                    $(".print-error-msg_formAcesso").css('display', 'none');
                                    swal(data.success, {
                                        icon: "success",
                                    });
                                    $('#altera_pw').html('<i class="fa fa-save"></i> Alterar');
                                    $(".bt_atera_pw").prop("disabled", false);
                                } else {
                                    $(".print-error-msg_formAcesso").css('display', 'block');
                                    $(".print-error-msg_formAcesso").html(data.error);

                                    $('#altera_pw').html('<i class="fa fa-save"></i> Alterar');
                                    $(".bt_atera_pw").prop("disabled", false);
                                }
                            }
                        });
                    } else {
                        swal("Você desistiu de alterar!");

                        $('#altera_pw').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_atera_pw").prop("disabled", false);
                    }
                });
        });
    });
</script>