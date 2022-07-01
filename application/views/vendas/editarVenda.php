<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>


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
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Editar Venda</h5>
                <div class="buttons">

                    <a href="<?php echo base_url() ?>index.php/vendas/visualizar/<?php echo $result->idVendas; ?>" class="button btn btn-primary">
                        <span class="button__icon"><i class="bx bx-show"></i></span><span class="button__text2">Visualizar</span></a>

                    <?php if ($result->faturado == 0) { ?>

                        <a href="#modal-lancar" id="btn-lancar" role="button" data-toggle="modal" class="button btn btn-mini btn-danger">
                            <span class="button__icon"><i class='bx bx-dollar'></i></span> <span class="button__text">Lançar</span></a>
                    <?php
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

                    <a title="Enviar por E-mail" class="button btn btn-mini btn-warning" href="<?php echo site_url() ?>/vendas/enviar_email/<?php echo $result->idVendas; ?>"><span class="button__icon"><i class="bx bx-envelope"></i></span> <span class="button__text">Enviar por E-mail</span></a>
                </div>
            </div>

            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da Venda</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Produtos</a></li>
                        <li id="tabAnexos"><a href="#tab5" data-toggle="tab">Anexos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divEditarVenda">
                                <form action="<?php echo current_url(); ?>" method="post" id="formVendas">
                                    <?php echo form_hidden('idVendas', $result->idVendas) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>Venda:
                                            <?php echo $result->idVendas ?>
                                        </h3>
                                        <div class="span2" style="margin-left: 0">
                                            <label for="dataFinal">Data da Venda</label>
                                            <input id="dataVenda" autocomplete="off" class="span12" readonly type="text" name="dataVenda" readonly value="<?php echo date('d/m/Y H:i:s', strtotime($result->dataVenda)); ?>" />
                                        </div>
                                        <div class="span5">
                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" placeholder="Obs: Nome do cliente já cadastrado" />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>" />
                                            <input id="valorTotal" type="hidden" name="valorTotal" value="" />
                                        </div>
                                        <div class="span5">
                                            <label for="tecnico">Vendedor<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" readonly type="text" name="tecnico" value="<?php echo $result->nome ?>" placeholder="Obs: Nome do Atendente Logado" />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>" />
                                        </div>
                                    </div>


                                    <br><br>

                                    <div class="row-fluid" style="margin-top:0">

                                        <div class="span12">

                                            <div class="widget-box">

                                                <div class="widget-title">



                                                    <br>
                                                    <center><span style="font-size: 15px"><b>Formas de Pagamento / Garantia</b></span></center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- Div campo forma de pagamento -->
                                    <div class="span3">

                                        <label for="formaPgto">Forma de Pagamento</label>
                                        <select name="formaPgto" id="formaPgto" class="span8">




                                            <option <?php if ($result->formaPgto == '') {
                                                        echo 'selected';
                                                    } ?> value=""></option>
                                            <option <?php if ($result->formaPgto == 'Dinheiro') {
                                                        echo 'selected';
                                                    } ?> value="Dinheiro">Dinheiro</option>
                                            <option <?php if ($result->formaPgto == 'Cartão de Crédito') {
                                                        echo 'selected';
                                                    } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                                            <option <?php if ($result->formaPgto == 'Débito') {
                                                        echo 'selected';
                                                    } ?> value="Débito">Débito</option>
                                            <option <?php if ($result->formaPgto == 'Boleto') {
                                                        echo 'selected';
                                                    } ?> value="Boleto">Boleto</option>
                                            <option <?php if ($result->formaPgto == 'Depósito') {
                                                        echo 'selected';
                                                    } ?> value="Depósito">Depósito</option>
                                            <option <?php if ($result->formaPgto == 'Pix') {
                                                        echo 'selected';
                                                    } ?> value="Pix">Pix</option>
                                            <option <?php if ($result->formaPgto == 'Cheque') {
                                                        echo 'selected';
                                                    } ?> value="Cheque">Cheque</option>








                                        </select>



                                    </div>
                                    <!-- fim campo forma de pagamento -->

                                    <!-- Div campo parcelamento -->

                                    <div class="span2">
                                        <label for="formaparcel">Parcelamento</label>
                                        <select name="formaparcel" id="formaparcel" class="span6">


                                            <option <?php if ($result->formaparcel == '') {
                                                        echo 'selected';
                                                    } ?> value=""></option>
                                            <option <?php if ($result->formaparcel == 'Avista') {
                                                        echo 'selected';
                                                    } ?> value="Avista">A vista</option>
                                            <option <?php if ($result->formaparcel == 'x1') {
                                                        echo 'selected';
                                                    } ?> value="x1">x1</option>
                                            <option <?php if ($result->formaparcel == 'x2') {
                                                        echo 'selected';
                                                    } ?> value="x2">x2</option>
                                            <option <?php if ($result->formaparcel == 'x3') {
                                                        echo 'selected';
                                                    } ?> value="x3">x3</option>
                                            <option <?php if ($result->formaparcel == 'x4') {
                                                        echo 'selected';
                                                    } ?> value="x4">x4</option>
                                            <option <?php if ($result->formaparcel == 'x5') {
                                                        echo 'selected';
                                                    } ?> value="x5">x5</option>
                                            <option <?php if ($result->formaparcel == 'x6') {
                                                        echo 'selected';
                                                    } ?> value="x6">x6</option>
                                            <option <?php if ($result->formaparcel == 'x7') {
                                                        echo 'selected';
                                                    } ?> value="x7">x7</option>
                                            <option <?php if ($result->formaparcel == 'x8') {
                                                        echo 'selected';
                                                    } ?> value="x8">x8</option>
                                            <option <?php if ($result->formaparcel == 'x9') {
                                                        echo 'selected';
                                                    } ?> value="x9">x9</option>
                                            <option <?php if ($result->formaparcel == 'x10') {
                                                        echo 'selected';
                                                    } ?> value="x10">x10</option>
                                            <option <?php if ($result->formaparcel == 'x11') {
                                                        echo 'selected';
                                                    } ?> value="x11">x11</option>
                                            <option <?php if ($result->formaparcel == 'x12') {
                                                        echo 'selected';
                                                    } ?> value="x12">x12</option>


                                        </select>



                                    </div>


                                    <div class="span2">
                                        <label for="descontovenda">Desconto</label>
                                        <?php echo "R$: " ?>
                                        <input id="descontovenda" class="span5" name="descontovenda" class="money" value="<?php echo number_format($result->descontovenda, 2, ',', '.'); ?>" />
                                    </div>


                                    <!-- fim campo parcelamento -->

                                    <div class="span2">
                                        <label for="datagarat">Garantia Em Dias</label>
                                        <input id="datagarat" type="text" class="span5" name="datagarat" maxlength="30" value="<?php echo $result->datagarat ?>" />
                                    </div>

                                    <br><br><br>

                                    <br><br>


                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                            <h5>
                                                <center>Observações para a Loja</center>
                                            </h5>
                                        </label>
                                        <textarea class="editor" name="observacoes" id="observacoes" cols="30" rows="5" placeholder="Ex. Aqui pode ser colocado obs. da qual o cliente não tem acesso: Exemplo: Link de um produto (que será pedido via internet) Mercado livre, Exemplo: um teclado ou bateria de um notebook!, entre outras..."><?php echo $result->observacoes ?></textarea>
                                    </div>

                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes_cliente">
                                            <h5>
                                                <center>Observações para o Cliente</center>
                                            </h5>
                                        </label>
                                        <textarea class="editor" name="observacoes_cliente" id="observacoes_cliente" cols="30" rows="5" placeholder="Ex. Aqui pode ser colocado obs. da qual o cliente tem acesso: Exemplo: Informações de uso correto do equipamento, prazo para proxima manutenção, e muito mais..."><?php echo $result->observacoes_cliente ?></textarea>
                                    </div>

                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="display:flex;justify-content: center">

                                            <button class="button btn btn-primary" id="btnContinuar">
                                                <span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>

                                            <a href="<?php echo base_url() ?>index.php/vendas" class="button btn btn-warning">
                                                <span class="button__icon"><i class="bx bx-undo"></i></span> <span class="button__text2">Voltar</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="span12 well" style="padding: 1%; margin-left: 0">
                                <div class="span11">
                                    <form id="formProdutos" action="<?php echo base_url(); ?>index.php/vendas/adicionarProduto" method="post">
                                        <div class="span6">
                                            <input type="hidden" name="idProduto" id="idProduto" />
                                            <input type="hidden" name="idVendasProduto" id="idVendasProduto" value="<?php echo $result->idVendas ?>" />
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
                                            <label for="">&nbsp</label>
                                            <button class="button btn btn-success" id="btnAdicionarProduto">
                                                <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Adicionar</span></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="span12" id="divProdutos" style="margin-left: 0">
                                    <table class="table table-bordered" id="tblProdutos">
                                        <thead>
                                            <tr>
                                                <th>Produto</th>
                                                <th width="8%">Quantidade</th>
                                                <th width="10%">Preço</th>
                                                <th width="6%">Ações</th>
                                                <th width="10%">Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($produtos as $p) {
                                                $preco = $p->preco ?: $p->precoVenda;
                                                $total = $total + $p->subTotal;
                                                echo '<tr>';
                                                echo '<td>' . $p->descricao . '</td>';
                                                echo '<td><div align="center">' . $p->quantidade . '</td>';
                                                echo '<td><div align="center">R$: ' . $preco . '</td>';
                                                echo '<td><div align="center"><a href="" idAcao="' . $p->idItens . '" prodAcao="' . $p->idProdutos . '" quantAcao="' . $p->quantidade . '" title="Excluir Produto" class="btn-nwe4"><i class="bx bx-trash-alt"></i></a></td>';
                                                echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                                echo '</tr>';
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                                <td>
                                                    <div align="center"><strong>R$: <?php echo number_format($total, 2, ',', '.'); ?></strong></div> <input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>">
                                                </td>
                                            </tr>


                                            <?php if ($result->descontovenda != 0 && $result->descontovenda != 0) {
                                            ?>
                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Desconto:</strong></td>
                                                    <td>
                                                        <div align="center"><strong>R$: <?php echo number_format($result->descontovenda, 2, '.', ','); ?> </strong></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Total Com Desconto:</strong></td>
                                                    <td>
                                                        <div align="center"><strong>R$: <?php echo number_format($total - $result->descontovenda, 2, ',', '.'); ?></strong></div><input type="hidden" id="total-desconto" value="<?php echo number_format($result->valor_desconto, 2); ?>">
                                                        <br><br><br><br><br>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>





                                            <?php if ($result->descontovenda == 0 && $result->descontovenda == 0) {
                                            ?>
                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Desconto:</strong></td>
                                                    <td>
                                                        <div align="center"><strong>R$: <?php echo number_format($result->descontovenda, 2, '.', ','); ?> </strong></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Total Com Desconto:</strong></td>
                                                    <td>
                                                        <div align="center"><strong>R$: <?php echo number_format($total - $result->descontovenda, 2, ',', '.'); ?></strong></div><input type="hidden" id="total-desconto" value="<?php echo number_format($result->valor_desconto, 2); ?>">
                                                        <br><br><br><br><br>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>







                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="tab5">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                    <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" s method="post">
                                        <div class="span10">
                                            <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idVendas; ?>" />
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

                    </div>
                    &nbsp
                </div>
            </div>
        </div>
    </div>
</div>

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


<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formFaturar" action="<?php echo current_url() ?>" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Faturar Venda</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
            <div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição</label>
                <input class="span12" id="descricao" type="text" name="descricao" value="Fatura de Venda Nº: <?php echo $result->idVendas; ?> " />
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente*</label>
                    <input class="span12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="vendas_id" id="vendas_id" value="<?php echo $result->idVendas; ?>">
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span5" style="margin-left: 0">
                    <input type="hidden" id="tipo" name="tipo" value="receita" />

                    <?php if ($result->descontovenda == 0 && $result->descontovenda == 0) {
                    ?>
                        <label for="valor">Valor Com Desconto*</label>
                        <input class="span12 money" id="faturar-desconto" type="text" name="valor" value="<?php echo  number_format($total - $result->descontovenda, 2, ',', '.'); ?> " />
                    <?php
                    } ?>

                    <?php if ($result->descontovenda != 0 && $result->descontovenda != 0) {
                    ?>
                        <label for="valor">Valor Com Desconto*</label>
                        <input class="span12 money" id="faturar-desconto" type="text" name="valor" value="<?php echo number_format($total - $result->descontovenda, 2, '.', ''); ?> " />
                    <?php
                    } ?>

                </div>

                <div class="span5" style="margin-left: 2">
                    <label for="valor">Valor Total*</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita" />
                    <input class="span12 money" id="faturar-desconto" type="text" name="faturar-desconto" value="<?php echo number_format($total, 2, '.', ''); ?> " />
                </div>
            </div>

            <div class="span12" style="margin-left: 0">

                <label for="observacoes">Detalhes de como foi Pago</label>

                <textarea class="span12" id="observacoes" name="observacoes"><?php echo "Valor Total R$: " . number_format($total, 2, '.', ''); ?>, <?php echo "Desconto Produto R$: " . number_format($result->descontovenda, 2, '.', ''); ?>, <?php echo "Forma de Pagamento: " . $result->formaPgto . "";  ?>  <?php echo "" . $result->formaparcel . "";  ?> </textarea>

            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="vencimento">Data Entrada*</label>
                    <input class="span12 datepicker" autocomplete="off" id="vencimento" type="text" name="vencimento" />
                </div>
                <div class="span4">
                    <label for="recebimento">Data Recebimento</label>
                    <input class="span12 datepicker" autocomplete="off" id="recebimento" type="text" name="recebimento" />
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebido">Recebido?</label>
                    &nbsp &nbsp &nbsp &nbsp<input id="recebido" type="checkbox" name="recebido" value="1" />
                </div>
                <div id="divRecebimento" class="span8" style=" display: none">

                </div>
            </div>
        </div>
        <div class="modal-footer" style="display:flex">
            <button class="button btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar"><span class="button__icon"><i class="bx bx-x"></i></span><span class="button__text2">Cancelar</span></button>
            <button class="button btn btn-danger"><span class="button__icon"><i class='bx bx-dollar'></i></span> <span class="button__text2">Faturar</span></button>
        </div>
    </form>
</div>

<?= $modalGerarPagamento ?>

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


<!-- Modal Lançamento-->
<div id="modal-lancar" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formLancar" action="<?php echo base_url() ?>index.php/vendas/aplicar" method="post">
        <div class="modal-header">
            <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Lançar Venda</h3>
        </div>
        <div id='divAplicar' class="modal-body">

            <div class="span6" style="margin-left:0">
                <label for="garantia">Dias de Garantia</label>
                <input id="garantia" placeholder="Ex. 30 ou 90" class="span5" type="text" name="garantia" value="<?php echo $result->garantia ?>"> Dias
                <br>
            </div>
            <div class="span12" style="color: red; font-weight: bold; display:none;" id="errorAlert"></div>

            <div class="span8" style="margin-left:0; margin-top:10px">
                <div class="span6" style="margin-left:0">
                    <label for="descontoproduto">Descontos de Produtos</label>
                    <input id="descontoproduto" class="span8" name="descontoproduto" class="money" value="<?php echo number_format($result->descontoTotal, 2, '.', '.') ?>" />

                    <input type="hidden" name="idVendas" id="idVendas" value="<?php echo $result->idVendas; ?>">
                </div>
                <div class="span6" style="margin-left:0">
                    <label for="totalprodutos" s>Total de Produtos</label>
                    <input style="margin:0" id="totalprodutos" class="span6" readonly type="text" name="totalprodutos" class="money" data-total="<?php echo $result->valorTotalSemDesconto ?>" value="<?php echo number_format($result->valorTotalComDesconto, 2, '.', ',') ?>" />
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
                    <label for="formaPgto">Forma de Pagamento</label>
                    <select name="formaPgto" id="formaPgto" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgto == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgto == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgto == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgto == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgto == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgto == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgto == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgto == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>

                </div>

                <div id="parcela" class="span4" style="margin-left:0;">
                    <label for="parcel">Parcelamento</label>
                    <select name="parcel" id="parcel" class="span10" style="margin:0">


                        <option <?php if ($result->parcel == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcel == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcel == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcel == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcel == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcel == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcel == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcel == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcel == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcel == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcel == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcel == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcel == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcel == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>

                    </select>

                    </center>
                </div>

            </div>

            <div id="formap2" class="span8" style="margin-left:0; display:none; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgto2">Forma de Pagamento</label>
                    <select name="formaPgto2" id="formaPgto2" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgto2 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgto2 == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgto2 == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgto2 == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgto2 == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgto2 == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgto2 == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgto2 == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>
                </div>

                <div id="parcela2" class="span4" style="margin-left:0; display:none;">
                    <label for="parcel2">Parcelamento</label>
                    <select name="parcel2" id="parcel2" class="span10" style="margin:0">


                        <option <?php if ($result->parcel2 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcel2 == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcel2 == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcel2 == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcel2 == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcel2 == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcel2 == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcel2 == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcel2 == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcel2 == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcel2 == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcel2 == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcel2 == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcel2 == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>


                    </select>
                </div>
            </div>

            <div id="formap3" class="span8" style="margin-left:0; display:none; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgto3">Forma de Pagamento</label>
                    <select name="formaPgto3" id="formaPgto3" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgto3 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgto3 == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgto3 == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgto3 == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgto3 == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgto3 == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgto3 == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgto3 == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>
                </div>

                <div id="parcela3" class="span4" style="margin-left:0; display:none;">
                    <label for="parcel3">Parcelamento</label>
                    <select name="parcel3" id="parcel3" class="span10" style="margin:0">
                        <option <?php if ($result->parcel3 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcel3 == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcel3 == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcel3 == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcel3 == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcel3 == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcel3 == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcel3 == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcel3 == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcel3 == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcel3 == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcel3 == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcel3 == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcel3 == 'x12') {
                                    echo 'selected';
                                } ?> value="x12">x12</option>
                    </select>
                </div>
            </div>

            <div id="formap4" class="span8" style="margin-left:0;display:none; margin-top:10px">
                <div class="span6" style="margin-left:0;">
                    <label for="formaPgto4">Forma de Pagamento</label>
                    <select name="formaPgto4" id="formaPgto4" class="span10" style="margin:0; padding:0">
                        <option <?php if ($result->formaPgto4 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->formaPgto4 == 'Dinheiro') {
                                    echo 'selected';
                                } ?> value="Dinheiro">Dinheiro</option>
                        <option <?php if ($result->formaPgto4 == 'Cartão de Crédito') {
                                    echo 'selected';
                                } ?> value="Cartão de Crédito">Cartão de Crédito</option>
                        <option <?php if ($result->formaPgto4 == 'Débito') {
                                    echo 'selected';
                                } ?> value="Débito">Débito</option>
                        <option <?php if ($result->formaPgto4 == 'Boleto') {
                                    echo 'selected';
                                } ?> value="Boleto">Boleto</option>
                        <option <?php if ($result->formaPgto4 == 'Depósito') {
                                    echo 'selected';
                                } ?> value="Depósito">Depósito</option>
                        <option <?php if ($result->formaPgto4 == 'Pix') {
                                    echo 'selected';
                                } ?> value="Pix">Pix</option>
                        <option <?php if ($result->formaPgto4 == 'Cheque') {
                                    echo 'selected';
                                } ?> value="Cheque">Cheque</option>
                    </select>
                </div>

                <div id="parcela4" class="span4" style="margin-left:0; display:none">
                    <label for="parcel4">Parcelamento</label>
                    <select name="parcel4" id="parcel4" class="span10" style="margin:0">
                        <option <?php if ($result->parcel4 == '') {
                                    echo 'selected';
                                } ?> value=""></option>
                        <option <?php if ($result->parcel4 == 'Avista') {
                                    echo 'selected';
                                } ?> value="Avista">A vista</option>
                        <option <?php if ($result->parcel4 == 'x1') {
                                    echo 'selected';
                                } ?> value="x1">x1</option>
                        <option <?php if ($result->parcel4 == 'x2') {
                                    echo 'selected';
                                } ?> value="x2">x2</option>
                        <option <?php if ($result->parcel4 == 'x3') {
                                    echo 'selected';
                                } ?> value="x3">x3</option>
                        <option <?php if ($result->parcel4 == 'x4') {
                                    echo 'selected';
                                } ?> value="x4">x4</option>
                        <option <?php if ($result->parcel4 == 'x5') {
                                    echo 'selected';
                                } ?> value="x5">x5</option>
                        <option <?php if ($result->parcel4 == 'x6') {
                                    echo 'selected';
                                } ?> value="x6">x6</option>
                        <option <?php if ($result->parcel4 == 'x7') {
                                    echo 'selected';
                                } ?> value="x7">x7</option>
                        <option <?php if ($result->parcel4 == 'x8') {
                                    echo 'selected';
                                } ?> value="x8">x8</option>
                        <option <?php if ($result->parcel4 == 'x9') {
                                    echo 'selected';
                                } ?> value="x9">x9</option>
                        <option <?php if ($result->parcel4 == 'x10') {
                                    echo 'selected';
                                } ?> value="x10">x10</option>
                        <option <?php if ($result->parcel4 == 'x11') {
                                    echo 'selected';
                                } ?> value="x11">x11</option>
                        <option <?php if ($result->parcel4 == 'x12') {
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

<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
    $("#quantidade").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    function calcDesconto(valor, desconto) {

        var resultado = (valor - desconto).toFixed(2);
        return resultado;
    }

    function validarDesconto(resultado, valor) {
        if (resultado == valor) {
            return resultado = "";
        } else {
            return resultado.toFixed(2);
        }
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
        var parcela2 = document.getElementById("parcela2");
        var parcela3 = document.getElementById("parcela3");
        var parcela4 = document.getElementById("parcela4");

        if (quantPgto.value == "1") {
            formap2.style.display = "none"
            formap3.style.display = "none"
            formap4.style.display = "none"
            parcela2.style.display = "none"
            parcela3.style.display = "none"
            parcela4.style.display = "none"
        }
        if (quantPgto.value == "2") {
            formap2.style.display = "block"
            parcela2.style.display = "block"
            formap3.style.display = "none"
            parcela3.style.display = "none"
            formap4.style.display = "none"
            parcela4.style.display = "none"
        }
        if (quantPgto.value == "3") {
            formap2.style.display = "block"
            parcela2.style.display = "block"
            formap3.style.display = "block"
            parcela3.style.display = "block"
            formap4.style.display = "none"
            parcela4.style.display = "none"
        }
        if (quantPgto.value == "4") {
            formap2.style.display = "block"
            parcela2.style.display = "block"
            formap3.style.display = "block"
            parcela3.style.display = "block"
            formap4.style.display = "block"
            parcela4.style.display = "block"
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
            $('#parcela2').hide();
            $('#parcela3').hide();
            $('#parcela4').hide();
            $('#quantPgto').val("1")
        }
    };

    var valorBackup = $("#total-venda").val();

    $(document).on('click', '#btn-faturar', function(event) {
        event.preventDefault();
        $('#modal-lancar').modal('toggle')
        $('#modal-faturar').modal('toggle')
    });

    $("#desconto").keyup(function() {

        this.value = this.value.replace(/[^0-9.]/g, '');
        if ($('#desconto').val() > 100) {
            $('#errorAlert').text('Desconto não pode ser maior de 100%.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $("#desconto").focus();
        }
        if ($("#total-venda").val() == null || $("#total-venda").val() == '') {
            $('#errorAlert').text('Valor não pode ser apagado.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
            $("#total-venda").val(valorBackup);
            $("#desconto").focus();

        } else if (Number($("#desconto").val()) >= 0) {
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
        } else {
            $('#errorAlert').text('Erro desconhecido.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
        }
    });

    $("#total-venda").focusout(function() {
        $("#total-venda").val(valorBackup);
        if ($("#total-venda").val() == '0.00' && $('#resultado').val() != '') {
            $('#errorAlert').text('Você não pode apagar o valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
            $("#total-venda").val(valorBackup);
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
            $("#desconto").focus();
        } else {
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
        }
    });

    $('#resultado').focusout(function() {
        if (Number($('#resultado').val()) > Number($("#total-venda").val())) {
            $('#errorAlert').text('Desconto não pode ser maior que o Valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
        }
        if ($("#desconto").val() != "" || $("#desconto").val() != null) {
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
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

                $('#btn-cancelar-faturar').trigger('click');

                if (qtdProdutos <= 0) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Não é possível faturar uma venda sem produtos"
                    });
                } else if (qtdProdutos > 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/vendas/faturar",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.reload(true);
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar faturar venda."
                                });
                                $('#progress-fatura').hide();
                            }
                        }
                    });

                    return false;
                }
            }
        });

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

        $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProdutoSaida",
            minLength: 2,
            select: function(event, ui) {
                $("#idProduto").val(ui.item.id);
                $("#estoque").val(ui.item.estoque);
                $("#preco").val(ui.item.preco);
                $("#quantidade").focus();
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
        $("#formVendas").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataVenda: {
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
                dataVenda: {
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
                    required: 'Insira o preço'
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
                        type: "warning",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/vendas/adicionarProduto",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $("#divAplicar").load("<?php echo current_url(); ?> #divAplicar");
                                $("#divLancar").load("<?php echo current_url(); ?> #divLancar");
                                $("#quantidade").val('');
                                $("#preco").val('');
                                $("#produto").val('').focus();
                                $("#resultado").val("");
                                $("#desconto").val("");
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    html: "Ocorreu um erro ao tentar adicionar produto. <br /><br />Error: " + data.messages
                                });
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $('#formProdutos')[0].reset();
                            }
                        }
                    });
                    return false;
                }
            }
        });
        $(document).on('click', 'a', function(event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            if ((idProduto % 1) == 0) {
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/vendas/excluirProduto",
                    data: "idProduto=" + idProduto + "&idVendas=" + <?= $result->idVendas ?> + "&quantidade=" + quantidade + "&produto=" + produto,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#resultado").val("");
                            $("#desconto").val("");
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                html: "Ocorreu um erro ao tentar excluir produto." + data.messages
                            });
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                        }
                    }
                });
                return false;
            }
        });


        $('#formLancar').submit(function(e) {
            e.preventDefault();
            if ($('#quantPgto').val() == 1) {
                $('#formaPgto2').val('')
                $('#formaPgto3').val('')
                $('#formaPgto4').val('')
                $('#parcela2').val('')
                $('#parcela3').val('')
                $('#parcela4').val('')
            }
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


        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>