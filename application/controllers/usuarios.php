<?php

class Usuarios extends CI_Controller
{
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

         $tablausuarios = array(
            'usuarios'  => $this->db->get("usuarios"),
            'tipouser'  => $this->db->get("tipo_user"));

      $this->load->view('/head');
      $this->load->view('/contenidos/headapp',$datosusuario);//Esta es la barra NAV cafe. donde esta icno hambueguesa
      $this->load->view('/contenidos/usuarios',$tablausuarios);
      $this->load->view('/footer');
   }
   public function recargartabla()
   {

          $tablausuarios = array(
            'usuarios'      => $this->db->get("usuarios"));

       $this->load->view('/recargas/recargausuarios',$tablausuarios);
   }

   public function eliminar()
   {
      $idborrar=$this->input->post('iduser');

      $consultaborrar = $this->modelousuarios->eliminar($idborrar);

         if ($consultaborrar)
         {
            echo "bien hecho lo logro a la primera";
         }
         elseif ($consultaborrar == null) 
         {
            echo "Eres un mal programador ";
         }
   }

   public function traerdatosfilausuarios()
   {
      $idmodificar = $this->input->post('iduser');

      $fila = $this->modelousuarios->enviarfila($idmodificar);
;
      echo $fila->id_usuario."," 
      .$fila->cedula.","
      .$fila->id_tipo_usuario.","
      .$fila->nombres.","
      .$fila->apellidos.","
      .$fila->celular.","
      .$fila->password;
   }

   public function modificar()
   {
      $iduser    = $this->input->post('iduser');
      $cedula    = $this->input->post('cedula');
      $tipouser  = $this->input->post('idtipouser');
      $nombres   = $this->input->post('nombres');
      $apellidos = $this->input->post('apellidos');
      $telefono  = $this->input->post('celular');
      $pass      = $this->input->post('pass');

      $datosuser = array(
         $iduser,
         $cedula,
         $tipouser,
         $nombres,
         $apellidos,
         $telefono,
         $pass);

      $fila = $this->modelousuarios->modificar($datosuser);

      if ($fila == true) 
      {
         echo "Bien echo so";
      }
      elseif ($fila == false)
      {
         echo "Mal echo so";
      }

   }

   public function agregar()
   {
      $cedula    = $this->input->post('cedula');
      $tipouser  = $this->input->post('idtipouser');
      $nombres   = $this->input->post('nombres');
      $apellidos = $this->input->post('apellidos');
      $telefono  = $this->input->post('celular');
      $pass      = $this->input->post('pass');

      $datosuser = array(
         $cedula,
         $tipouser,
         $nombres,
         $apellidos,
         $telefono,
         $pass);

      $consultaadd = $this->modelousuarios->agregaruser($datosuser);

      if ($consultaadd == true) 
      {
         echo "Lo agrego";
      }
      elseif ($consultaadd == false)
      {
         echo "nO LO HIZO";
      }
   }



   // Funciones de tipo User

   public function recargatipouser()
   {

          $tablatipousuarios = array(
            'tipouser'  => $this->db->get("tipo_user"));

       $this->load->view('/recargas/recargatipouser',$tablatipousuarios);
   }

   public function eliminartipouser()
   {
      $idborrar=$this->input->post('iduser');

      $consultaborrar = $this->modelousuarios->eliminartipouser($idborrar);

         if ($consultaborrar)
         {
            echo "bien hecho lo logro a la primera";
         }
         elseif ($consultaborrar == null) 
         {
            echo "Eres un mal programador ";
         }
   }

   public function addtipouser()
   {
      $nombre=$this->input->post('nombre');

      $consultaaddtipouser = $this->modelousuarios->agregartipouser($nombre);

         if ($consultaaddtipouser)
         {
            echo "bien hecho lo logro a la primera";
         }
         elseif ($consultaaddtipouser == null) 
         {
            echo "Eres un mal programador ";
         }
   }

   public function traerdatosfilatipousuarios()
   {
      $idtipouser = $this->input->post('iduser');

      $filatipouser = $this->modelousuarios->enviarfilatipouser($idtipouser);

      echo  $filatipouser->id_tipo_usuario."," 
      .$filatipouser->nombre_tipo;
   }
   
   public function modificartipousuario()
   {
      $idtipoedit=$this->input->post('iduser');
      $nombreedit=$this->input->post('nombre');

      $datos = array
      ($idtipoedit,
       $nombreedit);

      $consultaedittipouser = $this->modelousuarios->modificartipouser($datos);

         if ($consultaedittipouser)
         {
            echo "bien hecho lo logro a la primera";
         }
         elseif ($consultaedittipouser == null) 
         {
            echo "Eres un mal programador ";
         }
   }
   // Funciones de tipo User
}
