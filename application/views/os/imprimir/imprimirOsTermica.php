<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>OS <?php echo $result->idOs ?> <?php echo $result->nomeCliente ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .table {

            width: 70mm;
            margin: auto;
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


                                    <td colspan="1" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                        <<< <?php } else { ?> <td colspan="1"> <span style="font-size: 5px; ">

                                                <CENTER> <img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 100px" class="center-visualizar"></CENTER>
                                                <br>
                                                <span style="font-size: 17px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

                                                <span style="font-size: 12px"><?php echo $emitente[0]->cnpj; ?></span></br>

                                                <span style="font-size: 12px"><?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

                                                <span style="font-size: 12px"><?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

                                                    <span style="font-size: 12px"><?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

                                                    <span style="font-size: 12px"><?php echo $emitente[0]->email; ?></span></br>

                                                    <span style="font-size: 12px"><?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span>
                                    </td>


                                    </tr>

                                    <td>


                                        <span style="font-size: 13px"><b>Ordem de Serviço N°: </b><span><?php echo $result->idOs ?></span></br>


                                            <span style="font-size: 12px"><b>Status OS: </b><?php echo $result->status ?></span></br>

                                            <span style="font-size: 12px"><b>Data de Entrada: </b><?php echo date('d/m/Y H:i:s', strtotime($result->dataInicial)); ?></span></br>

                                            <span style="font-size: 12px"><b>Data Final do Orçamento: </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></span></br>

                                            <?php if ($result->dataSaida != null) { ?>

                                                <span style="font-size: 12px"><b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?> <b>ás:</b> <?php echo $result->horasaida ?> <?php } ?></span><br>


                                                <?php if ($result->garantia != null) { ?>

                                                    <span style="font-size: 12px"><b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?> Dias<?php } ?></span>
                                    </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                            <center> <span style="font-size: 13px"><b>Cliente</b></span></center>

                                            <span style="font-size: 12px"><?php echo $result->nomeCliente ?></span><br>

                                            <span style="font-size: 12px"><?php echo $result->documento ?></span><br>

                                            <span style="font-size: 12px"><?php echo $result->rua ?>,

                                                <span style="font-size: 12px"><?php echo $result->numero ?>,

                                                    <span style="font-size: 12px"><?php echo $result->bairro ?></span>

                                                    <span style="font-size: 12px"><?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br>

                                                    <span style="font-size: 12px"><?php echo 'CEP: ' . $result->cep ?></span><br>

                                                    <span style="font-size: 12px"><?php echo 'Whatsapp: ' . $result->celular ?></span><br>

                                                    <br>

                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <center> <span style="font-size: 13px"><b>Todas informações e detalhes do Equipamento</b></span></center>
                                    </td>
                                </tr>




                                <tr>
                                    <td>
                                        <?php if ($result->tipoeq != null) { ?><span style="font-size: 12px; "><b>Tipo do Equipamento:</b><br></span> <?php echo htmlspecialchars_decode($result->tipoeq) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->marca != null) { ?><span style="font-size: 12px; "><b>Marca:</b><br></span> <?php echo htmlspecialchars_decode($result->marca) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->modeloeq != null) { ?><span style="font-size: 12px; "><b>Modelo:</b><br></span> <?php echo htmlspecialchars_decode($result->modeloeq) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->cor != null) { ?><span style="font-size: 12px; "><b>Cor:</b><br></span> <?php echo htmlspecialchars_decode($result->cor) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->serial != null) { ?><span style="font-size: 12px; "><b>Serial:</b><br></span> <?php echo htmlspecialchars_decode($result->serial) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->secu != null) { ?><span style="font-size: 12px; "><b>Senha:</b><br></span> <?php echo htmlspecialchars_decode($result->secu) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->perife != null) { ?><span style="font-size: 12px; "><b>Periféricos:</b><br></span> <?php echo htmlspecialchars_decode($result->perife) ?>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->rastreio != null) { ?><span style="font-size: 12px"><b>Cod. de Rastreio:</b><br></span><span style="font-size: 12px"><?php echo htmlspecialchars_decode($result->rastreio) ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->descricaoProduto != null) { ?><span style="font-size: 12px"><b>Descrição: </b><?php echo htmlspecialchars_decode($result->descricaoProduto) ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->defeito != null) { ?><span style="font-size: 12px"><b>Problema Informado: </b><?php echo htmlspecialchars_decode($result->defeito) ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->observacoes != null) { ?><span style="font-size: 12px"><b>Anotações: </b><?php echo htmlspecialchars_decode($result->observacoes) ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($result->laudoTecnico != null) { ?><span style="font-size: 12px"><b>Laudo Técnico: </b><?php echo htmlspecialchars_decode($result->laudoTecnico) ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>



                                <tr>
                                    <td>
                                        <center> <span style="font-size: 13px"><b>Produtos</b></span></center>
                                    </td>
                                </tr>


                                <?php if ($produtos != null) { ?>

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
                                    <?php } ?>


                                    <?php if ($produtos != null) { ?><br />
                                        <table style='font-size: 12px;' class="table table-bordered table-condensed" id="tblProdutos">
                                            <thead>
                                                <tr>
                                                    <th>Qtd.</th>
                                                    <th>Produto</th>
                                                    <th>Preço unit.</th>
                                                    <th>Sub-total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                foreach ($produtos as $p) {
                                                    $totalProdutos = $totalProdutos + $p->subTotal;
                                                    echo '<tr>';
                                                    echo '<td>' . $p->quantidade . '</td>';
                                                    echo '<td>' . $p->descricao . '</td>';
                                                    echo '<td>R$ ' . $p->preco ?: $p->precoVenda . '</td>';

                                                    echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                                    echo '</tr>';
                                                } ?>

                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Total Produtos R$: <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                                    <?php if ($servicos != null) { ?>
                                        <table style='font-size: 12px;' class="table table-bordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Qtd.</th>
                                                    <th>Serviço</th>
                                                    <th>Preço unit.</th>
                                                    <th>Sub-total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                setlocale(LC_MONETARY, 'en_US');
                                                foreach ($servicos as $s) {
                                                    $preco = $s->preco ?: $s->precoVenda;
                                                    $subtotal = $preco * ($s->quantidade ?: 1);
                                                    $totalServico = $totalServico + $subtotal;
                                                    echo '<tr>';
                                                    echo '<td>' . ($s->quantidade ?: 1) . '</td>';
                                                    echo '<td>' . $s->nome . '</td>';
                                                    echo '<td>R$ ' . $preco . '</td>';
                                                    echo '<td>R$ ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                                    echo '</tr>';
                                                } ?>

                                                <tr>
                                                    <td colspan="4" style="text-align: right"><strong>Total Serviços R$: <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></td><br>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                                    <table class="table table-bordered table-condensed">
                                        <tbody>
                                            <tr>
                                                <td colspan="5"> <?php
                                                                    if ($totalProdutos != 0 || $totalServico != 0) {
                                                                        echo "<h6 style='text-align: right'>Valor Total: R$" . number_format($result->valorTotal, 2, ',', '.') . "</h6>";

                                                                        echo "<h6 style='text-align: right'>Desconto de Produto: R$  " . number_format($result->descontoproduto, 2, ',', '.') . "</h6>";

                                                                        echo "<h6 style='text-align: right'>Desconto de Serviço: R$ " . number_format($result->descontoservico, 2, ',', '.') . "</h6>";

                                                                        echo "<h6 style='text-align: right'>Valor total com Desconto: R$" . number_format($result->valorTotalComDesconto, 2, ',', '.') . "</h6>";
                                                                    }

                                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style='font-size: 13px;' class="table table-bordered table-condensed">
                                        <center>
                                            <?php if ($qrCode) : ?>
                                                <td style="width: 6%">
                                                    <center> <span style="font-size: 13px"><b>Pague com Pix</b></center> </span>
                                                    <img style="margin:6px auto;" src="<?= $qrCode ?>" alt="QR Code de Pagamento" />

                                                    <center> <span style="font-size: 13px"><b>Chave: <?= $configuration['pix_key'] ?></b></span> </center>

                                                </td>

                                            <?php endif ?>
                                        </center>

                                    </table>



                                    <br>

                                    <center><span style="font-size: 13px"><b>Outras Informações</b></span></center>

                                    <center>
                                        <td><img style="max-height: 60px" src="../../../assets/img/OUTRAS2.png" id="centro" /></td>
                                    </center>


                                    <br> <br> <br><br><br>
                                    <td>
                                        <div style="font-size: 12px" align="center"><b>Assinatura do Atendente</b></div>

                                        <div style="font-size: 11px" align="center"><?php echo $result->nome ?></div>

                                    </td>

                                    <br> <br> <br><br><br>
                                    <td>
                                        <div style="font-size: 12px" align="center"><b>Assinatura do Cliente</b></div>

                                        <div style="font-size: 11px" align="center"><?php echo $result->nomeCliente ?></div>

                                    </td>

                                    <?php if ($result->tecnicores != null) { ?>


                                        <br> <br> <br><br><br>
                                        <td>
                                            <div style="font-size: 12px" align="center"><b>Assinatura do Técnico</b></div>

                                            <div style="font-size: 11px" align="center"><?php echo htmlspecialchars_decode($result->tecnicores) ?></div>

                                        </td>

                                    <?php } ?>

                    </div>

                    <center> <br> <br>
                        <span style="font-size: 12px"><b> CG Sistema - Todos direitos <br> reservados Acesse: <br>https://cgsistema.com.br</b><br></span>

                    </center>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
        window.print();
    </script>

</body>

</html>