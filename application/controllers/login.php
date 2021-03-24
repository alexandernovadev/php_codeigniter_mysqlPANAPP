<?php

class Login extends CI_Controller
{
   public function index()
   {
      $cedula    = $this->input->post('userlogin');
      $password   = $this->input->post('userpassword');

			$usuario = $this->modelousuarios->obtenercedula($cedula);

			if ($usuario == null)
      {
   		$this->load->view('/head');
			$datoslogin  = array('error' => 'Usuario no existe');
			$this->load->view('/loginpagina', $datoslogin);
			$this->load->view('/footer');
      }
			else {
				if ($usuario->password == $password)
         {/*Con este if comparo el password de la base de datos con el password que ingreso
            el usuario en el formulario*/
            $data = array(
               'cedula'     => $usuario->cedula,
               'idusuario'  => $usuario->id_tipo_usuario,
               'login'      => true
            );
            $this->session->set_userdata($data);
         // echo"Contraseña bien";
            header("Location: " .base_url() . "homeapp");
         }
         else
         {
          $this->load->view('/head');
					$datoslogin  = array('error' => 'Contraseña o Usario Invalido',
               'errorsee'  => 'si');
					$this->load->view('/loginpagina', $datoslogin);
					$this->load->view('/footer');
         }
			}


   }

      public function salir()
   {
      //Esta funcion destruye la session
      $this->session->sess_destroy();
      header("Location: " . base_url());
   }

}
