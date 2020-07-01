<script>
$(document).ready(function() {
    $('#lista_todos_usuarios').DataTable({
        "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
        "ajax": {
            url : "<?=site_url('lista-todos-usuarios-geral')?>",
            type : 'GET'
        },
    });
});
</script>