<table class="table table-responsive table-hover"  id="tablaconproductos">
	<thead>
		<tr>
		<th scope="col">Id</th>
		<th scope="col">Detalle</th>
		<th scope="col">Precio Entrada</th>
		<th scope="col">Precio Salida</th>
		<th scope="col">Cantidad</th>
		<th scope="col">Iva</th>
		<th scope="col">Fecha Vencimiento</th>
		<th scope="col">Distribuidor</th>
		<th scope="col">Categoria</th>
		<th scope="col">Codigo Barras</th>
		<th scope="col"></th>
		<th scope="col"></th>
		</tr>
	</thead>

	<tbody>
		<?php
			foreach ($productos->result() as $fila) {
			$marca     = $this->modelodistribuidores->obtenerfila($fila->id_distribuidor);
			$categoria = $this->modelocategorias->obtenernombrecategoria($fila->id_categoria);
		?>
		<tr>
			<th scope="row"><?= $fila->id_producto ?></th>
			<td style="text-align: center;"><?= $fila->detalle ?></td>
			<td style="text-align: center;"><?= $fila->precio_entrada ?></td>
			<td style="text-align: center;"><?= $fila->precio_salida ?></td>
			<td style="text-align: center;"><?= $fila->cantidad ?></td>
			<td style="text-align: center;"><?= $fila->iva?></td>
			<td style="text-align: center;"><?= $fila->fecha_vencimiento ?></td>
			<td style="text-align: center;"><?= $marca->marca?></td>
			<td style="text-align: center;"><?= $categoria->nombre_categoria?></td>
			<td style="text-align: center;"><?= $fila->codigo_barras ?></td>
			<th scope="col" id="<?=$fila->id_producto?>" onclick="eliminarproducto(this);">
				<i class="material-icons" style="color: red; font-weight: bolder;">close</i>
			</th>
			<th scope="col" id="<?=$fila->id_producto?>" onclick="modificarproducto(this);">
				<i class="material-icons" style="color: green; font-weight: bolder;"data-toggle="modal"
				data-target="#modalmodificarprodu">create</i>
			</th>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
