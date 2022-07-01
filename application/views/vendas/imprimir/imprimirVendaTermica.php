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

<td>
                                     
<span style="font-size: 12px"><b>Venda Nº: </b><?php echo $result->idVendas ?></span></br>
        <span style="font-size: 12px"><b>Data da Venda: </b><?php echo date('d/m/Y H:i:s', strtotime($result->dataVenda)); ?> <br>
        <span style="font-size: 12px"><b>Data da Impressão:</b> <?php echo date('d/m/Y H:i:s') ?></span></br>
        <?php if ($result->datagarat != null) { ?>
        <span style="font-size: 12px"><b>Garantia até: </b><?php echo $result->datagarat ?> Dias<?php } ?> <b></b></span></br>
    
        <?php if ($result->faturado) : ?>
        <span style="font-size: 12px"><b>Entregue e Faturado no dia: </b><?php echo date('d/m/Y H:i:s', strtotime($result->data_vencimento)); ?><?php endif; ?></span></br>
       </td>

</tr>
<tr>
<td>
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

                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td colspan="5"> <?php
                                                        if ($totalProdutos != 0 || $totalServico != 0) {

                                                        
                                                          
                                    
                                                            echo "<h6 style='text-align: right'>Desconto de Produto: R$  " . number_format($result->descontovenda, 2, ',', '.') . "</h6>";
                                    
                                                            
                                    
                                                        
echo "<h6 style='text-align: right'>Valor total com Desconto: R$" . number_format($totalProdutos - $result->descontovenda, 2, ',', '.') . "</h6>"; 
                                                            
                                                              
                                      }

                                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style='font-size: 13px;' class="table table-bordered table-condensed">
                          <center>          
   <?php if ($qrCode) : ?> 
                                        <td style="width: 6%"><center> <span style="font-size: 13px"><b>Pague com Pix</b></center> </span>
                                            <img style="margin:6px auto;" src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                      
                                            <center>  <span style="font-size: 13px"><b>Chave:  <?= $configuration['pix_key'] ?></b></span> </center>
                                           
                                        </td>
                                      
                                    <?php endif ?> 
                                    </center>

                                    </table>

                                    <br>
    
   

    <?php if ($result->observacoes != null) { ?>
                <tr>
                    <td colspan="5">
                    <table style='font-size: 10px;' class="table table-bordered table-condensed">

                    <center><span style="font-size: 13px"><b>Observações para o Cliente</b></span></center>

                   
                    <center>  <?php echo htmlspecialchars_decode($result->observacoes_cliente) ?> </center>
                    </td>
                </tr></table> 
            <?php } ?>
                                   
<br>

                        <center><span style="font-size: 13px"><b>Outras Informações</b></span></center>

                        <center> <td><img style="max-height: 60px"  src="../../../assets/img/OUTRAS2.png" id="centro" /></td></center>



                      
                            <br>  <br> <br><br><br>

          <td><div style="font-size: 12px" align="center"><b>Assinatura do Vendedor</b></div>
          
          <div style="font-size: 11px" align="center"><?php echo $result->nome ?></div>

          </td> 
         <br> <br> <br><br><br>
         <td><div style="font-size: 12px" align="center"><b>Assinatura do Cliente</b></div>
          
          <div style="font-size: 11px" align="center"><?php echo $result->nomeCliente ?></div>

          </td>

        

                    </div>
                    
         <center> <br> <br>
<span style="font-size: 12px"><b> CG Sistema - Todos direitos <br> reservados Acesse:  <br>https://cgsistema.com.br</b><br></span>

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
