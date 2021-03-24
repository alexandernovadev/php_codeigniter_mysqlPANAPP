<?php
class Modelodistribuidores extends CI_Model
{
	public function obtenerfila($id='') // Con el Id yo recibo del controlador inventario.
	{
		$iddistribuidor = $this->db->query( "SELECT * FROM distribuidores WHERE id_distribuidor='".$id."' LIMIT 1");

     if ($iddistribuidor->num_rows() > 0)
     { //num_rows me devuelve el numero de filas
     //que ha retornado $result

     return $iddistribuidor->row();
     }
     else
		 {
        return null;
     }
	}

    public function modificar($datos='')
    {
        $id        = $datos[0];
        $nombre    = $datos[1];
        $marca     = $datos[2];
        $telefono  = $datos[3];

        $filadistri = $this->db->query( "UPDATE distribuidores SET
          id_distribuidor='$id',
          nombre='$nombre',
          marca='$marca',
          telefono='$telefono'  

          WHERE id_distribuidor  ='$id'");

        if ($filadistri)
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
      $borrardistribuidor = $this->db->query( "DELETE FROM distribuidores WHERE id_distribuidor='".$id."'");

      if ($borrardistribuidor)
      {
        return true;
      }
      else 
      {
         return null;
      }
    }

    public function agregardistribuidor($datosadd='')
    {
        $nombre     = $datosadd[0];
        $marca      = $datosadd[1];
        $telefono   = $datosadd[2];

        $filaadddistribuidores = $this->db->query( "INSERT INTO distribuidores VALUES
          (null,
          '$nombre',
          '$marca',
          '$telefono')");

        if ($filaadddistribuidores)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
