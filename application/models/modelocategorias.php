<?php
class Modelocategorias extends CI_Model
{
	public function obtenernombrecategoria($id='') // Con el Id yo recibo del controlador inventario.
	{
		$idcategoria = $this->db->query( "SELECT * FROM categoria_productos WHERE id_categoria='".$id."' LIMIT 1");

     if ($idcategoria->num_rows() > 0)
     { //num_rows me devuelve el numero de filas
     //que ha retornado $result

     return $idcategoria->row();
     }
     else
		 {
        return null;
     }
	}
}
