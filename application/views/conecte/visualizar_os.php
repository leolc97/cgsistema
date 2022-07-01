<center><b>
        <h4>Minha OS - Sistema <?php $configuracoes = $this->db->get('configuracoes')->result();
                                echo $configuracoes[0]->valor ?></h4>
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


<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordem de Serviço</h5>
                <div class="buttons">


                    <a target="_blank" title="Imprimir" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/mine/imprimirOs/<?php echo $result->idOs; ?>"> <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir OS</span></a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Os dados do emitente não foram configurados.</td>
                                    </tr>
                                <?php
                                } else { ?>
                                    <tr>
                                        <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                        <td> <span style="font-size: 20px; ">
                                                <span style="font-size: 15px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

                                                <span style="font-size: 13px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>

                                                <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

                                                <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

                                                    <span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

                                                    <span style="font-size: 13px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>

                                                    <span style="font-size: 13px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span>

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

                            <!------------------ Produtos -------------------------------->
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

                            <!------------------------- end Produtos ------------------------------------->


                            <?php if ($servicos != null) { ?>

                                <!----------------------- Serviços ----------------------------------->


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

                                        $totalServico = $totalServico;

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
                                <!----------------------- Serviços ----------------------------------->


                                <!-- QR Code PIX -->

                                <table width="100%">

                                    <tr>

                                        <th>
                                            <div align="center">

                                                <table width="100">

                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <?php if ($qrCode) : ?>
                                                                    <img src="../../../assets/img/logo_pix.png" width="100px">
                                                                    <img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                                            </div>
                                                        </td>
                                                    <?php endif ?>

                                                </table>
                                            </div>
                                        </th>

                                    </tr>

                                </table>

                                <!-- Fim QR Code PIX -->

                            <?php } ?>

                            <?php

                            if ($totalProdutos != 0 || $totalServico != 0) {

                                echo "<h6 style='text-align: right'>Valor Total: R$" . number_format($result->valorTotal, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Desconto de Produto: R$  " . number_format($result->descontoproduto, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Desconto de Serviço: R$ " . number_format($result->descontoservico, 2, ',', '.') . "</h6>";

                                echo "<h6 style='text-align: right'>Valor total com Desconto: R$" . number_format($result->valorTotalComDesconto, 2, ',', '.') . "</h6>";
                            }

                            ?></td>
                            </tr>
                            </table>

                            <!-- ANEXOS -->
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
                                            <th>Anexo</th>
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
                                                <div align="center"><span style="font-size: 12px"><b>' . $a->anexo . '</b></span></div>
            <a style="min-height: 180px; border: 1px solid #f00;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></td>';
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
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a target="_blank" class="btn" id="abrir-anexo">Visualizar</a>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#imprimir").click(function() {
            PrintElem('#printOs');
        })

        function PrintElem(elem) {
            Popup($(elem).html());
        }

        function Popup(data) {
            var mywindow = window.open('', 'mydiv', 'height=600,width=800');
            mywindow.document.open();
            mywindow.document.onreadystatechange = function() {
                if (this.readyState === 'complete') {
                    this.onreadystatechange = function() {};
                    mywindow.focus();
                    mywindow.print();
                    mywindow.close();
                }
            }


            mywindow.document.write('<html><head><title>Map Os</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-media.css' />");

            mywindow.document.write("</head><body >");
            mywindow.document.write(data);
            mywindow.document.write("</body></html>");

            mywindow.document.close(); // necessary for IE >= 10

            return true;
        }
    });

    $(document).ready(function() {
        $(document).on('click', '.anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#abrir-anexo").attr('href', link);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexoaux/" + id);

        });

        $(document).on('click', '#excluir-anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idOs ?>"
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
    });
</script>