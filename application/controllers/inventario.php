<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario extends CI_Controller {

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

			$tablainventario = array(
				'productos'      => $this->db->get("inventario"),
				'distribuidores' => $this->db->get("distribuidores"),
	      		'categorias'     => $this->db->get("categoria_productos"));

		$this->load->view('/head');
		$this->load->view('/contenidos/headapp',$datosusuario);//Esta es la barra NAV cafe. donde esta icno hambueguesa
		$this->load->view('/contenidos/inventario',$tablainventario);
		$this->load->view('/footer');
	}
	public function recargartabla()
	{

		$tablainventarios = array(
		'productos'    => $this->db->get("inventario"));

		$this->load->view('/recargas/recargainventario',$tablainventarios);
	}

	public function eliminar()
	{
	  $idborrar=$this->input->post('borrar');

      $consultaborrar = $this->modeloinventario->eliminar($idborrar);

      if ($consultaborrar)
      {
         echo "bien hecho lo logro a la primera";
      }
			elseif ($consultaborrar == null) {
				echo "Eres un mal programador ";
			}
	}

	public function traerdatosfilainventario()
	{
		$idmodificar = $this->input->post('modificarid');
		$fila = $this->modeloinventario->enviarfila($idmodificar);

		// $matriz = array($fila->detalle,$fila->precio_entrada , $fila->iva);
		// echo $matriz;
		echo $fila->id_producto.","
		.$fila->detalle.","
		.$fila->precio_entrada.","
		.$fila->precio_salida.","
		.$fila->cantidad.","
		.$fila->iva.","
		.$fila->fecha_vencimiento.","
		.$fila->id_distribuidor.","
		.$fila->id_categoria.","
		.$fila->codigo_barras.",";
	}

	public function modificar()
	{
		$idmodificar = $this->input->post('modificaride');
		$detalle = $this->input->post('detalle');
		$precio_entrada = $this->input->post('precio_entrada');
		$precio_salida = $this->input->post('precio_salida');
		$cantidad = $this->input->post('cantidad');
		$iva = $this->input->post('iva');
		$fecha_vencimiento = $this->input->post('fecha_vencimiento');
		$id_distribuidor = $this->input->post('id_distribuidor');
		$id_categoria = $this->input->post('id_categoria');
		$codigo_barras = $this->input->post('codigo_barras');

		$datos = array(
			$idmodificar,
			$detalle,
			$precio_entrada,
			$precio_salida,
			$cantidad,
			$iva,
			$fecha_vencimiento,
			$id_distribuidor,
			$id_categoria,
			$codigo_barras);

		$fila = $this->modeloinventario->modificar($datos);

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
		$detalle = $this->input->post('detalle');
		$precio_entrada = $this->input->post('precio_entrada');
		$precio_salida = $this->input->post('precio_salida');
		$cantidad = $this->input->post('cantidad');
		$iva = $this->input->post('iva');
		$fecha_vencimiento = $this->input->post('fecha_vencimiento');
		$id_distribuidor = $this->input->post('id_distribuidor');
		$id_categoria = $this->input->post('id_categoria');
		$codigo_barras = $this->input->post('codigo_barras');

		$datosproducto = array(
			$detalle,
			$precio_entrada,
			$precio_salida,
			$cantidad,
			$iva,
			$fecha_vencimiento,
			$id_distribuidor,
			$id_categoria,
			$codigo_barras);

		$consultaadd = $this->modeloinventario->agregarproducto($datosproducto);

		if ($consultaadd == true) 
		{
			echo "lO AGREGO";
		}
		elseif ($consultaadd == false)
		{
			echo "nO LO HIZO";
		}
	}


	/* -------------------------
	Funciones Categoria Producto*/

	public function recargartablacategoriaproductos()
	{

		$tablacategoriaproductos = array(
		'categorias'    => $this->db->get("categoria_productos"));

		$this->load->view('/recargas/recargacategoriaproducto',$tablacategoriaproductos);
	}

	public function eliminaracategoriaproductos()
	{
	  $idborrar=$this->input->post('id');

      $consultaborrar = $this->modeloinventario->eliminarcategoriaproductos($idborrar);

      if ($consultaborrar)
      {
         echo "bien hecho lo logro a la primera";
      }
			elseif ($consultaborrar == null) {
				echo "Eres un mal programador ";
			}
	}

	public function traerdatosfilaacategoriaproductos()
	{
		$idmodificar = $this->input->post('id');
		$fila = $this->modeloinventario->enviarfilacategoriaproductos($idmodificar);

		// $matriz = array($fila->detalle,$fila->precio_entrada , $fila->iva);
		// echo $matriz;
		echo $fila->id_categoria.","
		.$fila->nombre_categoria;
	}

	public function modificarcategoriaproductos()
	{
		$idmodificar = $this->input->post('ide');
		$nombre = $this->input->post('nombre');

		$datos = array(
			$idmodificar,
			$nombre);

		$fila = $this->modeloinventario->modificarcategoriaproductos($datos);

		if ($fila == true) 
		{
			echo "Bien echo so";
		}
		elseif ($fila == false)
		{
			echo "Mal echo so";
		}
	}

	public function agregaracategoriaproductos()
	{
		$nombre = $this->input->post('nombre');

		$consultaadd = $this->modeloinventario->agregarcategoriaproductos($nombre);

		if ($consultaadd == true) 
		{
			echo "lO AGREGO";
		}
		elseif ($consultaadd == false)
		{
			echo "nO LO HIZO";
		}
	}

	/*
	----------------------------
	Funciones Categoria Producto*/
}
