<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url() ?>/_assets/img/sidebar-1.jpg">
       <?php 
            $this->load->view('master/includes/inc-sidebar');
        ?>
    </div>

    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <?php 
                $this->load->view('master/includes/inc-nav');
            ?>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <?php 
                        $this->load->view('master/includes/inc-card');
                    ?>
                </div>
        
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                            <?php 
                                $this->load->view('master/includes/inc-nav-tabs');
                            ?>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <?php 
                                            $this->load->view('master/includes/inc-tab1');
                                        ?>
                                       
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <?php 
                                            $this->load->view('master/includes/inc-tab2');
                                        ?>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <?php 
                                            $this->load->view('master/includes/inc-tab3');
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
                $this->load->view('master/includes/inc-footer');
            ?>
        </footer>
    </div>
</div>