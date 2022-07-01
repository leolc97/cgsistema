<!DOCTYPE html>
<html>

<head>
    <title>Relatório Financeiro - <?= $emitente[0]->nome ?></title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
</head>

<body style="background-color: transparent">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <?= $topo ?>  
                    <div class="widget-content nopadding tab-content">
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="70" align="center" style="font-size: 12px">Cliente/Fornecedor</th>
                                    <th width="70" align="center" style="font-size: 12px">Tipo</th>
                                    <th width="70" align="center" style="font-size: 12px">Valor Com Desc.</th>
                                    <th width="70" align="center" style="font-size: 12px">Vencimento</th>
                                    <th width="350" align="center" style="font-size: 12px">Observações - Detalhes como foi Pago...</th>
                                    <th width="70" align="center" style="font-size: 12px">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totalReceita = 0;
                                    $totalDespesa = 0;
                                    $saldo = 0;
                                    foreach ($lancamentos as $l) {
                                        $vencimento = date('d/m/Y', strtotime($l->data_vencimento));
                                        $pagamento = date('d/m/Y', strtotime($l->data_pagamento));
                                        if ($l->baixado == 1) {
                                            $situacao = 'Pago';
                                        } else {
                                            $situacao = 'Pendente';
                                        }
                                        if ($l->tipo == 'receita') {
                                            $totalReceita += $l->valor_desconto != 0 ? $l->valor_desconto : $l->valor;
                                        } else {
                                            $totalDespesa += $l->valor;
                                        }
                                        echo '<tr>';
                                        echo '<td>' . $l->cliente_fornecedor . '</td>';
                                        echo '<td>' . $l->tipo . '</td>';
                                        echo '<td>' . 'R$ ' . number_format($l->valor, 2, ',', '.') . '</td>';
                                        echo '<td>' . $vencimento . '</td>';
                                        echo '<td>' . $l->observacoes . '</td>';
                                        echo '<td>' . $situacao . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" style="text-align: right; color: green">
                                        <strong>Total Receitas:</strong>
                                    </td>
                                    <td colspan="4" style="text-align: left; color: green">
                                        <strong>R$
                                            <?php echo number_format($totalReceita, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="text-align: right; color: red">
                                        <strong>Total Despesas:</strong>
                                    </td>
                                    <td colspan="4" style="text-align: left; color: red">
                                        <strong>R$
                                            <?php echo number_format($totalDespesa, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="text-align: right">
                                        <strong>Saldo:</strong>
                                    </td>
                                    <td colspan="4" style="text-align: left;">
                                        <strong>R$
                                            <?php echo number_format($totalReceita - $totalDespesa, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <h5 style="text-align: right">Data do Relatório:
                    <?php echo date('d/m/Y'); ?>
                </h5>

            </div>
        </div>
    </div>
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
