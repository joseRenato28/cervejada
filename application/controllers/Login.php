<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); // linha de proteção ao controller
 
class Login extends CI_Controller{ // criação da classe Login
 
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->model('CervejaModel');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
    }

	public function index(){
		$this->load->view('user');
		$data['cerveja'] = $this->CervejaModel->getAllCevas();
		if($this->session->userdata('login')){
			$this->load->view('viewHome', $data);
		}else{	
			$this->load->view('home',$data);
		}
	}

	public function autenticar(){
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('senha', 'senha', 'required');

		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$senha = $this->input->post('senha');
			if($this->Usuarios_model->login($email, $senha)){
				$this->session->set_userdata('login', $email);
				echo "1";
			}else{
				echo "Nome de usuário ou senha incorretos.";
			}
		}else{
			echo "Todos os campos são obrigatórios.";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}