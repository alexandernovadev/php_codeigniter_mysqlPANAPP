<table class="table table-responsive table-hover"  id="tablaconcategoriaproductos">
	<thead>
		<tr >
		<th scope="col">Id</th>
		<th scope="col">Nombre Categoria</th>
		<th scope="col"></th>
		<th scope="col"></th>
		</tr>
		</thead>

		<tbody>
		<?php
		foreach ($categorias->result() as $fila) {
		?>
		<tr>
		<th scope="row"><?= $fila->id_categoria ?></th>
		<td style="text-align: center;"><?= $fila->nombre_categoria ?></td>
		<th scope="col" id="<?=$fila->id_categoria?>" onclick="eliminarcategoriaprodu(this);">
			<i class="material-icons" style="color: red; font-weight: bolder;">close</i>
		</th>
		<th scope="col" id="<?=$fila->id_categoria?>" onclick="modificarcategoriaprodu(this);">
			<i class="material-icons" style="color: green; font-weight: bolder;" data-toggle="modal"
			data-target="#modaleditcategoriaproductos">create</i>
		</th>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>