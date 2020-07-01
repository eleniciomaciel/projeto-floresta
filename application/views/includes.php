<!-- Modal -->
<div class="modal fade" id="modalEsqueciSenha" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Recuperação de senha!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- ===================   form  ============================= -->
                <form action="#!">
                    <i class="fa fa-envelope-o"></i> Informe seu email
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ex.: email@examplo.com" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block login-btn">
                        <i class="fa fa-sign-out"></i> Enviar
                    </button>
                </form>
                <!-- ===================   fim form  ============================= -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal creditos-->
<div class="modal fade" id="creditosModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Créditos da aplicação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   creditos  ============================= -->
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Olá!</h4>
                    <p>
                        Se você deseja ter um melhor controle das classes dos seus Desbravadores, acompanhar todos os seus processos até a investidura e sem perder nenhum relatória dos nossos garotos e garotas essa aplicação irá te atender.

                    </p>
                    <hr>
                    <p class="mb-0">Desenvolvido por Elenício Maciel.</p>
                </div>
                <!-- ===================   creditos fim  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal inscrição-->
<div class="modal fade" id="inscricaoModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastre-se</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form incrição  ============================= -->
                <div class="card border-warning">
                    <div class="card-header">
                        Formuário de cadastro
                        <span class="pull-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addClube">
                                <i class="fa fa-plus"></i> Cadastrar clube
                            </button>
                        </span>
                    </div>
                    <div class="card-body">

                        <!-- ===================   form inscrição ============================= -->
                        <form id="formUserClube">
                            <div class="form-group">
                                <label for="inputAddress">Nome completo:</label>
                                <input type="text" class="form-control" name="nomeUser" onkeyup="this.value = this.value.toUpperCase();" placeholder="Ex.: Ana Silva">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmailUser">Email pessoal:</label>
                                    <input type="email" class="form-control" name="inputEmailUser" placeholder="Ex.: ana@gmail.com">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCargoUser">Cargo:</label>
                                    <select name="inputCargoUser" class="form-control">
                                        <option selected disabled>Selecione aqui...</option>
                                        <option value="Associado(a)">Associado(a)</option>
                                        <option value="Conselheiro(a)">Conselheiro(a)</option>
                                        <option value="Diretor(a)">Diretor(a)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputCity">Estado:</label>
                                    <select name="estadosUserCadastros_uf" id="estadosUserCadastros_uf" class="form-control"></select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cityUserEstado">Cidade:</label>
                                    <select name="cityUserEstado" id="cityUserEstado" class="form-control">
                                        <option selected>Selecione aqui...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="clube_regiao">Região:</label>
                                    <select name="clube_regiao" id="clube_regiao" class="form-control">
                                        <option selected>Selecione aqui...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="clube_nome_slc">Clubes:</label>
                                    <select name="clube_nome_slc" id="clube_nome_slc" class="form-control">
                                        <option selected>Selecione aqui...</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputLoginUser">Login:</label>
                                    <input type="email" class="form-control" name="inputLoginUser" placeholder="Ex.: ana@email.com">
                                </div>
<!-- 
                                <div class="form-group col-md-6">
                                    <label for="inpuPWUser">Senha:</label>
                                    <input type="password" class="form-control" name="inpuPWUser" placeholder="Ex.: Eu!123456">
                                </div> -->

                            </div>

                            <button type="submit" class="bt_add_clubeUser btn btn-warning" id="salvaClubeUser"><i class="fa fa-save"></i> Enviar</button>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgNewUser" style="display:none"></div>
                        <!-- ===================   fim form inscrição  ============================= -->

                    </div>
                </div>
                <!-- ===================   card inscriçãi  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addClube" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastre seu clube</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <form id="clube_add_form">
                
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputNomeClube">Nome do clube:</label>
                            <input type="text" class="form-control" name="inputNomeClube" id="inputNomeClube" onkeyup="this.value = this.value.toUpperCase();" placeholder="Ex.: Clube Floresta">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputRegiao">Região:</label>
                            <select name="inputRegiao" id="inputRegiao" class="form-control">
                                <option selected disabled>selecione aqui...</option>
                                <?php
                                for ($i = 1; $i < 31; $i++) {
                                    echo '<option value="'.$i.'">' . $i . 'ª região</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEstado">Estado:</label>
                            <select name="inputEstado" id="inputEstado" class="form-control">
                                <option selected disabled>selecione aqui...</option>
                                <?php
                                foreach ($states as $key => $value) {
                                    echo "<option value='" . $value->id . "'>" . $value->nome . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="city">Cidade:</label>
                            <select name="city" class="form-control" class="form-control"></select>
                        </div>
                    </div>

                    <button type="submit" class="bt_add_clube btn btn-warning" id="salvaClube">
                        <i class="fa fa-save"></i> Salvar
                    </button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msg" style="display:none"></div>
                <!-- ===================   fim form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>