<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cadastro de Advertências</title>
	<?php $this->loadCSS()?>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="d-flex flex-column">
	<?php $this->loadHeader()?> 

	<main>
		<div class="container mt-4 flex-grow">
			<div class="row">
				<div class="d-none d-sm-block col-md-3 col-lg-4"></div>
				<div class="col-md-6 col-12 col-lg-4">
					
					<form id="form" class="form-group" method="POST" enctype="multipart/form-data">
						<h2>Editar Advertência</h2>
                        
                        
					</form>


				</div>
				<div class="d-none d-sm-block col-md-3 col-lg-4"></div>
			</div>
		</div>
	</main>

	<?php $this->loadFooter()?>	
	<?php $this->loadJavascript()?>
	<!--<script src="<?php //$this->path('assets/js/register.js')?>"></script>-->
	<script src="<?php $this->path('assets/js/advertence_register.js')?>"></script>
	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>
</html>