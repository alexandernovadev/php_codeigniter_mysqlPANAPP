<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homeapp extends CI_Controller
{
   // Con este metodo contructor digo que si no esta logeado no muestre la vista
   public function __construct()
   {
      parent::__construct();
      if (!$this->session->userdata('login')) {
         header("Location: " . base_url());
      }
   }

   public function index()
   {
   	$cedulasession =$this->session->userdata('cedula');
    $usuario = $this->modelousuarios->obtenercedula($cedulasession);
		$nombretipousuario = $this->modelousuarios->obtenernombretipousuario($usuario->id_tipo_usuario);
		//Aca obtengo en nombre de tipo_usuario segun el numero que haya en la tabal usuarios.

			$datosusuario = array(
         'nombre'   => $usuario->nombres,
         'apellido' => $usuario->apellidos,
         'usuario'  => $nombretipousuario->nombre_tipo);


				$this->load->view('/head');
				$this->load->view('/contenidos/headapp',$datosusuario);//Esta es la barra NAV cafe. donde esta icno hambueguesa

				$this->load->view('/contenidos/app');

				$this->load->view('/footer');
   }
}
