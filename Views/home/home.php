<?php include 'views/include/head.php'; ?>
	<!-- Main navbar -->
	<?php include 'views/include/navbar.php'; ?>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<?php include 'views/include/sidebar.php'; ?>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<?php include 'views/include/page-header.php'; ?>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<div class="row">
						<div class="col-md-3">
							<div class="panel text-center">
								<div class="panel-body">
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li class="dropdown text-muted">
					                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-sync"></i> Actualizar</a></li>
												</ul>
					                		</li>
					                	</ul>
				                	</div>
				                	<!-- Progress counter -->
									<div class="content-group-sm position-relative">
										<img src="Public/assets/img/usuarios-registrados.png" alt="">
										<h2 class="mt-10 mb-5">120</h2>											
										<div>Usuarios registrados</div>
										<div class="text-size-small text-muted">Al dia de hoy</div>
										<div class="mt-15">
											<a class="btn btn-primary btn-icon btn-rounded btn-float" title="Ver Todos">
												<i class="icon-arrow-right8"></i>
											</a>
										</div>
									</div>
									<!-- /progress counter -->
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel text-center">
								<div class="panel-body">
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li class="dropdown text-muted">
					                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-sync"></i> Actualizar</a></li>
												</ul>
					                		</li>
					                	</ul>
				                	</div>
				                	<!-- Progress counter -->
									<div class="content-group-sm position-relative">
										<img src="Public/assets/img/vehiculos-registrados.png" alt="">
										<h2 class="mt-10 mb-5">156</h2>											
										<div>Vehiculos registrados</div>
										<div class="text-size-small text-muted">Al dia de hoy</div>
										<div class="mt-15">
											<a class="btn btn-primary btn-icon btn-rounded btn-float" title="Ver Todos">
												<i class="icon-arrow-right8"></i>
											</a>
										</div>
									</div>
									<!-- /progress counter -->
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel text-center">
								<div class="panel-body">
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li class="dropdown text-muted">
					                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-sync"></i> Actualizar</a></li>
												</ul>
					                		</li>
					                	</ul>
				                	</div>
				                	<!-- Progress counter -->
									<div class="content-group-sm position-relative">
										<img src="Public/assets/img/siniestros-registrados.png" alt="">
										<h2 class="mt-10 mb-5">92</h2>											
										<div>Siniestros atendidos</div>
										<div class="text-size-small text-muted">Al dia de hoy</div>
										<div class="mt-15">
											<a class="btn btn-primary btn-icon btn-rounded btn-float" title="Ver Todos">
												<i class="icon-arrow-right8"></i>
											</a>
										</div>
									</div>
									<!-- /progress counter -->
								</div>
							</div>
						</div>
					</div>
					<h5 class="content-group text-semibold">
						VEHICULOS EN TALLER
						<small class="display-block">Aquí encontrara un listado de los vehiculos que actualmente se encuentran en proceso de reparación</small>
					</h5>
					<div class="panel panel-flat" style="position: static; zoom: 1;">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th><b>#</b></th>
										<th><b>Vehiculo</b></th>
										<th><b>Propietario</b></th>
										<th><b>Telefono</b></th>
										<th><b>Fecha de Ingreso</b></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><div class="btn mdc-bg-green mdc-text-white-dark btn-rounded btn-icon btn-xs"><span class="letter-icon">1</span></div></td>
										<td><a href="#">MLB 56B</a></td>
										<td>Kopyov</td>
										<td>312 527 1579</td>
										<td>23/09/2016</td>
									</tr>
									<tr>
										<td><div class="btn mdc-bg-green mdc-text-white-dark btn-rounded btn-icon btn-xs"><span class="letter-icon">2</span></div></td>
										<td><a href="#">XVU 7N5</a></td>
										<td>Baker</td>
										<td>316 645 1846</td>
										<td>23/09/2016</td>
									</tr>
									<tr>
										<td><div class="btn mdc-bg-green mdc-text-white-dark btn-rounded btn-icon btn-xs"><span class="letter-icon">3</span></div></td>
										<td><a href="#">HGT 67L</a></td>
										<td>Alexander</td>
										<td>314 234 75893</td>
										<td>23/09/2016</td>
									</tr>
									<tr>
										<td><div class="btn mdc-bg-green mdc-text-white-dark btn-rounded btn-icon btn-xs"><span class="letter-icon">4</span></div></td>
										<td><a href="#">DRS 87H</a></td>
										<td>Morrison</td>
										<td>312 654 8935</td>
										<td>23/09/2016</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Footer -->
					<?php include 'views/include/footer.php'; ?>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
	<!-- scripts -->	
	<?php include 'views/include/scripts.php'; ?>
	<!-- /scripts -->
</body>
</html>