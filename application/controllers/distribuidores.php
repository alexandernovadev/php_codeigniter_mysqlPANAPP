<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribuidores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) 
		{
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
		$datosdistribuidores = array(
			'distribuidores' => $this->db->get("distribuidores"));
		$this->load->view('/contenidos/headapp',$datosusuario);//Esta es la barra NAV cafe. donde esta icno hambueguesa
		$this->load->view('/contenidos/distribuidores',$datosdistribuidores);
		$this->load->view('/footer');
	}

	public function agregar()
	{
		$nombre = $this->input->post('nombreadd');
		$marca = $this->input->post('marcaadd');
		$telefono = $this->input->post('telefonoadd');

		$datos =  array(
			$nombre,
			$marca,
			$telefono);

		$fila = $this->modelodistribuidores->agregardistribuidor($datos);

		// echo $fila;
		if ($fila == true) 
		{
			echo "Bien echo so";
		}
		elseif ($fila == false)
		{
			echo "Mal echo so";
		}

	}

	public function modificar()
	{
		$idmodificardistri = $this->input->post('iddistri');
		$nombre = $this->input->post('nombre');
		$marca = $this->input->post('marcaedi');
		$telefono = $this->input->post('teledi');
		
		$datos = array(
			$idmodificardistri,
			$nombre,
			$marca,
			$telefono);


		$fila = $this->modelodistribuidores->modificar($datos);

		if ($fila == true) 
		{
			echo "Bien echo so";
		}
		elseif ($fila == false)
		{
			echo "Mal echo so";
		}

	}

	public function eliminar()
	{
		$iddistri = $this->input->post('modificardistriid');

		$fila = $this->modelodistribuidores->eliminar($iddistri);

		if ($fila == true) 
		{
			echo "Bien echo so";
		}
		elseif ($fila == false)
		{
			echo "Mal echo so";
		}
	}

	public function traerfila()
	{
		$iddistri = $this->input->post('modificardistriid');

		$fila = $this->modelodistribuidores->obtenerfila($iddistri);

		echo $fila->id_distribuidor.","
		.$fila->nombre.","
		.$fila->marca.","
		.$fila->telefono.",";
	}
	public function recargartabla()
	{
		$tabladistribuidores = array(
		'distribuidores'    => $this->db->get("distribuidores"));

		 $this->load->view('/recargas/recargadistribuidores', $tabladistribuidores);
	}

}

