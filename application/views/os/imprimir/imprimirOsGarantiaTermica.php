<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Termo de Uso / Garantia - Térmica</title>
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
                                            <<< <?php } else { ?> 

                                                <td colspan="1"> <span style="font-size: 5px; ">

<CENTER>  <img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 100px" class="center-visualizar"></CENTER>
<br>
<span style="font-size: 17px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

<span style="font-size: 12px"><?php echo $emitente[0]->cnpj; ?></span></br>

<span style="font-size: 12px"><?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

<span style="font-size: 12px"><?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

<span style="font-size: 12px"><?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

<span style="font-size: 12px"><?php echo $emitente[0]->email; ?></span></br>

<span style="font-size: 12px"><?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span></td>


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

<tr>
<td>
<center> <span style="font-size: 13px"><span><b>Termo de Uso / Garantia</b></span></span></center>
</td>
</tr>

<table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 100%; padding-left: 0">
                                        <ul>
                                            <li>

                                                <span> <?= $configuration['termo_uso_Termica']?></span><br />
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

<?php } ?>


<br> <br> <br><br><br><br><br> <br>
<td><div style="font-size: 12px" align="center">_______________________________</b></div><br>
         <td><div style="font-size: 12px" align="center"><b>Assinatura do Cliente</b></div>
         <div style="font-size: 11px" align="center"><?php echo $result->nomeCliente ?></div>
         <br><br><br><br> <br>
         <div style="font-size: 12px" align="center"> <b>Data: </b><?php echo date('d/m/Y H:i:s'); ?></div>
          

          </td>
                    </div>
                      
         <center> <br> <br><br> <br>
<span style="font-size: 12px"><b> CG Sistema - Todos direitos <br> reservados Acesse:  <br>https://cgsistema.com.br</b><br></span>

</center>
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
