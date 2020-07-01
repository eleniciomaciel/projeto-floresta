<script type="text/javascript">
    $(document).ready(function() {

        var dataTablereq = $('#ilista_todos_requisitos').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-todos-requisitos') ?>",
                type: 'GET'
            },
        });
        /**lista clubes */
        $('#item_todos_clubes').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
        "ajax": {
            url : "<?= site_url('lista-todos-clubes') ?>",
            type : 'GET'
        },
    });
        listaClasses();
        $('#addClass_form').on('submit', function(e) {
            e.preventDefault();

            $('.myprogress').css('width', '0');
            $('.msg').text('');
            let filename = $('#nome_class').val();
            let tipo_class = $('#tipo_class').val();
            let myfile = $('#my_file_form_class').val().split('.').pop().toLowerCase();
            if (myfile == '') {
                if (jQuery.inArray(myfile, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert("Arquivo inválido.");
                    $('#my_file_form_class').val('');
                    return false;
                }
            }

            let formData = new FormData();
            formData.append('myfile', $('#my_file_form_class')[0].files[0]);
            formData.append('filename', filename);
            $('#btn').attr('disabled', 'disabled');
            $('.msg').text('Uploading in progress...');

            if (filename != '' && myfile != '' && tipo_class != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>master/ClassesController/addClass",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    type: 'POST',
                    // this part is progress bar
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                $('.myprogress').text(percentComplete + '%');
                                $('.myprogress').css('width', percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(data) {
                        $('#btn').removeAttr('disabled');
                        $('#uploaded_image').html(data);
                        $('#addClass_form')[0].reset();
                        listaClasses();
                    }
                });
            } else {
                alert("Todos os campos são obrigatórios");
            }
        });

        $(document).on('submit', '#form_add_requisitos', function(event) {
            event.preventDefault();

            var select_classe = $("select[name='select_classe']").val();
            var titulo_requisito = $("input[name='titulo_requisito']").val();
            var num_requisito = $("input[name='num_requisito']").val();
            var text_requisito = $("textarea[name='text_requisito']").val();

            $('#salvaEquisito').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_requisito").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('add-requisitos') ?>",
                type: 'POST',
                dataType: "json",
                data: {
                    select_classe: select_classe,
                    titulo_requisito: titulo_requisito,
                    num_requisito: num_requisito,
                    text_requisito: text_requisito,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgErro_requisitos").css('display', 'none');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#salvaEquisito').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_requisito").prop("disabled", false);
                        dataTablereq.ajax.reload();
                    } else {
                        $(".print-error-msgErro_requisitos").css('display', 'block');
                        $(".print-error-msgErro_requisitos").html(data.error);

                        $('#salvaEquisito').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_requisito").prop("disabled", false);
                    }
                }
            });
        });

        /**visualiza requitos para altera */
        $(document).on('click', '.view_requisitos', function() {
            var id_req = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('lista-dados-de-um-requisito/') ?>" + id_req,
                method: "GET",
                data: {
                    id_req: id_req
                },
                dataType: "json",
                success: function(data) {
                    $('#alteraRequisitoClasse').modal('show');
                    $('#select_requisito_update').val(data.select_requisito_update);
                    $('#titulo_requisito_update').val(data.titulo_up_class);
                    $('#num_requisito_update').val(data.num_up_class);
                    $('#text_requisito_update').val(data.requisito_up_class);
                    $('#id_req').val(id_req);
                }
            })
        });

        /**altera requisito */
        $(document).on('submit', '#form_update_requisitos', function(event) {
            event.preventDefault();

            var select_requisito_update = $("select[name='select_requisito_update']").val();
            var titulo_requisito_update = $("input[name='titulo_requisito_update']").val();
            var num_requisito_update = $("input[name='num_requisito_update']").val();
            var text_requisito_update = $("textarea[name='text_requisito_update']").val();
            var id_req = $("input[name='id_req']").val();

            $('#alteraEquisito').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_altera_requisito").prop("disabled", true);



            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Deseja alterar?',
                text: "Ao confirmar essa ação será permanente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, vou alterar!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "<?= site_url('altera-meu-requisitos/') ?>" + id_req,
                        type: 'POST',
                        dataType: "json",
                        data: {
                            select_requisito_update: select_requisito_update,
                            titulo_requisito_update: titulo_requisito_update,
                            num_requisito_update: num_requisito_update,
                            text_requisito_update: text_requisito_update,
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                        },
                        success: function(data) {
                            if ($.isEmptyObject(data.error)) {
                                $(".print-error-msgErro_requisitos_up").css('display', 'none');

                                swalWithBootstrapButtons.fire(
                                    'OK!',
                                    data.success,
                                    'success'
                                );

                                $('#alteraEquisito').html('<i class="fa fa-save"></i> Altera');
                                $(".bt_altera_requisito").prop("disabled", false);
                                dataTablereq.ajax.reload();
                            } else {
                                $(".print-error-msgErro_requisitos_up").css('display', 'block');
                                $(".print-error-msgErro_requisitos_up").html(data.error);

                                $('#alteraEquisito').html('<i class="fa fa-save"></i> Altera');
                                $(".bt_altera_requisito").prop("disabled", false);
                            }
                        }
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Você desistiu de alterar',
                        'error'
                    );
                    $('#alteraEquisito').html('<i class="fa fa-save"></i> Altera');
                                $(".bt_altera_requisito").prop("disabled", false);
                }
            });

        });
        /**deleta requisito */
        $(document).on('click', '.delete_requisito', function() {
            var id_del_cls = $(this).attr("id");


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Deseja deletar?',
                text: "Ao confirmar essa ação será permanente!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "<?= site_url('deleta-requisito/') ?>" + id_del_cls,
                        method: "GET",
                        data: {
                            id_del_cls: id_del_cls
                        },
                        success: function(data) {
                            //alert(data);
                            swalWithBootstrapButtons.fire(
                                'Deletado!',
                                data,
                                'success'
                            );
                            dataTablereq.ajax.reload();
                        }
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Você desistiu de deletar',
                        'error'
                    )
                }
            });
        });

        function listaClasses() {
            $.ajax({
                url: "<?= site_url('lista-classes') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="select_classe"]').empty();
                    $('select[name="select_classe"]').append('<option selected disabled>Selecione o aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="select_classe"]').append('<option  class="text-dark" value="' + value.id_cls + '">' + value.nome_classe + '</option>');
                    });
                }
            });
        }

    });
</script>