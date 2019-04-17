<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Editar Advertência</title>
	<?php $this->loadCSS()?>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="d-flex flex-column">
	<?php $this->loadHeader()?> 
	
	<div class="container mt-4 flex-grow">
        <div class="row">
            <div class="col-12">
                <h3>Editar Advertência</h3><br>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-12">
                        <table id="advertences" class="table">
                            <thead class="thead-light text-center">
								<tr>
									<th scope="col">Membro</th>
									<th scope="col">Motivo</th>
									<th scope="col">Data</th>
									<th scope="col">Pontos</th>
									<th scope="col">Responsável</th>
									<th scope="col">Deferida</th>
									<th scope="col">&nbsp</th>
								</tr>
                            </thead>
                            <tbody class="text-center" id="project-body">
								<?php
									if(isset($this->data['advertencesList'])){

										$reason_title;
										                                  
										foreach($this->data['advertencesList'] as $advertences){       
											if($advertences->getReason() == 1){
												$reason_title ="Ausência nas reuniões";
											}else if($advertences->getReason() == 2){
												$reason_title ="Por atraso nas reuniões ao qual foi solicitado";
											}else if($advertences->getReason() == 3){
												$reason_title ="Ausência ou atraso nas atividades para os quais forem designados";
											}else if($advertences->getReason() == 4){
												$reason_title ="Ausência de resposta dos comunicados internos";
											}else if($advertences->getReason() == 5){
												$reason_title ="Ausência na sede no horário acordado (plantão)";
											}else if($advertences->getReason() == 6){
												$reason_title ="Atitudes Negativas";
											}
											echo 
												'<tr>
													<td>'.$advertences->getMemberName().'</td>
													<td title="'.$reason_title.'">'.$advertences->getReason().'</td>
													<td>'.$advertences->getDate().'</td>	
													<td>'.$advertences->getPoints().'</td>	
													<td>'.$advertences->getResponsible().'</td>														
													<td>'.$advertences->getDefense().'</td>														
													<td><a href="'.ROOT_URL.'advertence/update/'.$advertences->getId().'" class="btn btn-secondary"><i class="fas fa-edit"></i></a><button type="button" onclick="excluirAdv('.$advertences->getId().')"class=" btn btn-danger"><i class="fas fa-trash"></i></button></td>														
												</tr>';
											
										}
									}
                                ?>
                            </tbody>
                        </table>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<?php $this->loadFooter()?>	
	<?php $this->loadJavascript()?>
	<!--<script src="<?php //$this->path('assets/js/register.js')?>"></script>-->
	<script src="<?php $this->path('assets/js/advertence.js')?>"></script>
	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<script>
        $(document).ready( function () {
    		$('#advertences').DataTable();
		} );
    </script>
</body>
</html>