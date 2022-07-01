<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Termo de Garantia</title>
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
                                        </tr> <?php } else { ?>   <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 150px" class="center-visualizar"></td>

<td>

<span style="font-size: 15px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

<span style="font-size: 13px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>

<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

<span style="font-size: 13px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>

<span style="font-size: 13px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span>

</td>
                                        <td style="width: 18%; text-align: center">
                                            <br /> <br />
                                            <div style="font-size: 12px" align="center"> <b>Data de Emissão: </b><br><?php echo date('d/m/Y H:i:s'); ?></div>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span>
                                                <center> <span style="font-size: 13px"><span><b><?php echo htmlspecialchars_decode($result->refGarantia) ?></b></span></span></center>
                                                </span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 100%; padding-left: 0">
                                        <ul>
                                            <li>

                                                <span><?php echo htmlspecialchars_decode($result->textoGarantia) ?></span><br />
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span>
                                <br><br><br><br> <td>
                                <center>  ____________________________________________ <br>
                                <center> <span style="font-size: 13px"><span><b>Assinatura do Cliente</b></span></center>
                                </span>
                                            </li>
                                        </ul>
                                    </td>
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
