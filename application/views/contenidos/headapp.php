<div class="container-fluid barraheader">
    <div class="row w3-animate-zoom">
        <div class="col-sm-10" >
            <h4 class="tituloheadlogin">
            Panderia Realidad 
            </h4>
        </div>
        <div class="col-sm-2">
            <i class="material-icons iconologinentrar rounded-circle"
            data-toggle="modal" data-target="#modalmenuu">menu</i>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal w3-animate-left" id="modalmenuu" tabindex="-1" role="dialog" aria-labelledby="modalmenuuLabel" aria-hidden="true"
style="height: 100vh !important;">
  <div class="modal-dialog" id="modalmenucontenedor" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <section id="sectionmenu">
        	<div class="row cajamenuu">
                <div class="col-sm-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;">
                    <span aria-hidden="true" style="color: white; font-size: 1.3em;">&times;</span>
                    </button>
                </div>
                <div class="col-sm-8">
                    <p style="text-align: center; margin: 0; padding:0; color: white;"><?= $nombre?> <?= $apellido ?></p>
                </div>

             

                <div class="col-md-12" style="background-color: #D7CCC8">
                    <p style="text-align: center; margin: 0; padding:0;"><?= $usuario?></p>
                </div>
        	</div>


        	<div class="row" style="color: black;">
        		<div class="col-md-12 pestañaopcionmenu" id="tabinventario">
        			<i class="material-icons iconosmenuu">
                library_books</i> <span style="text-align: center">Inventario</span>
        		</div>
        		<div class="col-md-12 pestañaopcionmenu" id="tabdistribuidores">
        			<i class="material-icons iconosmenuu">
                work</i> <span style="text-align: center">Distribuidores</span>
        		</div>
        		<div class="col-md-12 pestañaopcionmenu" id="tabventas">
        			<i class="material-icons iconosmenuu">
                shopping_cart</i> <span style="text-align: center">Ventas</span>
        		</div>
        		<!-- <div class="col-md-12 pestañaopcionmenu" id="tabdinero">
        			<i class="material-icons iconosmenuu">
                attach_money</i> <span style="text-align: center">Dinero</span>
        		</div> -->
        		<div class="col-md-12 pestañaopcionmenu" id="tabusuarios">
        			<i class="material-icons iconosmenuu">
                tag_faces</i> <span style="text-align: center">Usuarios</span>
        		</div>
        		<!-- <div class="col-md-12 pestañaopcionmenu" id="tabfacturaventas">
        			<i class="material-icons iconosmenuu">
                chrome_reader_mode</i> <span style="text-align: center">Factura Ventas</span>
        		</div> -->
        		<!-- <div class="col-md-12 pestañaopcionmenu" id="tabpedidos">
        			<i class="material-icons iconosmenuu">
                content_paste</i> <span style="text-align: center">Pedidos</span>
        		</div> -->
                <hr><hr>
                <div class="col-md-12 pestañaopcionmenu" id="tabsalir">
                    <i class="material-icons iconosmenuu">
                exit_to_app</i> <span style="text-align: center">Salir</span>
                </div>
        	</div>
        </section>
      </div>
    </div>
  </div>
</div>

<div class="alert alert-light border border-dark w3-animate-left" id="alertas" role="alert">

</div>
