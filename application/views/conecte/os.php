<center><b><h4>Minhas OS - Sistema <?php $configuracoes = $this->db->get('configuracoes')->result();
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


<?php
// alterar para permissão de o cliente adicionar ou não a ordem de serviço
if (!$this->session->userdata('cadastra_os')) { ?>
    <div class="span12" style="margin-left: 0">
      <!--  <div class="span3">
            // <a href="<?php echo base_url(); ?>index.php/mine/adicionarOs" class="button btn btn-success" style="max-width: 150px">
                <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Adicionar</span></a>
        </div>  -->
    </div>
<?php
}

if (!$results) {
?>
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordens de Serviço</h5>

            </div>

            <div class="widget-content nopadding tab-content">


                <table id="tabela" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Responsável</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="6">Nenhuma OS Cadastrada</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php
} else { ?>

    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordens de Serviço</h5>

            </div>

            <div class="widget-content nopadding tab-content">


                <table class="table table-bordered ">
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

                        if (!$results) {
                            echo '<tr>
            <td colspan="10">Nenhuma OS Cadastrada</td>
          </tr>';
                        }
                        foreach ($results as $r) {
                            $dataInicial = date(('d/m/Y H:i:s'), strtotime($r->dataInicial));
                            if ($r->dataFinal != null) {
                                $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                            } else {
                                $dataFinal = "";
                            }
                            if ($this->input->get('pesquisa') === null && is_array(json_decode($configuration['os_status_list']))) {
                                if (in_array($r->status, json_decode($configuration['os_status_list'])) != true) {
                                    continue;
                                }
                            }

                            switch ($r->status) {
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
                                case 'Aguardando Envio':
                                    $cor = '#996699';
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

                            if ($r->garantia && is_numeric($r->garantia)) {
                                $vencGarantia = dateInterval($r->dataFinal, $r->garantia);
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
                            } elseif ($r->garantia == "0") {
                                $vencGarantia = 'Sem Garantia';
                                $corGarantia = '';
                            } else {
                                $vencGarantia = '';
                                $corGarantia = '';
                            }
                            echo '<tr>';
                            echo '<td>' . $r->idOs . '</td>';
                            echo '<td>' . $r->tipoeq . '</td>';
                            echo '<td>' . $r->marca . '</td>';
                            echo '<td>' . $r->tecnicores . '</td>';
                            echo '<td>' . $dataInicial . '</td>';
                            echo '<td>' . $dataFinal . '</td>';
            
                            echo '<td>R$ ' . number_format($r->valorTotal, 2, ',', '.') . '</td>';
                            echo '<td>R$ ' . number_format(floatval($r->valorTotalComDesconto), 2, ',', '.') . '</td>';
                            echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                            echo '<td><a href="' . base_url() . 'index.php/mine/visualizarOs/' . $r->idOs . '" class="btn-nwe" title="Visualizar e Imprimir"><i class="bx bx-show-alt"></i></a>
          <a target="_blank" href="' . base_url() . 'index.php/mine/imprimirOs/' . $r->idOs . '" class="btn-nwe3" title="Imprimir"><i class="bx bx-printer"></i></a>
                            </td>';
                            echo '</tr>';
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php echo $this->pagination->create_links();
} ?>