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


<?php $totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Dados da Venda</h5>
                <div class="buttons">
                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
                        echo '<a title="Editar Venda" class="button btn btn-mini btn-success" href="' . base_url() . 'index.php/vendas/editar/' . $result->idVendas . '">
    <span class="button__icon"><i class="bx bx-edit"></i> </span> <span class="button__text">Editar</span></a>';
                    } ?>

                    <!-- Botões imprimir -->

                    <a href="#modal-imprimir" title="Impressões" class="button btn btn-mini btn-inverse" role="button" data-toggle="modal"> <span class="button__icon"><i class="bx bx-printer"></i></span><span class="button__text">Impressões</span></a>

                    <!-- <a target="_blank" title="Imprimir Venda" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/vendas/imprimir/<?php echo $result->idVendas; ?>"> <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir Venda</span></a>
                    <a target="_blank" title="Imprimir Venda Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/vendas/imprimirVendaTermica/<?php echo $result->idVendas; ?>"> <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir Venda Térmica</span></a>
                    <a target="_blank" title="Imprimir Garantia Venda Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/vendas/imprimirVendaGarantiaTermica/<?php echo $result->idVendas; ?>"><span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Termo de Venda Térmica</span></a> -->

                    <!-- Fim Botões imprimir -->

                    <a href="#modal-gerar-pagamento" id="btn-forma-pagamento" role="button" data-toggle="modal" class="button btn btn-mini btn-info">
                        <span class="button__icon"><i class='bx bx-qr'></i></span><span class="button__text">Gerar Pagamento</span></a></i>


                    <a href="#modal-whatsapp" title="Via WhatsApp" class="button btn btn-mini btn-success" id="enviarWhatsApp" role="button" data-toggle="modal"> <span class="button__icon"><i class="bx bxl-whatsapp"></i></span><span class="button__text">WhatsApp</span></a>



                    <a href="<?php echo base_url() ?>index.php/vendas/" class="button btn btn-warning">
                        <span class="button__icon"><i class="bx bx-undo"></i></span> <span class="button__text2">Voltar</span></a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head">
                        <table class="table">
                            <tbody>
                                <?php if ($emitente == null) { ?>
                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<< /td>
                                    </tr> <?php
                                        } else { ?> <tr>


                                        <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 200px" class="center-imprimir"></td>

                                        <td>

                                            <span style="font-size: 15px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

                                            <span style="font-size: 13px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>

                                            <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

                                            <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

                                                <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

                                                <span style="font-size: 13px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>

                                                <span style="font-size: 13px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span>

                                        </td>


                                        <td style="width: 26%; text-align: center"><b>#Venda: </b><span>
                                                <?php echo $result->idVendas ?></span></br> </br> <span><b>Data da Impressão: </b>
                                                <?php echo date('d/m/Y H:i:s'); ?></span>
                                            <br>
                                            <span style="font-size: 12px"><b>Data da Venda: </b><?php echo date('d/m/Y H:i:s', strtotime($result->dataVenda)); ?> <br>
                                                <?php if ($result->datagarat != null) { ?>
                                                    <span style="font-size: 12px"><b>Garantia até: </b><?php echo $result->datagarat ?> Dias <?php } ?><b></b></span></br>
                                                    <?php if ($result->faturado) : ?>
                                                        <br>
                                                        <b>Entregue e Faturado no dia: </b>
                                                        <?php echo date('d/m/Y', strtotime($result->data_vencimento)); ?>
                                                    <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php
                                        } ?>
                            </tbody>
                        </table>






                        </tr>





                        <table class="table table-condensed" width="100%">
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
                                                </li>
                                            </ul>
                                        </td>
                                        <td style="width: 50%; padding-left: 0">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <span style="font-size: 13px"><b>Vendedor</b></span><br>

                                                        <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>

                                                        <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_usuario ?></span><br>

                                                        <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span>
                                                        <br><br>

                                                </li>
                                            </ul>
                                        </td>


                                    </tr>
                                </tbody>
                            </table>



                            <br>

                            <div class="row-fluid" style="margin-top:0">

                                <div class="span12">

                                    <div class="widget-box">

                                        <div class="widget-title">



                                            <br>
                                            <center><span style="font-size: 15px"><b>Observações para o Cliente</b></span></center>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 100%; padding-left: 0">
                                            <ul>
                                                <li>
                                                    <center><span><?php echo htmlspecialchars_decode($result->observacoes_cliente) ?></span><br /> </center>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </center>



                            <?php if ($produtos != null) { ?>
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
                                    <div style="margin-top: 0; padding-top: 0">

                                        <table class="table table-bordered table-condensed" id="tblProdutos">
                                            <thead>
                                                <tr>
                                                    <th style="font-size: 13px"><b>Cód. de barra</b></th>
                                                    <th style="font-size: 13px"><b>Produto</b></th>
                                                    <th style="font-size: 13px"><b>Quantidade</b></th>
                                                    <th style="font-size: 13px"><b>Preço unit.</b></th>
                                                    <th style="font-size: 13px"><b>Sub-total</b></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($produtos as $p) {
                                                    $totalProdutos = $totalProdutos + $p->subTotal;
                                                    echo '<tr>';
                                                    echo '<td>' . $p->codDeBarra . '</td>';
                                                    echo '<td>' . $p->descricao . '</td>';
                                                    echo '<td>' . $p->quantidade . '</td>';
                                                    echo '<td>' . ($p->preco ?: $p->precoVenda) . '</td>';
                                                    echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';


                                                    echo '</tr>';
                                                } ?>
                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                                    <td><strong>R$
                                                            <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong></td>


                                                </tr>

                                            </tbody>
                                        </table>
                                        <hr />





                                    <?php
                                } ?>
                                    <h4 style="text-align: right" style="font-size: 14px">Valor Total: R$
                                        <?php echo number_format($totalProdutos, 2, ',', '.'); ?></h4>

                                    <h4 style="text-align: right" style="font-size: 14px">Desconto: R$
                                        <?php echo number_format($result->descontovenda, 2, ',', '.'); ?>
                                    </h4>
                                    <h4 style="text-align: right" style="font-size: 14px">Total Com Desconto: R$
                                        <?php echo number_format($totalProdutos - $result->descontovenda, 2, ',', '.'); ?>
                                    </h4>
                                    </div>

                                    <hr />

                    </div>
                    <hr />


                    <hr />
                </div>


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

                                    <th></th>
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
<?= $modalGerarPagamento ?>
</div>


