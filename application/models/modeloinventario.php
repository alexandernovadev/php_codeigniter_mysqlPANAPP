<?php
class Modeloinventario extends CI_Model
{
	public function eliminar($id='') // Con el Id yo recibo del controlador inventario.
	{
		$borraridproducto = $this->db->query( "DELETE FROM inventario WHERE id_producto='".$id."'");

      if ($borraridproducto)
      {
      	return true;
      }
      else 
      {
         return null;
      }
	}

	public function enviarfila($id='')
	{
		$filainventario = $this->db->query( "SELECT * FROM inventario WHERE id_producto='".$id."' LIMIT 1");

		if ($filainventario->num_rows() > 0)
		{ //num_rows me devuelve el numero de filas
		//que ha retornado $result
		return $filainventario->row();
		}
		else
		{
		return null;
		}
	}

	public function modificar($datos='')
	{
		$id                 = $datos[0];
		$detalle            = $datos[1];
		$precio_entrada     = $datos[2];
		$precio_salida      = $datos[3];
		$cantidad           = $datos[4];
		$iva                = $datos[5];
		$fecha_vencimiento  = $datos[6];
		$id_distribuidor    = $datos[7];
		$id_categoria       = $datos[8];
		$codigo_barras      = $datos[9];

		$filainventario = $this->db->query( "UPDATE inventario SET
	      id_producto='$id',
	      detalle='$detalle',
	      precio_entrada='$precio_entrada',
	      precio_salida='$precio_salida',
	      cantidad ='$cantidad',
	      iva='$iva',
	      fecha_vencimiento='$fecha_vencimiento',
	      id_distribuidor='$id_distribuidor',
	      id_categoria='$id_categoria',
	      codigo_barras='$codigo_barras'
	 

	      WHERE id_producto  ='$id'");

		if ($filainventario)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function agregarproducto($dato='')
	{
		$detalle            = $dato[0];
		$precio_entrada     = $dato[1];
		$precio_salida      = $dato[2];
		$cantidad           = $dato[3];
		$iva                = $dato[4];
		$fecha_vencimiento  = $dato[5];
		$id_distribuidor    = $dato[6];
		$id_categoria       = $dato[7];
		$codigo_barras      = $dato[8];

		$filainventario = $this->db->query( "INSERT INTO inventario VALUES
	      (null,
	      '$detalle',
	      '$precio_entrada',
	      '$precio_salida',
	      '$cantidad',
	      '$iva',
	      '$fecha_vencimiento',
	      '$id_distribuidor',
	      '$id_categoria',
	      '$codigo_barras')");

		if ($filainventario)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/* Categoria Productos*/

	public function eliminarcategoriaproductos($id='') // Con el Id yo recibo del controlador inventario.
	{
	  $borraridproducto = $this->db->query( "DELETE FROM categoria_productos WHERE id_categoria='".$id."'");

      if ($borraridproducto)
      {
      	return true;
      }
      else 
      {
         return null;
      }
	}

	public function enviarfilacategoriaproductos($id='')
	{
		$filacategoria = $this->db->query( "SELECT * FROM categoria_productos WHERE id_categoria='".$id."' LIMIT 1");

		if ($filacategoria->num_rows() > 0)
		{ //num_rows me devuelve el numero de filas
		//que ha retornado $result
		return $filacategoria->row();
		}
		else
		{
		return null;
		}
	}

	public function modificarcategoriaproductos($datos='')
	{
		$id                = $datos[0];
		$nombre            = $datos[1];
		

		$filaeditarcategoria = $this->db->query( "UPDATE categoria_productos SET
	      nombre_categoria='$nombre'

	      WHERE id_categoria  ='$id'");

		if ($filaeditarcategoria)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function agregarcategoriaproductos($dato='')
	{
		$addcategoria = $this->db->query( "INSERT INTO categoria_productos VALUES
	      (null,
	      '$dato')");

		if ($addcategoria)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/* Categoria Productos*/
}
