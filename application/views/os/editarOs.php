<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 99999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }

    textarea {
        resize: vertical;
    }

    * Hiding the checkbox,
    but allowing it to be focused */ .badgebox {
        opacity: 0;
    }

    .badgebox+.badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 15px;
    }

    .badgebox:focus+.badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */
        /* Adding a light border */
        box-shadow: inset 0px 0px 5px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked+.badge {
        /* Move the check mark back when checked */
        text-indent: 0;
    }
</style>



<!-- New Bem-vindos -->
<div id="content-bemv">
    <div class="bemv"><?php $configuracoes = $this->db->get('configuracoes')->result();
                        echo $configuracoes[0]->valor ?></div>
    <div></div>
</div>

<!--Action boxes-->
<ul class="cardBox">
    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Clientes</div>
                <div class="cardName">F1</div>
            </div>
            <a href="<?= site_url('clientes') ?>">
                <div class="iconBx">
                    <i class='bx bx-group bx-border-circle'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Produtos</div>
                <div class="cardName">F2</div>
            </div>
            <a href="<?= site_url('produtos') ?>">
                <div class="iconBx">
                    <i class='bx bx-package bx-border-circle'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Vendas</div>
                <div class="cardName">F3</div>
            </div>
            <a href="<?= site_url('vendas') ?>">
                <div class="iconBx">
                    <i class='bx bx-cart bx-border-cart'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
        <li class="card">
            <div>
                <div class="numbers N-tittle">Ordens</div>
                <div class="cardName">F4</div>
            </div>
            <a href="<?= site_url('os') ?>">
                <div class="iconBx">
                    <i class='bx bx-spreadsheet bx-border-circle'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <script src="<?= base_url('assets/js/clock_time.js') ?>"></script>

    <div Class="card-cl">
        <div class="clock-card">
            <div class="clock-flex">
                <span class="num hour_num">00</span>
                <div class="tit">Horas</div>
            </div>
            <span class="colun" id="colun-1">:</span>
            <div class="clock-flex">
                <span class="num min_num">00</span>
                <div class="tit">Minutos</div>
            </div>
            <div class="time_am_pm">
                <span class="num am_pm">AM</span>
            </div>
        </div>
    </div>
</ul>

