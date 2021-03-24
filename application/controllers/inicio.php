<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('/head');
		$datoslogin = array('error' => '' ,'errorsee'  => '');
		$this->load->view('/loginpagina',$datoslogin);
		$this->load->view('/footer');
	}
	
}
