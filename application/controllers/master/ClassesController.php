<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClassesController extends CI_Controller
{

    public function addClass()
    {

        if (isset($_FILES["my_file_form_class"]["name"])) {
            $config['upload_path'] = './_assets/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('my_file_form_class')) {
                echo $this->upload->display_errors();
            } else {
                $data = array(
                    'nome_classe' => $this->input->post('nome_class'),
                    'image_classe' => $this->upload->data('file_name'),
                    'tipo_classe' => $this->input->post('tipo_class')
                );

                $this->db->insert('classes', $data);
                $data = $this->upload->data();
                echo '<img src="' . base_url() . '_assets/upload/' . $data["file_name"] . '" width="300" height="225" class="img-thumbnail" />';
            }
        }
    }

    /**seleciona usuarios clientes */
    public function listaClasses()
    {
        $this->db->select('*');
        $this->db->from('classes');
        $result = $query = $this->db->get()->result();
        echo json_encode($result);
    }

    public function add_requidito()
    {
        $this->form_validation->set_rules('select_classe', 'classe', 'required');
        $this->form_validation->set_rules('titulo_requisito', 'título do requisito', 'required|max_length[50]');
        $this->form_validation->set_rules('num_requisito', 'número do requisito', 'required|integer');
        $this->form_validation->set_rules('text_requisito', 'descrição do requisito', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'fk_classe' => $this->input->post('select_classe'),
                'titulo_requisito' => $this->input->post('titulo_requisito'),
                'num_requisito' => $this->input->post('num_requisito'),
                'nome_requisito' => $this->input->post('text_requisito')
            );
        
            $this->db->insert('requisitos_classes', $data);
            echo json_encode(['success' => 'Requisito adicionado com sucesso.']);
        }
    }

    /**lista classes */
    public function get_requisitos()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->select('*')
                        ->from('requisitos_classes')
                        ->join('classes', 'classes.id_cls = requisitos_classes.fk_classe')
                        ->get();

        $data = [];

        foreach ($query->result() as $r) {

            $data[] = array(
                $r->id_cls_req,
                $r->nome_classe,
                $r->tipo_classe == 'regular'? '<img src="'.base_url().'_assets/upload/'.$r->image_classe.'" class="img-thumbnail" width="50" height="35" />':'<img src="'.base_url().'_assets/upload/'.$r->image_classe.'" class="img-thumbnail" width="150" height="35" />',
                $r->titulo_requisito,
                $r->num_requisito,
                $r->nome_requisito,
                '<div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="view_requisitos dropdown-item" id="'.$r->id_cls_req.'">
                            <i class="fa fa-eye"></i>&nbsp;Visuallizar
                        </a>
                    <div class="dropdown-divider"></div>
                        <a href="#" class="delete_requisito dropdown-item" id="'.$r->id_cls_req.'">
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

    /**lista um requisito */
    public function get_lista_um_requisito(int $id)
    {
        $output = array();  

           $data = $this->db->select('*')
                            ->from('requisitos_classes')
                            ->join('classes', 'classes.id_cls = requisitos_classes.fk_classe')
                            ->where('id_cls_req', $id)
                            ->get();

           foreach($data->result() as $row)  
           {  
                $output['select_requisito_update'] = $row->id_cls;  
                $output['titulo_up_class'] = $row->titulo_requisito;  
                $output['num_up_class'] = $row->num_requisito;  
                $output['requisito_up_class'] = $row->nome_requisito;  
 
           }  
           echo json_encode($output);
    }

    /**altera requisitos */
    public function altera_um_requisito(int $id)
    {
        $this->form_validation->set_rules('select_requisito_update', 'classe', 'required');
        $this->form_validation->set_rules('titulo_requisito_update', 'título do requisito', 'required|max_length[50]');
        $this->form_validation->set_rules('num_requisito_update', 'número do requisito', 'required|integer');
        $this->form_validation->set_rules('text_requisito_update', 'descrição do requisito', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'fk_classe' => $this->input->post('select_requisito_update'),
                'titulo_requisito' => $this->input->post('titulo_requisito_update'),
                'num_requisito' => $this->input->post('num_requisito_update'),
                'nome_requisito' => $this->input->post('text_requisito_update')
            );
        
            $this->db->update('requisitos_classes', $data, array('id_cls_req' => $id));
            echo json_encode(['success' => 'Requisito alterado com sucesso.']);
        }
    }
    /**deleta requisito */
    public function delete_requisito(int $id)
    {
        echo 'Requisito deletado com sucesso';
        $this->db->delete('requisitos_classes', array('id_cls_req' => $id));
    }

    /**lista clubes */
    public function get_clubes()
    {
       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));

       $query = $this->db->select('*, cidade.nome as city, estados.nome as estado')
                            ->from('cadastro_my_clubes')
                            ->join('cidade', 'cidade.id = cadastro_my_clubes.cidade_clube')
                            ->join('estados', 'estados.id = cadastro_my_clubes.estado_clube_fl')
                            ->get();
       
       $data = [];
       foreach($query->result() as $r) {
            $data[] = array(
                 $r->nome_clube,
                 $r->regiao_clube_fl.' º',
                 $r->city,
                 $r->estado,
                 date("d/m/Y", strtotime($r->date_created))
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

    /**total usuarios */
     /**soma todos os ujsuarios */
     public function somaUsuarios()
     {
         $query = $this->db->query('SELECT COUNT(id_us) AS total_users FROM usuarios_clubes');
         $row = $query->row();
         echo $row->total_users;
     }

     /**soma classes */
     public function somClasses()
     {
        $query = $this->db->query('SELECT COUNT(id_cls) AS total_classes FROM classes');
        $row = $query->row();
        echo $row->total_classes;
     }

     /**soma clubes */
     public function somaClubes()
     {
        $query = $this->db->query('SELECT COUNT(id_fl) AS total_clubes FROM cadastro_my_clubes');
        $row = $query->row();
        echo $row->total_clubes;
     }
}

/* End of file ClassesController.php */
