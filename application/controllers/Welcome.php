<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
	
	public function index()
	{
		if($this->session->userdata('user') && $this->session->userdata('user')['user_cargo'] == 'Master'){
			redirect('welcome/home');
		}elseif ($this->session->userdata('user') && $this->session->userdata('user')['user_cargo'] == 'Diretor(a)') {
			redirect('welcome/diretor');
		}
		else{
			$states = $this->db->get("estados")->result();
			$this->load->view('welcome_message', array('states' => $states));
		}
	}

	public function login(){
 
        $output = array('error' => false);
        
        $email = $this->input->post('email_login', TRUE);
        $password =$this->input->post('password_login', TRUE);

		$data = $this->users_model->login($email, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			$output['message'] = 'Login reconhecido, acessando...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login ou senha inválidas.';
		}
		echo json_encode($output); 
	}
 
	public function nivelUsuarios($data)
	{
		# code...
	}
	public function home(){
		if($this->session->userdata('user') && $this->session->userdata('user')['user_cargo'] == 'Master'){
			$data['title'] = 'Master-gestor';
			$this->load->view('master/partial/header-master', $data);
			$this->load->view('master/home-master');
			$this->load->view('master/partial/footer');
		}
		else{
			redirect('/');
		}
	}
 
	public function diretor()
	{
		if($this->session->userdata('user') && $this->session->userdata('user')['user_cargo'] == 'Diretor(a)'){
			$data['title'] = 'Diretor-clube';
			$this->load->view('diretor/partial/header-diretor', $data);
			$this->load->view('diretor/diretor_page');
			$this->load->view('diretor/partial/footer-diretor');
		}
		else{
			redirect('/');
		}
	}

	public function logout(){
		$this->session->unset_userdata('user');
		redirect('/');
	}
	

	public function select_cidades($id)
	{
		$result = $this->db->where("estado", $id)->get("cidade")->result();
		echo json_encode($result);
	}

	public function add_my_clube()
	{
		$this->form_validation->set_rules('inputNomeClube', 'Nome do clube', 'required|max_length[100]');
		$this->form_validation->set_rules('inputRegiao', 'Região do clube', 'required');
		$this->form_validation->set_rules('inputEstado', 'Estado  do clube', 'required');
		$this->form_validation->set_rules('city', 'Cidade do clube', 'required|callback_unique_clube_cidade');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(['error' => $errors]);
		} else {
			date_default_timezone_set('America/Sao_Paulo');

			$data_ataual = date("Y-m-d H:i:s");
			$data = array(
				'nome_clube' => $this->input->post('inputNomeClube', TRUE),
				'regiao_clube_fl' => $this->input->post('inputRegiao', TRUE),
				'estado_clube_fl' => $this->input->post('inputEstado', TRUE),
				'cidade_clube' => $this->input->post('city', TRUE),
				'date_created' => $data_ataual,
			);
		
			$this->db->insert('cadastro_my_clubes', $data);
			echo json_encode(['success' => 'Clube adicionado com sucesso.']);
		}
	}

	/**verificando se o clube da cidade já está cadastrado */
    public function unique_clube_cidade()
    {
        $cidade_clube = $this->input->post('inputNomeClube');
        $cidade = $this->input->post('city');

        $check = $this->db->get_where('cadastro_my_clubes', array('nome_clube' => $cidade_clube, 'cidade_clube' => $cidade), 1);

        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('unique_clube_cidade', 'O clube '.$cidade_clube.' já foi cadastrado para essa cidade.');
            return FALSE;
        }
        return TRUE;
    }

	/**cidades usuarios */
	public function estados_user()
	{
		$result = $this->db->select('*')
							->from('cadastro_my_clubes')
							->join('estados', 'estados.id = cadastro_my_clubes.estado_clube_fl')
							->group_by("estado_clube_fl")
							->get()->result();
		echo json_encode($result);
	}

	/**cidades com clubes cadastrados */
	public function cidade_clubes(int $id)
	{
		$result = $this->db->select('*')
							->from('cadastro_my_clubes')
							->join('cidade', 'cidade.id = cadastro_my_clubes.cidade_clube')
							->where("estado", $id)
							->group_by("cidade_clube")
							->get()->result();
		echo json_encode($result);
	}

	/**meu clube */
	public function meuClubeCidade(int $id)
	{
		$this->db->group_by("regiao_clube_fl");
		$result = $this->db->where("cidade_clube",$id)->get("cadastro_my_clubes")->result();
		echo json_encode($result);
	}

	/**nomes clubes */
	public function listaClubesNomes(int $id)
	{
		$this->db->group_by("nome_clube");
		$result = $this->db->where("regiao_clube_fl",$id)->get("cadastro_my_clubes")->result();
		echo json_encode($result);
	}

	/**adiciona novos usuarios */
	public function addNovosUsuarios()
	{
		$this->form_validation->set_rules('nomeUser', 'nome', 'required|max_length[100]|is_unique[usuarios_clubes.user_usuario]',
		array('is_unique' => 'Já existe um %s cadastrado como '.$this->input->post('nomeUser', TRUE).'.'));
        $this->form_validation->set_rules('inputEmailUser', 'email', 'required|valid_email|is_unique[usuarios_clubes.user_email]',
		array('is_unique' => 'O %s '.$this->input->post('inputEmailUser', TRUE).' já foi cadastrado.'));
        $this->form_validation->set_rules('inputCargoUser', 'cargo', 'required');
        $this->form_validation->set_rules('estadosUserCadastros_uf', 'estado', 'required');
        $this->form_validation->set_rules('cityUserEstado', 'cidade', 'required');
        $this->form_validation->set_rules('clube_regiao', 'região', 'required');
        $this->form_validation->set_rules('clube_nome_slc', 'nome do clube', 'required');
        $this->form_validation->set_rules('inputLoginUser', 'Login', 'required|is_unique[usuarios_clubes.user_login]|max_length[60]',
		array('required' => 'O %s é obrigatório. Ex.: eu@clube.com',
		'is_unique'     => 'Esse %s já foi cadastrado, use outro por gentileza.'));
        // $this->form_validation->set_rules('inpuPWUser', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
        // array('regex_match' => 'A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.'));


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
			$tokem = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
			$emaiuser = $this->input->post('inputEmailUser', TRUE);
			date_default_timezone_set('America/Sao_Paulo');
			$data_ataual = date("Y-m-d H:i:s");

			$dados['club_usaurio'] = $this->input->post('nomeUser', TRUE);
			$dados['clube_email'] = $this->input->post('inputEmailUser', TRUE);
			$dados['clube_login'] = $this->input->post('inputLoginUser', TRUE);
			$dados['clube_token'] = $tokem;

			error_reporting(E_ALL);
			ini_set("display_ERRORS",1);

			$this->load->library('email');
			$emplate_meil = $this->load->view('email_template.php', $dados, TRUE);
			
			$this->email->from('eleniciotea@outlook.com', 'Bem vindo(a). Seu cadastro foi aprovado.');
			$this->email->to($emaiuser);

			$this->email->subject('Validação de acesso ao painel dos desbravadores');
			$this->email->message($emplate_meil);

			if ($this->email->send()) {
				$data = array(
					'user_usuario' => trim($this->input->post('nomeUser', TRUE)),
					'user_email' => trim($this->input->post('inputEmailUser', TRUE)),
					'user_cargo' => $this->input->post('inputCargoUser', TRUE),
					'user_estado' => $this->input->post('estadosUserCadastros_uf', TRUE),
					'user_cidade' =>  $this->input->post('cityUserEstado', TRUE),
					'user_regiao' =>  $this->input->post('clube_regiao', TRUE),
					'user_clube' =>  $this->input->post('clube_nome_slc', TRUE),
					'user_login' =>  trim($this->input->post('inputLoginUser', TRUE)),
					'user_token' =>  $tokem,
					'user_date_created' =>  $data_ataual
				);
				$this->db->insert('usuarios_clubes', $data);
			} else { 
				$error_mail = $this->email->print_debugger();
				echo json_encode(['error'=>$error_mail]);
				return false;
			}
           echo json_encode(['success'=>'O seu cadastro foi concluído com sucesso. Verifique sua conta de email para ativar seu acesso.']);
        }
	}

	/**ativa login */
	public function ativaLoginUsuário($page = 'Ativa-usuario-acesso')
	{
		if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view($page, $data);
	}

	/**validação de acesso */
	public function validaNovoAcessoClube()
	{
		sleep(3);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('db_mail_pessoal', 'email pessoal', 'required|valid_email|callback_email_existe');
		$this->form_validation->set_rules('db_login', 'login', 'required|valid_email|callback_login_existe');
		$this->form_validation->set_rules('db_token', 'token', 'required|callback_existe_token');
		$this->form_validation->set_rules('db_senha', 'senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
		array('regex_match' => 'A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.'));
		$this->form_validation->set_rules('db_senha1', 'confirmação da senha', 'required|matches[db_senha]');
		if($this->form_validation->run())
		{
		 $array = array(
		  'success' => '<div class="alert alert-success">Sua permissão de acesso foi liberada com sucesso, click aqui para acessa o ambiente <a href="'.base_url('/').'"> AQUI</a></div>'
		 );

		 $minha_senhas = password_hash($this->input->post('db_senha', TRUE), PASSWORD_DEFAULT);
		 
			$data = array(
				'status_user' => 1,
				'user_senha' => $minha_senhas,
			);

			$this->db->where('user_login', $this->input->post('db_login', TRUE));
			$this->db->update('usuarios_clubes', $data);

		}
		else
		{
		 $array = array(
		  'error'   => true,
		  'email_error' => form_error('db_mail_pessoal'),
		  'login_error' => form_error('db_login'),
		  'token_error' => form_error('db_token'),
		  'senha_error' => form_error('db_senha'),
		  'senha1_error' => form_error('db_senha1'),
		 );
		}
	  
		echo json_encode($array);
	}

	/**verificando se os valores já existem */
	public function email_existe($username)
	{

		$query = $this->db->get_where('usuarios_clubes', array('user_email' => $username));

		if ($query->num_rows() == 0) {
			$this->form_validation->set_message('email_existe', 'Esse email não está registrado em nossa base de dados.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function login_existe($username)
	{

		$query = $this->db->get_where('usuarios_clubes', array('user_login' => $username));

		if ($query->num_rows() == 0) {
			$this->form_validation->set_message('login_existe', 'Esse email não está registrado em nossa base de dados, use o que foi enviado no seu email.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**verificando se token existe */
	public function existe_token($username)
	{
		$query = $this->db->get_where('usuarios_clubes', array('user_token' => $username));

		if ($query->num_rows() == 0) {
			$this->form_validation->set_message('existe_token', 'O token não está cadastrado em nosso sistema. Use o que foi enviado no seu email.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
