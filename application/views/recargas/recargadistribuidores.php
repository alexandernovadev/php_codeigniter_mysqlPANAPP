<table class="table table-responsive able-hover"  id="tablacondistribuidores">
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