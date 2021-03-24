   </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   <footer>

   </footer>
      <script>
			/*--------------------------------------
			Funciones de los botones de menu*/
			$("#tabinventario").click(function ()
			{
				location.href ="<?php echo base_url('inventario')?>";
			});

			$("#tabdistribuidores").click(function ()
			{
				location.href ="<?php echo base_url('distribuidores')?>";
			});

			$("#tabventas").click(function ()
			{
				location.href ="<?php echo base_url('ventas')?>";
			});

			$("#tabdinero").click(function ()
			{
				alert("hola dinero");
			});

			$("#tabusuarios").click(function ()
			{
				location.href ="<?php echo base_url('usuarios')?>";
			});

			$("#tabfacturaventas").click(function ()
			{
				alert("hola factura ventas");
			});

			$("#tabpedidos").click(function ()
			{
				alert("hola pedidos");
			});
			$("#tabsalir").click(function ()
			{
				location.href ="<?php echo base_url('login/salir')?>";
			});
			/*--------------------------------------
			Funciones de los botones de menu*/


			/*--------------------------------------
			Funciones del Inventario*/
			function eliminarproducto(evento)
			{
				var id = evento.id;
				// alert("Esto es: " + id);

				var parametros =
					{
					'borrar'   : id
					}
			     $.ajax({
			        type        : 'POST',
			        url         : "<?php echo base_url('inventario/eliminar')?>",
			        data        :  parametros,

							success: function (data)
							{
							// alert('La respuesta del servidor es : '+ data);
							//  $("#tablaconproductos").html("");
							$('#alertas').css("display", "block");
							$('#alertas').html("Se elimino con exito");
							$("#alertas").delay(4000).fadeOut();
							$("#tablaconproductos").load("<?php echo base_url('inventario/recargartabla')?>");
							},
							error: function (r,s,t)
							{
								alert("No sirve");
							}
						});
			}

			function modificarproducto(evento)
			{
				var id_producto = evento.id;

				var parametros =
					{
					'modificarid'   : id_producto
					}
			     $.ajax({
			        type        : 'POST',
			        url         : "<?php echo base_url('inventario/traerdatosfilainventario')?>",
			        data        :  parametros,

							success: function (data)
							{
							var valores = data.split(",");
							var ide               = valores[0]
							var detalle           = valores[1];
							var precio_entrada    = valores[2];
							var precio_salida     = valores[3];
							var cantidad          = valores[4];
							var iva               = valores[5];
							var fecha_vencimiento = valores[6];
							var id_distribuidor   = valores[7];
							var id_categoria      = valores[8];
							var codigo_barras     = valores[9];

							$('#editarproducto_id').val(ide);
							$('#editarproducto_detalle').val(detalle);
							$('#editarproducto_precioentrada').val(precio_entrada);
							$('#editarproducto_preciosalida').val(precio_salida);
							$('#editarproducto_cantidad').val(cantidad);
							$('#editarproducto_iva').val(iva);
							$('#editarproducto_fechavencimiento').val(fecha_vencimiento);
							$('#editarproducto_iddistribuidor').val(id_distribuidor);
							$('#editarproducto_idcategoria').val(id_categoria);
							$('#editarproducto_codigobarras').val(codigo_barras);
							},
							error: function (r,s,t)
							{
								alert("No sirve esto jajajaj sigue intentando: "+"Esto es---> "+ r +"Esto es------> . ."+ s +"Esto es ---->... " + t );
							}
						});

					$('#btnmodificar').click(function () {

					var idee = $('#editarproducto_id').val();
					var detalle = $('#editarproducto_detalle').val();
					var precio_entrada= $('#editarproducto_precioentrada').val();
					var precio_salida= $('#editarproducto_preciosalida').val();
					var cantidad= $('#editarproducto_cantidad').val();
					var iva= $('#editarproducto_iva').val();
					var fecha_vencimiento= $('#editarproducto_fechavencimiento').val();
					var id_distribuidor= $('#editarproducto_iddistribuidor').val();
					var id_categoria= $('#editarproducto_idcategoria').val();
					var codigo_barras= $('#editarproducto_codigobarras').val();

						var parametros =
							{
							'modificaride'       : idee,
							'detalle'           : detalle,
							'precio_entrada'    : precio_entrada,
							'precio_salida'     : precio_salida,
							'cantidad'          : cantidad,
							'iva'               : iva,
							'fecha_vencimiento' : fecha_vencimiento,
							'id_distribuidor'   : id_distribuidor,
							'id_categoria'      : id_categoria,
							'codigo_barras'     : codigo_barras
							}
					     $.ajax({
					        type        : 'POST',
					        url         : "<?php echo base_url('inventario/modificar')?>",
					        data        :  parametros,

									success: function (data)
									{
									// alert("la data es: " + data);
									$('#alertas').css("display", "block");
									$('#alertas').html("Se modifico con exito");
									$("#alertas").delay(4000).fadeOut();
									$('#modalmodificarprodu').modal('toggle');
									$("#tablaconproductos").load("<?php echo base_url('inventario/recargartabla')?>");
									},
									error: function (r,s,t)
									{
										alert("no sirve el ajax");
									}
								});

					});
			}

			$('#btnagregar').click(function ()
			{
				var detalle = $('#agregarproducto_detalle').val();
				var precio_entrada= $('#agregarproducto_precioentrada').val();
				var precio_salida= $('#agregarproducto_preciosalida').val();
				var cantidad= $('#agregarproducto_cantidad').val();
				var iva= $('#agregarproducto_iva').val();
				var fecha_vencimiento= $('#agregarproducto_fechavencimiento').val();
				var id_distribuidor= $('#agregarproducto_iddistribuidor').val();
				var id_categoria= $('#agregarproducto_idcategoria').val();
				var codigo_barras= $('#agregarproducto_codigobarras').val();

				var parametros =
					{
					'detalle'           : detalle,
					'precio_entrada'    : precio_entrada,
					'precio_salida'     : precio_salida,
					'cantidad'          : cantidad,
					'iva'               : iva,
					'fecha_vencimiento' : fecha_vencimiento,
					'id_distribuidor'   : id_distribuidor,
					'id_categoria'      : id_categoria,
					'codigo_barras'     : codigo_barras
					}
			     $.ajax({
			        type        : 'POST',
			        url         : "<?php echo base_url('inventario/agregar')?>",
			        data        :  parametros,

							success: function (data)
							{
							// alert("la data es: " + data);
							$('#alertas').css("display", "block");
							$('#alertas').html("Se agrego con exito");
							$("#alertas").delay(4000).fadeOut();
							$('#modaladdprodu').modal('toggle');
							$("#tablaconproductos").load("<?php echo base_url('inventario/recargartabla')?>");
							},
							error: function (r,s,t)
							{
								alert("no sirve el ajax");
							}
						});
			});

			function buscarproducto()
			{
			  // Con la sigiente funcion busca en la tabla los que no coincidan lo oculta.
			 var input, filter, table, tr, td, i;
			 input = document.getElementById("inputbuscarproducto");
			 filter = input.value.toUpperCase();
			 table = document.getElementById("tablaconproductos");
			 tr = table.getElementsByTagName("tr");

			  for (i = 0; i < tr.length; i++)
			  {
			   td = tr[i].getElementsByTagName("td")[0]; // Esta es la posicion que buscara
			  //Como el nombre esta en la poscion 1, yo coloque uno
			   if (td)
			     {
			        if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
			        {
			          tr[i].style.display = "";
			        }
			        else
			        {
			          tr[i].style.display = "none";
			        }
			     }
			  }
			}

			function filtrodistribuidores(distribuidor)
             {
               filter = distribuidor.toUpperCase();
               table = document.getElementById("tablaconproductos");
               tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++)
                {
                 td = tr[i].getElementsByTagName("td")[6]; // Esta es la posicion que buscara
                //Como el nombre esta en la poscion 1, yo coloque uno
                 if (td)
                   {
                      if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
                      {
                        tr[i].style.display = "";
                      }
                      else
                      {
                        tr[i].style.display = "none";
                      }
                   }
                }
             }

			 function filtrocategoria(categoria)
             {
               filter = categoria.toUpperCase();
               table = document.getElementById("tablaconproductos");
               tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++)
                {
                 td = tr[i].getElementsByTagName("td")[7]; // Esta es la posicion que buscara
                //Como el nombre esta en la poscion 1, yo coloque uno
                 if (td)
                   {
                      if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
                      {
                        tr[i].style.display = "";
                      }
                      else
                      {
                        tr[i].style.display = "none";
                      }
                   }
                }
             }
			/*--------------------------------------
			Funciones del Inventario*/



			/*--------------------------------------
			Funciones del Distribuidores*/

			$("#btnagregardistri").click(function ()
			{
				var nombre = $('#agregardis_nombre').val();
				var marca = $('#agregardis_marca').val();
				var telefono = $('#agregardis_telefono').val();

				var parametros =
				{
					'nombreadd'    :  nombre,
					'marcaadd'     :  marca,
					'telefonoadd'  :  telefono
				}

				$.ajax({
					type   : 'POST',
					url    : "<?php echo base_url('distribuidores/agregar')?>",
					data   :  parametros,

					success: function (data)
					{
						// alert("La data es: " + data);
						$('#alertas').css("display", "block");
						$('#alertas').html("Se agrego distribuidor con exito");
						$("#alertas").delay(4000).fadeOut();
						$('#modaladddistri').modal('toggle');
						$("#tablacondistribuidores").load("<?php echo base_url('distribuidores/recargartabla')?>");
					},

					error: function (e,t,y)
					{
						alert("No sirve agregar distribuidores");
					}
				});
			});

			function eliminardistribuidor(evento)
			{
				var iddis =  evento.id;
				// alert("El id es: " + evento.id);
				 $.ajax({
				 	type        : 'POST',
			        url         : "<?php echo base_url('distribuidores/eliminar')?>",
			        data        :  {"modificardistriid": iddis},


			        success: function (data)
			        {
			        	// alert('La data es: ' + data);
			        	$('#alertas').css("display", "block");
						$('#alertas').html("Se elimino distribuidor con exito");
						$("#alertas").delay(4000).fadeOut();
						$("#tablacondistribuidores").load("<?php echo base_url('distribuidores/recargartabla')?>");

			        },

			        error: function (e,t,t)
			        {
			        	alert('no sirce ajax de eliminar');
			        }
				 });
			}

			function modificardistribuidores(evento)
			{
				var id = evento.id;

				$.ajax({
			        type        : 'POST',
			        url         : "<?php echo base_url('distribuidores/traerfila')?>",
			        data        :  {"modificardistriid": id},

			        success: function (data) {
			        	var valores = data.split(",");
						var ide       = valores[0]
						var nombre    = valores[1];
						var marca     = valores[2];
						var telefono  = valores[3];

						$('#editardis_id').val(ide);
						$('#editardis_nombre').val(nombre);
						$('#editardis_marca').val(marca);
						$('#editardis_telefono').val(telefono);
			        },

			        error: function (estado,error,nose) {

			        }
				});
				// alert(id);

				$("#btneditardistri").click(function () {
					var iddistri = $('#editardis_id').val();
					var nombreedi = $('#editardis_nombre').val();
					var marcaedi = $('#editardis_marca').val();
					var teledi= $('#editardis_telefono').val();

					var parametros =
					{
						'iddistri' :  iddistri,
						'nombre'   :  nombreedi,
						'marcaedi' :  marcaedi,
						'teledi'   :  teledi
					}

					$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('distribuidores/modificar')?>",
			        data        :  parametros,

			        success: function (data)
			        {
			        	// alert("La data es: " + data);
			   			$('#alertas').css("display", "block");
						$('#alertas').html("Se modifico distribuidor con exito");
						$("#alertas").delay(4000).fadeOut();
						$('#modaleditdistri').modal('toggle');
						$("#tablacondistribuidores").load("<?php echo base_url('distribuidores/recargartabla')?>");
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve");
			        }
					});
				});
			}

			function buscarmarcadistribuidor()
			{
			  // Con la sigiente funcion busca en la tabla los que no coincidan lo oculta.
			 var input, filter, table, tr, td, i;
			 input = document.getElementById("inputbuscarmarcadis");
			 filter = input.value.toUpperCase();
			 table = document.getElementById("tablacondistribuidores");
			 tr = table.getElementsByTagName("tr");

			  for (i = 0; i < tr.length; i++)
			  {
			   td = tr[i].getElementsByTagName("td")[1]; // Esta es la posicion que buscara
			  //Como el nombre esta en la poscion 1, yo coloque uno
			   if (td)
			     {
			        if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
			        {
			          tr[i].style.display = "";
			        }
			        else
			        {
			          tr[i].style.display = "none";
			        }
			     }
			  }
			}
			/*--------------------------------------
			Funciones del Distribuidores*/


			/*--------------------------------------
			Funciones de Usuario*/
			$("#btnagregaruser").click(function ()
			{
				var cedula      = $('#agregaruser_cedula').val();
				var idtipouser  = $('#agregaruser_tipouser').val();
				var nombre      = $('#agregaruser_nombres').val();
				var apellidos   = $('#agregaruser_apellidos').val();
				var telefono    = $('#agregaruser_celular').val();
				var password    = $('#agregaruser_password').val();

				var parametros =
				{
					'cedula'     : cedula,
					'idtipouser' : idtipouser,
					'nombres'    : nombre,
					'apellidos'  : apellidos,
					'celular'    : telefono,
					'pass'       : password
				}

				$.ajax({
					type        : 'POST',
					url         : "<?php echo base_url('usuarios/agregar')?>",
					data        :  parametros,

					success: function (data)
					{
					// alert('La respuesta del servidor es : '+ data);
					$('#alertas').css("display", "block");
					$('#alertas').html("Se agrego usuario con exito");
					$("#alertas").delay(4000).fadeOut();
					$('#modaladduser').modal('toggle');
					$("#tablaconusuarios").load("<?php echo base_url('usuarios/recargartabla')?>");
					},
					error: function (r,s,t)
					{
					alert("No sirve");
					}
				});

			});

			function eliminarusuario(evento)
			{
				var iduser =  evento.id;
				// alert("El id es: " + evento.id);
				 $.ajax({
				 	type        : 'POST',
			        url         : "<?php echo base_url('usuarios/eliminar')?>",
			        data        :  {"iduser" : iduser},


			        success: function (data)
			        {
			        	// alert('La data es: ' + data);
			            $('#alertas').css("display", "block");
						$('#alertas').html("Se elimino usuario con exito");
						$("#alertas").delay(4000).fadeOut();
						$("#tablaconusuarios").load("<?php echo base_url('usuarios/recargartabla')?>");

			        },

			        error: function (e,t,t)
			        {
			        	alert('no sirce ajax de eliminar');
			        }
				 });
			}

			function modificarusuario(evento)
			{

				var iduser = evento.id;

				$.ajax({
					type        : 'POST',
					url         : "<?php echo base_url('usuarios/traerdatosfilausuarios')?>",
					data        :  {'iduser' : iduser},

					success: function (data)
					{
					var valores = data.split(",");
					var iduser     = valores[0];
					var cedula     = valores[1];
					var idtipouser = valores[2];
					var nombres    = valores[3];
					var apellidos  = valores[4];
					var celular    = valores[5];
					var password   = valores[6];

					$('#editaruser_iduser').val(iduser);
					$('#editaruser_cedula').val(cedula);
					$('#editaruser_tipouser').val(idtipouser);
					$('#editaruser_nombres').val(nombres);
					$('#editaruser_apellidos').val(apellidos);
					$('#editaruser_celular').val(celular);
					$('#editaruser_password').val(password);
					},
					error: function (r,s,t)
					{
					alert("No sirve");
					}
				});

				$("#btneditaruser").click(function () {

					var iduser       = $('#editaruser_iduser').val();
					var cedulaedi    = $('#editaruser_cedula').val();
					var tipoedi      = $('#editaruser_tipouser').val();
					var nombresedi   = $('#editaruser_nombres').val();
					var apellidosedi = $('#editaruser_apellidos').val();
					var celularedi   = $('#editaruser_celular').val();
					var passedi      = $('#editaruser_password').val();

					var parametros =
					{
					'iduser'	 : iduser,
					'cedula'     : cedulaedi,
					'idtipouser' : tipoedi,
					'nombres'    : nombresedi,
					'apellidos'  : apellidosedi,
					'celular'    : celularedi,
					'pass'       : passedi
					}

					$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('usuarios/modificar')?>",
			        data        :  parametros,

			        success: function (data)
			        {
			        	// alert("La data es: " + data);
			   			$('#alertas').css("display", "block");
						$('#alertas').html("Se modifico usuario con exito");
						$("#alertas").delay(4000).fadeOut();
						$('#modaledituser').modal('toggle');
						$("#tablaconusuarios").load("<?php echo base_url('usuarios/recargartabla')?>");
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve");
			        }
					});
				});
			}

			function buscarusuario()
			{
			 // Con la sigiente funcion busca en la tabla los que no coincidan lo oculta.
			 var input, filter, table, tr, td, i;
			 input = document.getElementById("inputbuscarusrname");
			 filter = input.value.toUpperCase();
			 table = document.getElementById("tablaconusuarios");
			 tr = table.getElementsByTagName("tr");

			  for (i = 0; i < tr.length; i++)
			  {
			   td = tr[i].getElementsByTagName("td")[2]; // Esta es la posicion que buscara
			  //Como el nombre esta en la poscion 1, yo coloque uno
			   if (td)
			     {
			        if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
			        {
			          tr[i].style.display = "";
			        }
			        else
			        {
			          tr[i].style.display = "none";
			        }
			     }
			  }
			}
			/*--------------------------------------
			Funciones de Usuario*/


			/*--------------------------------------
			Funciones de Tipo Usuario*/
			function eliminartipousuario(evento)
			{
				var iduser =  evento.id;
				// alert("El id es: " + evento.id);
				 $.ajax({
				 	type        : 'POST',
			        url         : "<?php echo base_url('usuarios/eliminartipouser')?>",
			        data        :  {"iduser" : iduser},


			        success: function (data)
			        {
			        	// alert('La data es: ' + data);
			            $('#alertatipouser').css("display", "block");
						$('#alertatipouser').html("Se elimino tipo usuario");
						$("#alertatipouser").delay(4000).fadeOut();
						$("#tablacontipousuarios").load("<?php echo base_url('usuarios/recargatipouser')?>");

			        },

			        error: function (e,t,t)
			        {
			        	alert('no sirce ajax de eliminar');
			        }
				 });
			}

			$("#btnaddtipouser").click(function ()
			{
				var nombretipo = $("#addtipouser_nombretipo").val();

				 $.ajax({
				 	type        : 'POST',
			        url         : "<?php echo base_url('usuarios/addtipouser')?>",
			        data        :  {"nombre" : nombretipo},


			        success: function (data)
			        {
			        	// alert('La data es: ' + data);
			        	$('#modaleadtipouser').modal('toggle');
			            $('#alertatipouser').css("display", "block");
						$('#alertatipouser').html("Se agrego tipo usuario");
						$("#alertatipouser").delay(4000).fadeOut();
						$("#tablacontipousuarios").load("<?php echo base_url('usuarios/recargatipouser')?>");

			        },

			        error: function (e,t,t)
			        {
			        	alert('no sirce ajax de eliminar');
			        }
				 });
			});

			function modificartipousuario(evento)
			{

				var iduser = evento.id;

				$.ajax({
					type        : 'POST',
					url         : "<?php echo base_url('usuarios/traerdatosfilatipousuarios')?>",
					data        :  {'iduser' : iduser},

					success: function (data)
					{
					var valores = data.split(",");
					var iduser     = valores[0];
					var nombre     = valores[1];

					$('#edittipouser_id').val(iduser);
					$('#edittipouser_nombretipo').val(nombre);
					},
					error: function (r,s,t)
					{
					alert("No sirve");
					}
				});

				$("#btnedittipouser").click(function () {

					var idusere      = $('#edittipouser_id').val();
					var nombre       = $('#edittipouser_nombretipo').val();

					var parametros =
					{
					'iduser'	 : idusere,
					'nombre'     : nombre
					}

					$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('usuarios/modificartipousuario')?>",
			        data        :  parametros,

			        success: function (data)
			        {
			        	// alert("La data es: " + data);
			   			$('#modaledittipouser').modal('toggle');
			            $('#alertatipouser').css("display", "block");
						$('#alertatipouser').html("Se modifico tipo usuario");
						$("#alertatipouser").delay(4000).fadeOut();
						$("#tablacontipousuarios").load("<?php echo base_url('usuarios/recargatipouser')?>");
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve");
			        }
					});
				});
			}

			/*--------------------------------------
			Funciones de Tipo Usuario*/



			/*--------------------------------------
			Funciones de Categoria Producto*/
			function eliminarcategoriaprodu(evento)
			{
				var idcategoria =  evento.id;
				// alert("El id es: " + evento.id);
				 $.ajax({
				 	type        : 'POST',
			        url         : "<?php echo base_url('inventario/eliminaracategoriaproductos')?>",
			        data        :  {"id" : idcategoria},


			        success: function (data)
			        {
			        	// alert('La data es: ' + data);
            $('#alertacategoriaprodu').css("display", "block");
						$('#alertacategoriaprodu').html("Se elimino categoria");
						$("#alertacategoriaprodu").delay(4000).fadeOut();
						$("#tablaconcategoriaproductos").load("<?php echo base_url('inventario/recargartablacategoriaproductos')?>");

			        },

			        error: function (e,t,t)
			        {
			        	alert('no sirce ajax de eliminar');
			        }
				 });
			}

			$("#btnaddcategoriaproducto").click(function ()
			{
				var nombre = $("#addcategoriaprodu_nombre").val();

				 $.ajax({
				 	type        : 'POST',
			        url         : "<?php echo base_url('inventario/agregaracategoriaproductos')?>",
			        data        :  {"nombre" : nombre},


			        success: function (data)
			        {
			        	// alert('La data es: ' + data);
			        	$('#modaladdcategoriaproductos').modal('toggle');
			            $('#alertacategoriaprodu').css("display", "block");
						$('#alertacategoriaprodu').html("Se agrego categoria");
						$("#alertacategoriaprodu").delay(4000).fadeOut();
						$("#tablaconcategoriaproductos").load("<?php echo base_url('inventario/recargartablacategoriaproductos')?>");

			        },

			        error: function (e,t,t)
			        {
			        	alert('no sirce ajax de eliminar');
			        }
				 });
			});

			function modificarcategoriaprodu(evento)
			{

				var idcategoria = evento.id;

				$.ajax({
					type        : 'POST',
					url         : "<?php echo base_url('inventario/traerdatosfilaacategoriaproductos')?>",
					data        :  {'id' : idcategoria},

					success: function (data)
					{
					var valores = data.split(",");
					var id                 = valores[0];
					var nombrecategoria    = valores[1];


					$('#editarcategoriaprodu_id').val(id);
					$('#editarcategoriaprodu_nombre').val(nombrecategoria);
					},
					error: function (r,s,t)
					{
					alert("No sirve");
					}
				});

				$("#btneditcategoriaproducto").click(function () {

					var idcategoriaprodu  = $('#editarcategoriaprodu_id').val();
					var nombre            = $('#editarcategoriaprodu_nombre').val();

					var parametros =
					{
					'ide'	 : idcategoriaprodu,
					'nombre' : nombre
					}

					$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('inventario/modificarcategoriaproductos')?>",
			        data        :  parametros,

			        success: function (data)
			        {
			        	// alert("La data es: " + data);
			   			$('#modaleditcategoriaproductos').modal('toggle');
			            $('#alertacategoriaprodu').css("display", "block");
						$('#alertacategoriaprodu').html("Se modifico categoria con exito");
						$("#alertacategoriaprodu").delay(4000).fadeOut();
						$("#tablaconcategoriaproductos").load("<?php echo base_url('inventario/recargartablacategoriaproductos')?>");
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve");
			        }
					});
				});
			}

			/*--------------------------------------
			Funciones de Categoria Producto*/



			/*--------------------------------------
			Funciones de Ventas*/
			function addfactura(referencia)
			{
				// alert("Esto es: " + referencia);

				$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('ventas/verificarsiexistefactura')?>",
			        data        :  {'referencia' : referencia},

			        success: function (data)
			        {
						var valores = data.split(",");
						var idfactura     = valores[0];
						var referencia    = valores[1];
			        	// alert("La data es: " + data);
			        	$("#seccionventas").load("<?php echo base_url('ventas/mostrarcontenido')?>",{'idfactura': idfactura, 'referencia': referencia });
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve ajax addfactura");
			        }
					});
			}

			function enviarproductosafactura(evento)
			{
				// alert("Esta enviando " + evento.id);
				var datos = evento.id;
				var valores = datos.split(",");
				var idproducto   = valores[0];
				var idfactura    = valores[1];
				var referencia   = valores[2];


				$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('ventas/addproductosafacturas')?>",
			        data        :  {'idproducto' : idproducto, 'idfactura' : idfactura},

			        success: function (data)
			        {
			        	// alert("El servidor envia : " + data);
			        	$("#seccionventas").load("<?php echo base_url('ventas/mostrarcontenido')?>",{'idfactura': idfactura, 'referencia': referencia });
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve ajax enviarproductos");
			        }
				});
			}

			function quitardefactura(evento)
			{
				// alert("Esta enviando " + evento.id);
				var datos = evento.id;
				var valores = datos.split(",");
				var idproducto     = valores[0];
				var idfactura      = valores[1];
				var referencia   = valores[2];

				$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('ventas/eliminarproductodefactura')?>",
			        data        :  {'idproducto' : idproducto, 'idfactura' : idfactura},

			        success: function (data)
			        {
			        	// alert("El servidor envia : " + data);
			        	$("#seccionventas").load("<?php echo base_url('ventas/mostrarcontenido')?>",{'idfactura': idfactura, 'referencia': referencia });
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve ajax quitardefactura");
			        }
				});
			}

			function pagarfactura(evento)
			{
			 	var id  = evento.id;

			 	var datos = id.split(",");
			 	var idfactura = datos[0];
			 	var total     = datos[1];

				// alert("El id es: " + idfactura + " El total es: " + total);
				$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('ventas/pagarfactura')?>",
			        data        :  {'idfactura' : id, 'total': total },

			        success: function (data)
			        {
			        	alert("El servidor envia : " + data);
			        	// $("#seccionventas").load("<?php echo base_url('ventas/mostrarcontenido')?>",{'idfactura': data });
			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve ajax quitardefactura");
			        }
				});

			}

			function buscarproductoenventas()
			{
			 // Con la sigiente funcion busca en la tabla los que no coincidan lo oculta.
			 var input, filter, table, tr, td, i;
			 input = document.getElementById("inputbuscarproductoenventass");
			 filter = input.value.toUpperCase();
			 table = document.getElementById("tablaconproductosventas");
			 tr = table.getElementsByTagName("tr");

			  for (i = 0; i < tr.length; i++)
			  {
			   td = tr[i].getElementsByTagName("td")[0]; // Esta es la posicion que buscara
			  //Como el nombre esta en la poscion 1, yo coloque uno
			   if (td)
			     {
			        if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
			        {
			          tr[i].style.display = "";
			        }
			        else
			        {
			          tr[i].style.display = "none";
			        }
			     }
			  }
			}

			function codigobarras(evento)
			{
				document.getElementById("inputcodigobarras").disabled = true;
				//Muy importante desactivar el input cuando ejecute la funcion, o si no lo hace artas veces.


				var codigo = document.getElementById("inputcodigobarras");
				// alert("El id es: " + idfactura + " El Codigo es: " + codigo.value);

				// var id  = evento;

			 	var datos = evento.split(",");
			 	var idfactura   = datos[0];
			 	var referencia  = datos[1];

			 		setTimeout(example, 3000) 
		function example() {
					$.ajax({
					type        : 'POST',
			        url         : "<?php echo base_url('ventas/verificarcodigobarras')?>",
			        data        :  {'codigo' : codigo.value},

			        // AL VERIFICAR TOCA AÑADIR LA REGLA DE QUE SI LA CANTIDAD ES CERO, NO LA RETORNE, PORQUE AGREGARIA -1.

			        success: function (data)
			        {
			        	alert("El servidor de codigo barras" + data);
			        	$("#inputcodigobarras").val("");

			        	if (data != null)
			        	{
			        		$.ajax({
								type        : 'POST',
								url         : "<?php echo base_url('ventas/addproductosafacturas')?>",
								data        :  {'idproducto' : data, 'idfactura' : idfactura},

								success: function (data)
								{
									// alert("lo hizo");
								// alert("El servidor envia : " + data);
								$("#seccionventas").load("<?php echo base_url('ventas/mostrarcontenido')?>",{'idfactura': idfactura, 'referencia': referencia });
								},

								error: function (estado,error,nose)
								{
								alert("No sirve ajax enviarproductos dentro de codigo");
								}
							});
			        	}

			        },

			        error: function (estado,error,nose)
			        {
			         alert("No sirve ajax Codigo de Barras");
			        }
				});
		}
			document.getElementById("inputcodigobarras").disabled = false;
			//Muy importante desactivar el input cuando ejecute la funcion, o si no lo hace artas veces.
			}
			/*--------------------------------------
			Funciones de Ventas*/




			</script>
</html>
