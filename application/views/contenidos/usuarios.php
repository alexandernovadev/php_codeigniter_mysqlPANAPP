<div  class="container-fluid contenedoprincipal">
		<!-- Modal Agregar Usuarios -->
	<div class="modal fade" id="modaladduser" tabindex="-1" role="dialog" aria-labelledby="modaladduserLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #795548;">
					<h5 class="modal-title" id="modaladduserLabel" style="text-align:center; color: white;">Agregar Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<section class="row">
						<div class="col-md-6">
							<label>Cedula</label>
							<br>
							<div class="input-group">
							<input type="number" class="form-control" placeholder="Cedula" id="agregaruser_cedula">
							</div>
						</div>
						<div class="col-md-6">
							<label>Tipo Usuario</label>
							<br>
							<select class="custom-select" id="agregaruser_tipouser">
								<option disabled selected>-Tipo Usuario-</option>
								<?php foreach ($tipouser->result() as $filatipouser): ?>
								<option value="<?= $filatipouser->id_tipo_usuario?>">
								<?= $filatipouser->nombre_tipo?>
								</option>
								<?php endforeach; ?>
							</select>
						</div><br><br>
						<div class="col-md-6">
							<label>Nombres</label>
								<br>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Nombres" id="agregaruser_nombres">
							</div>
						</div>
						<div class="col-md-6">
							<label>Apellidos</label>
								<br>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Apellidos" id="agregaruser_apellidos">
							</div>
						</div><br><br>
							<div class="col-md-6">
							<label>Celular</label>
								<br>
							<div class="input-group">
								<input type="number" class="form-control" placeholder="Celular" id="agregaruser_celular">
							</div>
						</div>
						<div class="col-md-6">
							<label>Password</label>
								<br>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Password" id="agregaruser_password">
							</div>
						</div><br><br>
						<div class="mx-auto" style="margin-top: 20px;">
							<button id="btnagregaruser" class="btn-outline-danger btn-login btn">Agregar</button>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Agregar Usuarios -->

	<!-- Modal Modificar Usuarios -->
	<div class="modal fade" id="modaledituser" tabindex="-1" role="dialog" aria-labelledby="modaledituserLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modaleditdistriLabel" style="text-align:center; color: white;">Modificar Usuarios</h5>
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
								<input type="number" disabled class="form-control" id="editaruser_iduser">
								</div>
							</div>
							<div class="col-md-6">
								<label>Cedula</label>
								<br>
								<div class="input-group">
								<input type="number" class="form-control" id="editaruser_cedula">
								</div>
							</div>
							<div class="col-md-4">
								<label>Tipo Usuario</label>
								<br>
								<select class="custom-select" id="editaruser_tipouser">
									<option disabled selected>-Tipo Usuario-</option>
									<?php foreach ($tipouser->result() as $filatipouser): ?>
									<option value="<?= $filatipouser->id_tipo_usuario?>">
									<?= $filatipouser->nombre_tipo?>
									</option>
									<?php endforeach; ?>
								</select>
							</div><br><br>
							<div class="col-md-6">
								<label>Nombres</label>
									<br>
								<div class="input-group">
									<input type="text" class="form-control" id="editaruser_nombres">
								</div>
							</div>
							<div class="col-md-6">
								<label>Apellidos</label>
									<br>
								<div class="input-group">
									<input type="text" class="form-control" id="editaruser_apellidos">
								</div>
							</div><br><br>
								<div class="col-md-6">
								<label>Celular</label>
									<br>
								<div class="input-group">
									<input type="number" class="form-control" id="editaruser_celular">
								</div>
							</div>
							<div class="col-md-6">
								<label>Password</label>
									<br>
								<div class="input-group">
									<input type="text" class="form-control" id="editaruser_password">
								</div>
							</div><br><br>
							<div class="mx-auto" style="margin-top: 20px;">
								<button id="btneditaruser" class="btn-outline-danger btn-login btn">Modificar</button>
							</div>
						</section>
					</div>
				</div>
			</div>
	</div>
	<!-- Modal Modificar Usuarios -->

	<!-- Modal Tipo Usuarios -->
	<div class="modal fade" id="modaltipouser" tabindex="-1" role="dialog" aria-labelledby="modaltipouserLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #795548;">
					<h5 class="modal-title" id="modaltipouserLabel" style="text-align:center; color: white;">Tipo Usuarios</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<table class="table table-responsive table-hover"  id="tablacontipousuarios">
						<thead>
							<tr >
							<th scope="col">Id</th>
							<th scope="col">Nombre Tipo</th>
							<th scope="col"></th>
							<th scope="col"></th>
							</tr>
						</thead>

						<tbody>
							<?php
								foreach ($tipouser->result() as $fila) {
							?>
							<tr>
								<th scope="row"><?= $fila->id_tipo_usuario?></th>
								<td scope="row"><?= $fila->nombre_tipo ?></td>
								<th scope="col" id="<?=$fila->id_tipo_usuario?>" onclick="eliminartipousuario(this);">
									<i class="material-icons" style="color: red; font-weight: bolder;">close</i>
								</th>
								<th scope="col" id="<?=$fila->id_tipo_usuario?>" onclick="modificartipousuario(this);">
									<i class="material-icons" style="color: green; font-weight: bolder;" data-toggle="modal"
									data-target="#modaledittipouser">create</i>
								</th>
							</tr>
							<?php
							}
							?>
						</tbody>
				</table>
				<div class="row">
					<div class="col-md-8">
						<div id="alertatipouser" class="rounded" 
						style="background-color: #795548;color: white; font-weight: 500; text-align: center; padding: 10px; display: none;">
							
						</div>
					</div>
					<div class="col-md-4">
						<button type="button" style="float: right; background-color: #795548; color: white;"
						class="btn rounded-circle" data-toggle="modal"
						data-target="#modaleadtipouser">
						+
					</button>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Tipo Usuarios -->

	<!-- Modal Agregar Tipo Usuario -->
	<div class="modal fade" id="modaleadtipouser" tabindex="-1" role="dialog" aria-labelledby="modaleadtipouserLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modaleadtipouserLabel" style="text-align:center; color: white;">Agregar Tipo Usuarios</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<section class="row">
							<div class="col-md-4">
								<label>Id</label>
								<br>
								<div class="input-group">
								<input type="number"  disabled value="" class="form-control" id="addtipouser_id">
								</div>
							</div>
							<div class="col-md-8">
								<label>Nombre Tipo</label>
								<br>
								<div class="input-group">
								<input type="text" class="form-control" id="addtipouser_nombretipo">
								</div>
							</div><br><br>
							<div class="mx-auto" style="margin-top: 20px;">
								<button id="btnaddtipouser" class="btn-outline-danger btn-login btn">Agregar</button>
							</div>
						</section>
					</div>
				</div>
			</div>
	</div>
	<!-- Modal Agregar Tipo Usuario -->

	<!-- Modal Modificar Tipo Usuario -->
	<div class="modal fade" id="modaledittipouser" tabindex="-1" role="dialog" aria-labelledby="modaledittipouserLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modaledittipouserLabel" style="text-align:center; color: white;">Modificar Tipo Usuarios</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<section class="row">
							<div class="col-md-4">
								<label>Id</label>
								<br>
								<div class="input-group">
								<input type="number" disabled class="form-control" id="edittipouser_id">
								</div>
							</div>
							<div class="col-md-8">
								<label>Nombre Tipo</label>
								<br>
								<div class="input-group">
								<input type="text" class="form-control" id="edittipouser_nombretipo">
								</div>
							</div><br><br>
							<div class="mx-auto" style="margin-top: 20px;">
								<button id="btnedittipouser" class="btn-outline-danger btn-login btn">Modificar</button>
							</div>
						</section>
					</div>
				</div>
			</div>
	</div>
	<!-- Modal Modificar Tipo Usuario -->

	
	<div class="row w3-animate-zoom">
		<section class="col-md-12" style="background-color: #A1887F;">
			<div class="row">
				<section class="col-md-6" style="padding: 5px;">
					<div class="input-group">
							<input type="text" class="form-control"  id="inputbuscarusrname" 
							onkeyup="buscarusuario()" placeholder="Buscar Usuario....">
					</div>
				</section>
				<section class="col-md-2" style="padding: 5px;">
					<button type="button" style="padding-bottom: 8px; padding-top: 2px; width: 100%;background-color: #795548; color: white;"
						class="btn" data-toggle="modal"
						data-target="#modaltipouser">
						<i class="material-icons" style="position: relative; top: 10px; font-size: 1.7em;">group</i>&nbsp;&nbsp; Tipo Usuarios 
					</button>
				</section>
			    <section class="col-md-4" style="padding: 5px;">
					<button type="button" style="padding-bottom: 8px; padding-top: 2px; width: 100%;background-color: #795548; color: white;"
						class="btn" data-toggle="modal"
						data-target="#modaladduser">
						<i class="material-icons" style="position: relative; top: 10px; font-size: 1.7em;">add_circle</i>&nbsp;&nbsp; Agregar 
					</button>
				</section>
			</div>
		</section>

		<section class="col-md-12">
			<div class="" style="width: inherit; height:82vh; overflow-y: scroll;
			overflow-x: hidden;">
				<table class="table table-responsive table-hover"  id="tablaconusuarios">
					<thead>
						<tr >
						<th scope="col">Id</th>
						<th scope="col">Cedula</th>
						<th scope="col">Tipo Usario</th>
						<th style="text-align: center;" scope="col">Nombres</th>
						<th style="text-align: center;" scope="col">Apellidos</th>
						<th style="text-align: center;" scope="col">Telefono</th>
						<th style="text-align: center;" scope="col">Password</th>
						<th scope="col"></th>
						<th scope="col"></th>
						</tr>
					</thead>

					<tbody>
						<?php
        					foreach ($usuarios->result() as $fila) {
        						$tipousere = $this->modelousuarios->obtenernombretipousuario($fila->id_tipo_usuario);
						?>
						<tr>
							<th scope="row"><?= $fila->id_usuario?></th>
							<td scope="row"><?= $fila->cedula ?></td>
							<td style="text-align: center;"><?= $tipousere->nombre_tipo ?></td>
							<td style="text-align: center;"><?= $fila->nombres ?></td>
							<td style="text-align: center;"><?= $fila->apellidos?></td>
							<td style="text-align: center;"><?= $fila->celular?></td>
							<td style="text-align: center;"><?= $fila->password?></td>
							<th scope="col" id="<?=$fila->id_usuario?>" onclick="eliminarusuario(this);">
								<i class="material-icons" style="color: red; font-weight: bolder;">close</i>
							</th>
							<th scope="col" id="<?=$fila->id_usuario?>" onclick="modificarusuario(this);">
								<i class="material-icons" style="color: green; font-weight: bolder;" data-toggle="modal"
								data-target="#modaledituser">create</i>
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