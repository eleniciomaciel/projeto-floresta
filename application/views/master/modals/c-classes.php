<!-- Modal -->
<div class="modal fade" id="addClasses" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Adicionar Classe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" id="addClass_form" enctype="multipart/form-data">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="nome_class">Nome da classe</label>
              <input type="text" class="form-control" name="nome_class" id="nome_class" aria-describedby="emailHelp" placeholder="Ex.: Amigo">
            </div>

            <div class="form-group col-md-12">
              <label for="tipo_class">Tipo da classe</label>
              <select class="form-control" name="tipo_class" id="tipo_class" required>
                <option selected disabled>Escolha aqui...</option>
                <option value="regular">Regular</option>
                <option value="avançada">Avaçada</option>
                <option value="agrupada">Agrupada</option>
                <option value="lider">Líder</option>
              </select>
            </div>

          </div>

          <div class="form-group form-file-upload form-file-multiple">
            <input type="file" name="my_file_form_class" id="my_file_form_class" class="inputFileHidden" />
            <div class="input-group">
              <input type="text" class="form-control inputFileVisible" placeholder="Arquivo de imagem aqui..." />
              <span class="input-group-btn">
                <button type="button" class="btn btn-fab btn-round btn-primary">
                  <i class="material-icons">attach_file</i>
                </button>
              </span>
            </div>
          </div>

          <div class="form-group">
            <div class="progress">
              <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
            </div>
          </div>

          <button type="submit" class="btnClassDile btn btn-primary">Salvar</button>
        </form>

        <div id="uploaded_image"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- ===================   adiciona dados da clesse  ============================= -->

<div class="modal fade" id="dados_da_classe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requisitos da classe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   fim form  ============================= -->
        <form id="form_add_requisitos">

          <div class="form-group">
            <label for="select_classe">Selecione a classe</label>
            <select class="form-control" name="select_classe" id="select_classe"></select>
          </div>

          <div class="form-group">
            <label for="titulo_requisito">Título</label>
            <input type="text" class="form-control" name="titulo_requisito" id="titulo_requisito" placeholder="Ex.: Geral">
          </div>

          <div class="form-group">
            <label for="num_requisito">Nº do requisito.</label>
            <input type="number" class="form-control" name="num_requisito" id="num_requisito" min="1" aria-describedby="emailHelp" placeholder="Ex.: 1">
          </div>

          <div class="form-group">
            <label for="text_requisito">Descrição do requisito.</label>
            <textarea class="form-control" name="text_requisito" id="text_requisito" placeholder="Digite aqui" rows="3"></textarea>
          </div>

          <button type="submit" class="bt_add_requisito btn btn-primary" id="salvaEquisito">
            <i class="fa fa-save"></i> Salvar
          </button>
        </form>
        <br>
        <div class="alert alert-danger print-error-msgErro_requisitos" style="display:none"></div>
        <!-- ===================   fim form  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- ===================   altera classe  requisitos ============================= -->

<div class="modal fade" id="alteraRequisitoClasse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requisitos da classe alterar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   fim form  ============================= -->
        <form id="form_update_requisitos">

          <div class="form-group">
            <label for="select_requisito_update">Selecionar classe.</label>
            <select class="form-control" name="select_requisito_update" id="select_requisito_update">
              <?php
              $query = $this->db->get('classes');
              foreach ($query->result() as $row) {
              ?>
                <option value="<?php echo $row->id_cls; ?>"><?php echo $row->nome_classe; ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="titulo_requisito_update">Título</label>
            <input type="text" class="form-control" name="titulo_requisito_update" id="titulo_requisito_update" placeholder="Ex.: Geral">
          </div>

          <div class="form-group">
            <label for="num_requisito_update">Nº do requisito.</label>
            <input type="number" class="form-control" name="num_requisito_update" id="num_requisito_update" min="1" aria-describedby="emailHelp" placeholder="Ex.: 1">
          </div>

          <div class="form-group">
            <label for="text_requisito_update">Descrição do requisito.</label>
            <textarea class="form-control" name="text_requisito_update" id="text_requisito_update" placeholder="Digite aqui" rows="5"></textarea>
          </div>

          <input type="hidden" name="id_req" id="id_req">
          <button type="submit" class="bt_altera_requisito btn btn-danger" id="alteraEquisito">
            <i class="fa fa-save"></i> Alterar
          </button>
        </form>
        <br>
        <div class="alert alert-danger print-error-msgErro_requisitos_up" style="display:none"></div>
        <!-- ===================   fim form  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
      </div>
    </div>
  </div>
</div>