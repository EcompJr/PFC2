<html>

<head>
    <title>SCI - Como funciona?</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->loadCSS()?>
</head>

<body class="d-flex flex-column">

    <?php $this->loadHeader()?>

    <div class="container flex-grow">

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

                <section id="definicao" class="mt-4">

                    <div class="col-12">
                        <h5 class="tituloSecao">O que é o PFC?</h5>
                        <div class="descricao">
                            <span>
                                O Programa de Fomento à Capacitação é um mecanismo fornecido pela EcompJr que visa
                                auxiliar o desenvolvimento técnico e/ou administrativo dos seus membros. O PFC se baseia
                                em um sistema de pontos que são obtidos pelos membros com a realização de projetos.
                                <br><a id="link-pontuacao" href="#pontuacao">Ver informações sobre pontuação</a>
                            </span>
                        </div>
                    </div>

                </section>

                <section id="participantes" class="mt-4">

                    <div class="col-12">
                        <h5 class="tituloSecao">Quem pode participar?</h5>
                        <div class="descricao">
                            <span>
                                Qualquer membro efetivo da EcompJr, terá direito a participar desse programa que
                                estimula a capacitação do membro em eventos que serão pagos <b>integralmente</b> ou
                                <b>parcialmente</b> pela empresa.
                            </span>
                        </div>
                    </div>

                </section>

                <section id="regras" class="mt-4">

                    <div class="col-12">
                        <h5 class="tituloSecao">Regras</h5>
                        <div class="row justify-content-around">
                            <div class="card col-12 col-md-3 mt-3">
                                <img class="card-img-top" src="views/assets/images/svg/regra1.svg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Membros desligados da empresa perderão os pontos acumulados,
                                        sendo destinado os pontos para a empresa.</p>
                                </div>
                            </div>

                            <div class="card col-12 col-md-3 mt-3">
                                <img class="card-img-top" src="views/assets/images/svg/regra2.svg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Serão permitidas <b>apenas</b> participações em eventos que
                                        tragam algum retorno <b>técnico</b> ou <b>administrativo</b> para o membro.</p>
                                </div>
                            </div>

                            <div class="card col-12 col-md-3 mt-3">
                                <img class="card-img-top" src="views/assets/images/svg/regra3.svg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Cada pessoa <b>não</b> poderá ter uma pontuação que <b>exceda
                                            250 pontos</b> em um único projeto, sendo assim, o excedente será destinado
                                        a empresa.</p>
                                </div>
                            </div>
                        </div>

                        <br>
                        <span class="observacao"><i>Obs: O membro receberá um apoio proporcional a quantidade de pontos
                                que tiver acumulado. O apoio será feito em forma de reembolso que será realizado após
                                apresentação do comprovante de pagamento. O comprovante deverá ficar com a empresa para
                                comprovar o destino do dinheiro.</i> </span>
                    </div>

                </section>

                <section id="pontuacao" class="mt-4">

                    <div class="col-12">
                        <h5 class="tituloSecao">Pontuação</h5>
                        <div class="row justify-content-around">

                            <div class="col-12 col-md-4 mt-4 mr-sm-4">
                                <div class="row">
                                    <div class="grafico-maioria grafico-80">
                                        <center>80%</center>
                                    </div>
                                    <div class="grafico-minoria grafico-20">
                                        <center>20%</center>
                                    </div>
                                </div>
                            </div>

                            <div class="card col-12 col-md-7 mt-md-4">
                                <div class="card-body">
                                    <p class="card-text">A empresa ficará com 80% do valor do projeto e 20% do valor
                                        ficará para a equipe desenvolvedora do projeto.</p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-4 mr-sm-4">
                                <div class="row">
                                    <div class="grafico-maioria grafico-81">
                                        <center>81.25%</center>
                                    </div>
                                    <div class="grafico-minoria grafico-18">
                                        <center>18.75%</center>
                                    </div>
                                </div>
                            </div>

                            <div class="card col-12 col-md-7 mt-md-4">
                                <div class="card-body">
                                    <p class="card-text">O valor recebido pela empresa (80%) é dividido, resultando em
                                        18.75% do valor para ser dividido entre os diretores e os 81.25% restantes sendo
                                        destinados para a empresa.</p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-4 mr-sm-4">
                                <div class="row">
                                    <div class="grafico-maioria grafico-90">
                                        <center>90%</center>
                                    </div>
                                    <div class="grafico-minoria grafico-10">
                                        <center>10%</center>
                                    </div>
                                </div>
                            </div>

                            <div class="card col-12 col-md-7 mt-md-4">
                                <div class="card-body">
                                    <p class="card-text">O valor recebido pela equipe (20%) é dividido entre os membros
                                        e o prospector do projeto. 10% do valor vai para o prospector<b>*</b> e os 90%
                                        restantes são divididos entre os membros da equipe.</p>
                                </div>
                            </div>


                        </div>
                    </div>
                    <br>
                    <span class="observacao"><i><b>*</b> Caso o membro que realizou a prospecção esteja ligado a alguma
                            atividade que de certa forma já seja responsável por isso (e.g. Assessor de vendas), este
                            receberá apenas 5%, sendo os outros 5% destinados à empresa.
                        </i> </span>
            </div>
            </section>
        </div>

        <div id="pcd" style="display:none">

            <section id="definicaoPCD" class="mt-4">

                <div class="col-12">
                    <h5 class="tituloSecao">O que é o PCD?</h5>
                    <div class="descricao">
                        <span>
                            É o Programa de Controle Disciplinar que tem como objetivo alertar e fiscalizar
                            comportamentos que de certa
                            maneira podem influenciar negativamente o desenvolvimento da empresa e do membro, a fim de
                            melhorar seu desempenho profissional e a responsabilidade do mesmo para com a empresa
                        </span>
                    </div>
                </div>

            </section>

            <section id="definicaoPCD" class="mt-4">

                <div class="col-12">
                    <h5 class="tituloSecao">Regras</h5>
                    <div class="descricao">
                        <span>
                            Cada membro terá direito a <b>20 pontos</b> que serão renovados todo início de ano (1 de janeiro),
                            cada infração que o mesmo tiver será reduzido do seu valor total, até que este membro não
                            possua mais pontos e assim haja a possibilidade do seu desligamento como membro efetivo da
                            empresa, após determinação de uma assembleia.<br><br>
                            O membro será <b>notificado através de email</b> ou reunião presencial de suas infrações para que
                            assim ele perceba seu comportamento inadequado em determinadas situações.<br><br> O membro após
                            notificado terá direito à defesa, desde que seja enviado um email em um <b>prazo de 7 (sete)
                            dias com a defesa bem fundamentada</b>, podendo esta ser aceita ou indeferida.

                        </span>
                    </div>
                </div>

            </section>

            <section id="pontos" class="mt-4">

                <div class="col-12">
                    <h5 class="tituloSecao">O membro poderá perder pontos por:</h5><br>
                    <div class="descricao">

                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            <strong>1. Ausência nas reuniões</strong>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">

                                        Faltar alguma reunião que foi marcada com pelo menos 72 horas (3 dias) de
                                        antecedência sem
                                        nenhuma justificativa plausível. <br><br>
                                        <b>Obs. 1</b> Entende-se como justificativa plausível: motivos médicos (desde
                                        que
                                        apresentado atestado), aula extra marcada por professor no horário da
                                        reunião.<br><br>
                                        <b>Obs. 2</b> As reuniões <b>não</b> poderão ser marcadas em horários que
                                        indique
                                        impossibilidade devido à aulas ou reuniões de iniciação científica.<br><br>
                                        <b>Obs. 3</b> O membro deverá estar presente na reunião até seu fim, caso ele
                                        saia antes sem
                                        justificativa plausível, será penalizado como ausência.<br><br>
                                        Penalidade: 4 Pontos.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            <b>2. Por atraso nas reuniões ao qual foi solicitado</b>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">

                                        Atrasar por mais de 15 minutos em alguma reunião que foi marcada com
                                        pelo menos 72 horas (3 dias) sem aviso prévio justificando o atraso. <br><br>
                                        <b>Obs. 1</b> O atraso deverá ser justificado com pelo menos 12
                                        horas de antecedência. <br><br>
                                        <b>Obs. 2</b> Após 20 minutos caso o membro não tenha chegado, será
                                        tratado como ausência em reunião.<br><br>
                                        <b>Obs. 3</b> Imprevistos podem ser considerados como justificativa
                                        caso a outra parte afetada aceite-a. <br><br>
                                        Penalidade: 2 Pontos

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            <b>3. Ausência ou atraso nas atividades para os quais forem designados</b>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">

                                        Atrasar ou não entregar pontualmente alguma meta de projeto que lhe
                                        tenha sido passada sem justificativa aceitável. <br><br>
                                        <b>Obs. 1</b> Entende-se como justificativa aceitável algum fator
                                        externo que de certa forma pode ter contribuído para o atraso na entrega, como
                                        por exemplo a
                                        disponibilidade de algum serviço de terceiros (e.g. servidor fora do ar) ou
                                        motivos de
                                        doença (desde que apresentado atestado que corresponda a pelo menos ⅓ do prazo
                                        que foi dado
                                        para resolução da meta). Outros motivos poderão também ser incluídos, desde que
                                        conversados
                                        e acordados com o Diretor de Projetos e/ou de Recursos Humanos. <br><br>
                                        <b>Obs. 2</b> A cada dia de atraso são perdidos 2 pontos até um
                                        total de 3 dias de atraso, situação na qual é considerada ausência da atividade
                                        e a tarefa
                                        deverá ser remanejada.<br><br>
                                        Penalidade: 2 Pontos por dia de atraso.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            <b>4. Ausência de resposta dos comunicados internos</b>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Presumem-se lidas as correspondências eletrônicas em um prazo de 48
                                        horas, assim o membro terá até este prazo para resposta de emails (quando
                                        necessário).
                                        <br><br>
                                        <b>Obs. 1</b> Alguns emails poderão receber prazo maior, desde que
                                        explicitados os seus prazos no corpo do texto. Caso o membro não possa responder
                                        por algum
                                        motivo, este motivo deverá ser expresso <strong>antes da finalização do prazo de
                                            resposta do
                                            email, sinalizando a falta de resposta.</strong> <br><br>
                                        Penalidade: 2 Pontos
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseFive">
                                            <b>5. Ausência na sede no horário acordado (plantão)</b>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        O membro poderá faltar no seu horário por motivos pessoais desde que
                                        não seja recorrente (2 vezes em 2 semanas) e estas faltas deverão ser
                                        sinalizadas com pelo
                                        menos 12 horas de antecedência para o diretor de recursos humanos.<br><br>
                                        <b>Obs. 1</b> Cada plantão corresponde à 2 horas.<br><br>
                                        <b>Obs. 2</b> O membro que precise faltar mais do que 1 vez em um
                                        período de 15 dias deverá apresentar justificativa plausível (e.g. atestado
                                        médico, aula
                                        extra e entre outros). <br><br>
                                        <b>Obs. 3</b> O membro deverá ficar na sede no horário acordado, do
                                        início ao fim, caso este se atrase (10 minutos) e/ou saia antes sem
                                        justificativa plausível
                                        será penalizado em 2 pontos.<br><br>
                                        Penalidade: 4 Pontos
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSix">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseSix" aria-expanded="false"
                                            aria-controls="collapseSix">
                                            <b>6. Atitudes que possam denegrir a imagem, ofender a dignidade ou conter
                                                preconceito de
                                                natureza pejorativa</b>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                    data-parent="#accordion">
                                    <div class="card-body">

                                        O membro será punido caso haja de maneira desrespeitosa com outro
                                        membro durante encontros (reunião, integração, assembleias) fazendo algum
                                        comentário
                                        impróprio/inadequado. <br><br>
                                        <b>Obs. 1</b> O membro que se sentir ofendido de certa maneira
                                        deverá reportar o acontecido ao diretor de recursos humanos, para que assim os
                                        dois lados
                                        sejam ouvidos e as devidas providências sejam tomadas.<br><br>
                                        Penalidade: 10 Pontos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>

    <?php $this->loadFooter()?>
    <?php $this->loadJavascript()?>
    </div>


</body>

</html>