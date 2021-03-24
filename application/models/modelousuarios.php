<?php
class Modelousuarios extends CI_Model
{
	public function obtenercedula($cedula='') //Obetener cedula de la tala usuarios
	{
		$consultausuarios = $this->db->query("SELECT * FROM usuarios WHERE cedula = '".$cedula."' LIMIT 1");

      if ($consultausuarios->num_rows() > 0)
      { //num_rows me devuelve el numero de filas
      //que ha retornado $result

      return $consultausuarios->row();
      }
      else {
         return null;
      }
	}

	public function obtenernombretipousuario($numeroid='') //Obetener tipo de usuario de la tala tipousuario
	{
		$consultausuarios = $this->db->query("SELECT * FROM tipo_user WHERE id_tipo_usuario = '".$numeroid."' LIMIT 1");

      if ($consultausuarios->num_rows() > 0)
      { //num_rows me devuelve el numero de filas
      //que ha retornado $result

      return $consultausuarios->row();
      }
      else {
         return null;
      }
	}

	public function agregaruser($dato='')
	{
		$cedula     = $dato[0];
		$tipouser   = $dato[1];
		$nombres    = $dato[2];
		$apellidos  = $dato[3];
		$telefono   = $dato[4];
		$pass       = $dato[5];


		$filauser = $this->db->query( "INSERT INTO usuarios VALUES
	      (null,
	       '$cedula',
	       '$tipouser',
	       '$nombres',
	       '$apellidos',
	       '$telefono',
	       '$pass')");

		if ($filauser)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function enviarfila($id='')
	{
		$filauser = $this->db->query( "SELECT * FROM usuarios WHERE id_usuario='".$id."' LIMIT 1");

		if ($filauser->num_rows() > 0)
		{ //num_rows me devuelve el numero de filas
		//que ha retornado $result
		return $filauser->row();
		}
		else
		{
		return null;
		}
	}

	public function modificar($datos='')
	{
		$id_user    = $datos[0];
		$cedula     = $datos[1];
		$idtipouser = $datos[2];
		$nombres    = $datos[3];
		$apellidos  = $datos[4];
		$celular    = $datos[5];
		$password   = $datos[6];


		$filainventario = $this->db->query( "UPDATE usuarios SET
	      cedula='$cedula',
	      id_tipo_usuario='$idtipouser',
	      nombres='$nombres',
	      apellidos ='$apellidos',
	      celular='$celular',
	      password	='$password'
	 
	      WHERE id_usuario  ='$id_user'");

		if ($filainventario)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function eliminar($id='')
	{
	   $borraridusuario = $this->db->query( "DELETE FROM usuarios WHERE id_usuario='".$id."'");

      if ($borraridusuario)
      {
      	return true;
      }
      else 
      {
         return null;
      }
	}

	//Funciones Tipo User
	public function eliminartipouser($id='')
	{
	   $borraridtipousuario = $this->db->query( "DELETE FROM tipo_user WHERE id_tipo_usuario='".$id."'");

      if ($borraridtipousuario)
      {
      	return true;
      }
      else 
      {
         return null;
      }
	}

	public function agregartipouser($nombre='')
	{
		$agregartipo = $this->db->query( "INSERT INTO tipo_user VALUES
	      (null,
	       '$nombre')");

      if ($agregartipo)
      {
      	return true;
      }
      else 
      {
         return null;
      }
	}


	public function enviarfilatipouser($id='')
	{
		$filauser = $this->db->query( "SELECT * FROM tipo_user WHERE id_tipo_usuario='".$id."' LIMIT 1");

		if ($filauser->num_rows() > 0)
		{ //num_rows me devuelve el numero de filas
		//que ha retornado $result
		return $filauser->row();
		}
		else
		{
		return null;
		}
	}

	public function modificartipouser($datos='')
	{
		$id_tipo_user = $datos[0];
		$nombre       = $datos[1];

		$filainventario = $this->db->query( "UPDATE tipo_user SET
	      nombre_tipo='$nombre'
	 
	      WHERE id_tipo_usuario  ='$id_tipo_user'");

		if ($filainventario)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//Funciones Tipo User
}
?>
