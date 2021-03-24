<table class="table table-responsive table-hover"  id="tablaconusuarios">
	<thead>
		<tr >
		<th scope="col">Id</th>
		<th scope="col">Cedula</th>
		<th scope="col">Tipo Usario</th>
		<th style="text-align: center;"scope="col">Nombres</th>
		<th style="text-align: center;"scope="col">Apellidos</th>
		<th style="text-align: center;"scope="col">Telefono</th>
		<th style="text-align: center;"scope="col">Password</th>
		<th scope="col"></th>
		<th scope="col"></th>
		</tr>
	</thead>

	<tbody>
		<?php
			foreach ($usuarios->result() as $fila) {
				$tipouser = $this->modelousuarios->obtenernombretipousuario($fila->id_tipo_usuario);
		?>
		<tr>
			<th scope="row"><?= $fila->id_usuario?></th>
			<td scope="row"><?= $fila->cedula ?></td>
			<td style="text-align: center;"><?= $tipouser->nombre_tipo ?></td>
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