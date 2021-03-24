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