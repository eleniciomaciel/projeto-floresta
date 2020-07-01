<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller {

    public function index(int $id)
    {
        $output = array();  
        $data = $this->db->select('*')
                            ->from('usuarios_clubes')
                            ->join('cadastro_my_clubes', 'cadastro_my_clubes.id_fl = usuarios_clubes.user_clube')
                            ->where('id_us', $id)
                            ->get();
        foreach($data->result() as $row)  
        {  
            $output['clb_pf_nomee'] = $row->user_usuario;  
            $output['clb_pf_email'] = $row->user_email;  
            $output['clb_pf_cargo'] = $row->user_cargo;  
            $output['clb_pf_estado'] = $row->user_estado;  
            $output['clb_pf_cidade'] = $row->user_cidade;  
            $output['clb_pf_regiao'] = $row->user_regiao.' º';  
            $output['clb_pf_clube'] = $row->nome_clube;  
            $output['clb_pf_login'] = $row->user_login;  
            $output['clb_pf_status'] = $row->status_user;  
            $output['clb_pf_data'] = $row->user_date_created;  
        }  
        echo json_encode($output); 
    }

    /**altera dados do perfil */
    public function alteraDadosPerfil(int $id)
    {
        $data = array(  
            'user_usuario'  =>     $this->input->post('clb_pf_nomee'),  
            'user_email'   =>     $this->input->post("clb_pf_email")
       );  
       $this->db->update('usuarios_clubes', $data, array('id_us' => $id));
       echo 'Perfíl alterado com sucesso, reinicie para visualizar as alterações.';  
    }

    /**altera acesso login */
    public function alteraAcessoLogin( int $id)
   {
        $this->form_validation->set_rules('clb_pf_login', 'Login', 'required|valid_email');
        $this->form_validation->set_rules('new_password', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
		array('regex_match' => 'A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.'));


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'user_login' => $this->input->post('clb_pf_login', TRUE),
                'user_senha' => password_hash($this->input->post('new_password', TRUE), PASSWORD_DEFAULT)
        );
            $this->db->update('usuarios_clubes', $data, array('id_us' => $id));
           echo json_encode(['success'=>'Dados de acesso alterado com sucesso.']);
        }
    }

}

/* End of file PerfilController.php */
