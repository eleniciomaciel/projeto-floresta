<div class="modal fade" id="minhaLiderancaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Liderança</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   tabel lista   ============================= -->
        <table class="table" id="lideranca_meu_clube_diretor" style="width: 100%;">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Cargo</th>
              <th scope="col">Região</th>
              <th scope="col">Status</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
        <!-- ===================   fim table  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- ===================   altera status do lider  ============================= -->
<div class="modal fade" id="statusLiderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altera Status de acesso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   form  ============================= -->
        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
              <i class="material-icons">swap_horiz</i>
            </div>
          </div>
          <div class="card-body">

            <form action="" method="post">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-group"></i>
                  </span>
                </div>
                <select class="form-control selectpicker" data-style="btn btn-link" name="status_usuarioLider" id="status_usuarioLider">
                  <option value="1">Ativar</option>
                  <option value="0">Desativar</option>
                </select>
              </div>
            </form>

          </div>
        </div>
        <!-- ===================   fim form  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>