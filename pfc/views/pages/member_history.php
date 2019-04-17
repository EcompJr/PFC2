<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Histórico de Pontos</title>
	
	<?php $this->loadCSS();?>	
</head>
<body class="d-flex flex-column">

	<?php $this->loadHeader()?> 

	<div class="container mt-4 flex-grow">
	
		<div class="row mt-5" >
			<div class="col-12 col-md-3 text-center" id="member_data">
				<div class="row">
					<div class="col-12">
						<h5>Sobre o Membro</h5>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<p><b>PFC </b>
							<span id="score">
								<?php 
									if(isset($this->data['single_profile'])){
										$pfc = $this->data['single_profile']->getScore();
										
										if($pfc > 0){
											echo "<br><span class='text-success numberCircle' style='border-color:#28a745'>".$pfc." </span>";
										}else{
											echo "<br><span class='text-secondary numberCircle' style='border-color: #6c757d'>".$pfc." </span>";
										}
										
									}
								?>
							</span>
						</p>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6><b>PCD </b>
							<span id="score">
							<br>
								<?php 
									if(isset($this->data['single_profile'])){
										$pcd = $this->data['single_profile']->getScorePCD();

										if($pcd > 11){
											echo "<span class='text-success numberCircle' style='border-color:#28a745'>".$pcd." </span>";
										}else if($pcd < 12 && $pcd >7){
											echo "<span class='text-warning numberCircle' style='border-color:#ffc107'>".$pcd." </span>";
										}else{
											echo "<span class='text-danger numberCircle' style='border-color: #dc3545'>".$pcd." </span>";
										}
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row">
					<div class="mx-auto col-4">
						<img src="assets/images/profile.svg" alt="" >
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Nome: 
							<span id="name">
								<?php 
									if(isset($this->data['single_profile'])){
										echo $this->data['single_profile']->getName();
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Data de Nascimento: 
							<span id="birthdate">
								<?php 
									if(isset($this->data['single_profile'])){
										echo $this->data['single_profile']->getBirthdate();
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Email: 
							<span id="personal_email">
								<?php 
									if(isset($this->data['single_profile'])){
										echo $this->data['single_profile']->getPersonalEmail();
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Email Profissional: 
							<span id="professional_email">
								<?php 
									if(isset($this->data['single_profile'])){
										echo $this->data['single_profile']->getProfessionalEmail();
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Telefone: 
							<span id="telephone">
								<?php 
									if(isset($this->data['single_profile'])){
										echo $this->data['single_profile']->getTelephone();
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Estado Civil: 
							<span id="marital_status">
								<?php 
									if(isset($this->data['single_profile'])){
										if($this->data['single_profile']->getMaritalStatus() == "single"){
											echo "Solteiro(a)";
										}
										else if($this->data['single_profile']->getMaritalStatus() == "married"){
											echo "Casado(a)";
										}
										else if($this->data['single_profile']->getMaritalStatus() == "widower"){
											echo "Viúvo(a)";
										}
										else{
											echo "Divorciado(a)";
										}
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<h6>Cargo: 
							<span id="member_type">
								<?php 
									if(isset($this->data['single_profile'])){
										if($this->data['single_profile']->getMemberType() == "director"){
											echo "Diretor";
										}
										else if($this->data['single_profile']->getMemberType() == "member"){
											echo "Membro";
										}
										else{
											echo "Trainee";
										}
									}
								?>
							</span>
						</h6>
					</div>
				</div>
				
			</div>
            
			<div class="col-12 col-md-9 text-center">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" style="cursor:pointer" id="pfc-link">PFC</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="cursor:pointer" id="pcd-link">PCD</a>
					</li>
				</ul>
				
				<div id="pfc">
					<div class="row">
						<div class="col-12">
							<h3>Histórico de Pontos</h3><br>
						</div>
					</div>
					
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead class="thead-light text-center">
									<tr>
										<th scope="col">Motivo</th>
										<th scope="col">Data</th>
										<th scope="col">Transação</th>
									</tr>
								</thead>
								<tbody class="text-center" id="history-body">
									<?php
										if(isset($this->data['history'])){
											foreach($this->data['history'] as $transaction){
												$result;
												if($transaction['action'] == "gain"){
													$result = "<td class='text-success'>".$transaction['value']."</td>";
												}else{
													$result = "<td class='text-danger'>".$transaction['value']."</td>";
												}
												
												echo '<tr>
														<td>'.$transaction['reason'].'</td>
														<td>'.$transaction['date'].'</td>'.
														$result.
													'</tr>';
											}
										}
									?>
								</tbody>
							</table>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
				
				<div id="pcd" style="display:none">
					<div class="row">
						<div class="col-12">
							<h3>Histórico de Advertências</h3><br>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead class="thead-light text-center">
									<tr>
										<th scope="col">Motivo</th>
										<th scope="col">Data</th>
										<th scope="col">Pontos</th>
										<th scope="col">Responsável</th>
										<th scope="col">Deferida</th>
									</tr>
								</thead>
								<tbody class="text-center" id="request-body">
									<?php 
										if(isset($this->data['advertences_list'])){
											foreach($this->data['advertences_list'] as $adv){
												echo '<tr>
														<td>'.$adv->getReason().'</td>
														<td>'.$adv->getDate().'</td>	
														<td>'.$adv->getPoints().'</td>	
														<td>'.$adv->getResponsible().'</td>														
														<td>'.$adv->getDefense().'</td>														

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
		
	</div>
	<?php $this->loadFooter()?>
	<?php $this->loadJavascript()?>
	<script src="<?php $this->path('assets/js/member_history.js')?>"></script>

</html>