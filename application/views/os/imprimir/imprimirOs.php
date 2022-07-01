<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>OS <?php echo $result->idOs ?> - <?php echo $result->nomeCliente ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .table {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">
                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<< /td>
                                    </tr> <?php } else { ?> <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 200px" class="center-visualizar"></td>

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




                        <br>



                        <div class="row-fluid" style="margin-top:0">

                            <div class="span12">

                                <div class="widget-box">

                                    <div class="widget-title">



                                        <br>
                                        <center><span style="font-size: 15px"><b>IMPRESSÃO DA ORDEM DE SERVIÇO</b></span></center>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>



                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 43%; padding-left: 0">
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


                                        <?php if ($qrCode) : ?>
                                    <td style="width: 15%; padding-left: 0"><span style="font-size: 13px"><b>Pague com Pix</b></span><br>
                                        <img style="margin:12px auto;" src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                        <center> <span style="font-size: 10px"><b>Chave: </b></span><?= $configuration['pix_key'] ?> </center>
                                    </td>
                                <?php endif ?>


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





                            <!-- Produtos -->


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


                            <!-- end Produtos -->


                            <br>


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

                                        <td colspan="5" style="text-align: right"><strong>Total de Produto:</strong></td>

                                        <td><strong>
                                                <div align="center">R$: <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div>
                                            </strong></td>

                                    </tr>

                                </table>

                            <?php } ?>



                            <?php if ($servicos != null) { ?>





                                <!-- Serviços -->


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


                                <br>

                                <!-- end Serviço -->





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

                                        $totalServico = $totalServico + $subtotal;

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

                            <?php } ?>

                            <?php

                            if ($totalProdutos != 0 || $totalServico != 0) {

                                echo "<h6 style='text-align: right'>Valor Total: R$" . number_format($result->valorTotal, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Desconto de Produto: R$  " . number_format($result->descontoproduto, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Desconto de Serviço: R$ " . number_format($result->descontoservico, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Valor total com Desconto: R$" . number_format($result->valorTotalComDesconto, 2, ',', '.') . "</h6>";;
                            }

                            ?></td>

                            </tr>

                            </table>


                            <br>







                            <br>

                            <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">


                                <br><br><br>

                                <div class="row-fluid" style="margin-top:0">

                                    <div class="span12">

                                        <div class="widget-box">

                                            <div class="widget-title">



                                                <br>
                                                <center><span style="font-size: 15px"><b>Termo de Uso / Garantia</b></span></center>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <br>
                                <td>

                                    <?= $configuration['termo_uso'] ?>

                                </td>

                            </table>



                            <br>

                            <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">

                                <thead>
                                    <br>

                                    <div class="row-fluid" style="margin-top:0">

                                        <div class="span12">

                                            <div class="widget-box">

                                                <div class="widget-title">



                                                    <br>
                                                    <center><span style="font-size: 15px"><b>Outras Informações</b></span></center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <br>


                                    <td><img src="../../../assets/img/OUTRAS.png" id="centro" /></td>





                                </thead>



                            </table>



                            <br>

                            <br>





                            <table width="100%" class="table-condensed">

                                <tr>
                                    <br><br><br><br><br>
                                    <td>
                                        <div style="font-size: 10px" align="center"><b>Assinatura do Atendente</b></div>

                                        <div style="font-size: 11px" align="center"><?php echo $result->nome ?></div>

                                        <hr>
                                    </td>


                                    <?php if ($result->tecnicores != null) { ?>

                                        <td>
                                            <div style="font-size: 11px" align="center"><b>Assinatura do Técnico</b></div>

                                            <div style="font-size: 11px" align="center"><?php echo htmlspecialchars_decode($result->tecnicores) ?></div>

                                            <hr>
                                        </td>

                                    <?php } ?>



                                    <td>
                                        <div style="font-size: 10px" align="center"><b>Assinatura do Cliente</b></div>

                                        <div style="font-size: 11px" align="center"><?php echo $result->nomeCliente ?></div>

                                        <hr>
                                    </td>

                                </tr>





                            </table>

                    </div>







                    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

                    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>



                    <script>
                        window.print();
                    </script>

                    <center>
                        <span style="font-size: 12px"><b>CG Sistema - Todos direitos reservados Acesse: https://cgsistema.com.br</b><br></span>

                    </center>
</body>

<style>
    @page {
        margin: 1.5cm 1cm 1.2cm;

    }
</style>

</html>