<body>

<div class="container-fluid barraheader">
	<div class="row">
		<div class="col-sm-10" >
			<h4 class="tituloheadlogin">
				Panderia Realidad 
			</h4>
		</div>
		<div class="col-sm-2">
			<i class="material-icons iconologinentrar rounded-circle"
			data-toggle="modal" data-target="#modallogin">directions_run</i>
		</div>
	</div>
</div>

<div class="container-fluid contenedoprincipal">
<!-- background-color: blue; position: relative; bottom:40px; font-size: 1.2em; -->
	<!-- ************-->
	<!-- Modal Login -->
	<div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="modalloginLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header headermodallogin">
					<h5 class="modal-title" id="modalloginLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form action="<?= base_url()?>login" method='post'>
						<div class="form-group">
							<label for="userlogin">Usuario</label>
							<input type="text" class="form-control" name="userlogin" placeholder="Ingrese NickName">
						</div>

						<div class="form-group">
							<label for="userpassword">Password</label>
							<input type="password" class="form-control" name="userpassword" placeholder="Ingrese Password">
						</div>

						<p style="color: red; text-align: center;"><?= $error ?></p>
						<?php 
						if ( $errorsee == 'si' ) {?>
						<script>$('#modallogin').modal('toggle');</script>
						<?php 
						}
						?>
				</div>

				<div class="modal-footer">
					<div class="mx-auto">
						<button type="submit" class="btn btn-danger" id="btn-login">Entrar</button></form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Login -->
	<!-- ************-->

</div>


