<?php $totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Compra <?php echo $result->idVendas ?> - <?php echo $result->nomeCliente ?></title>    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $this->config->item('app_name') . ' - ' . $this->config->item('app_subname') ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/uploads/favicon/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="invoice-content">
                    <div class="invoice-head">
                        <table class="table">
                            <tbody>
                                <?php if ($emitente == null) { ?>
                                    <tr>
                    <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                        <<<< /td>
                </tr> <?php } else { ?> <tr>

                    <td style="width: 35%"><br><img src=" <?php echo $emitente[0]->url_logo; ?> " style="max-height: 150px" class="center-imprimir"></td>

                    <td><span style="font-size: 15px"><b> <?php echo $emitente[0]->nome; ?></b></span></br>

                        <i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></br>

                        <i class="fas fa-map-marker-alt" style="margin:px 1px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro . ' <br> ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

                        <i class="fas fa-map-marker-alt" style="margin:4px 1px"></i> <?php echo 'Cep: ' . $emitente[0]->cep; ?><br>

                        <i class="fas fa-envelope" style="margin:4px 1px"></i> <?php echo $emitente[0]->email; ?></br>

                        <i class="fas fa-phone-alt" style="margin:4px 1px"></i> <?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?>
                    </td>


                    <td style="text-align: center">
                        <span style="font-size: 10px"><b>Compra Nº: </b><?php echo $result->idVendas ?></span></br>
                        <span style="font-size: 10px"><b>Data da Compra: </b><?php echo date('d/m/Y H:i:s', strtotime($result->dataVenda)); ?> <br>
                            <span style="font-size: 10px"><b>Data da Impressão:</b> <?php echo date('d/m/Y H:i:s') ?></span></br>
                            <?php if ($result->datagarat != null) { ?>
                                <span style="font-size: 10px"><b>Garantia até: </b><?php echo $result->datagarat ?> Dias<?php } ?> <b></b></span></br>
                                <br>
                                <?php if ($result->faturado) : ?>
                                    <span style="font-size: 10px"><b>Entregue e Faturado no dia: </b><?php echo date('d/m/Y', strtotime($result->data_vencimento)); ?><?php endif; ?></span></br>

                    </td>


                </tr>

            <?php } ?>

            <tr>
        </table>

        <br>
        <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">
            <th><span style="font-size: 15px">
                    <center><b>IMPRESSÃO DA COMPRA - ÁREA DO CLIENTE</b></center>
                </span></th>


        </table>
        <br>

        <table width="100%" class="table table-condensend">





            <td>

                <span style="font-size: 13px"><b>Cliente</b></span><br>

                <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $result->documento ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->rua ?>,

                    <?php echo $result->numero ?>,

                    <?php echo $result->bairro ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'Cep: ' . $result->cep ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $result->celular ?></span>
            </td>

            <td>

                <span style="font-size: 13px"><b>Vendedor</b></span><br>

                <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_usuario ?></span><br>

                <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span>


                <?php if ($qrCode) : ?>
            <td style="width: 15%; padding-left: 0"><span style="font-size: 13px"><b>Pague com Pix</b></span><br>
                <img style="margin:12px auto;" src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
            </td>
        <?php endif ?>

        </td>
        </tr>



        </table>

        <?php if ($result->marca != null) { ?>

            <br>

            <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">


                <div class="row-fluid" style="margin-top:0">

                    <div class="span12">

                        <div class="widget-box">

                            <div class="widget-title">



                                <br>
                                <center><span style="font-size: 13px"><b>Produtos</b></span></center>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>




            </table>


            <div style="margin-top: 0; padding-top: 0">

                <table class="table table-condensed" width="100%">
                    <td>
                        <span style="font-size: 13px; ">
                            <b>Marca:</b><br></span>
                        <?php echo htmlspecialchars_decode($result->marca) ?>
                    <?php } ?>
                    </td>

                    <td><?php if ($result->modelo != null) { ?>
                            <span style="font-size: 13px; ">
                                <b>Modelo:</b><br></span>
                            <?php echo htmlspecialchars_decode($result->modelo) ?>
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

                    <td><?php if ($result->perife != null) { ?>
                            <span style="font-size: 13px; ">
                                <b>Periféricos:</b><br></span>
                            <?php echo htmlspecialchars_decode($result->perife) ?>
                        <?php } ?>
                    </td>

                    <td><?php if ($result->secu != null) { ?>
                            <span style="font-size: 13px; ">
                                <b>Senha:</b><br></span>
                            <?php echo htmlspecialchars_decode($result->secu) ?>
                        <?php } ?>
                    </td>

                    </tr>
                </table>

            </div>
            <table width="100%" class="table table-condensed">
                <?php if ($result->rastreio != null) { ?>
                    <tr>
                        <td>
                            <span style="font-size: 12px"><b>Cod. de Rastreio:</b><br></span>
                            <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->rastreio) ?></span>
                        </td>
                    </tr>
                <?php } ?>

                <?php if ($result->descricaoProduto != null) { ?>
                    <tr>
                        <td>
                            <span style="font-size: 11px"><b>Descrição Produto/Serviço:</b><br></span>
                            <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->descricaoProduto) ?></span>
                        </td>
                    </tr>
                <?php } ?>

                <?php if ($result->defeito != null) { ?>
                    <tr>
                        <td>
                            <span style="font-size: 12px"><b>Problema Informado:</b><br></span>
                            <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->defeito) ?></span>
                        </td>
                    </tr>
                <?php } ?>



                <?php if ($result->laudoTecnico != null) { ?>
                    <tr>
                        <td>
                            <span style="font-size: 12px"><b>Relatório Técnico:</b><br></span>
                            <span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->laudoTecnico) ?></span>
                        </td>
                    </tr>
                <?php } ?>

    </div>
    <table width="100%" class="table table-condensed">
        <?php
        foreach ($produtos as $p) { ?>
            <tr>
                <td>
                    <span style="font-size: 11px"><b>Descrição Produto: <?php echo htmlspecialchars_decode($p->descricao) ?> </b><br></span>
                    <span style="font-size: 10px"><?php echo htmlspecialchars_decode($p->descricaoproduto) ?></span>
                </td>
            </tr>
        <?php } ?>

        <td><span style="font-size: 1px"></td>
    </table>

    <?php if ($equipamento != null) { ?>
        <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed" id="tblEquipamento">
            <thead>
                <tr>
                    <th>Periférico</th>
                    <th>Detalhes/Cor</th>
                    <th>Nº Série</th>
                    <th>Voltagem</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <?php

            foreach ($equipamento as $e) {

                echo '<tr>';
                echo '<td><div align="center">' . $e->equipamento . '</div></td>';
                echo '<td><div align="center">' . $e->modelo . '</div></td>';
                echo '<td><div align="center">' . $e->num_serie . '</div></td>';
                echo '<td><div align="center">' . $e->voltagem . '</div></td>';
                echo '<td><div align="center">' . $e->observacao . '</div></td>';
                echo '</tr>';
            } ?>
        </table>
    <?php } ?>

    <?php if ($produtos != null) { ?>
        <br />
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

                $totalProdutos = $totalProdutos + $p->subTotal;
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
                <td colspan="5" style="text-align: right"><strong>Total de Produtos:</strong></td>
                <td><strong>
                        <div align="center">R$: <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div>
                    </strong></td>
            </tr>
        </table>
    <?php } ?>

    <?php if ($servicos != null) { ?>
        <br />
        <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Serviço</th>
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
                $totalServico = $totalServico + $subtotal;
                echo '<tr>';
                echo '<td>' . $s->nome . '</td>';
                echo '<td><div align="center">' . ($s->quantidade ?: 1) . '</div></td>';
                echo '<td><div align="center">R$: ' . $preco . '</div></td>';
                echo '<td><div align="center">R$: ' . number_format($subtotal, 2, ',', '.') . '</div></td>';
                echo '</tr>';
            } ?>

            <tr>
                <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                <td><strong>
                        <div align="center">R$: <?php echo number_format($totalServico, 2, ',', '.'); ?></div>
                    </strong></td>
            </tr>
        </table>



    <?php } ?>
    <?php
    if ($totalProdutos != 0 || $totalServico != 0) {
        echo "<h6 style='text-align: right'>Valor Total R$: " . number_format($totalProdutos, 2, ',', '.') . "</h4>";
        echo "<h6 style='text-align: right'>Desconto R$: " . number_format($result->descontovenda, 2, ',', '.') . "</h6>";
        echo "<h6 style='text-align: right'>Total Com Desconto R$: " . number_format($totalProdutos - $result->descontovenda, 2, ',', '.') . "</h7>";
    } ?><br>



    <br>
    <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">




        <div class="row-fluid" style="margin-top:0">

            <div class="span12">

                <div class="widget-box">

                    <div class="widget-title">



                        <br>
                        <center><span style="font-size: 13px"><b>Termo de Compra</b></span></center>
                        <br>
                    </div>
                </div>
            </div>
        </div>


        <td>

            <?= $configuration['termo_venda'] ?>

        </td>

    </table><br><br><br><br><br>

    <br>
    <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">




        <div class="row-fluid" style="margin-top:0">

            <div class="span12">

                <div class="widget-box">

                    <div class="widget-title">



                        <br>
                        <center><span style="font-size: 13px"><b>Observações para o Cliente</b></span></center>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        </tr>

        </td>

        <center>

            <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->observacoes_cliente) ?></span>

        </center>




        <br><br><br><br>


        </thead>


    </table>



    <br>

    <br>
    <br>


    </div>



    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
        window.print();
    </script>

<center>
<span style="font-size: 12px"><b><?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></b><br></span>

</center>
</body>
<style>
      @page {
              margin: 1.5cm 1cm 1.2cm;
       
         }
</style>

</html>