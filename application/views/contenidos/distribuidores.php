<div  class="container-fluid contenedoprincipal">
		<!-- Modal Agregar Distribuidores -->
	<div class="modal fade" id="modaladddistri" tabindex="-1" role="dialog" aria-labelledby="modaladddistriLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #795548;">
					<h5 class="modal-title" id="modaladddistriLabel" style="text-align:center; color: white;">Agregar Distribuidor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<section class="row">
						<div class="col-md-2">
							<label>Id</label>
							<br>
							<div class="input-group">
							<input type="text" class="form-control" placeholder="Id" disabled value=".." >
							</div>
						</div>

						<div class="col-md-10">
							<label>Nombre</label>
								<br>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Detalle" id="agregardis_nombre">
							</div>
						</div><br><br>

						<div class="col-md-6">
								<label>Marca</label>
								<br>
								<div class="input-group">
									<input class="form-control" type="text" name="" placeholder="Marca"
									 id="agregardis_marca">
							</div>
						</div>

						<div class="col-md-6">
								<label>Telefono</label>
								<br>
							<div class="input-group">
								<input class="form-control" type="number" name="" placeholder="Telefono" id="agregardis_telefono">
							</div>
						</div>
						<div class="mx-auto" style="margin-top: 20px;">
							<button id="btnagregardistri" class="btn-outline-danger btn-login btn">Agregar</button>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Agregar Distribuidores -->

	<!-- Modal Modificar Distribuidores -->
	<div class="modal fade" id="modaleditdistri" tabindex="-1" role="dialog" aria-labelledby="modaleditdistriLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modaleditdistriLabel" style="text-align:center; color: white;">Modificar Distribuidores</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<section class="row">
							<div class="col-md-2">
								<label>Id</label>
								<br>
								<div class="input-group">
								<input type="text" class="form-control" placeholder="Id" disabled id="editardis_id">
								</div>
							</div>

							<div class="col-md-10">
								<label>Nombre</label>
									<br>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Detalle" id="editardis_nombre">
								</div>
							</div><br><br>

							<div class="col-md-6">
									<label>Marca</label>
									<br>
									<div class="input-group">
										<input class="form-control" type="text" name="" placeholder="Marca"
										 id="editardis_marca">
								</div>
							</div>

							<div class="col-md-6">
									<label>Telefono</label>
									<br>
								<div class="input-group">
									<input class="form-control" type="number" name="" placeholder="Telefono" id="editardis_telefono">
								</div>
							</div>
							<div class="mx-auto" style="margin-top: 20px;">
							<button id="btneditardistri" class="btn-outline-danger btn-login btn">Modificar</button>
						</div>

						</section>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal Modificar Distribuidores -->




	<div class="row w3-animate-zoom">
		<section class="col-md-12" style="background-color: #A1887F;">
			<div class="row">
				<section class="col-md-8" style="padding: 5px;">
					<div class="input-group">
							<input type="text" class="form-control"  id="inputbuscarmarcadis" 
							onkeyup="buscarmarcadistribuidor()" placeholder="Buscar Marca Distribuidores....">
					</div>
				</section>
			    <section class="col-md-4" style="padding: 5px;">
					<button type="button" style="padding-bottom: 8px; padding-top: 2px; width: 100%;background-color: #795548; color: white;"
						class="btn" data-toggle="modal"
						data-target="#modaladddistri">
						<i class="material-icons" style="position: relative; top: 10px; font-size: 1.7em;">add_circle</i>&nbsp;&nbsp; Agregar 
					</button>
				</section>
			</div>
		</section>

		<section class="col-md-12">
			<div class="" style="width: inherit; height:82vh; overflow-y: scroll;
			overflow-x: hidden;">
				<table class="table table-hover"  id="tablacondistribuidores">
					<thead>
						<tr >
						<th scope="col">Id</th>
						<th style="text-align: center;"scope="col">Nombre</th>
						<th style="text-align: center;"scope="col">Marca</th>
						<th style="text-align: center;"scope="col">Telefono</th>
						<th scope="col"></th>
						<th scope="col"></th>
						</tr>
					</thead>

					<tbody>
						<?php
        					foreach ($distribuidores->result() as $fila) {
						?>
						<tr>
							<th scope="row"><?= $fila->id_distribuidor ?></th>
							<td style="text-align: center;"><?= $fila->nombre ?></td>
							<td style="text-align: center;"><?= $fila->marca ?></td>
							<td style="text-align: center;"><?= $fila->telefono	 ?></td>
							<th scope="col" id="<?=$fila->id_distribuidor?>" onclick="eliminardistribuidor(this);">
								<i class="material-icons" style="color: red; font-weight: bolder;">close</i>
							</th>
							<th scope="col" id="<?=$fila->id_distribuidor?>" onclick="modificardistribuidores(this);">
								<i class="material-icons" style="color: green; font-weight: bolder;"data-toggle="modal"
								data-target="#modaleditdistri">create</i>
							</th>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</section>
	</div>

</div>