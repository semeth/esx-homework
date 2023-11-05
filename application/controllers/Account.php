<?php

class Account extends CI_Controller{

    public function __construct()    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        if(!isLogged()){
			redirect(base_url());
		}
        $this->load->view('account/index');
    }

    public function register() {

        // Validation rules for registration form
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space', array('callback_alpha_dash_space' => 'Come on, you know that\'s an invalid name to type ;)'));
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space', array('callback_alpha_dash_space' => 'Come on, you know that\'s an invalid name to type ;)'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Registration form validation failed, display registration form again
            $data['error'] = 1;
            $data['message'] = validation_errors();
        } else {
            $data['error'] = 0;
            // Setting variables
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Store existent user for check
            $checkUser = $this->account_model->getUserByEmail($email);


            // Form validation passed, insert user data into the database
            if(!$checkUser){
                $data = array(
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $password
                );
    
                $this->account_model->insertUser($data);
            }else{
                $data['error'] = 1;
                $data['message'] = 'Hey Yos, you tried registering with an existent email, didn\'t you? :D';
            }
        
        }
        echo json_encode($data);
    }

    public function login() {

        // Validation rules for login form
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'Email address is not optional'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password is not optional'));

		if($this->form_validation->run() == FALSE){
            // Login form validation failed, display login form again
			echo validation_errors();
		}else{
            // Form validation passed, attempt to authenticate the user
			$email = $this->input->post('email');
			$password = $this->input->post('password');

            // Check if the user exists and verify the password then create session
			$user = $this->account_model->getUserByEmail($email);

			if($email){
                if(password_verify($password, $user->password)){
                    $data = array(
                        'id'        => $user->id,
                        'name'      => $user->firstname . ' ' . $user->lastname,
                        'email'     => $user->email,
                        'logged_in' => true
                    );
    
                    $this->session->set_userdata($data);
                    echo 'ok';
                }else{
                    echo 'Email or password are wrong.';
                }
            }else{
                echo 'User does not exist';
            }
            
		}
    }

    public function logout(){
		if(!isLogged()){
			redirect(base_url());
		}
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();

		redirect(base_url());
	}



    function alpha_dash_space($str){
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    } 

}