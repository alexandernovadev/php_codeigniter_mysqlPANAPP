<div class="container-fluid contenedoprincipal ">
	<!-- Modal Agregar Productos -->
	<div class="modal fade" id="modaladdprodu" tabindex="-1" role="dialog" aria-labelledby="modalmodificarproduLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #795548;">
					<h5 class="modal-title" id="modaladdproduLabel" style="text-align:center; color: white;">Agregar Productos</h5>
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
										<input type="text" class="form-control" placeholder="Id" disabled id="agregarproducto_id">
									</div>
								</div>
								<div class="col-md-10">
									<label>Detalle</label>
										<br>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Detalle" id="agregarproducto_detalle">
									</div>
								</div><br><br>

								<div class="col-md-6">
										<label>Precio Entrada</label>
										<br>
										<div class="input-group">
											<input class="form-control" type="number" name="" placeholder="Precio Entrada" id="agregarproducto_precioentrada">
									</div>
								</div>

								<div class="col-md-6">
										<label>Precio Salida</label>
										<br>
									<div class="input-group">
										<input class="form-control" type="number" name="" placeholder="Precio Salida" id="agregarproducto_preciosalida">
									</div>
								</div><br><br><br>

									<div class="col-md-6">
											<label>Cantidad</label>
											<br>
											<div class="input-group">
												<input class="form-control" type="number" name="" placeholder="Cantidad" id="agregarproducto_cantidad">
										</div>
									</div>

									<div class="col-md-6">
										<label>Iva</label>
										<br>
										<div class="input-group">

											<input class="form-control" type="number" name="" placeholder="Iva" id="agregarproducto_iva">
										</div>
									</div><br><br><br>

									<div class="col-md-6">
											<label>Fecha Vencimiento</label>
											<br>
											<div class="input-group">
												<input class="form-control" type="date" name="" placeholder="Fecha Vencimiento" id="agregarproducto_fechavencimiento">
										</div>
									</div>

									<div class="col-md-6">
										<label>Distribuidor</label>
										<br>
										<select class="custom-select" id="agregarproducto_iddistribuidor">
											<option disabled selected>-Distribuidores-</option>
											<?php foreach ($distribuidores->result() as $filadistribuidores): ?>
											<option value="<?= $filadistribuidores->id_distribuidor?>">
											<?= $filadistribuidores->marca?>
											</option>
											<?php endforeach; ?>
										</select>
									</div><br><br><br>
										<div class="col-md-6">
											<label>Categoria</label>
											<br>
											<select class="custom-select"  id="agregarproducto_idcategoria">
												<option disabled selected>-Categorias-</option>
												<?php foreach ($categorias->result() as $filacategorias): ?>
												<option value="<?= $filacategorias->id_categoria?>">
												<?= $filacategorias->nombre_categoria?>
												</option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="col-md-6">
												<label>Codigo Barras</label>
												<br>
											<div class="input-group">
												<input class="form-control" type="number" placeholder="Codigo Barras" id="agregarproducto_codigobarras">
											</div>
										</div><br><br><br><br>
										<div class="mx-auto">
											<button id="btnagregar" class="btn-outline-danger btn-login btn">Agregar</button>
										</div>
							</section>
						</div>
			</div>
		</div>
	</div>
	<!-- Modal Agregar Productos -->

	<!-- Modal Modificar -->
	<div class="modal fade" id="modalmodificarprodu" tabindex="-1" role="dialog" aria-labelledby="modalmodificarproduLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modalmodificarproduLabel" style="text-align:center; color: white;">Modificar Productos</h5>
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
										<input type="text" class="form-control" placeholder="Id" disabled id="editarproducto_id">
									</div>
								</div>
								<div class="col-md-10">
									<label>Detalle</label>
										<br>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Detalle" id="editarproducto_detalle">
									</div>
								</div><br><br>

								<div class="col-md-6">
										<label>Precio Entrada</label>
										<br>
										<div class="input-group">
											<input class="form-control" type="number" name="" placeholder="Precio Entrada" id="editarproducto_precioentrada">
									</div>
								</div>

								<div class="col-md-6">
										<label>Precio Salida</label>
										<br>
									<div class="input-group">
										<input class="form-control" type="number" name="" placeholder="Precio Salida" id="editarproducto_preciosalida">
									</div>
								</div><br><br><br>

									<div class="col-md-6">
											<label>Cantidad</label>
											<br>
											<div class="input-group">
												<input class="form-control" type="number" name="" placeholder="Cantidad" id="editarproducto_cantidad">
										</div>
									</div>

									<div class="col-md-6">
										<label>Iva</label>
										<br>
										<div class="input-group">

											<input class="form-control" type="number" name="" placeholder="Iva" id="editarproducto_iva">
										</div>
									</div><br><br><br>

									<div class="col-md-6">
											<label>Fecha Vencimiento</label>
											<br>
											<div class="input-group">
												<input class="form-control" type="date" name="" placeholder="Fecha Vencimiento" id="editarproducto_fechavencimiento">
										</div>
									</div>

									<div class="col-md-6">
											<label>Distribuidor</label>
											<br>
											<select class="custom-select" id="editarproducto_iddistribuidor">
												  <?php foreach ($distribuidores->result() as $filadistribuidores): ?>
                           <option value="<?= $filadistribuidores->id_distribuidor?>">
                              <?= $filadistribuidores->marca?>
                           </option>
                        	<?php endforeach; ?>
											</select>
									</div><br><br><br>
										<div class="col-md-6">
												<label>Categoria</label>
												<br>
													<select class="custom-select"  id="editarproducto_idcategoria">
														  <?php foreach ($categorias->result() as $filacategorias): ?>
                           			<option value="<?= $filacategorias->id_categoria?>">
                                 <?= $filacategorias->nombre_categoria?>
                           			</option>
                        			<?php endforeach; ?>
													</select>
										</div>

										<div class="col-md-6">
												<label>Codigo Barras</label>
												<br>
											<div class="input-group">
												<input class="form-control" type="number" name="" placeholder="Codigo Barras" id="editarproducto_codigobarras">
											</div>
										</div><br><br><br><br>
										<div class="mx-auto">
											<button id="btnmodificar" class="btn-outline-danger btn-login btn">Modificar</button>
										</div>
							</section>
						</div>
				</div>
			</div>
		</div>
	<!-- Modal Modificar -->

	<!--Modal Categoria Productos-->
	<div class="modal fade" id="modalcategoriaproductos" tabindex="-1" role="dialog" aria-labelledby="modalcategoriaproductosLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modalcategoriaproductosLabel" style="text-align:center; color: white;">Categoria Productos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
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
						<div class="row">
							<div class="col-md-8">
							<div id="alertacategoriaprodu" class="rounded"
							style="background-color: #795548;color: white; font-weight: 500; text-align: center; padding: 10px; display: none;">

							</div>
							</div>
							<div class="col-md-4">
							<button type="button" style="float: right; background-color: #795548; color: white;"
							class="btn rounded-circle" data-toggle="modal"
							data-target="#modaladdcategoriaproductos">
							+
							</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--Modal Categoria Productos-->

	<!--Modal Añadir Categoria Productos-->
	<div class="modal fade" id="modaladdcategoriaproductos" tabindex="-1" role="dialog" aria-labelledby="modaladdcategoriaproductosLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modaladdcategoriaproductosLabel" style="text-align:center; color: white;">Categoria Productos</h5>
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
								<input type="number"  disabled value="" class="form-control" id="addcategoriaprodu_id">
								</div>
							</div>
							<div class="col-md-8">
								<label>Nombre Categoria</label>
								<br>
								<div class="input-group">
								<input type="text" class="form-control" id="addcategoriaprodu_nombre">
								</div>
							</div><br><br>
							<div class="mx-auto" style="margin-top: 20px;">
								<button id="btnaddcategoriaproducto" class="btn-outline-danger btn-login btn">Agregar</button>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	<!--Modal Añadir Categoria Productos-->

	<!--Modal Editar Categoria Productos-->
	<div class="modal fade" id="modaleditcategoriaproductos" tabindex="-1" role="dialog" aria-labelledby="modaleditcategoriaproductosLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #795548;">
						<h5 class="modal-title" id="modaleditcategoriaproductosLabel" style="text-align:center; color: white;">Modificar Categoria Productos</h5>
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
								<input type="number"  disabled class="form-control" id="editarcategoriaprodu_id">
								</div>
							</div>
							<div class="col-md-8">
								<label>Nombre Categoria</label>
								<br>
								<div class="input-group">
								<input type="text" class="form-control" id="editarcategoriaprodu_nombre">
								</div>
							</div><br><br>
							<div class="mx-auto" style="margin-top: 20px;">
								<button id="btneditcategoriaproducto" class="btn-outline-danger btn-login btn">Modificar</button>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	<!--Modal Editar Categoria Productos-->


	<!-- Contenedor de contenido Inventario -->
	<div class="row  w3-animate-zoom">
		<section class="col-md-12" style="background-color: #A1887F;" >

			<div class="row">

				<section class="col-lg-4 col-md-12 col-sm-12" style="padding: 5px;">
					<div class="input-group">
						<input type="text" class="form-control"  id="inputbuscarproducto"
						onkeyup="buscarproducto()" placeholder="Buscar Producto....">
					</div>
				</section>

				<section class="col-lg-2 col-md-6 col-sm-6">
					<select class="custom-select" style="width: 100%;margin-top: 5px;" onchange="filtrodistribuidores(this.value)">
                     <option value="" selected >Distribuidores</option>
                     <?php foreach ($distribuidores->result() as $filadistribuidores): ?>
                        <option value="<?= $filadistribuidores->marca ?>">
                              <?= $filadistribuidores->marca?>
                        </option>
                     <?php endforeach; ?>
                  </select>
				</section>

				<section class="col-lg-2 col-md-6 col-sm-6">
					<select class="custom-select" style="width: 100%;margin-top: 5px;" onchange="filtrocategoria(this.value)">
                     <option value=""selected >Categoria</option>
                     <?php foreach ($categorias->result() as $filacategoria): ?>
                        <option value="<?= $filacategoria->nombre_categoria ?>">
                              <?= $filacategoria->nombre_categoria?>
                        </option>
                     <?php endforeach; ?>
                  </select>
				</section>

				<section class="col-lg-2 col-md-6 col-sm-6" style="padding: 5px;">
					<button type="button" style="padding-bottom: 8px; padding-top: 2px; width: 100%;background-color: #795548; color: white;"
						class="btn" data-toggle="modal"
						data-target="#modalcategoriaproductos">
						<i class="material-icons" style="position: relative; top: 10px; font-size: 1.7em;">import_contacts</i>&nbsp;&nbsp; Categorias
					</button>
				</section>

			    <section class="col-lg-2 col-md-6 col-sm-6" style="padding: 5px;">
					<button type="button" style="padding-bottom: 8px; padding-top: 2px; width: 100%;background-color: #795548; color: white;"
						class="btn" data-toggle="modal"
						data-target="#modaladdprodu">
						<i class="material-icons" style="position: relative; top: 10px; font-size: 1.7em;">add_circle</i>&nbsp;&nbsp; Agregar 
					</button>
				</section>

			</div>

		</section>

		<section class="col-md-12">
			<div class="" style="width: inherit; height:82vh; overflow-y: scroll;
			overflow-x: hidden;">
					<table class="table table-responsive table-hover"  id="tablaconproductos">
						<thead>
							<tr >
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
			</div>
		</section>
	</div>
	<!-- Contenedor de contenido Inventario -->

</div>
