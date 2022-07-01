<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Serviços - <?= $emitente[0]->nome ?></title>
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
                    <div class="widget-title">
                        
                    </div>
                    <div class="widget_content nopadding">
                    <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="350" style="font-size: 15px">Nome</th>
                                    <th width="650" style="font-size: 15px">Descrição</th>
                                    <th width="140" style="font-size: 15px">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($servicos as $s) {
                                        echo '<tr>';
                                        echo '<td>' . $s->nome . '</td>';
                                        echo '<td>' . $s->descricao . '</td>';
                                        echo '<td align="center">R$: ' . $s->preco . '</td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">Data do Relatório: <?php echo date('d/m/Y'); ?>
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
