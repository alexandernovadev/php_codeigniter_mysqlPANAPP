<?php
class Ventas extends CI_Controller
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

      $this->load->view('/head');
      $this->load->view('/contenidos/headapp',$datosusuario);//Esta es la barra NAV cafe. donde esta icno hambueguesa
      $this->load->view('/contenidos/ventas');
      $this->load->view('/footer');
   }

   public function verificarsiexistefactura()
   {
      $cedulasession =$this->session->userdata('cedula');
      $usuario = $this->modelousuarios->obtenercedula($cedulasession);

      $referencia = $this->input->post('referencia');

      $consultaverificar = $this->modeloventas->verificarsiexistefactura($referencia);

      $estado = 'pendiente';

      if ($consultaverificar == null) 
      {
         $datos = array
         ($estado,
          $referencia,
          $usuario->id_tipo_usuario);

         $addfactura = $this->modeloventas->agregarfactura($datos);
         // Si es igual a null significa que no hay facturas, entonces le digo que agregue una

         if ($addfactura) 
         {
            echo $this->db->insert_id().",".$referencia;
         }
      }
      elseif ($consultaverificar !=null) 
      {
        echo $consultaverificar->id_factura.",".$referencia;
        // Si es diferente de null, trae la factura existente.
      }
   }

   public function mostrarcontenido()
   {
      $idfactura  = $this->input->post('idfactura');
      $referencia = $this->input->post('referencia');

      $ventas = array(
      'productos'            => $this->db->query('SELECT * FROM inventario WHERE cantidad >0'),
      'idfactura'            => $idfactura,
      'referencia'           => $referencia,
      'productos_vendidos'   => $this->db->query("SELECT * FROM productos_vendidos WHERE id_factura = '$idfactura'"),
      'totalfactura'         => $this->db->query("SELECT sum(precio) as suma FROM productos_vendidos
                                          WHERE id_factura = '$idfactura'")->row()->suma);

      $this->load->view('/recargas/seccionventas',$ventas);
   }

   public function addproductosafacturas()
   {
      $idfactura  = $this->input->post('idfactura');
      $idproducto = $this->input->post('idproducto');

      // Aca Traigo lo datos del producto.
        $datosproductos = $this->modeloinventario->enviarfila($idproducto);
        $cantidad = 1;

        $datos = array
        ($idfactura,
        $idproducto,
        $datosproductos->detalle,
        $cantidad,
        $datosproductos->precio_salida);
      // Aca Traigo lo datos del producto.

      // Aca verifico si el producto existe para agregar o modificar.
        $datosduplicado = array
        ($idfactura,
        $idproducto);
        $verificarduplicidad = $this->modeloventas->productoduplicado($datosduplicado);
       // Aca verifico si el producto existe para agregar o modificar.

      if ($verificarduplicidad == null) // Agregue nuevos
      {
        // echo "agregar";
        // echo $idfactura;
        $addfactura = $this->modeloventas->agregarproductos($datos);    
        $actualizarinventario  = $this->modeloventas->actualizarinventario($idproducto);
      }

      else // Actualice
      {
        // echo "actualizar";
        // echo $idfactura;
        $actualizarfactura = $this->modeloventas->actualizarfactura($datos);
        $actualizarinventario  = $this->modeloventas->actualizarinventario($idproducto);
      }
   }

   public function eliminarproductodefactura()
   {
     $idfactura  = $this->input->post('idfactura');
     $idproducto = $this->input->post('idproducto');
      
     $datosproductos = $this->modeloinventario->enviarfila($idproducto);
     $datos = array
     ($idfactura,
      $idproducto,
      $datosproductos->precio_salida);
     $traefiladeproductosvendidos  = $this->modeloventas->productoduplicado($datos);
     //Esta funcion verifica o trae productos vendidos de acuerdo a idfactura e idproducto

     $cantidadproducto = $traefiladeproductosvendidos->cantidad;
      // echo $cantidadproducto;
     if ($cantidadproducto == 1) 
     {
      // echo $idfactura;
      $eliminarfila  = $this->modeloventas->eliminarproductovendidos($datos);
      $actualizarinventario  = $this->modeloventas->actualizarinventariomasuno($idproducto);
     }

     elseif ($cantidadproducto >1)
     {
      // echo $idfactura;
      $actualizarproductosvendidos  = $this->modeloventas->actualizarproductosvendidosmenosuno($datos);
      $actualizarinventario  = $this->modeloventas->actualizarinventariomasuno($idproducto);
     }
   }

   public function pagarfactura()
   {
      $cedulasession =$this->session->userdata('cedula');
      $usuario = $this->modelousuarios->obtenercedula($cedulasession);

       $idfactura = $this->input->post('idfactura');
       $total     = $this->input->post('total');

       date_default_timezone_set('America/Bogota');
        $fechaactual = date("Y-m-d");
        $hora = date("h:i:s");
        $estado = "cancelado";


        $datos = array
        ($idfactura,
        $estado,
        $fechaactual,
        $hora,
        $usuario->id_tipo_usuario,
        $total);

        $pagarfactura = $this->modeloventas->pagarfactura($datos);

        if ($pagarfactura == null) {
          echo "Error al pagar factura";
        }
        else
        {
          echo "Lo hizo bien";
        }
   }

   public function verificarcodigobarras()
   {
      $codigo = $this->input->post('codigo');

      $filainventario = $this->modeloventas->traerfilainventarioconcodigobarras($codigo);

      if ($filainventario == null) 
      {
        // echo "No existe producto";
        echo null;
      }
      else
      {
        echo $filainventario->id_producto;
        // echo "Exite y el id es: ".$filainventario->id_producto." El detalle es: ".$filainventario->detalle;
      }
   }
}

 ?>
