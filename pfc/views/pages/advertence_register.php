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
						<!-- <div class="mx-auto col-6">
							<img class="img-membro img-responsive rounded-circle ratio" id="img-membro"
								style="background-image:url('<?php echo ROOT_URL.'media/profile/default.svg'?>')">
							<input id="path_profile_picture" name="path_profile_picture" type="hidden" value="<?php echo ROOT_URL.'media/profile/default.svg'?>">
							<input type="file" id="arquivo">
						</div> -->
						<h2>Adicionar Advertência</h2>
						<div class="row mt-2">
							<div class="col-12 form-group">
								<label for="memberName">Membro</label>

								<input type="text" name="memberName"  id="memberName" class="form-control">
							</div>
						</div>
						
						<div class="row mt-2">
							<div class="col-12 form-group col-md-12">
                                <label for="reason">Motivo</label>
                                    <select id="reason" class="form-control is-valid" name="reason">
                                        <option value="" disabled selected>Escolha uma das opções</option>	
                                        <option value="motivo1">Ausência em Reunião</option>
                                        <option value="motivo2">Atraso em Reuniões</option>
                                        <option value="motivo3">Ausência ou atraso nas atividades</option>
                                        <option value="motivo4">Ausência de resposta dos comunicados</option>
                                        <option value="motivo5">Ausência na sede no horário acordado</option>
                                        <option value="motivo6">Atitudes negativas</option>
                                    </select>
							</div>
						</div>
						<div class="row mt-2 datepick">
							<div class="col-md-9 form-group">
								<label for="datepicker">Data</label>
								<input type="text" name="datepicker" id="datepicker"/>
							</div>
							<div class="form-group col-md-3">
								<label for="qtdDias">Dias</label>
                                <input id="qtdDias" class="form-control" disabled type="number" name="qtdDias" title="Disponível apenas para o 3º motivo." placeholder="Qtd" min="1" size="2">

							</div>
						</div>
						<div class="row mt-2">
							<div class="col-12">
								<label for="responsible">Responsável</label>
								<input type="text" name="responsible" title="Preenchido com o nome do diretor logado." id="responsible" readonly class="form-control" value="<?php 
									if(isset($this->data['single_profile'])){
										echo $this->data['single_profile']->getName();
									}
								?>">
							</div>
						</div>
                        <div class="row mt-2">
							<div class="col-12">
								<label for="points">Pontos</label>
								<input type="text" name="points" id="points" title="Preenchido de acordo com o motivo." readonly class="form-control">
							</div>
						</div>
                        <div class="row mt-2">
							<div class="col-12">
                                <label for="defense">Defesa</label>
                                <select class="form-control" id="defense" name="defense">
							        <option value="deferida">Deferida</option>
                                    <option value="indeferida" selected>Indeferida</option>
								</select>
							</div>
						</div>
                       
						
						<br>
						<div class="row mt-2">
							<button type="submit" class="btn col-8 btn-primary mx-auto mt-3" id="confirmar">Pronto</button>
						</div>						
					</form>


				</div>
				<div class="d-none d-sm-block col-md-3 col-lg-4"></div>
			</div>
		</div>
	</main>

	<?php $this->loadFooter()?>	
	<?php $this->loadJavascript()?>
	<script src="<?php $this->path('assets/js/advertence_register.js')?>"></script>
	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<script>
		var today, datepicker;
    	today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#datepicker').datepicker({
			uiLibrary: 'bootstrap4',
			maxDate: today
        });
    </script>
</body>
</html>