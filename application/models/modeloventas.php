<?php
class Modeloventas extends CI_Model
{
  	public function verificarsiexistefactura($ref='') // Con el Id yo recibo del controlador inventario.
  	{
  		$ref = $this->db->query( "SELECT * FROM facturas WHERE referencia='$ref' AND estado = 'pendiente' LIMIT 1");

       if ($ref->num_rows() > 0)
       { //num_rows me devuelve el numero de filas
       //que ha retornado $result

       return $ref->row();
       }
       else
  		 {
          return null;
       }
  	}

    public function agregarfactura($datos='') // Con el Id yo recibo del controlador inventario.
    {

        $estado     = $datos[0];
        $referencia = $datos[1];
        $iduser     = $datos[2];

        $addfactura = $this->db->query( "INSERT INTO facturas VALUES 
            (NULL,
            '$referencia',
            '$estado',
            '2017-2-2',
            '$iduser',
            '0')");

        if ($addfactura) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function agregarproductos($datos='')
    {
        $idfactura   = $datos[0];
        $idproducto  = $datos[1];
        $detalle     = $datos[2]; 
        $cantidad    = $datos[3];
        $precio      = $datos[4];


        $addproductosfactura = $this->db->query( "INSERT INTO productos_vendidos VALUES 
            (null,
             '$idproducto',
             '$detalle',
             '$cantidad',
             '$precio',
             '$idfactura')");
    
        if ($addproductosfactura)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function productoduplicado($datos='')
    {

      $idfactura  = $datos[0];
      $idproducto = $datos[1];


      $duplicado = $this->db->query( "SELECT * FROM productos_vendidos 
        WHERE  id_producto = '$idproducto' AND id_factura ='$idfactura' LIMIT 1");

      if ($duplicado->num_rows() > 0)
      { 
        return $duplicado->row();
      }
      else
      {
        return null;
      }
    }

    public function actualizarfactura($datos='')// Quita -1 de la cantidad de productovendidos
    {
        $idfactura   = $datos[0];
        $idproducto  = $datos[1];
        $detalle     = $datos[2]; 
        $cantidad    = $datos[3];
        $precio      = $datos[4];

        $actulizardatos = $this->db->query( "UPDATE productos_vendidos SET
        cantidad =cantidad+1,
        precio=precio+'$precio'

        WHERE id_producto  ='$idproducto' AND id_factura ='$idfactura'");
    
        if ($actulizardatos)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function actualizarinventario($id = '')// Quita -1 de la cantidad de inventario
    {
      $actulizardatos = $this->db->query( "UPDATE inventario SET
      cantidad =cantidad-1

      WHERE id_producto  ='$id'");
    }

    public function eliminarproductovendidos($datos ='')
    {
      $idfactura  = $datos[0];
      $idproducto = $datos[1];

      $eliminar = $this->db->query( "DELETE FROM productos_vendidos 
      WHERE  id_producto = '$idproducto' AND id_factura ='$idfactura'");
    }

    public function actualizarinventariomasuno($id='')
    {
      $actulizardatos = $this->db->query( "UPDATE inventario SET
      cantidad =cantidad+1

      WHERE id_producto  ='$id'");
    }

    public function actualizarproductosvendidosmenosuno($datos='')
    {
      $idfactura  = $datos[0];
      $idproducto = $datos[1];
      $precio     = $datos[2];

      $actulizardatos = $this->db->query( "UPDATE productos_vendidos SET
      cantidad = cantidad-1,
      precio   = precio-'$precio'

      WHERE id_producto  ='$idproducto' AND id_factura = '$idfactura'");
    }

    public function pagarfactura($datos = '')
    {// Ojo con id user, porque si se sale de la session y entra con otra la factura queda registrada con 
      // el id de la seccion anterior, entonces habria un conflicto, mi solucion es que antes de cambiar de
      // session totalize todad las facturas, OJO OJO.
      $idfactura  = $datos[0];
      $estado     = $datos[1];
      $fecha      = $datos[2];
      $hora       = $datos[3];
      $iduser     = $datos[4];
      $total      = $datos[5];

      $pagarfactura = $this->db->query( "UPDATE facturas SET
      estado            = '$estado',
      fecha             = '$fecha $hora',
      total_productos   = ' $total'

      WHERE id_factura = '$idfactura'");

      if ($pagarfactura) 
      {
        return true;
      }
      else
      {
        return null;
      }
    }

    public function traerfilainventarioconcodigobarras($codigo='')
    {
      
      $codigobarras = $this->db->query( "SELECT * FROM inventario 
        WHERE  codigo_barras = '$codigo' LIMIT 1");

      if ($codigobarras->num_rows() > 0)
      { 
        return $codigobarras->row();
      }
      else
      {
        return null;
      }
    }
}
