<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		<title>Solicitar Reembolso</title>
		
		<?php $this->loadCSS()?>
	</head>
	<body class="d-flex flex-column">

	
	<?php $this->loadHeader()?>


		<div class="container mt-4 flex-grow">
			<div class="row">
				<div class="col-md-7 col-12 col-lg-5">
					
					<form method="POST" class="form-group" id="form" enctype="multipart/form-data">
						
						<div class="row mt-3">
							<div class="col-12">
								<label for="request_reason">Motivo da solicitação</label>
								<input type="text" name="request_reason" id="request_reason" class="form-control" placeholder="Ex: Campus Party">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12 d-flex justify-content-around">
								
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="request_choice_refund" required name="request_choice" class="custom-control-input">
									<label class="custom-control-label" for="request_choice_refund" value="refund">Reembolso</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="request_choice_pfc" name="request_choice" class="custom-control-input">
									<label class="custom-control-label" for="request_choice_pfc" value="pfc">PFC</label>
								</div>
							</div>
						</div>
						<div class="row mt-3">
                            
								<label for="files" class="col-6">Comprovante </label>
								<label for="text_area_pfc" class="col-6" style="text-align:center;">Pedido</label>
								<div class="col-12 col-md-4">
									<img class="img-membro img-responsive ratio" id="img-file"
									style="background-image:url(<?php $this->path('assets/images/svg/file.svg')?>)">
									<input type="file" id="arquivo" name="files[]" multiple>
								</div>
								<div class="col-12 offset-md-2 col-md-6 form-group shadow-textarea">
									<textarea class="form-control" id="text_area_pfc" name="text_area_pfc" rows="5"></textarea>
								</div>
							
						</div>			
						<div class="row mt-3">
							<div class="col-12">
								<span for="filelist">Arquivos</span><br>
								<span id="alert" class="text-danger" style="display:none">Insira pelo menos um arquivo</span>
								<ul class="list-group mt-3" id="filelist"></ul>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-12">
								<button type="button" class="btn btn-block btn-primary mx-auto" id="confirm">Pronto</button>
							</div>	
						</div>					
					</form>
				</div>
				<div class="d-none d-md-block col-md-4 offset-md-2 logo-bg">

				</div>
				</div>
			</div>
		</div>

		<?php $this->loadFooter()?>
	
		<?php $this->loadJavascript()?>
		<script src="<?php $this->path('assets/js/member_request.js')?>"></script>
	</body>
</html>