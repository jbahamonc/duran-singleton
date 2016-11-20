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
								<form class="steps-basic overflow-visible" name="afiliacion" action="#">
									<h6>Datos del Siniestro</h6>
									<fieldset>
										<div class="col-md-10 col-md-offset-1">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-profile"></i></span>
													<input type="text" id="placa" class="form-control" placeholder="Placa del Vehiculo *">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-user-tie"></i></span>
													<input type="text" class="form-control" placeholder="Nombre del Conductor *">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-phone"></i></span>
													<input type="text" class="form-control" placeholder="Ubicacion del Siniestro *">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-profile"></i></span>
													<select class="bootstrap-select bs-select-hidden" multiple="multiple" title="Seleccione uno o varios Peritos" data-width="100%">
														<option value="select">Select Hawaii, California and Nevada</option>
														<option value="HI" title="Fun">Hawaii</option>
														<option value="CA" title="Hollywood">California</option>
														<option value="NV" title="Casino">Nevada</option>
														<option value="OR">Oregon</option>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
									<h6>Datos de los involucrados</h6>
									<fieldset>
										<div class="col-md-10 col-md-offset-1">
											<div class="text-center addInvCont">
												<button type="button"  data-popup="popover" data-html="true" data-content="<div class='input-group'><span class='input-group-addon'><i class='icon-profile'></i></span><input id='idInv' type='text' class='form-control' placeholder='Identificación'></div><div class='input-group'><span class='input-group-addon'><i class='icon-profile'></i></span><input id='nomInv' type='text' class='form-control' placeholder='Nombre'></div><div class='text-center mt-10'><button type='button' id='addInv' class='label label-striped btn-raised'>AGREGAR</button></div>" data-original-title="Datos del involucrado" data-placement="top" class="btn btn-raised mdc-bg-yellow-600 mdc-text-white-darker btn-labeled"><b><i class="icon-reading"></i></b> 
													AGREGAR INVOLUCRADO
												</button>
											</div>
											<div class="mt-20" >
												<ul class="media-list " id="listInv">
													<h5 class="text-center text-muted">No hay involucrados registrados</h5>
												</ul>
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
											<div class="dropzone cursor-pointer" id="dropzone_multiple1"></div>
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
	<script src="Public/assets/js/plugins/bootstrap_select.min.js"></script>
	<script type="text/javascript">
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
		    onFinished: function (event, currentIndex) {
		        alert("Formulario enviado.");
		    }
		});
	</script>
	<script>
		Dropzone.autoDiscover = false;		
		$("#placa").on("blur", function(){			
			var placa = document.getElementById('placa').value;
			console.log("placa "+placa);			
			$("#dropzone_multiple1").dropzone({
				url: 'index.php?url=upload/fileUpload/'+placa+"/siniestro",
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
			    		url: "index.php?url=upload/delete/"+placa+"/siniestro",
			    		data: "filename="+imgName,
			    		success: function(data) {		
			    			var res = JSON.parse(data);
			    			if (res.response) {
			    				var img;
			    				(img = file.previewElement) != null ? img.parentNode.removeChild(file.previewElement) : false;
			    				//console.log("Archivo eliminado");
			    			} else {
			    				console.log("no se pudo");
			    			}
			    		}
			    	});
			    } 
			});
		});	 
	</script>
	<script>$('.bootstrap-select').selectpicker();</script>
	<script>
		$(function(){
			var listInv = $("#listInv");
			var text = $("#listInv h5");
			$(".addInvCont").on("click", "#addInv", function(){

				var id = $("#idInv");
				var nom = $("#nomInv");					
				if(id.val() != "" && nom.val() != "") {
					text.css("display", "none");
					var html = '<li class="table-caract display-inline-block">';
						html +=	'<div class="media-left">';
						html +=		'<img src="Public/assets/img/placeholder.jpg" class="img-circle img-xs" alt="">';				
						html +=	'</div>';
						html +=	'<div class="media-body">';
						html +=		'<div>'+ nom.val() +'</div>';
						html +=		'<span class="display-block text-muted">'+ id.val() +'</span>';
						html +=	'</div>';
						html +=	'<div class="media-right">';
						html +=		'<a class="media-annotation pull-right close"><i class="icon-cancel-circle2"></i></a>';
						html +=	'</div>';
						html +='</li>';

					listInv.append(html);
					nom.val("");
					id.val("");
					id.focus();
				}				
			});

			listInv.on("click", ".close", function(){
				if(listInv.children("li").size() <= 1){
					text.css("display", "block");
				}				
				$(this).parent().parent().remove();
				
			});
		});
	</script>
	<!-- /scripts -->
</body>
</html>