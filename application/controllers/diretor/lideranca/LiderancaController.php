<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LiderancaController extends CI_Controller {

    public function index()
    {
       
        $id = $this->session->userdata('user')['user_clube'];
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get_where('usuarios_clubes', array('user_clube' => $id, 'visibilidade_user'=>'0'));
        $data = [];

        foreach($query->result() as $r) {
            $data[] = array(
                    $r->user_usuario,
                    $r->user_email,
                    $r->user_cargo,
                    $r->user_regiao.' º',
                    $r->status_user == '1' ? '<span class="badge badge-success">Ativo</span>':'<span class="badge badge-danger">Suspenso</span>',
                    '<div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu">
                            <a class="permissaoLiderAcesso dropdown-item" href="#" id="'.$r->id_us.'">
                                <span class="material-icons"> swap_horiz </span>
                                &nbsp;Mudar status
                            </a>
                        <div class="dropdown-divider"></div>
                            <a class="deletaLiderAcesso dropdown-item" href="#" id="'.$r->id_us.'">
                                <span class="material-icons"> delete </span>
                                &nbsp;Deletar
                            </a>
                        </div>
                    </div>'
            );
        }

        $result = array(
                "draw" => $draw,
                    "recordsTotal" => $query->num_rows(),
                    "recordsFiltered" => $query->num_rows(),
                    "data" => $data
                );
        echo json_encode($result);
        exit();
    }

}

/* End of file LiderancaController.php */
