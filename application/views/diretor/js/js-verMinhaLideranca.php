<script>
    $(document).ready(function() {
        $('#lideranca_meu_clube_diretor').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-toda-lideranca') ?>",
                type: 'GET',
            },
        });

        /**pega status lider */
        $(document).on('click', '.permissaoLiderAcesso', function() {
            var id_sts = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('dados-do-perfil-usuario/') ?>" + id_sts,
                method: "GET",
                data: {
                    id_sts: id_sts
                },
                beforeSend: function(){
                    $(".loader").css('display', 'block');
                },
                complete: function () {  
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#statusLiderModal').modal('show');
                    $('#status_usuarioLider').val(data.clb_pf_status);
                    $('#id_sts').val(id_sts); 
                }
            })
        });
    });
</script>