<div class="wrapper ">

    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url() ?>/_assets/img/sidebar-1.jpg">
       <?php 
            $this->load->view('diretor/includes/inc-sidebar');
        ?>
    </div>

    <div class="main-panel">
    <div class="loader" style="display: none;"></div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <?php 
                $this->load->view('diretor/includes/inc-nav');
            ?>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
            <?php
                $sess_id = $this->session->userdata('user')['id_us'];
                if (!empty($sess_id) && $this->session->userdata('user')['user_cargo'] == 'Diretor(a)') {
                    $user = $this->session->userdata('user');
                    extract($user);
                ?>
                
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">loop</i> Atualizar
                    </button>
                    Seja bem vindo(a) direto(a) <?php echo $this->session->userdata('user')['user_usuario'] ?>
                    
                <?php
                } else {
                    redirect('/');
                }
            ?>
                <div class="row">
                    <?php 
                        $this->load->view('diretor/includes/inc-card');
                    ?>
                </div>
        
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                            <?php 
                                $this->load->view('diretor/includes/inc-nav-tabs');
                            ?>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <?php 
                                            $this->load->view('diretor/includes/inc-tab1');
                                        ?>
                                       
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <?php 
                                            $this->load->view('diretor/includes/inc-tab2');
                                        ?>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <?php 
                                            $this->load->view('diretor/includes/inc-tab3');
                                        ?>
                                     
                                    </div>

                                    <div class="tab-pane" id="class_acompanha">
                                        <?php 
                                            $this->load->view('diretor/includes/inc-tab4');
                                        ?>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        <footer class="footer">
            <?php 
                $this->load->view('diretor/includes/inc-footer');
            ?>
        </footer>
    </div>
</div>