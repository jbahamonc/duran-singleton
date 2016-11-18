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
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<form class="steps-validation steps-basic overflow-visible" action="#">
									<h6>Datos de la Reparación</h6>
									<fieldset>
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-profile"></i></span>
													<input type="text" id="placa" class="form-control" required="required" placeholder="Placa del Vehiculo *">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-user-tie"></i></span>
													<input type="text" class="form-control" placeholder="Valor total *">
												</div>
											</div>
										</div>
									</fieldset>
									<h6>Estado del vehiculo</h6>
									<fieldset class="mb-5">
										<ul class="media-list">
											<li class="table-caract display-inline-block">
												<span class="media-left media-middle">#1</span>
												<div class="media-body media-middle">Puerta trasera izquierda</div>
												<div class="media-right media-middle">
													<button type="button" class="btn btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														<i class="icon-pen6"></i>
													</button>
													<ul class="dropdown-menu no-padding dropdown-menu-right" style="min-width: 200px;">
														<h3 class="popover-title">Agregar observación</h3>
														<div class="popover-content">
															<div class="editableform">
																<div class="control-group form-group no-margin">
																	<div class="editable-input">
																		<textarea class="form-control" rows="2"></textarea>
																	</div>
																	<div class="editable-buttons editable-buttons-bottom">
																		<button type="button" class="label label-striped btn-raised">
																			<i class="icon-x"></i>
																		</button>
																	</div>
																</div>
															</div>
														</div>
													</ul>
												</div>												
											</li>
										</ul>	
									</fieldset>
									<h6>Soporte Multimedia</h6>
									<fieldset>
										<div class="fileupload">
											<div class="dropzone cursor-pointer" id="dropzone_multiple2"></div>
										</div>
									</fieldset>
								</form>
							</div>
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
	<script src="Public/assets/js/plugins/steps.min.js"></script>
	<script src="Public/assets/js/plugins/dropzone.min.js"></script>
	<script src="Public/assets/js/plugins/validate.min.js"></script>
	<script>
		
	</script>
	<script>
		$(".steps-basic").steps({
		    headerTag: "h6",
		    bodyTag: "fieldset",
		    transitionEffect: "fade",
		    titleTemplate: '<span class="number">#index#</span> #title#',
		    labels: {
		        finish: 'Enviar',
		        previous : 'Anterior',
		    	next : 'Siguiente'
		    },
		    onStepChanging: function(event, currentIndex, newIndex){

		    	$(".steps-validation").validate({
		    		submitHandler: function(form) {
					    // do other things for a valid form
					    form.submit();
					},
					rules: {
						placa: "required"
					},
					messages: {
						placa: "Por favor ingrese la placa del vehiculo"
					}
				});
				//return true;
		    },
		    onFinished: function (event, currentIndex) {
		        alert("Formulario enviado.");
		    }
		});
	</script>
	<script>
		Dropzone.autoDiscover = false;
		
		$("#placa").on("blur", function(){
			
			var placa = $(this).val();
			console.log("placa "+placa);			
			$("#dropzone_multiple2").dropzone({
				url: 'index.php?url=upload/fileUpload/'+placa+"/arreglo",
			    paramName: "file", 
			    uploadMultiple: true,
			    //forceFallback: true,
			    dictDefaultMessage: 'Arrastre los archivos para subirlos <span>o haga CLICK</span>',
			    addRemoveLinks: true,
			    dictResponseError: 'Ha ocurrido un problema en el servidor',
			    dictCancelUpload: '',
			    dictRemoveFile: '',
			    removedfile: function(file, serverFileName) {
			    	var imgName = file.name;
			    	$.ajax({
			    		type: "POST",
			    		url: "index.php?url=upload/delete/"+placa+"/arreglo",
			    		data: "filename="+imgName,
			    		dataType : 'json',
			    		success: function(data) {		
			    			if (data.response) {
			    				var img;
			    				(img = file.previewElement) != null ? img.parentNode.removeChild(file.previewElement) : false;
			    				console.log("Archivo eliminado");
			    			} else {
			    				console.log("no se pudo");
			    			}
			    		}
			    	});
			    } 
			});
		});	 
	</script>

	<!-- /scripts -->
</body>
</html>