<html>
	<head>
		<title>Área PCD</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<?php $this->loadCSS()?>
	</head>
	<body class="d-flex flex-column">

		<?php $this->loadHeader();?>		
        
		<div class="container mt-5 flex-grow animated fadeInLeftBig" id="cards-home">
			<div class="col-12">
				<div class="row justify-content-around">
				<?php 
					if($_SESSION['member_type'] == "director" || $_SESSION['member_type'] == "admin"){
						echo ('
							<div class="card col-12 col-md-5 mt-5 mt-md-0">
								<div class="card-img-top w-100 h-100 bg-card" style="background:url(views/assets/images/add.png);"></div>
								<div class="card-body text-center">
									<h5 class="card-title"><b>Cadastrar Advertência</b></h5>
									<p class="card-text">Associe os membros ao PFC</p>
									<a href="'.ROOT_URL.'advertence/register" class="btn btn-primary">Cadastrar</a>
								</div>
							</div>
							<br>
						');
					}
				?>
					
					<div class="card col-12 col-md-5 mt-5 mt-md-0">
						<div class="card-img-top w-100 h-100 bg-card" style="background:url(views/assets/images/svg/refresh.svg);"></div>
						<div class="card-body text-center">
							<h5 class="card-title"><b>Atualizar Advertência</b></h5>
							<p class="card-text">Atualize as informações</p>
							<a href="<?php echo ROOT_URL?>advertence/update" class="btn btn-primary">Atualizar</a>
						</div>
					</div>
					<br>
					
				</div>
			</div>
		</div>
        
		<?php $this->loadFooter()?>
		<?php $this->loadJavascript()?>	
	</body>
</html>