<br>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Editar Ordem de Serviço</h5>
                <div class="buttons">
                    <?php if ($result->faturado == 0) { ?>

                        <a href="#modal-lancar" id="btn-lancar" role="button" data-toggle="modal" class="button btn btn-mini btn-danger">
                            <span class="button__icon"><i class='bx bx-dollar'></i></span> <span class="button__text">Lançar</span></a>
                    <?php
                    } ?>

                    <a href="<?php echo base_url(); ?>index.php/os/adicionar" class="button btn btn-mini btn-success" style="max-width: 160px">
                        <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Ordem de Serviço</span></a>


                    <a title="Visualizar OS" class="button btn btn-primary" href="<?php echo site_url() ?>/os/visualizar/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-show"></i></span><span class="button__text">Visualizar OS</span></a>

                    <a href="#modal-imprimir" title="Impressões" class="button btn btn-mini btn-inverse" role="button" data-toggle="modal"> <span class="button__icon"><i class="bx bx-printer"></i></span><span class="button__text">Impressões</span></a>

                    <!-- <a target="_blank" title="Imprimir OS" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir OS</span></a>

                    <a target="_blank" title="Imprimir OS Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirOsTermica/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir OS Térmica</span></a>

                    <a target="_blank" title="Termo de Uso Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirTermicaGarantia/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Termo de Uso Térmica</span></a> -->

                    <a href="#modal-whatsapp" title="Via WhatsApp" class="button btn btn-mini btn-success" id="enviarWhatsApp" role="button" data-toggle="modal"> <span class="button__icon"><i class="bx bxl-whatsapp"></i></span><span class="button__text">WhatsApp</span></a>


                    <a title="Enviar por E-mail" class="button btn btn-mini btn-warning" href="<?php echo site_url() ?>/os/enviar_email/<?php echo $result->idOs; ?>"><span class="button__icon"><i class="bx bx-envelope"></i></span> <span class="button__text">Enviar por E-mail</span></a>

                    <?php if ($result->garantias_id) { ?> <a target="_blank" title="Imprimir Garantia" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/garantias/imprimir/<?php echo $result->garantias_id; ?>">
                            <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Garantia</span></a> <?php } ?>
                </div>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                        <li id="tabProdutos"><a href="#tab3" data-toggle="tab">Produtos</a></li>
                        <li id="tabServicos"><a href="#tab4" data-toggle="tab">Serviços</a></li>
                        <li id="tabAnexos"><a href="#tab5" data-toggle="tab">Anexos</a></li>
                        <li id="tabAnotacoes"><a href="#tab6" data-toggle="tab">Outras Anotações</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idOs', $result->idOs) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h4>N° da OS:
                                            <?php echo $result->idOs; ?></h4>
                                        <br>
                                        <div class="span6" style="margin-left: 0">
                                            <!-- Campo Cliente -->

                                            <label for="cliente">Cliente<span class="required">*</span></label>

                                            <input id="cliente" class="span11" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" placeholder="Obs: Nome do cliente já cadastrado" />

                                            <input id="clientes_id" class="span11" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>" />

                                            <!-- Fim Campo Cliente -->

                                            <input id="valorTotal" type="hidden" name="valorTotal" value="" />

                                            <!-- Campo Data de Entrada  dataInicial -->

                                            <label for="dataInicial">Data de Entrada<span class="required">*</span></label>
                                            <input id="dataInicial" autocomplete="off" class="span6" readonly type="text" name="dataInicial" readonly value="<?php echo date('d/m/Y H:i:s', strtotime($result->dataInicial)); ?>" />

                                            <!-- Fim Campo Data de Entrada -->

                                            <!-- Campo Status -->

                                            <label for="status">Status<span class="required">*</span></label>

                                            <select class="span11" name="status" id="status" value="">
                                                <option <?php if ($result->status == 'Aguardando Análise Técnica') {
                                                            echo 'selected';
                                                        } ?> value="Aguardando Análise Técnica">Aguardando Análise Técnica
                                                </option>
                                                <option <?php if ($result->status == 'Aguardando aprovação do cliente') {
                                                            echo 'selected';
                                                        } ?> value="Aguardando aprovação do cliente">Aguardando aprovação do cliente
                                                </option>
                                                <option <?php if ($result->status == 'Aguardando Peças') {
                                                            echo 'selected';
                                                        } ?> value="Aguardando Peças">Aguardando Peças
                                                </option>
                                                <option <?php if ($result->status == 'Em Andamento') {
                                                            echo 'selected';
                                                        } ?> value="Em Andamento">Em Andamento
                                                </option>
                                                <option <?php if ($result->status == 'Pronto - Aguardando Retirada') {
                                                            echo 'selected';
                                                        } ?> value="Pronto - Aguardando Retirada">Pronto - Aguardando Retirada
                                                </option>
                                                <option <?php if ($result->status == 'Cancelado - Aguardando Retirada') {
                                                            echo 'selected';
                                                        } ?> value="Cancelado - Aguardando Retirada">Cancelado - Aguardando Retirada
                                                </option>
                                                <option <?php if ($result->status == 'Aguardando Retirada - Cliente já Informado(a)') {
                                                            echo 'selected';
                                                        } ?> value="Aguardando Retirada - Cliente já Informado(a)">Aguardando Retirada - Cliente já Informado(a)
                                                </option>
                                                <option <?php if ($result->status == 'Enviado via Correio') {
                                                            echo 'selected';
                                                        } ?> value="Enviado via Correio">Enviado via Correio
                                                </option>
                                                <option <?php if ($result->status == 'Aguardando Envio') {
                                                            echo 'selected';
                                                        } ?> value="Aguardando Envio">Aguardando Envio
                                                </option>
                                                <option <?php if ($result->status == 'Aguardando Receber via Correio') {
                                                            echo 'selected';
                                                        } ?> value="Aguardando Receber via Correio">Aguardando Receber via Correio
                                                </option>
                                                <option <?php if ($result->status == 'Entregue - A Receber') {
                                                            echo 'selected';
                                                        } ?> value="Entregue - A Receber">Entregue - A Receber
                                                </option>
                                                <option <?php if ($result->status == 'Garantia') {
                                                            echo 'selected';
                                                        } ?> value="Garantia">Garantia
                                                </option>
                                                <option <?php if ($result->status == 'Abandonado - Sem resposta') {
                                                            echo 'selected';
                                                        } ?> value="Abandonado - Sem resposta">Abandonado - Sem resposta
                                                </option>
                                                <option <?php if ($result->status == 'Comprado pela Loja') {
                                                            echo 'selected';
                                                        } ?> value="Comprado pela Loja">Comprado pela Loja
                                                </option>

                                                <option <?php if ($result->status == 'Entregue - Faturado') {
                                                            echo 'selected';
                                                        } ?> value="Entregue - Faturado">Entregue - Faturado
                                                </option>

                                            </select>

                                            <!-- Fim Campo Status -->

                                            <!-- Campo Cor -->

                                            <label for="marca">Cor</label>
                                            <input id="cor" type="text" class="span11" name="cor" maxlength="100" value="<?php echo $result->cor ?>" placeholder="Ex: Preto, Branco..." />
                                            <!-- Fim Campo Cor -->

                                            <!-- Campo Senha -->

                                            <label for="garantia">Senha</label>
                                            <input id="secu" type="text" class="span11" name="secu" maxlength="100" value="<?php echo $result->secu ?>" placeholder="Ex: PIN, @Tgsd5656...." />

                                            <!-- Fim Campo Senha -->


                                            <!-- Campo Com / Sem Periféricos -->


                                            <label for="perife">Com / Sem Periféricos</label>

                                            <select class="span11" name="perife" id="perife" value="">

                                                <option <?php if ($result->perife == 'Sem Periférico') {
                                                            echo 'selected';
                                                        } ?> value="Sem Periférico">Sem Periférico</option>

                                                <option <?php if ($result->perife == 'Com Periférico') {
                                                            echo 'selected';
                                                        } ?> value="Com Periférico">Com Periférico</option>

                                            </select>

                                            <!-- Fim Campo Com / Sem Periféricos -->


                                            <!-- Campo Rastreio -->

                                            <label for="rastreio">Rastreio</label>
                                            <input name="rastreio" type="text" class="span11" id="rastreio" maxlength="100" value="<?php echo $result->rastreio ?>" placeholder="Ex: BR3458683..." />

                                            <!-- Fim Campo Rastreio -->

                                            <!-- Botão Rastreio -->

                                            <div class="span6 offset3" style="display:flex; margin-left:0;">
                                                <a target="_blank" href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" class="button btn btn-mini btn-warning"><span class="button__icon"><i class="fas fa-envelope"></i></span> <span class="button__text2"> Rastrear</span></a>
                                                <button class="button btn btn-primary" id="btnContinuar"><span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>
                                            </div>

                                            <!-- Fim Botão Atualizar -->
                                            <br> <br>
                                        </div>


                                        <!-- Atendente Consulta Do Usuario Logado No Momento -->

                                        <div class="span6">

                                            <label for="tecnico">Atendente<span class="required">*</span></label>

                                            <input id="$usuario" class="span11" readonly type="text" name="$usuario" value="<?= $this->session->userdata('nome'); ?>" />

                                            <input id="usuarios_id" class="span11" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />

                                            <!-- Fim Atendente Consulta Do Usuario Logado No Momento -->

                                            <!-- Campo Tecnico Responsável -->

                                            <label for="tecnicores">Técnico Responsável<span class="required">*</span></label>

                                            <input id="tecnicores" class="span11" type="text" name="tecnicores" value="<?php echo $result->tecnicores ?>" placeholder="Ex: O técnico responsável por essa OS.." />

                                            <!-- Fim Campo Tecnico Responsável -->

                                            <!-- Campo Data Final -->

                                            <label for="dataFinal">Data Final do Orçamento<span class="required">*</span></label>

                                            <input id="dataFinal" autocomplete="off" class="span6 datepicker" type="text" name="dataFinal" value="<?php echo date('d/m/Y', strtotime($result->dataFinal)); ?>" placeholder="Ex: Prazo de orçamento para o cliente.." />

                                            <!-- Fim Campo Data Final -->

                                            <!-- Campo Tipo do Equipamento / Marca / Modelo -->

                                            <label for="tipoeq">Tipo do Equipamento - Ex. Notebook, Computador..</label>

                                            <input id="tipoeq" type="text" class="span11" name="tipoeq" maxlength="100" value="<?php echo $result->tipoeq ?>" placeholder="Ex. Notebook, Computador..." />

                                            <!-- Fim Campo Tipo do Equipamento / Marca / Modelo -->

                                            <!-- Campo Marca -->

                                            <label for="marca">Marca - Ex. Asus, Evga...</label>

                                            <input id="marca" type="text" class="span11" name="marca" maxlength="100" value="<?php echo $result->marca ?>" placeholder="Ex. Asus, Pichau, XFX..." />

                                            <!-- Fim Campo Marca -->

                                            <!-- Campo Modelo -->

                                            <label for="modeloeq">Modelo - Ex. RV550, Rx 580...</label>

                                            <input id="modeloeq" type="text" class="span11" name="modeloeq" maxlength="100" value="<?php echo $result->modeloeq ?>" placeholder="Ex. X515JA, GADIT X, RX550 4GB..." />

                                            <!-- Fim Campo Modelo -->

                                            <div>

                                                <!-- Campo Nº Série -->

                                                <label for="marca">Nº Série ou P/N do Equipamento</label>

                                                <input id="serial" type="text" class="span11" name="serial" maxlength="100" value="<?php echo $result->serial ?>" placeholder="Ex. 782348770, HBSDYFG74YR..." />

                                                <!-- Fim Campo Nº Série -->

                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="row-fluid" style="margin-top:0">

                                        <div class="span12">

                                            <div class="widget-box">

                                                <div class="widget-title">



                                                    <br>
                                                    <center><span style="font-size: 15px"><b>Descrição do Produto / Serviço / Problema / Anotações / Laudo do Técnico</b></span></center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <center><span style="font-size: 15px"><b>Descrição do Produto / Serviço</b></span></center>
                                        </label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5" placeholder="Ex. caso for um computador: Computador usado, Sem lacres de garantia, faltando tampa lateral, arranhado na parte frontal... Ex. caso for um notebook: Notebook Usado, Sem lacres de garantia, Com tela quebrada, faltando parafusos, com fonte carregador..."><?php echo $result->descricaoProduto ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                            <center><span style="font-size: 15px"><b>Problema Informado</b></span></center>

                                        </label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5" placeholder="Ex. caso for um computador: Cliente informou que o computador não esta apresentando imagens, fazer analise geral para orçamento... Ex. caso for um notebook: Cliente quer trocar a tela e fazer manutenção preventiva e Formatação, fazer analise geral para orçamento..."><?php echo $result->defeito ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                            <center><span style="font-size: 15px"><b>Anotações</b></span></center>

                                        </label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5" placeholder="Ex. Aqui pode ser colocado obs. da qual o cliente tem acesso: Exemplo: Fotos em anexo no link da OS... Exemplo: Cliente deixou valor pago pré aprovado R$ 50 reais no dia 10/06/2022... Exemplo: Foi feito pedido da peça (tal) para o reparo. Data do pedido 11/06/2022 previsto chegar no dia 17/06/2022..."><?php echo $result->observacoes ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="laudoTecnico">
                                            <center><span style="font-size: 15px"><b>Laudo do Técnico</b></span></center>

                                        </label>
                                        <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5" placeholder="Ex. caso for um notebook: Obrigatório fazer limpeza física completa com troca da pasta térmica. 
                                        Notebook está apresentando muita lentidão e travando.  Recomendo fazer fio zero para possível reparo dos setores danificados e formatação com Windows 10 ele é estável.  Windows 11 ainda está em testes não recomendo! Fazendo o fio zero e não solucionando o problema é obrigatório a troca do armazenamento M.2)..."><?php echo $result->laudoTecnico ?></textarea>
                                    </div>
                                    <div class="span12" style="padding: 0; margin-left: 0">
                                        <div class="span6 offset3" style="display:flex;justify-content: center">
                                            <button class="button btn btn-primary" id="btnContinuar"><span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>
                                            <a href="<?php echo base_url() ?>index.php/os" class="button btn btn-mini btn-warning"><span class="button__icon"><i class="bx bx-undo"></i></span> <span class="button__text2">Voltar</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Desconto-->
                        <?php
                        $total = 0;
                        foreach ($produtos as $p) {
                            $total = $total + $p->subTotal;
                        }
                        ?>
                        <?php
                        $totals = 0;
                        foreach ($servicos as $s) {
                            $preco = $s->preco ?: $s->precoVenda;
                            $subtotals = $preco * ($s->quantidade ?: 1);
                            $totals = $totals + $subtotals;
                        }
                        ?>

                        <!--Produtos-->
                        <div class="tab-pane" id="tab3">
                            <div class="span12 well" style="padding: 1%; margin-left: 0">
                                <form id="formProdutos" action="<?php echo base_url() ?>index.php/os/adicionarProduto" method="post">
                                    <div class="span6">
                                        <input type="hidden" name="idProduto" id="idProduto" />
                                        <input type="hidden" name="idOsProduto" id="idOsProduto" value="<?php echo $result->idOs; ?>" />
                                        <input type="hidden" name="estoque" id="estoque" value="" />
                                        <label for="">Produto</label>
                                        <input type="text" class="span12" name="produto" id="produto" placeholder="Digite o nome do produto" />
                                    </div>
                                    <div class="span2">
                                        <label for="">Preço</label>
                                        <input type="text" placeholder="Preço" id="preco" name="preco" class="span12 money" data-affixes-stay="true" data-thousands="" data-decimal="." />
                                    </div>
                                    <div class="span2">
                                        <label for="">Quantidade</label>
                                        <input type="text" placeholder="Quantidade" id="quantidade" name="quantidade" class="span12" />
                                    </div>
                                    <div class="span2">
                                        <label for="">&nbsp;</label>
                                        <button class="button btn btn-success" id="btnAdicionarProduto">
                                            <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Adicionar</span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-box" id="divProdutos">
                                <div class="widget_content nopadding">
                                    <table width="100%" class="table table-bordered" id="tblProdutos">
                                        <thead>
                                            <tr>
                                                <th>Produto</th>
                                                <th width="8%">Quantidade</th>
                                                <th width="10%">Preço unit.</th>
                                                <th width="6%">Ações</th>
                                                <th width="10%">Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($produtos as $p) {
                                                $total = $total + $p->subTotal;
                                                echo '<tr>';
                                                echo '<td>' . $p->descricao . '</td>';
                                                echo '<td><div align="center">' . $p->quantidade . '</td>';
                                                echo '<td><div align="center">R$: ' . ($p->preco ?: $p->precoVenda)  . '</td>';
                                                echo (strtolower($result->status) != "cancelado") ? '<td><div align="center"><a href="" idAcao="' . $p->idProdutos_os . '" prodAcao="' . $p->idProdutos . '" quantAcao="' . $p->quantidade . '" title="Excluir Produto" class="btn-nwe4"><i class="bx bx-trash-alt"></i></a></td>' : '<td></td>';
                                                echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                                echo '</tr>';
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                                <td>
                                                    <div align="center"><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--Serviços-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12 well" style="padding: 1%; margin-left: 0">
                                <form id="formServicos" action="<?php echo base_url() ?>index.php/os/adicionarServico" method="post">
                                    <div class="span6">
                                        <input type="hidden" name="idServico" id="idServico" />
                                        <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs; ?>" />
                                        <label for="">Serviço</label>
                                        <input type="text" class="span12" name="servico" id="servico" placeholder="Digite o nome do serviço" />
                                    </div>
                                    <div class="span2">
                                        <label for="">Preço</label>
                                        <input type="text" placeholder="Preço" id="preco_servico" name="preco" class="span12 money" data-affixes-stay="true" data-thousands="" data-decimal="." />
                                    </div>
                                    <div class="span2">
                                        <label for="">Quantidade</label>
                                        <input type="text" placeholder="Quantidade" id="quantidade_servico" name="quantidade" class="span12" />
                                    </div>
                                    <div class="span2">
                                        <label for="">&nbsp;</label>
                                        <button class="button btn btn-success">
                                            <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Adicionar</span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-box" id="divServicos">
                                <div class="widget_content nopadding">
                                    <table width="100%" class="table table-bordered" id="tblServicos">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th width="8%">Quantidade</th>
                                                <th width="10%">Preço</th>
                                                <th width="6%">Ações</th>
                                                <th width="10%">Sub-totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totals = 0;
                                            foreach ($servicos as $s) {
                                                $preco = $s->preco ?: $s->precoVenda;
                                                $subtotals = $preco * ($s->quantidade ?: 1);
                                                $totals = $totals + $subtotals;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td><div align="center">' . ($s->quantidade ?: 1) . '</div></td>';
                                                echo '<td><div align="center">R$ ' . $preco  . '</div></td>';
                                                echo '<td><div align="center"><span idAcao="' . $s->idServicos_os . '" title="Excluir Serviço" class="btn-nwe4 servico"><i class="bx bx-trash-alt"></i></span></div></td>';
                                                echo '<td><div align="center">R$: ' . number_format($subtotals, 2, ',', '.') . '</div></td>';
                                                echo '</tr>';
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                                <td>
                                                    <div align="center"><strong>R$ <?php echo number_format($totals, 2, ',', '.'); ?><input type="hidden" id="total-servico" value="<?php echo number_format($totals, 2); ?>"></strong></div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--Anexos-->
                        <div class="tab-pane" id="tab5">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                    <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" s method="post">
                                        <div class="span10">
                                            <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs; ?>" />
                                            <label for="">Anexo</label>
                                            <input type="file" class="span12" name="userfile[]" multiple="multiple" size="20" />
                                        </div>
                                        <div class="span2">
                                            <label for="">.</label>
                                            <button class="button btn btn-success">
                                                <span class="button__icon"><i class='bx bx-paperclip'></i></span><span class="button__text2">Anexar</span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="span12 pull-left" id="divAnexos" style="margin-left: 0">
                                    <?php
                                    foreach ($anexos as $a) {
                                        if ($a->thumb == null) {
                                            $thumb = base_url() . 'assets/img/icon-file.png';
                                            $link = base_url() . 'assets/img/icon-file.png';
                                        } else {
                                            $thumb = $a->url . '/thumbs/' . $a->thumb;
                                            $link = $a->url . '/' . $a->anexo;
                                        }
                                        echo '<div class="span3" style="min-height: 150px; margin-left: 0">
                                                    <a style="min-height: 150px;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
                                                        <img src="' . $thumb . '" alt="">
                                                    </a>
                                                    <span>' . $a->anexo . '</span>
                                                </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!--Anotações-->
                        <div class="tab-pane" id="tab6">
                            <div class="span12" style="padding: 1%; margin-left: 0">

                                <div class="span12" id="divAnotacoes" style="margin-left: 0">

                                    <a href="#modal-anotacao" id="btn-anotacao" role="button" data-toggle="modal" class="button btn btn-success" style="max-width: 160px">
                                        <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Adicionar anotação</span></a>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Anotação</th>
                                                <th>Data/Hora</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($anotacoes as $a) {
                                                echo '<tr>';
                                                echo '<td>' . $a->anotacao . '</td>';
                                                echo '<td>' . date('d/m/Y H:i:s', strtotime($a->data_hora)) . '</td>';
                                                echo '<td><span idAcao="' . $a->idAnotacoes . '" title="Excluir Anotação" class="btn-nwe4 anotacao"><i class="bx bx-trash-alt"></i></span></td>';
                                                echo '</tr>';
                                            }
                                            if (!$anotacoes) {
                                                echo '<tr><td colspan="3">Nenhuma anotação cadastrada</td></tr>';
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Fim tab anotações -->
                    </div>
                </div>
                &nbsp
            </div>
        </div>
    </div>
</div>


<!-- ------------------------**********************Modais**************************************------------------------------------------------------ -->

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <a target="_blank" class="btn" id="abrir-anexo">Visualizar</a>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
    </div>
</div>


<!-- Modal cadastro anotações -->
<div id="modal-anotacao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="#" method="POST" id="formAnotacao">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Adicionar Anotação</h3>
        </div>
        <div class="modal-body">
            <div class="span12" id="divFormAnotacoes" style="margin-left: 0"></div>
            <div class="span12" style="margin-left: 0">
                <label for="anotacao">Anotação</label>
                <textarea class="span12" name="anotacao" id="anotacao" cols="30" rows="5" placeholder="Ex. Aqui pode ser colocado obs. da qual o cliente não tem acesso: Exemplo: Link de um produto (que será pedido via internet) Mercado livre, Exemplo: um teclado ou bateria de um notebook! Informações que o equipamento foi para alguma tercerizada, entre outras..."></textarea>
                <input type="hidden" name="os_id" value="<?php echo $result->idOs; ?>">
            </div>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-close-anotacao">Fechar</button>
            <button class="btn btn-primary">Adicionar</button>
        </div>
    </form>
</div>

<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formFaturar" action="<?php echo current_url() ?>" method="post">
        <div class="modal_header">
            <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Faturar OS</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
            <div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição</label>
                <input class="span12" id="descricao" readonly type="text" name="descricao" value="Fatura de OS Nº: <?php echo $result->idOs; ?> " />
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente*</label>
                    <input class="span12" id="cliente" readonly type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div>
            </div>

            <div id="divLancar">
                <div id="divObservacoes" class="span12" style="margin-left: 0">
                    <label for="observacoes">Detalhes de como foi Pago</label>
                    <textarea class="span12" id="observacoes" name="observacoes"><?php echo "Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . ""; ?>, <?php echo "Desconto Serviço: R$" . number_format($result->descontoservico, 2, ',', '.') . ""; ?> <?php echo "Desconto Produto: R$" . number_format($result->descontoproduto, 2, ',', '.') . "";  ?> <?php echo "Forma de Pagamento: " . $result->formaPgtoOs . ""; ?> <?php echo "" . $result->parcelOs . ""; ?><?php if ($result->formaPgtoOs2 != "") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo " Segunda forma de Pagamento: " . $result->formaPgtoOs2 . "";  ?> <?php echo "" . $result->parcelOs2 . "";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($result->formaPgtoOs3 != "") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo " Terceira forma de Pagamento: " . $result->formaPgtoOs3 . "";  ?> <?php echo "" . $result->parcelOs3 . "";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($result->formaPgtoOs4 != "") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo " Quarta forma de Pagamento: " . $result->formaPgtoOs4 . "";  ?> <?php echo "" . $result->parcelOs4 . "";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ?></textarea>
                </div>

                <div class="span12" style="margin-left: 0">
                    <div class="span5" style="margin-left: 0">
                        <input type="hidden" id="tipo" name="tipo" value="receita" />


                        <?php if ($result->valor_desconto == 0 && $result->desconto == 0) {
                        ?>
                            <label for="valor">Valor Com Desconto*</label>
                            <input class="span12 money" id="faturar-desconto" readonly type="text" name="valor" value="<?php echo  number_format($totalProdutos + $totalServico - $result->descontoservico - $result->descontoproduto, 2, ',', '.'); ?> " />
                        <?php
                        } ?>


                        <?php if ($result->valor_desconto != 0 && $result->desconto != 0) {
                        ?>
                            <label for="valor">Valor Com Desconto*</label>
                            <input class="span12 money" id="faturar-desconto" readonly type="text" name="valor" value="<?php echo number_format($result->valor_desconto, 2, '.', ''); ?> " />
                        <?php
                        } ?>

                    </div>


                    <div class="span5" style="margin-left: 2">
                        <label for="valor">Valor Total*</label>
                        <input type="hidden" id="tipo" name="tipo" value="receita" />
                        <input class="span12 money" id="faturar-desconto" readonly type="text" name="faturar-desconto" value="<?php echo number_format($totalProdutos + $totalServico, 2, '.', ''); ?> " />
                    </div>
                </div>
            </div>


            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="vencimento">Data Entrada*</label>
                    <input class="span12 datepicker" autocomplete="off" id="vencimento" type="text" name="vencimento" />
                </div>

            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebido">Recebido?</label>
                    &nbsp &nbsp &nbsp &nbsp <input id="recebido" type="checkbox" name="recebido" value="1" />
                </div>
                <div id="divRecebimento" class="span8" style=" display: none">

                </div>
            </div>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="button btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar"><span class="button__icon"><i class="bx bx-x"></i></span><span class="button__text2">Cancelar</span></button>
            <button class="button btn btn-danger"><span class="button__icon"><i class='bx bx-dollar'></i></span> <span class="button__text2">Faturar</span></button>
        </div>
    </form>
</div>

<!-- Modal WhatsApp-->

<div id="modal-whatsapp" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <form action="<?php echo current_url() ?>" method="post">

        <div class="modal_header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div align="center">

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {

                    $zapnumber = preg_replace("/[^0-9]/", "", $result->celular);
                    $zapnumber = preg_replace("/[^0-9]/", "", $result->celular);
                    $totalComDesconto = number_format($result->valorTotalComDesconto, 2, ',', '.');
                    $total = number_format($total, 2, ',', '.');
                    $totalSemDesconto = number_format($result->valorTotal, 2, ',', '.');
                    $descontoServico = number_format($result->descontoservico, 2, ',', '.');
                    $descontoProduto = number_format($result->descontoproduto, 2, ',', '.');
                    $linkaux = urlencode($configuration['whats_app4'] . '?&c=' . $result->documento . '&e=' . $result->email);


                    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
                    $isMob = is_numeric(strpos($ua, "mobile"));
                    $test;

                    $isMob ? $test = 'https://api.whatsapp.com/send?phone=55' : $test = 'https://web.whatsapp.com/send?phone=55';

                    echo '<a title="Enviar Por WhatsApp" class="btn btn-success" id="enviarWhatsApp" target="_blank" href="'
                        . $test . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20'
                        . $result->idOs . '*%20referente%20ao%20equipamento%20*' . $result->marca . '%20' . $result->modeloeq
                        . '*%20foi%20atualizada%20para%20*' . $result->status . '*%0d%0a%0d%0a*Descrição%20do%20Produto%20/%20Serviço*: '
                        . strip_tags($result->descricaoProduto) . '%0d%0a%0d%0a*Problema%20Informado*: ' . strip_tags($result->defeito)
                        . '%0d%0a%0d%0a*Anotações*: ' . strip_tags($result->observacoes) . '%0d%0a%0d%0a*Laudo%20do%20Técnico*: '
                        .  strip_tags($result->laudoTecnico)  . '%0d%0a%0d%0aValor%20Total%20*R$&#58%20' . $totalSemDesconto
                        . '*%0d%0aDesconto%20do%20Produto%20*R$&#58%20' . $descontoProduto .  '*%0d%0aDesconto%20do%20Serviço%20*R$&#58%20'
                        . $descontoServico . '*%0d%0a' . '%0d%0aValor%20Final%20Com%20Desconto%20*R$&#58%20' . $totalComDesconto  . '*%0d%0a'
                        . $configuration['whats_app1'] . '%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*'
                        . $configuration['whats_app3'] . '*%0d%0a%0d%0a*Acesse%20a%20área%20do%20cliente%20pelo%20link*:%20' . $linkaux
                        . '%0d%0a%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . strip_tags($result->email)
                        . '*%0d%0aSenha:%20*' . strip_tags($result->documento) . '*"><i class="fab fa-whatsapp"></i> Enviar WhatsApp</a>';
                } ?>



            </div>

        </div>


        <div class="modal-body">

            <div class="span12" style="margin-left: 0">

                <span>Prezado(a)</span> <b><?php echo $result->nomeCliente ?></b>

                <br><br>

                <div>Sua <b>O.S <?php echo $result->idOs ?></b> referente ao equipamento <b><?php echo $result->marca ?> <?php echo $result->modeloeq ?></b> foi atualizada para <b><?php echo $result->status ?></b></div>

                <br>

                <b> Descrição do Produto / Serviço: </b><?php echo $result->descricaoProduto ?>

                <br><br>

                <b> Problema Informado: </b><?php echo $result->defeito ?>

                <br><br>

                <b> Anotações: </b><?php echo $result->observacoes ?>

                <br><br>


                <b> Laudo do Técnico: </b><?php echo $result->laudoTecnico ?>

                <br><br>

                <div>Valor Total <b>R$: <?php echo number_format($totalSemDesconto, 2, ',', '.') ?></b></div>

                <div>Desconto do Produto <b>R$: <?php echo number_format($result->descontoproduto, 2, ',', '.') ?></b></div>

                <div>Desconto do Serviço <b>R$: <?php echo number_format($result->descontoservico, 2, ',', '.') ?></b></div>

                <br>

                <div>Valor Final <b>R$: <?php echo number_format($totalComDesconto, 2, ',', '.') ?></b></div>

                <br>

                <?php echo $configuration['whats_app1'] ?>

                <div>Atenciosamente <b><?php echo $configuration['whats_app2'] ?></b> - <b><?php echo $configuration['whats_app3'] ?></b></div>

                <br>

                <div><b>Acesse a área do cliente pelo link: </b>
                    <font color='#1E90FF'><?php echo $configuration['whats_app4'] ?></font>
                </div>
                <br>
                <div>E utilize estes dados para fazer Log-In.

                    <br>Email: <b><?php echo $result->email ?></b>

                    <br>Senha: <b><?php echo $result->documento ?></b>
                </div>

                <br>
            </div>

        </div>
    </form>
</div>
<!-- Fim Modal WhatsApp-->


<!-- Modal Lançamento-->
<div id="modal-lancar" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formLancar" action="<?php echo base_url() ?>index.php/os/aplicar" method="post">
        <div class="modal-header">
            <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Lançar OS</h3>
        </div>
        <div id='divAplicar' class="modal-body">

            <div class="span6" style="margin-left:0">
                <label for="garantia">Dias de Garantia</label>
                <input id="garantia" placeholder="Ex. 30 ou 90" class="span5" type="text" name="garantia" value="<?php echo $result->garantia ?>"> Dias
                <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                <br>
            </div>
            <div class="span12" style="color: red; font-weight: bold; display:none;" id="errorAlert"></div>
            <div class="span8" style="margin-left:0">
                <div class="span6" style="margin-left:0">
                    <label for="descontoservico">Descontos de Serviços</label>
                    <input id="descontoservico" class="span8" name="descontoservico" class="money" value="<?php echo number_format($result->descontoservico, 2, '.', '.') ?>" />
                    <input type="hidden" name="descontoservicohidden" id="descontoservicohidden">

                </div>
                <div class="span6" style="margin-left:0">
                    <label for="totalservicos">Total de Serviços</label>
                    <input style="margin:0" id="totalservicos" class="span6" readonly type="text" name="totalservicos" class="money" data-total="<?php echo $totalServico ?>" value="<?php echo number_format($totalServico - $result->descontoservico, 2, '.', ',') ?>" />
                </div>
            </div>


            <div class="span8" style="margin-left:0; margin-top:10px">
                <div class="span6" style="margin-left:0">
                    <label for="descontoproduto">Descontos de Produtos</label>
                    <input id="descontoproduto" class="span8" name="descontoproduto" class="money" value="<?php echo number_format($result->descontoproduto, 2, '.', '.') ?>" />
                    <input type="hidden" name="descontoprodutohidden" id="descontoprodutohidden">
                </div>
                <div class="span6" style="margin-left:0">
                    <label for="totalprodutos" s>Total de Produtos</label>
                    <input style="margin:0" id="totalprodutos" class="span6" readonly type="text" name="totalprodutos" class="money" data-total="<?php echo $totalProdutos ?>" value="<?php echo number_format($totalProdutos - $result->descontoproduto, 2, '.', ',') ?>" />
                </div>
            </div>

            <div class="span10" style="margin-left:0; display:flex; align-items:flex-end">
                <div class='span8' style="margin-left:0;">
                    <label for="fornecedor" class="btn btn-default" style="margin-top:10px; padding:8px 4px 2px 4px">Mais de uma forma de pagamento?
                        <input style="opacity:0; display: none" type="checkbox" id="fornecedor" name="fornecedor" class="badgebox" <?php echo (intval($result->quantPgto) > 1) ?  "checked" : null ?>>
                        <span class="badge">&check;</span>
                    </label>
                </div>

                <div id="quantidadePagamento" class='span3' style="margin-left:10px; display:none">
                    <label for="quantPgto">Quantidade</label>
                    <select name="quantPgto" id="quantPgto" class='span8' style="margin:0">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>

                    </select>
                </div>
            </div>

            <div class="span8" style="margin-left:0; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgtoOs">Forma de Pagamento</label>
                    <select name="formaPgtoOs" id="formaPgtoOs" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgtoOs == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgtoOs == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgtoOs == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgtoOs == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgtoOs == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgtoOs == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgtoOs == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgtoOs == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>

                </div>

                <div class="span4" style="margin-left:0;">
                    <label for="parcelOs">Parcelamento</label>
                    <select name="parcelOs" id="parcelOs" class="span10" style="margin:0">


                        <option <?php if ($result->parcelOs == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcelOs == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcelOs == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcelOs == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcelOs == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcelOs == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcelOs == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcelOs == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcelOs == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcelOs == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcelOs == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcelOs == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcelOs == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcelOs == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>

                    </select>

                    </center>
                </div>

            </div>

            <div id="formap2" class="span8" style="margin-left:0; display:none; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgtoOs2">Forma de Pagamento</label>
                    <select name="formaPgtoOs2" id="formaPgtoOs2" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgtoOs2 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgtoOs2 == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgtoOs2 == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgtoOs2 == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgtoOs2 == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgtoOs2 == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgtoOs2 == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgtoOs2 == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>
                </div>

                <div id="parcel2" class="span4" style="margin-left:0; display:none;">
                    <label for="parcelOs2">Parcelamento</label>
                    <select name="parcelOs2" id="parcelOs2" class="span10" style="margin:0">


                        <option <?php if ($result->parcelOs2 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcelOs2 == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcelOs2 == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcelOs2 == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcelOs2 == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcelOs2 == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcelOs2 == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcelOs2 == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcelOs2 == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcelOs2 == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcelOs2 == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcelOs2 == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcelOs2 == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcelOs2 == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>


                    </select>
                </div>
            </div>

            <div id="formap3" class="span8" style="margin-left:0; display:none; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgtoOs3">Forma de Pagamento</label>
                    <select name="formaPgtoOs3" id="formaPgtoOs3" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgtoOs3 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgtoOs3 == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgtoOs3 == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgtoOs3 == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgtoOs3 == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgtoOs3 == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgtoOs3 == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgtoOs3 == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>
                </div>

                <div id="parcel3" class="span4" style="margin-left:0; display:none;">
                    <label for="parcelOs3">Parcelamento</label>
                    <select name="parcelOs3" id="parcelOs3" class="span10" style="margin:0">


                        <option <?php if ($result->parcelOs3 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcelOs3 == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcelOs3 == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcelOs3 == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcelOs3 == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcelOs3 == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcelOs3 == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcelOs3 == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcelOs3 == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcelOs3 == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcelOs3 == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcelOs3 == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcelOs3 == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcelOs3 == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>


                    </select>
                </div>
            </div>

            <div id="formap4" class="span8" style="margin-left:0;display:none; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgtoOs4">Forma de Pagamento</label>
                    <select name="formaPgtoOs4" id="formaPgtoOs4" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgtoOs4 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgtoOs4 == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgtoOs4 == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgtoOs4 == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgtoOs4 == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgtoOs4 == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgtoOs4 == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgtoOs4 == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>
                </div>

                <div id="parcel4" class="span4" style="margin-left:0; display:none">
                    <label for="parcelOs4">Parcelamento</label>
                    <select name="parcelOs4" id="parcelOs4" class="span10" style="margin:0">
                        <option <?php if ($result->parcelOs4 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcelOs4 == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcelOs4 == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcelOs4 == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcelOs4 == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcelOs4 == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcelOs4 == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcelOs4 == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcelOs4 == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcelOs4 == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcelOs4 == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcelOs4 == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcelOs4 == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcelOs4 == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="modal-footer" style="display:flex">
            <button id="btnContinuar" class="button btn btn-success"><span class="button__icon"><i class='bx bx-dollar'></i></span> <span class="button__text2">Aplicar</span></button>
            <button id="btn-faturar" class="button btn btn-danger"><span class="button__icon"><i class='bx bx-dollar'></i></span> <span class="button__text2">Faturar</span></button>
        </div>
        <div class="alert alert-success" role="alert">Lancamento aplicado com sucesso</div>
        <!--<div id="alertLancar"></div> -->
    </form>
</div>

<!-- Fim modal lançamento!-->

<!-- Modal Imprimir-->

<div id="modal-imprimir" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal_header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

    </div>


    <div class="modal-body">

        <div class="span12" style="margin-left: 0">

            <a target="_blank" title="Imprimir OS" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>">
                <span class="button__icon"><i class="bx bx-printer"></i></span> <span style="display: inline-flex; align-items:center">Imprimir OS</span></a>

            <a target="_blank" title="Imprimir OS Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirOsTermica/<?php echo $result->idOs; ?>">
                <span class="button__icon"><i class="bx bx-printer"></i></span> <span style="display: inline-flex; align-items:center">Imprimir OS Térmica</span></a>

            <a target="_blank" title="Termo de Uso Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirTermicaGarantia/<?php echo $result->idOs; ?>">
                <span class="button__icon"><i class="bx bx-printer"></i></span> <span style="display: inline-flex; align-items:center">Termo de Uso Térmica</span></a>

            <div class="modal-footer" style="display:flex;justify-content: center;padding: 17px 15px 5px;">
                <button class="button btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar"><span class="button__icon"><i class="bx bx-x"></i></span><span class="button__text2">Cancelar</span></button>
            </div>

        </div>
    </div>
</div>

<!-- Fim Modal Imprimir-->

<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
    function calcDesconto(valor, desconto) {

        var resultado = (valor - desconto * valor / 100).toFixed(2);
        return resultado;
    }

    function validarDesconto(resultado, valor) {
        if (resultado == valor) {
            return resultado = "";
        } else {
            return resultado.toFixed(2);
        }
    }

    function serviceschange() {
        var totalservicos = document.getElementById("totalservicos");
        var descontoservico = document.getElementById("descontoservico");
        var total = totalservicos.getAttribute('data-total');
        var totaldesconto = total - descontoservico.value;
        if (Number(totaldesconto) < 0) {
            $('#errorAlert').text('Desconto não pode ser maior do total.').css("display", "inline").fadeOut(5000);
            descontoservico.value = ''
            totalservicos.value = Number(total).toFixed(2)
        } else {
            totalservicos.value = totaldesconto.toFixed(2);
        };

    }

    function produtschange() {
        var totalprodutos = document.getElementById("totalprodutos");
        var descontoproduto = document.getElementById("descontoproduto");
        var total = totalprodutos.getAttribute('data-total');
        var totaldesconto = total - descontoproduto.value;
        if (Number(totaldesconto) < 0) {
            $('#errorAlert').text('Desconto não pode ser maior do total.').css("display", "inline").fadeOut(5000);
            descontoproduto.value = ''
            totalprodutos.value = Number(total).toFixed(2)
        } else {
            totalprodutos.value = totaldesconto.toFixed(2);
        };

    }

    function quantpagamento() {
        var quantPgto = document.getElementById("quantPgto");
        var formap2 = document.getElementById("formap2");
        var formap3 = document.getElementById("formap3");
        var formap4 = document.getElementById("formap4");
        var parcel2 = document.getElementById("parcel2");
        var parcel3 = document.getElementById("parcel3");
        var parcel4 = document.getElementById("parcel4");

        if (quantPgto.value == "1") {
            formap2.style.display = "none"
            formap3.style.display = "none"
            formap4.style.display = "none"
            parcel2.style.display = "none"
            parcel3.style.display = "none"
            parcel4.style.display = "none"
        }
        if (quantPgto.value == "2") {
            formap2.style.display = "block"
            parcel2.style.display = "block"
            formap3.style.display = "none"
            parcel3.style.display = "none"
            formap4.style.display = "none"
            parcel4.style.display = "none"
        }
        if (quantPgto.value == "3") {
            formap2.style.display = "block"
            parcel2.style.display = "block"
            formap3.style.display = "block"
            parcel3.style.display = "block"
            formap4.style.display = "none"
            parcel4.style.display = "none"
        }
        if (quantPgto.value == "4") {
            formap2.style.display = "block"
            parcel2.style.display = "block"
            formap3.style.display = "block"
            parcel3.style.display = "block"
            formap4.style.display = "block"
            parcel4.style.display = "block"
        }
    }

    function fornecedor() {
        var quantPgto = document.getElementById("fornecedor")
        if (quantPgto.checked == true) {
            $('#quantidadePagamento').show();
        } else {
            $('#quantidadePagamento').hide();
            $('#formap2').hide();
            $('#formap3').hide();
            $('#formap4').hide();
            $('#parcel2').hide();
            $('#parcel3').hide();
            $('#parcel4').hide();
            $('#quantPgto').val("1")
        }
    };
    var valorBackup = $("#valorTotal").val();

    $(function() {
        $('#descontoservico').maskMoney();
    })

    $("#quantidade").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#quantidade_servico").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#desconto").keyup(function() {

        this.value = this.value.replace(/[^0-9.]/g, '');
        if ($('#desconto').val() > 100) {
            $('#errorAlert').text('Desconto não pode ser maior de 100%.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $("#desconto").focus();
        }
        if ($("#valorTotal").val() == null || $("#valorTotal").val() == '') {
            $('#errorAlert').text('Valor não pode ser apagado.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
            $("#valorTotal").val(valorBackup);
            $("#desconto").focus();

        } else if (Number($("#desconto").val()) >= 0) {
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
        } else {
            $('#errorAlert').text('Erro desconhecido.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
        }
    });

    $("#valorTotal").focusout(function() {
        $("#valorTotal").val(valorBackup);
        if ($("#valorTotal").val() == '0.00' && $('#resultado').val() != '') {
            $('#errorAlert').text('Você não pode apagar o valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
            $("#valorTotal").val(valorBackup);
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
            $("#desconto").focus();
        } else {
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
        }
    });

    $('#resultado').focusout(function() {
        if (Number($('#resultado').val()) > Number($("#valorTotal").val())) {
            $('#errorAlert').text('Desconto não pode ser maior que o Valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
        }
        if ($("#desconto").val() != "" || $("#desconto").val() != null) {
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
        }
    });
    $(document).ready(function() {
        $(".alert-success").hide()
        $("#quantPgto").val(<?php echo $result->quantPgto ?>)
        fornecedor()
        quantpagamento()
        $(".money").maskMoney();

        $('#recebido').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });

        $(document).ajaxStop(function() {

            $('#descontoservico').on('input', function(e) {
                serviceschange()
            })
            $('#descontoproduto').on('input', function(e) {
                produtschange()
            })

            $('#fornecedor').click(function(event) {
                fornecedor()
            });

            $('#quantPgto').change(function(event) {
                quantpagamento()
            })

        })

        $(document).on('click', '#btn-faturar', function(event) {
            event.preventDefault();
            $('#modal-lancar').modal('toggle')
            $('#modal-faturar').modal('toggle')


        });

        $("#formFaturar").validate({
            rules: {
                descricao: {
                    required: true
                },
                cliente: {
                    required: true
                },
                valor: {
                    required: true
                },
                vencimento: {
                    required: true
                }

            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                cliente: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();
                var qtdProdutos = $('#tblProdutos >tbody >tr').length;
                var qtdServicos = $('#tblServicos >tbody >tr').length;
                var qtdTotalProdutosServicos = qtdProdutos + qtdServicos;

                $('#btn-cancelar-faturar').trigger('click');

                if (qtdTotalProdutosServicos <= 0) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Não é possível faturar uma OS sem serviços e/ou produtos"
                    });
                } else if (qtdTotalProdutosServicos > 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/os/faturar",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.reload(true);
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar faturar OS."
                                });
                                $('#progress-fatura').hide();
                            }
                        }
                    });

                    return false;
                }
            }
        });
        $('#formDesconto').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Processando',
                        text: 'Registrando desconto...',
                        icon: 'info',
                        showCloseButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                },
                success: function(response) {
                    if (response.result) {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: response.messages
                        });
                        setTimeout(function() {
                            window.location.href = window.BaseUrl + 'index.php/os/editar/' + <?php echo $result->idOs ?>;
                        }, 2000);
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: response.messages
                        });
                    }

                },
                error: function(response) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: response.responseJSON.messages
                    });
                }
            });
        });

        $("#formwhatsapp").validate({
            rules: {
                descricao: {
                    required: true
                },
                cliente: {
                    required: true
                },
                valor: {
                    required: true
                },
                vencimento: {
                    required: true
                }

            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                cliente: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();
                $('#btn-cancelar-faturar').trigger('click');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/faturar",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {

                            window.location.reload(true);
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar  OS."
                            });
                            $('#progress-fatura').hide();
                        }
                    }
                });

                return false;
            }
        });

        $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProduto",
            minLength: 2,
            select: function(event, ui) {
                $("#codDeBarra").val(ui.item.codbar);
                $("#idProduto").val(ui.item.id);
                $("#estoque").val(ui.item.estoque);
                $("#preco").val(ui.item.preco);
                $("#quantidade").focus();
            }
        });

        $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function(event, ui) {
                $("#idServico").val(ui.item.id);
                $("#preco_servico").val(ui.item.preco);
                $("#quantidade_servico").focus();
            }
        });


        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });

        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });

        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
            minLength: 1,
            select: function(event, ui) {
                if (ui.item.id) {
                    $("#garantias_id").val(ui.item.id);
                }
            }
        });

        $('#termoGarantia').on('change', function() {
            if (!$(this).val() && $("#garantias_id").val()) {
                $("#garantias_id").val('');
                Swal.fire({
                    type: "success",
                    title: "Sucesso",
                    text: "Termo de garantia removido"
                });
            }
        });



        $("#formOs").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataInicial: {
                    required: true
                }
            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                tecnico: {
                    required: 'Campo Requerido.'
                },
                dataInicial: {
                    required: 'Campo Requerido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

        $("#formProdutos").validate({
            rules: {
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                }
            },
            messages: {
                preco: {
                    required: 'Inserir o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                }
            },
            submitHandler: function(form) {
                var quantidade = parseInt($("#quantidade").val());
                var estoque = parseInt($("#estoque").val());

                <?php if (!$configuration['control_estoque']) {
                    echo 'estoque = 1000000';
                }; ?>

                if (estoque < quantidade) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/os/adicionarProduto",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $("#divAplicar").load("<?php echo current_url(); ?> #divAplicar");
                                $("#divLancar").load("<?php echo current_url(); ?> #divLancar");
                                $("#quantidade").val('');
                                $("#preco").val('');
                                $("#resultado").val('');
                                $("#desconto").val('');
                                $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                                $("#produto").val('').focus();
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar adicionar produto."
                                });
                            }
                        }
                    });
                    return false;
                }
            }
        });

        $('#formLancar').submit(function(e) {
            e.preventDefault();
            if ($('#quantPgto').val() == 1) {
                $('#formaPgtoOs2').val('')
                $('#formaPgtoOs3').val('')
                $('#formaPgtoOs4').val('')
                $('#parcelOs2').val('')
                $('#parcelOs3').val('')
                $('#parcelOs4').val('')
            }
            $("#descontoservico").val($("#descontoservico").maskMoney('unmasked')[0]);

            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    //$("#alertLancar").html('<div class="alert alert-success" role="alert">Lancamento aplicado com sucesso</div>').fadeOut(5000);
                    $(".alert-success").fadeTo(3000, 500).slideUp(500, function() {
                        $(".alert-success").slideUp(500);
                    });
                    $("#divLancar").load("<?php echo current_url(); ?> #divLancar");

                },
                error: function(response) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: response.responseJSON.messages
                    });
                }
            });
        });



        $("#formServicos").validate({
            rules: {
                servico: {
                    required: true
                },
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                },
            },
            messages: {
                servico: {
                    required: 'Insira um serviço'
                },
                preco: {
                    required: 'Insira o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                },
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();

                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#divAplicar").load("<?php echo current_url(); ?> #divAplicar");
                            $("#divLancar").load("<?php echo current_url(); ?> #divLancar");
                            $("#quantidade_servico").val('');
                            $("#preco_servico").val('');
                            $("#resultado").val('');
                            $("#desconto").val('');
                            $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                            $("#servico").val('').focus();
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });

        $("#formAnotacao").validate({
            rules: {
                anotacao: {
                    required: true
                }
            },
            messages: {
                anotacao: {
                    required: 'Insira a anotação'
                }
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();
                $("#divFormAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarAnotacao",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");
                            $("#anotacao").val('');
                            $('#btn-close-anotacao').trigger('click');
                            $("#divFormAnotacoes").html('');
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar anotação."
                            });
                        }
                    }
                });
                return false;
            }
        });

        $("#formAnexos").validate({
            submitHandler: function(form) {
                //var dados = $( form ).serialize();
                var dados = new FormData(form);
                $("#form-anexos").hide('1000');
                $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/anexar",
                    data: dados,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                            $("#userfile").val('');

                        } else {
                            $("#divAnexos").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> ' + data.mensagem + '</div>');
                        }
                    },
                    error: function() {
                        $("#divAnexos").html('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> Ocorreu um erro. Verifique se você anexou o(s) arquivo(s).</div>');
                    }
                });
                $("#form-anexos").show('1000');
                return false;
            }
        });

        $(document).on('click', 'a', function(event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            var idOS = "<?php echo $result->idOs ?>"
            if ((idProduto % 1) == 0) {
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirProduto",
                    data: "idProduto=" + idProduto + "&quantidade=" + quantidade + "&produto=" + produto + "&idOs=" + idOS,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                            $("#divAplicar").load("<?php echo current_url(); ?> #divAplicar");
                            $("#divLancar").load("<?php echo current_url(); ?> #divLancar");
                            $("#resultado").val('');
                            $("#desconto").val('');

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir produto."
                            });
                        }
                    }
                });
                return false;
            }

        });


        $(document).on('click', '.servico', function(event) {
            var idServico = $(this).attr('idAcao');
            var idOS = "<?php echo $result->idOs ?>"
            if ((idServico % 1) == 0) {
                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirServico",
                    data: "idServico=" + idServico + "&idOs=" + idOS,
                    data: "idServico=" + idServico,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                            $("#divAplicar").load("<?php echo current_url(); ?> #divAplicar");
                            $("#divLancar").load("<?php echo current_url(); ?> #divLancar");
                            $("#resultado").val('');
                            $("#desconto").val('');

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });

        $(document).on('click', '.anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#abrir-anexo").attr('href', link);
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexoaux/" + id);

        });

        $(document).on('click', '#excluir-anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idOs ?>"
            $('#modal-anexo').modal('hide');
            $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

            $.ajax({
                type: "POST",
                url: link,
                dataType: 'json',
                data: "idOs=" + idOS,
                success: function(data) {
                    if (data.result == true) {
                        $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: data.mensagem
                        });
                    }
                }
            });
        });

        $(document).on('click', '.anotacao', function(event) {
            var idAnotacao = $(this).attr('idAcao');
            var idOS = "<?php echo $result->idOs ?>"
            if ((idAnotacao % 1) == 0) {
                $("#divAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirAnotacao",
                    data: "idAnotacao=" + idAnotacao + "&idOs=" + idOS,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir Anotação."
                            });
                        }
                    }
                });
                return false;
            }
        });

        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });

        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>