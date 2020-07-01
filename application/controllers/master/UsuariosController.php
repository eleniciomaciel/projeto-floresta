<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {

    public function index()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->select('*')
                        ->from('usuarios_clubes')
                        ->join('cidade', 'cidade.id = usuarios_clubes.user_cidade')
                        ->join('cadastro_my_clubes', 'cadastro_my_clubes.id_fl = usuarios_clubes.user_clube')
                        ->get();

        $data = [];

        foreach ($query->result() as $r) {

            $data[] = array(
                $r->user_usuario,
                $r->user_email,
                $r->user_cargo,
                $r->nome,
                $r->nome_clube,
                $r->status_user == '1'?'<span class="badge badge-success">Usuário está ativo</span>':'<span class="badge badge-danger">Usuário está suspenso</span>',
                '<div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="view_usuarios dropdown-item" id="'.$r->id_us.'">
                            <i class="fa fa-eye"></i>&nbsp;Visuallizar
                        </a>
                    <div class="dropdown-divider"></div>
                        <a href="#" class="delete_usuarios dropdown-item" id="'.$r->id_us.'">
                            <i class="fa fa-trash-o"></i>&nbsp;Deletar
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

/* End of file UsuariosController.php */