<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center; width: 100%; margin-left: 0;">
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

        <div class="modal_header_anexos">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div align="center">

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {

                    $zapnumber = preg_replace("/[^0-9]/", "", $result->celular);

                    $zapnumber = preg_replace("/[^0-9]/", "", $result->celular);

                    $totalOS = number_format($totalProdutos, 2, ',', '.');


                    $result->desconto = number_format($result->desconto, 2, ',', '.');

                    $total = number_format($total, 2, '.', '');

                    $totalgeral = number_format($totalProdutos, 2, ',', '.');

                    $totaldesconto = number_format($total - $result->descontovenda, 2, ',', '.');

                    $linkaux = urlencode($configuration['whats_app4'] . '?&c=' . $result->documento . '&e=' . $result->email);


                    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
                    $isMob = is_numeric(strpos($ua, "mobile"));
                    $test;

                    $isMob ? $test = 'https://api.whatsapp.com/send?phone=55' : $test = 'https://web.whatsapp.com/send?phone=55';

                    echo '<a title="Enviar Por WhatsApp" class="btn btn-success" id="enviarWhatsApp" target="_blank" href="' . $test . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*,%20A%20' . $configuration['whats_app2'] . '%20Agradece%20a%20Sua%20Compra! . %0d%0a%0d%0aN°%20da%20Venda:%20*' . $result->idVendas . '*%0d%0a%0d%0aCom%20Garantia%20de:%20*' . $result->datagarat . '%20Dias' . '*%0d%0a%0d%0aValor%20Total%20*R$&#58%20' . $total  . '*%0d%0aDesconto%20Produto%20*R$&#58%20' . $result->descontovenda . '*%0d%0a' . '%0d%0aValor%20Final%20*R$&#58%20' . $totaldesconto . '*%0d%0a' . $configuration['whats_app1'] . '%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] . '*%0d%0a%0d%0a*Acesse%20a%20área%20do%20cliente%20pelo%20link*:%20' . $linkaux . '%0d%0a%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . strip_tags($result->email) . '*%0d%0aSenha:%20*' . strip_tags($result->documento) . '*"><i class="fab fa-whatsapp"></i> Enviar WhatsApp</a>';
                } ?>


            </div>

        </div>

        <div class="modal-body">

            <div class="span12" style="margin-left: 0">

                <div>
                    <font size='2'>Prezado(a) <b><?php echo $result->nomeCliente ?></b>, A <?php echo $configuration['whats_app2'] ?> Agradece a Sua Compra!</font>
                </div>

                <br>

                <div>
                    <font size='2'>N° da Venda: <b><?php echo $result->idVendas ?></b></font>
                </div>

                <br>

                <div>
                    <font size='2'>Com Garantia de: <b><?php echo $result->datagarat ?></b> Dias</font>
                </div>

                <br>

                <div>Valor Total <b>R$: <?php echo number_format($total, 2, ',', '.') ?></b></div>

                <div>Desconto Produto <b>R$: <?php echo number_format($result->descontovenda, 2, ',', '.') ?></b></div>

                <br>

                <div>Valor Final <b>R$: <?php echo number_format($total - $result->descontovenda, 2, ',', '.') ?></b></div>

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

<!-- Modal Imprimir!-->

<div id="modal-imprimir" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal_header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">
        <div class="span12" style="margin-left: 0; display: contents;">

            <a target="_blank" title="Imprimir Venda" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/vendas/imprimir/<?php echo $result->idVendas ?>">
                <span class="button__icon"><i class="bx bx-printer"></i></span> <span style="display: inline-flex; align-items:center">Imprimir Venda</span></a>

            <a target="_blank" title="Imprimir Venda Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/vendas/imprimirVendaTermica/<?php echo $result->idVendas ?>">
                <span class="button__icon"><i class="bx bx-printer"></i></span> <span style="display: inline-flex; align-items:center">Imprimir Venda Térmica</span></a>

            <a target="_blank" title="Termo de Uso Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/vendas/imprimirVendaGarantiaTermica/<?php echo $result->idVendas ?>">
                <span class="button__icon"><i class="bx bx-printer"></i></span> <span style="display: inline-flex; align-items:center">Termo de Uso Térmica</span></a>

            <div class="modal-footer" style="display:flex;justify-content: center;padding: 17px 15px 5px;">
                <button class="button btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar"><span class="button__icon"><i class="bx bx-x"></i></span><span class="button__text2">Cancelar</span></button>
            </div>
        </div>
    </div>
</div>

<!-- Fim Modal Imprimir!-->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/vendas/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#abrir-anexo").attr('href', link);
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/vendas/downloadanexoaux/" + id);

        });

        $(document).on('click', '#excluir-anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idVendas ?>"
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

        $("#formAnexos").validate({
            submitHandler: function(form) {
                //var dados = $( form ).serialize();
                var dados = new FormData(form);
                $("#form-anexos").hide('1000');
                $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/Vendas/anexar",
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
    });
</script>