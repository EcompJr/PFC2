<html>
	<head>
		<title>Programa de Fomento à Capacitação</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type ="text/css" href="views/assets/css/estilo.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
                integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<?php //$this->loadCSS()?>
	</head>
	
	<body class="d-flex flex-column">

		<?php $this->loadHeader();?>

		<div class="container-fluid flex-grow">
			<div class="row mt-5 animated fadeInDownBig" id="title-home">
				<div class="col-12 text-center mt-3">
					<h3 class="title ">Programa de Fomento à Capacitação</h3>
				</div>
				<div class="col-12 text-center mt-2">
					<span class="subtitle">Conheça o sistema de pontuação da EcompJr</span>
				</div>
			</div>
		</div>
		
		<div class="container mt-5 mb-5 animated fadeInUpBig" id="cards-home">
			<div class="col-12">
				<div class="row justify-content-around">
					<div class="card col-12 col-md-3 mt-3 mt-md-0">
						<div class="card-img-top w-100 h-100 bg-card" style="background:url(views/assets/images/sobre.svg);"></div>
						<div class="card-body text-center">
							<h5 class="card-title"><b>Entenda o sistema</b></h5>
						    <p class="card-text">Saiba mais sobre as regras e o funcionamento do PFC.</p>
						    <a href="<?php echo ROOT_URL?>about" class="btn btn-primary">Mais informações</a>
						</div>
					</div>
					<br>
					
					<div class="card col-12 col-md-3 mt-3 mt-md-0">
						<div class="card-img-top w-100 h-100 bg-card" style="background:url(views/assets/images/pontuacao.svg);"></div>
						<div class="card-body text-center">
							<h5 class="card-title"><b>Veja a sua pontuação</b></h5>
							<p class="card-text">Tenha acesso às informações sobre os seus ganhos e saldo.</p>
							<a href="<?php echo ROOT_URL?>member" class="btn btn-primary">Ver pontuação</a>
						</div>
					</div>
					<br>
					
					<div class="card col-12 col-md-3 mt-3 mt-md-0">
					  	<div class="card-img-top w-100 h-100 bg-card" style="background:url(views/assets/images/gerenciar.svg);"></div>
						<div class="card-body text-center">
							<h5 class="card-title"><b>Gerencie projetos</b></h5>
							<p class="card-text">Crie, organize e observe informações sobre os projetos.</p>
							<a href="<?php echo ROOT_URL?>project" class="btn btn-primary">Mãos à obra</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->loadFooter()?>
		<?php $this->loadJavascript()?>	
	</body>
</html>