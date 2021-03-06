<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		
		<title>Responder Solicitação</title>
		
		<?php $this->loadCSS()?>
	</head>
	<body class="d-flex flex-column">

	
	<?php $this->loadHeader()?>


		<div class="container mt-4 flex-grow">
			<div class="row">
				<div class="col-md-6 col-12 col-lg-4">
					
					<form method="POST" class="form-group" id="form" enctype="multipart/form-data">
						
                        <div class="row mt-3">
							<div class="col-12">
								<label for="member_name"><b>Solicitante:</b> </label>
								<span id="member_name">
                                    <?php if(isset($this->data['member_data'])){
                                        echo $this->data['member_data']['name'];
                                    }?>
                                </span>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-12">
								<label for="request_reason"><b>Motivo da solicitação: </b></label>
								<span id="request_reason" name="reason">
                                    <?php if(isset($this->data['member_data'])){
                                        echo $this->data['member_data']['request_reason'];
                                    }?>
                                </span>
							</div>
						</div>


                        <div class="row mt-3">
							<div class="col-12">
								<label for="avaliable_score"><b>Saldo disponível: </b></label>
								<span id="avaliable_score" name="avaliable_score">
                                    <?php if(isset($this->data['member_data'])){
                                        echo $this->data['member_data']['score'];
                                    }?>
                                </span>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-12">
								<?php 

								if(isset($this->data['member_data']) && isset($this->data['member_data']['files']) && $this->data['member_data']['files']){
									echo '<label for="files">Comprovantes</label>
									<span id="files">
										<ul>';
											
												$i = 0;
												foreach($this->data['member_data']['files'] as $file){
													echo "<li><a download href=".$file['path']."> Baixar Comprovante ".++$i."</a></li>";
												}
											
										echo '</ul></span>';
										echo '<div class="row mt-3">
										<div class="col-12" style="text-align:justify;">
											<label for="pfc_warning"><b>IMPORTANTE !</b></label>
											<span id="pfc_warning" style="color:red; font-weight:bold;">
												<br>No caso de reembolso normal, por exemplo comprovante de água para a sede, digite 0 (zero) no campo de Pontos

											</span>
										</div>
									</div>';
										echo '<div class="row mt-3">
										<div class="col-12">
											<label for="value_required">Quantidade de pontos a serem retirados</i></label>
											<input type="number" class="form-control" placeholder="Quantidade de pontos" id="value_required" name="value_required">
										</div>
									</div>';
								}else{
									echo '<label for="files"><b>Pedido PFC</b></label>
									<span id="pfc_req">
										<textarea class="form-control" readonly id="text_area_pfc" name="text_area_pfc" rows="5">'.$this->data['member_data']['pfc_req'].'</textarea>
									</span><br>';

									echo '<label for="files"><b>Resposta ao pedido</b></label>
									<span id="pfc_response">
										<textarea class="form-control" id="text_area_response" name="text_area_response" placeholder="Digite a resposta à solicitação" rows="5"></textarea>
									</span>';
								}
								?>
							</div>
						</div>

						<input type="hidden" id="email_destinatario" name="email_destinatario" value="<?php if(isset($this->data['member_data'])){	echo($this->data['member_data']['pro_email']);}?>">
						<input type="hidden" id="email_remetente" name="email_remetente" value="<?php if(isset($this->data['director'])){	echo($this->data['director']['pro_email']);}?>">
						<input type="hidden" id="reason" name="reason" value="<?php if(isset($this->data['member_data'])){	echo $this->data['member_data']['request_reason'];}?>">
						
						<div class="row mt-1">
                            <div class="col-12">
                                <span class="text-danger">
									<?php
										if(isset($this->data['error'])){
											echo $this->data['error'];
										}
									?>
							</span>
                            </div>
						</div>		
						<div class="row mt-3">
							<div class="col-12">
								<button type="submit" class="btn btn-block btn-primary mx-auto" id="confirm" >Pronto</button>
							</div>
							
						</div>					
					</form>
				</div>
				<div class="d-none d-md-block col-md-4 offset-md-4 logo-bg">

				</div>
				</div>
			</div>
		</div>

		<?php $this->loadFooter()?>
	
		<?php $this->loadJavascript()?>
		<script src="<?php $this->path('assets/js/director_response.js')?>"></script>
	</body>
</html>