<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<center><b><h4>Área do Cliente - <?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></h4></b></center>


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

<div class="span12" style="margin-left: 0">

    <div class="widget-box">
        <div class="widget-title" style="margin: -20px 0 0">
          <span class="icon"><i class="fas fa-signal"></i></span>
            <h5>Últimas Ordens de Serviço</h5>
        </div>
        <div class="widget-content">
            <div class="table-responsive">
                <table id="tabela" class="table table-bordered">
                    <thead>
                        <tr>
                                <th>N°</th>
                                <th>Tipo Eq.</th>
                                <th>Marca</th>
                                <th>Técnico Resp.</th>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Valor Total</th>
                                <th>Valor com Desc.</th>
                                <th>Status</th>
                                <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($os != null) {
                            foreach ($os as $o) {

                                switch ($o->status) {
                                    case 'Aguardando Análise Técnica':
                                        $cor = '#FF00FF';
                                        break;
                                    case 'Aguardando aprovação do cliente':
                                        $cor = '#DEB887';
                                        break;
                                    case 'Aguardando Peças':
                                        $cor = '#FFB6C1';
                                        break;
                                    case 'Em Andamento':
                                        $cor = '#4B0082';
                                        break;
                                    case 'Pronto - Aguardando Retirada':
                                        $cor = '#9ACD32';
                                        break;
                                    case 'Cancelado - Aguardando Retirada':
                                        $cor = '#4F4F4F';
                                        break;
                                    case 'Aguardando Retirada - Cliente já Informado(a)':
                                        $cor = '#3CB371';
                                        break;
                                    case 'Enviado via Correio':
                                        $cor = '#5F9EA0';
                                        break;
                                    case 'Aguardando Receber via Correio':
                                        $cor = '#996699';
                                        break;
                                    case 'Entregue - A Receber':
                                        $cor = '#FF8C00';
                                        break;
                                    case 'Garantia':
                                        $cor = '#FF66CC';
                                        break;
                                    case 'Abandonado - Sem resposta':
                                        $cor = '#808080';
                                        break;
                                    case 'Comprado pela Loja':
                                        $cor = '#1E90FF';
                                        break;
                                    case 'Entregue - Faturado':
                                        $cor = '#2E8B57';
                                        break;
                                    default:
                                        $cor = '#E0E4CC';
                                        break;
                                }

                                $vencGarantia = '';

                                if ($o->garantia && is_numeric($o->garantia)) {
                                    $vencGarantia = dateInterval($o->dataFinal, $o->garantia);
                                }
                                $corGarantia = '';
                                if (!empty($vencGarantia)) {
                                    $dataGarantia = explode('/', $vencGarantia);
                                    $dataGarantiaFormatada = $dataGarantia[2] . '-' . $dataGarantia[1] . '-' . $dataGarantia[0];
                                    if (strtotime($dataGarantiaFormatada) >= strtotime(date('d-m-Y'))) {
                                        $corGarantia = '#4d9c79';
                                    } else {
                                        $corGarantia = '#f24c6f';
                                    }
                                } elseif ($o->garantia == "0") {
                                    $vencGarantia = 'Sem Garantia';
                                    $corGarantia = '';
                                } else {
                                    $vencGarantia = '';
                                    $corGarantia = '';
                                }
                                $dataInicial = date(('d/m/Y H:i:s'), strtotime($o->dataInicial));
                                $dataFinal = date(('d/m/Y'), strtotime($o->dataFinal));
                                echo '<tr>';
                                echo '<td>' . $o->idOs . '</td>';
                                echo '<td>' . $o->tipoeq . '</td>';
                                echo '<td>' . $o->marca . '</td>';
                                echo '<td>' . $o->tecnicores . '</td>';
                                echo '<td>' . $dataInicial . '</td>';
                                echo '<td>' . $dataFinal . '</td>';
                                echo '<td>R$ ' . number_format($o->valorTotal, 2, ',', '.') . '</td>';
                                echo '<td>R$ ' . number_format(floatval($o->valorTotalComDesconto), 2, ',', '.') . '</td>';
                                echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $o->status . '</span> </td>';
                                echo '<td><a href="' . base_url() . 'index.php/mine/visualizarOs/' . $o->idOs . '" class="btn-nwe" title="Visualizar e Imprimir"><i class="bx bx-show-alt"></i></a>
                                <a target="_blank" href="' . base_url() . 'index.php/mine/imprimirOs/' . $o->idOs . '" class="btn-nwe3" title="Imprimir"><i class="bx bx-printer"></i></a>
                                </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3">Nenhum ordem de serviço encontrada.</td></tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="widget-box">
        <div class="widget-title" style="margin: -20px 0 0">
          <span class="icon"><i class="fas fa-signal"></i></span>
            <h5>Últimas Compras</h5>
        </div>
        <div class="widget-content">
            <div class="table-responsive">
                <table id="tabela" class="table table-bordered">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>Data / Hora</th>
                    <th>Valor da Venda + Desconto</th>
                    <th>Faturado</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if ($compras != null) {
                        foreach ($compras as $p) {
                            if ($p->faturado == 1) {
                                $faturado = 'Sim';
                            } else {
                                $faturado = 'Não';
                            }
                        $dataInicial = date(('d/m/Y H:i:s'), strtotime($p->dataVenda));
                        echo '<tr>';
                        echo '<td>' . $p->idVendas . '</td>';
                        echo '<td>' . $dataInicial . '</td>';
                        echo '<td>' . "R$: " .  number_format($p->valorTotal,2,',','.') . '</td>';             
                        echo '<td>' . $faturado . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/mine/visualizarCompra/' . $p->idVendas . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>
                                        <a target="_blank" href="' . base_url() . 'index.php/mine/imprimirCompra/' . $p->idVendas . '" class="btn-nwe6" title="Imprimir"><i class="bx bx-printer"></i></a>

                  </td>';
        echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Nenhum venda encontrada.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
