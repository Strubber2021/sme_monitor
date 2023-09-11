<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
		$this->load->database();
        $this->load->library('session');
	}

    public function index(){
        $this->load->view('login/index');
    }

    function check_login() {

        $this->Login_model->LoginFunction();
        $this->session->set_flashdata('flash_message', 'เข้าสู่ระบบเรียบร้อย');
        redirect(base_url().'ninechang','refresh');
    }

    function logout(){

        $this->session->sess_destroy();
        redirect(base_url().'login','refresh');

    }
}