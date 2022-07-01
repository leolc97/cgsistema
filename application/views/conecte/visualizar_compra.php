<center><b>
        <h4>Minha Compra - <?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></h4>
    </b></center>


<div class="quick-actions_homepage">
    <ul class="cardBox">

        <li class="card" style="justify-content: space-around"> <a href="<?php echo base_url() ?>index.php/mine/painel"><i class='bx bx-home iconBx'></i>
                <div style="font-size: 1.2em" class="numbers">Inicio</div>
            </a>
        </li>

        <li class="card" style="justify-content: space-around"> <a href="<?php echo base_url() ?>index.php/mine/os"><i class='bx bx-spreadsheet iconBx'></i>
                <div style="font-size: 1.2em" class="numbers">Ordens de Serviço</div>
            </a>
        </li>

        <li class="card" style="justify-content: space-around"> <a href="<?php echo base_url() ?>index.php/mine/compras"><i class='bx bx-cart-alt iconBx'></i>
                <div style="font-size: 1.2em" class="numbers">Compras</div>
            </a></li>
        <li class="card" style="justify-content: space-around"> <a href="<?php echo base_url() ?>index.php/mine/conta"><i class='bx bx-user-circle iconBx'></i>
                <div style="font-size: 1.2em" class="numbers">Minha Conta</div>
            </a></li>
    </ul>
</div>


<?php $totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <h5>Compra</h5>
                <div class="buttons">



                    <a id="imprimir" target="_blank" title="Imprimir" class="button btn btn-mini btn-inverse" href="<?php echo site_url(); ?>/mine/imprimirCompra/<?php echo $result->idVendas; ?>"><span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir Compra</span></a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head">
                        <table class="table">
                            <tbody>

                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Os dados do emitente não foram configurados. </td>
                                    </tr>
                                <?php
                                } else { ?>
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

                                    <td style="width: 26%; text-align: center"><b>#Compra: </b><span>
                                            <?php echo $result->idVendas ?></span></br> </br> <span><b>Data da Visualização: </b>
                                            <?php echo date('d/m/Y H:i:s'); ?></span>
                                        <br>
                                        <span style="font-size: 12px"><b>Data da Compra: </b><?php echo date('d/m/Y H:i:s', strtotime($result->dataVenda)); ?> <br>
                                            <?php if ($result->datagarat != null) { ?>
                                                <span style="font-size: 12px"><b>Garantia até: </b><?php echo $result->datagarat ?> Dias <?php } ?><b></b></span></br>
                                                <?php if ($result->faturado) : ?>
                                                    <br>
                                                    <b>Entregue e Faturado no dia: </b>
                                                    <?php echo date('d/m/Y', strtotime($result->data_vencimento)); ?>
                                                <?php endif; ?>
                                    </td>
                                <?php
                                } ?>
                            </tbody>
                        </table>

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
                                                    <td colspan="4" style="text-align: right"><strong>Total de Produto:</strong></td>
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
                                </table>

                    </div>


                </div>
            </div>
        </div>
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
</div>

<?= $modalGerarPagamento ?>



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
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a target="_blank" class="btn" id="abrir-anexo">Visualizar</a>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
    </div>
</div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/vendas/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#abrir-anexo").attr('href', link);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/vendas/downloadanexoaux/" + id);

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