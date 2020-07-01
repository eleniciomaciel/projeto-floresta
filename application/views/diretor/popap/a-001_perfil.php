<!-- Modal -->
<div class="modal fade" id="usuariosPessolaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perfíl do usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   perfil dados  ============================= -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Editar Perfíl</h4>
                            <p class="card-category">Informações pessoal do usuário</p>
                        </div>
                        <div class="card-body">
                            <?php
                            $id = $this->session->userdata('user')['id_us'];
                            echo form_open('altera-dados-usuario-perfil/' . $id, array('id' => 'alteraDadosPerfil'));
                            ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Usuário:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" name="clb_pf_nomee" id="clb_pf_nomee">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="bmd-label-floating">UF</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="clb_pf_estado" id="clb_pf_estado" disabled>
                                            <?php
                                            $data = $this->db->get('estados');
                                            foreach ($data->result() as $key) {
                                            ?>
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->nome; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="bmd-label-floating">Cidade:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" id="clb_pf_cidade" name="clb_pf_cidade" disabled>
                                            <?php
                                            $data = $this->db->get('cidade');
                                            foreach ($data->result() as $key) {
                                            ?>
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->nome; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">E-mail pessoal:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" name="clb_pf_email" id="clb_pf_email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="bmd-label-floating">Clube</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" id="clb_pf_clube" name="clb_pf_clube" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="bmd-label-floating">Região:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" id="clb_pf_regiao" name="clb_pf_regiao" disabled>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_pf" id="id_pf">

                            <button type="submit" class="bt_atera_pf btn btn-primary pull-right" id="add_alt_pf"><i class="fa fa-save"></i> Alterar</button>
                            <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ===================   perfil fim  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- =========================================================   altera login e senha  ==================================================================== -->
<div class="modal fade" id="visualizaDadosConta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados de acesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   panel  ============================= -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">lock_open</i>
                                <span> Alterar senha</span>
                            </div>
                        </div>
                        <div class="card-body">

                            <?php 
                                $id = $this->session->userdata('user')['id_us'];
                                echo form_open('alte-dados-usuario-acesso/'.$id, array('id'=>'alteraNewAcesso_form'));
                            ?>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">alternate_email</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="clb_pf_login" id="clb_pf_login" placeholder="Ex.: eu@clube.com">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="new_password" placeholder="Ex.: EuClube@12">
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="bt_atera_pw btn btn-primary pull-right" id="altera_pw"><i class="fa fa-save"></i> Alterar acesso</button>
                            </form>
                            
                        </div>
                        <br>
                            <div class="alert alert-danger print-error-msg_formAcesso" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   fim panel  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>