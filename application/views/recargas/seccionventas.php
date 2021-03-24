<div class="" style="width: inherit; height:82vh; overflow-y: scroll;
overflow-x: hidden;">

	<div class="container-fluid" style="padding-top: 15px;">
		<section class="row">
			<div class="col-md-6" style="height: 80vh;">
				<div class="container w3-card">
					<section class="row">
						<div class="col-md-12">
							<div class="input-group" style="padding-top: 8px;">
								<input type="text" class="form-control" autofocus 
								 onkeyup="codigobarras('<?=$idfactura?>,<?=$referencia?>')"
								 placeholder="Codigo Barras" id="inputcodigobarras">
							</div>
						</div>
						<div class="col-md-12">
							<div class="input-group" style="padding-top: 8px;">
								<input type="text" id="inputbuscarproductoenventass" class="form-control"
								placeholder="Buscar Producto" onkeyup="buscarproductoenventas()">
							</div>
						</div>

						<div class="col-md-12">
							<div class="container" style="height: 65vh; overflow-y: scroll;
							overflow-x: hidden;">
								<table class="table table-responsive table-hover"  id="tablaconproductosventas">
									<thead>
										<tr >
										<th style="text-align: center;" scope="col">Detalle</th>
										<th style="text-align: center;" scope="col">Precio</th>
										<th style="text-align: center;" scope="col">Cantidad</th>
										<th scope="col"></th>
										</tr>
									</thead>

									<tbody>
										<?php
											foreach ($productos->result() as $fila) {
										?>
										<tr>
											<td style="text-align: center;"><?= $fila->detalle ?></td>
											<td style="text-align: center;"><?= $fila->precio_salida ?></td>
											<td style="text-align: center;"><?= $fila->cantidad ?></td>
											<th scope="col" id="<?= $fila->id_producto?>,<?=$idfactura?>,<?=$referencia?>" onclick="enviarproductosafactura(this);">
												<i class="material-icons" style="color: #795548; font-weight: 100; font-size: 1.8em;">add_circle</i>
											</th>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>

			<div class="col-md-6" style="height: 80vh;">
				<div class="container w3-card">
					<section class="row">
						<div class="col-md-12" style="background-color:#795548;font-weight: 500; color: white;">
							<div class="row">
								<div class="col-md-6" style="font-family: 'Lobster', cursive;
								font-size: 1.2em;">Factura No. <?=$idfactura?> </div>
								<?php
									if ($referencia == "mesa1")
									{
										$referencia = " Mesa 1";
									}
									elseif ($referencia == "mesa2")
									{
										$referencia = " Mesa 2";
									}
									elseif ($referencia == "mesa3")
								    {
									  $referencia = " Mesa 3";
									}
									elseif ($referencia == "mesa4")
									{
									  $referencia = " Mesa 4";
									}
									elseif ($referencia == "mesa5")
								    {
									  $referencia = " Mesa 5";
									}
									elseif ($referencia == "cliente1")
									{
										$referencia = " Cliente 1";
									}
									elseif ($referencia == "cliente2")
									{
										$referencia = " Cliente 2";
									}
									elseif ($referencia == "cliente3")
								    {
									  $referencia = " Cliente 3";
									}
									elseif ($referencia == "cliente4")
									{
									  $referencia = " Cliente 4";
									}
									elseif ($referencia == "cliente5")
								    {
									  $referencia = " Cliente 5";
									}
								 ?>
								<div class="col-md-6"><span style="float: right; background-color: #3E2723;color: white;text-align: center; font-family: 'Lobster', cursive;
								font-size: 1.2em;">&nbsp;&nbsp;<?=$referencia?>&nbsp;&nbsp;</span></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="container" style="height: 68vh; overflow-y: scroll;
							overflow-x: hidden;">
								<table class="table table-responsive table-hover"  id="tablaconproductosvendidosventas">
									<thead>
										<tr >
										<th style="text-align: center;" scope="col">Detalle</th>
										<th style="text-align: center;" scope="col">Cantidad</th>
										<th style="text-align: center;" scope="col">Precio</th>
										<th scope="col"></th>
										</tr>
									</thead>

									<tbody>
										<?php
											foreach ($productos_vendidos->result() as $fila) {
										?>
										<tr>
											<td style="text-align: center;"><?= $fila->detalle ?></td>
											<td style="text-align: center;"><?= $fila->cantidad ?></td>
											<td style="text-align: center;"><?= $fila->precio?></td>
											<th scope="col" id="<?= $fila->id_producto?>,<?=$idfactura?>,<?=$referencia?>" onclick="quitardefactura(this);">
												<i class="material-icons" style="color: #795548; font-weight: 100; font-size: 1.8em;">remove_circle</i>
											</th>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12" style="background-color:  #795548; color: white;">
							<div class="row">
								<div class="col-md-6">
									<button class="btn" data-toggle="modal"
									data-target="#modalpagarfactura" style=" font-weight: 400; font-family: 'Lobster', cursive;
									font-size: 1em;">&nbsp;&nbsp; Pagar &nbsp; &nbsp;</button>
								</div>
								<div class="col-md-6">
									<span style="float: right; font-weight: 400; font-family: 'Lobster', cursive;
									font-size: 1.2em;">Total &nbsp;$ <?=$totalfactura?></span>
								</div>
							</div>
						</div>
					</section>
			</div>
			</div>
		</section>
	</div>
</div>

<!-- Modal Pagar Factura -->
<div class="modal fade" id="modalpagarfactura" tabindex="-1" role="dialog" aria-labelledby="modalpagarfacturaLabel"
aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #795548;">
				<h5 class="modal-title" id="modalpagarfacturaLabel" style="text-align:center; color: white;">Pagar Factura</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<section class="row">
					<div class="col-md-4">
						<label>Total Factura</label>
						<br>
						<div class="input-group">
							<input type="text" class="form-control" disabled id="efectivototal" value="<?=$totalfactura?>">
						</div>
					</div>
					<div class="col-md-8">
						<label>Efectivo</label>
						<br>
						<div class="input-group">

						</div><input type="number" class="form-control" id="efectivocliente" placeholder="Ingrese Dinero...">
					</div>
					<div class="col-md-12" style="text-align: center; color: red; font-weight: 600; margin-top:20px;">
					Saldo <br> <span id="saldo" style="font-size: 1.3em">0</span>
					</div>
					<div class="mx-auto">
							<button style="margin-top: 20px;" class="btn btn-danger" id="<?=$idfactura?>,<?=$totalfactura?>"
					onclick="pagarfactura(this)">&nbsp;&nbsp; Pagar &nbsp; &nbsp;</button>
					</div>

					<script>

						$("#efectivocliente").keyup(function()
						{
						var efectivocliente = document.getElementById('efectivocliente').value;
						var efectivototal   = document.getElementById('efectivototal').value;
						var calculo = efectivocliente-efectivototal;
						// alert('Efectivo total es: ' + efectivototal + " Usted Ingreso " + efectivocliente + " La suma es: " + calculo);
						document.getElementById('saldo').innerHTML = calculo;
						});
					</script>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- Modal Pagar Factura -->
