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


<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Dados da Ordem de Serviço</h5>
                <div class="buttons">

                    <a href="<?php echo base_url(); ?>index.php/os/adicionar" class="button btn btn-mini btn-success" style="max-width: 160px">
                        <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Ordem de Serviço</span></a>


                    <?php if ($editavel) {
                        echo '<a title="Editar OS" class="button btn btn-mini btn-success" href="' . base_url() . 'index.php/os/editar/' . $result->idOs . '">
        <span class="button__icon"><i class="bx bx-edit"></i> </span> <span class="button__text">Editar</span></a>';
                    } ?>


                <a href="#modal-imprimir" title="Impressões" class="button btn btn-mini btn-inverse" role="button" data-toggle="modal"> <span class="button__icon"><i class="bx bx-printer"></i></span><span class="button__text">Impressões</span></a>

                    <!-- <a target="_blank" title="Imprimir OS" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir OS</span></a>

                    <a target="_blank" title="Imprimir OS Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirOsTermica/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir Os Térmica</span></a>


                    <a target="_blank" title="Termo de Uso Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirTermicaGarantia/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Termo de Uso Térmica</span></a> -->


                    <a href="#modal-whatsapp" title="Via WhatsApp" class="button btn btn-mini btn-success" id="enviarWhatsApp" role="button" data-toggle="modal"> <span class="button__icon"><i class="bx bxl-whatsapp"></i></span><span class="button__text">WhatsApp</span></a>


                    <a title="Enviar por E-mail" class="button btn btn-mini btn-warning" href="<?php echo site_url() ?>/os/enviar_email/<?php echo $result->idOs; ?>">
                        <span class="button__icon"><i class="bx bx-envelope"></i></span> <span class="button__text">Via E-mail</span></a>
                    <?php if ($result->garantias_id) { ?> <a target="_blank" title="Imprimir Termo de Garantia" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/garantias/imprimir/<?php echo $result->garantias_id; ?>">
                            <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Garantia</span></a> <?php } ?>

                    <a href="#modal-gerar-pagamento" id="btn-forma-pagamento" role="button" data-toggle="modal" class="button btn btn-mini btn-info">
                        <span class="button__icon"><i class='bx bx-qr'></i></span><span class="button__text">Gerar Pagamento</span></a></i>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<< </td>
                                    </tr> <?php } else { ?>
                                    <tr>
                                        <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 200px" class="center-visualizar"></td>

                                        <td>

                                            <span style="font-size: 15px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

                                            <span style="font-size: 13px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>

                                            <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

                                            <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

                                                <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

                                                <span style="font-size: 13px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>

                                                <span style="font-size: 13px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span>

                                        </td>


                                        <td style="text-align: center">

                                            <span style="font-size: 12px"><b>OS N°: </b><span><?php echo $result->idOs ?></span></br>


                                                <span style="font-size: 12px"><b>Status OS: </b><?php echo $result->status ?></span></br>

                                                <span style="font-size: 12px"><b>Data de Entrada: </b><?php echo date('d/m/Y H:i:s', strtotime($result->dataInicial)); ?></span></br>

                                                <span style="font-size: 12px"><b>Data Final do Orçamento: </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></span></br>

                                                <?php if ($result->dataSaida != null) { ?>

                                                    <span style="font-size: 12px"><b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?> <b>ás:</b> <?php echo $result->horasaida ?> <?php } ?></span><br>


                                                    <?php if ($result->garantia != null) { ?>

                                                        <span style="font-size: 12px"><b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?> Dias<?php } ?><b></b></span></br>
                                        </td>

                                    </tr>
                                <?php
                                        } ?>
                            </tbody>
                        </table>

                        </tr>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>

                                                <span style="font-size: 13px"><b>Cliente</b></span><br>

                                                <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?></span><br>

                                                <span style="font-size: 12px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $result->documento ?></span><br>

                                                <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->rua ?>,

                                                    <?php echo $result->numero ?>,

                                                    <?php echo $result->bairro ?></span><br>

                                                <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br>

                                                <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'CEP: ' . $result->cep ?></span><br>

                                                <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $result->celular ?></span>

                                    </td>

                                    <td>

                                        <span style="font-size: 13px"><b>Atendente</b></span><br>

                                        <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>

                                        <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_usuario ?></span><br>

                                        <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span>
                                        <br><br>

                                        <?php if ($result->tecnicores != null) { ?>

                                            <span style="font-size: 13px"><b>Técnico Responsável</b></span><br>

                                            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo htmlspecialchars_decode($result->tecnicores) ?></span><br>
                                        <?php } ?>


                                    </td>

                                </tr>

                        </table>
                        <br>

                        <div class="row-fluid" style="margin-top:0">

                            <div class="span12">

                                <div class="widget-box">

                                    <div class="widget-title">

                                        <br>
                                        <center><span style="font-size: 15px"><b>Todas informações e detalhes do Equipamento</b></span></center>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 0; padding-top: 0">

                            <table class="table table-condensed" width="100%">

                                <td><?php if ($result->tipoeq != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Tipo do Equipamento:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->tipoeq) ?>

                                    <?php } ?>
                                </td>

                                <td><?php if ($result->marca != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Marca:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->marca) ?>

                                    <?php } ?>
                                </td>

                                <td><?php if ($result->modeloeq != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Modelo:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->modeloeq) ?>

                                    <?php } ?>
                                </td>

                                <td><?php if ($result->cor != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Cor:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->cor) ?>

                                    <?php } ?>
                                </td>

                                <td><?php if ($result->serial != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Serial:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->serial) ?>

                                    <?php } ?>
                                </td>

                                <td><?php if ($result->secu != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Senha:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->secu) ?>



                                    <?php } ?>
                                </td>

                                <td><?php if ($result->perife != null) { ?>

                                        <span style="font-size: 13px; ">

                                            <b>Periféricos:</b><br></span>

                                        <?php echo htmlspecialchars_decode($result->perife) ?>

                                    <?php } ?>
                                </td>

                                <?php if ($result->rastreio != null) { ?>

                                    <tr>

                                        <td>

                                            <span style="font-size: 12px"><b>Cod. de Rastreio:</b><br></span>

                                            <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->rastreio) ?></span>

                                        </td>
                                    </tr>
                                <?php } ?>

                                </tr>

                            </table>

                        </div>

                        <!-- periferico -->

                        <?php if ($equipamento != null) { ?>

                            <br>

                            <div class="row-fluid" style="margin-top:0">

                                <div class="span12">

                                    <div class="widget-box">

                                        <div class="widget-title">


                                            <br>
                                            <center><span style="font-size: 15px"><b>Periféricos em anexo ao equipamento do Cliente</b></span></center>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed" id="tblEquipamento">
                                <thead>
                                    <tr>
                                        <th>Periférico</th>
                                        <th>Cor</th>
                                        <th>Nº Série</th>
                                        <th>Observação</th>
                                    </tr>
                                </thead>
                                <?php

                                foreach ($equipamento as $e) {

                                    echo '<tr>';

                                    echo '<td><div align="center">' . $e->equipamento . '</div></td>';

                                    echo '<td><div align="center">' . $e->modelo . '</div></td>';

                                    echo '<td><div align="center">' . $e->num_serie . '</div></td>';

                                    echo '<td><div align="center">' . $e->observacao . '</div></td>';

                                    echo '</tr>';
                                } ?>

                            </table>

                        <?php } ?>

                        <!-- fim periferico -->

                        <br>

                        <div class="row-fluid" style="margin-top:0">

                            <div class="span12">

                                <div class="widget-box">

                                    <div class="widget-title">



                                        <br>
                                        <center><span style="font-size: 15px"><b>Descrição do Produto/Serviço - Problema Informado - Anotações</b></span></center>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($result->descricaoProduto != null) { ?>

                            <tr>

                                <td>

                                    <span style="font-size: 12px"><b>Descrição do Produto/Serviço:</b><br></span>

                                    <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->descricaoProduto) ?></span>
                                    <br>
                                </td>

                            </tr>
                        <?php } ?>
                        <br>
                        <?php if ($result->defeito != null) { ?>
                            <tr>
                                <td>
                                    <span style="font-size: 12px"><b>Problema Informado:</b><br></span>
                                    <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->defeito) ?></span>
                                    <br>
                                </td>

                            </tr>

                        <?php } ?>
                        <br>

                        <?php if ($result->observacoes != null) { ?>

                            <tr>

                                <td>

                                    <span style="font-size: 12px"><b>Anotações:</b><br></span>

                                    <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->observacoes) ?></span>
                                    <br>
                                </td>

                            </tr>

                        <?php } ?>

                        <br>

                        <?php if ($result->laudoTecnico != null) { ?>

                            <tr>
                                <td>
                                    <span style="font-size: 12px"><b>Relatório do Técnico:</b><br></span>

                                    <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->laudoTecnico) ?></span>
                                    <br>
                                </td>

                            </tr>

                        <?php } ?>

                        <td><span style="font-size: 1px"></td>

                        </table>

                        <?php if ($produtos != null) { ?>

                            <!--------------------------------- Produtos --------------------------------------------------->

                            <br>

                            <div class="row-fluid" style="margin-top:0">

                                <div class="span12">

                                    <div class="widget-box">

                                        <div class="widget-title">

                                            <br>
                                            <center><span style="font-size: 15px"><b>Produtos</b></span></center>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table width="100%" class="table table-condensed">

                                <?php

                                foreach ($produtos as $p) { ?>
                                    <tr>
                                        <td>
                                            <span style="font-size: 12px"><b>Descrição Produto: <?php echo htmlspecialchars_decode($p->descricao) ?> </b><br></span>
                                            <span style="font-size: 12px"><?php echo htmlspecialchars_decode($p->descricaoproduto) ?></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th width="10%">Cod. Produto</th>

                                            <th width="12%">Cod. Barras</th>

                                            <th>Produto</th>

                                            <th width="10%">Quantidade</th>

                                            <th width="10%">Preço unit.</th>

                                            <th width="10%">Sub-total</th>
                                        </tr>
                                    </thead>

                                    <?php

                                    foreach ($produtos as $p) {

                                        $totalProdutos = $totalProdutos;

                                        echo '<tr>';

                                        echo '<td><div align="center">' . $p->idProdutos . '</div></td>';

                                        echo '<td><div align="center">' . $p->codDeBarra . '</div></td>';

                                        echo '<td>' . $p->descricao . '</td>';

                                        echo '<td><div align="center">' . $p->quantidade . '</div></td>';

                                        echo '<td><div align="center">R$: ' . $p->preco ?: $p->precoVenda . '</div></td>';

                                        echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';

                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="5" style="text-align: right"><strong>Total de Produto:</strong></td>

                                        <td><strong>
                                                <div align="center">R$: <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div>
                                            </strong></td>

                                    </tr>

                                </table>

                            <?php } ?>

                            <!--------------------------------- end Produtos --------------------------------------------------->


                            <?php if ($servicos != null) { ?>

                                <!----------------------------------- Servicos --------------------------------------------------->

                                <br>
                                <div class="row-fluid" style="margin-top:0">

                                    <div class="span12">

                                        <div class="widget-box">

                                            <div class="widget-title">

                                                <br>
                                                <center><span style="font-size: 15px"><b>Serviços</b></span></center>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Serviços</th>

                                            <th width="10%">Quantidade</th>

                                            <th width="10%">Preço unit.</th>

                                            <th width="10%">Sub-total</th>
                                        </tr>

                                    </thead>

                                    <?php

                                    setlocale(LC_MONETARY, 'en_US');

                                    foreach ($servicos as $s) {

                                        $preco = $s->preco ?: $s->precoVenda;

                                        $subtotal = $preco * ($s->quantidade ?: 1);

                                        $totalServico = $totalServico;

                                        echo '<tr>';

                                        echo '<td>' . $s->nome . '</td>';

                                        echo '<td><div align="center">' . ($s->quantidade ?: 1) . '</div></td>';

                                        echo '<td><div align="center">R$: ' . $preco . '</div></td>';

                                        echo '<td><div align="center">R$: ' . number_format($subtotal, 2, ',', '.') . '</div></td>';

                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="3" style="text-align: right"><strong>Total de Serviço:</strong></td>

                                        <td><strong>
                                                <div align="center">R$: <?php echo number_format($totalServico, 2, ',', '.'); ?></div>
                                            </strong></td>

                                    </tr>

                                </table>

                                <!--------------------------------- end Servicos --------------------------------------------------->


                                <!-- QR Code PIX -->

                                <table width="100%">

                                    <tr>

                                        <th>
                                            <div align="center">
                                                <table width="100">
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <?php if ($qrCode) : ?>
                                                                    <img src="../../../assets/img/logo_pix.png" width="100px">
                                                                    <img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                                            </div>
                                                        </td>
                                                    <?php endif ?>
                                                </table>
                                            </div>
                                        </th>
                                    </tr>
                                </table>

                                <!-- Fim QR Code PIX -->

                            <?php } ?>

                            <?php

                            if ($totalProdutos != 0 || $totalServico != 0) {

                                echo "<h6 style='text-align: right'>Valor Total: R$" . number_format($totalSemDesconto, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Desconto de Produto: R$  " . number_format($result->descontoproduto, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Desconto de Serviço: R$ " . number_format($result->descontoservico, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Valor total com Desconto: R$" . number_format($totalComDesconto, 2, ',', '.') . "</h6>";
                            }

                            ?>


                            </td>

                            </tr>

                            </table>


                            <!-- ANEXOS -->

                            <div class"span12">

                                <?php if ($anexos != null) { ?>
                                    <br>
                                    <div class="row-fluid" style="margin-top:0">

                                        <div class="span12">

                                            <div class="widget-box">

                                                <div class="widget-title">
                                                    <br>
                                                    <center><span style="font-size: 15px"><b>Anexos</b></span></center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table width="100%" class="table_p">

                                        <thead>

                                            <tr>

                                                <th>Anexo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($anexos as $a) {
                                                if ($a->thumb == null) {
                                                    $thumb = base_url() . 'assets/img/icon-file.png';
                                                    $link = base_url() . 'assets/img/icon-file.png';
                                                } else {
                                                    $thumb = $a->url . '/thumbs/' . $a->thumb;
                                                    $link = $a->url . '/' . $a->anexo;
                                                }
                                                echo '<tr>';
                                                echo '<div class="span3" style="min-height: 200px; margin-left: 0; padding: 5px;">
                                        <a style="min-height: 180px; border: 1px solid #f00;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></td>
                                        <span style="font-size: 12px">' . $a->anexo . '</span>';
                                                echo '</tr>';
                                            } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $modalGerarPagamento ?>

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



<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>