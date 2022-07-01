<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>



<!-- New Bem-vindos -->
<div id="content-bemv">
    <div class="bemv"><?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></div>
    <div></div>
</div>

<!--Action boxes-->
<ul class="cardBox">
    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Clientes</div>
                <div class="cardName">F1</div>
            </div>
            <a href="<?= site_url('clientes') ?>">
                <div class="iconBx">
                    <i class='bx bx-group bx-border-circle'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Produtos</div>
                <div class="cardName">F2</div>
            </div>
            <a href="<?= site_url('produtos') ?>">
                <div class="iconBx">
                    <i class='bx bx-package bx-border-circle'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Vendas</div>
                <div class="cardName">F3</div>
            </div>
            <a href="<?= site_url('vendas') ?>">
                <div class="iconBx">
                    <i class='bx bx-cart bx-border-cart'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
        <li class="card">
            <div>
                <div class="numbers N-tittle">Ordens</div>
                <div class="cardName">F4</div>
            </div>
            <a href="<?= site_url('os') ?>">
                <div class="iconBx">
                    <i class='bx bx-spreadsheet bx-border-circle'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <script src="<?= base_url('assets/js/clock_time.js') ?>"></script>

    <div Class="card-cl">
        <div class="clock-card">
            <div class="clock-flex">
                <span class="num hour_num">00</span>
                <div class="tit">Horas</div>
            </div>
            <span class="colun" id="colun-1">:</span>
            <div class="clock-flex">
                <span class="num min_num">00</span>
                <div class="tit">Minutos</div>
            </div>
            <div class="time_am_pm">
                <span class="num am_pm">AM</span>
            </div>
        </div>
    </div>
</ul>
<br>


<div class="new122">
    <div class="span12" style="margin-left: 0">
        <form method="get" action="<?php echo base_url(); ?>index.php/os/gerenciar">
            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
                <div class="span3">
                    <a href="<?php echo base_url(); ?>index.php/os/adicionar" class="button btn btn-mini btn-success" style="max-width: 160px">
                        <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Ordem de Serviço</span></a>
                </div>
            <?php
            } ?>

            <div class="span3">
                <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome do cliente a pesquisar" class="span12" value="">
            </div>
            <div class="span2">
                <select name="status" id="" class="span12">
                    <option value="">Selecione status</option>
                    <option value="Aguardando Análise Técnica">Aguardando Análise Técnica</option>
                    <option value="Aguardando aprovação do cliente">Aguardando aprovação do cliente</option>
                    <option value="Aguardando Peças">Aguardando Peças</option>
                    <option value="Em Andamento">Em Andamento</option>
                    <option value="Pronto - Aguardando Retirada">Pronto - Aguardando Retirada</option>
                    <option value="Cancelado - Aguardando Retirada">Cancelado - Aguardando Retirada</option>
                    <option value="Aguardando Retirada - Cliente já Informado(a)">Aguardando Retirada - Cliente já Informado(a)</option>
                    <option value="Enviado via Correio">Enviado via Correio</option>
                    <option value="Aguardando Envio">Aguardando Envio</option>
                    <option value="Aguardando Receber via Correio">Aguardando Receber via Correio</option>
                    <option value="Entregue - A Receber">Entregue - A Receber</option>
                    <option value="Garantia">Garantia</option>
                    <option value="Abandonado - Sem resposta">Abandonado - Sem resposta</option>
                    <option value="Comprado pela Loja">Comprado pela Loja</option>
                    <option value="Entregue - Faturado">Entregue - Faturado</option>
                </select>
            </div>
            <div class="span3">
                <input type="text" name="data" autocomplete="off" id="data" placeholder="Data Inicial" class="span6 datepicker" value="">
                <input type="text" name="data2" autocomplete="off" id="data2" placeholder="Data Final" class="span6 datepicker" value="">
            </div>
            <div class="span1">
                <button class="button btn btn-mini btn-warning" style="min-width: 30px">
                    <span class="button__icon"><i class='bx bx-search-alt'></i></span></button>
            </div>
        </form>
    </div>
    <div class="widget-box" style="margin-top: 8px">
        <div class="widget-title" style="margin: -20px 0 0">
            <span class="icon">
                <i class="fas fa-diagnoses"></i>
            </span>
            <h5>Ordens de Serviço</h5>
        </div>
        <div class="widget-content nopadding">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Cliente</th>
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
                        $this->load->model('os_model');
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
                            echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" style="margin-right: 1%">' . $r->nomeCliente . '</a></td>';
                            echo '<td>' . $r->tipoeq . '</td>';
                            echo '<td>' . $r->marca . '</td>';
                            echo '<td>' . $r->tecnicores . '</td>';
                            echo '<td>' . $dataInicial . '</td>';
                            echo '<td>' . $dataFinal . '</td>';
                            echo '<td>R$ ' . number_format($r->valorTotal, 2, ',', '.') . '</td>';
                            echo '<td>R$ ' . number_format(floatval($r->valorTotalComDesconto,), 2, ',', '.') . '</td>';
                            echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                            echo '<td>';

                            $editavel = $this->os_model->isEditable($r->idOs);

                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>';
                            }
                            if ($editavel) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn-nwe3" title="Editar OS"><i class="bx bx-edit"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOs') && $editavel) {
                                echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idOs . '" class="btn-nwe4" title="Excluir OS"><i class="bx bx-trash-alt"></i></a>  ';
                            }
                            echo '</td>';
                            echo '</tr>';
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $this->pagination->create_links(); ?>

    <!-- Modal -->
    <div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form action="<?php echo base_url() ?>index.php/os/excluir" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 id="myModalLabel">Excluir OS</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idOs" name="id" value="" />
                <h5 style="text-align: center">Deseja realmente excluir esta OS?</h5>
            </div>
            <div class="modal-footer" style="display:flex;justify-content: center">
                <button class="button btn btn-warning" data-dismiss="modal" aria-hidden="true">
                    <span class="button__icon"><i class="bx bx-x"></i></span><span class="button__text2">Cancelar</span></button>
                <button class="button btn btn-danger"><span class="button__icon"><i class='bx bx-trash'></i></span> <span class="button__text2">Excluir</span></button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var os = $(this).attr('os');
            $('#idOs').val(os);
        });
        $(document).on('click', '#excluir-notificacao', function(event) {
            event.preventDefault();
            $.ajax({
                    url: '<?php echo site_url() ?>/os/excluir_notificacao',
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(data) {
                    if (data.result == true) {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: "Notificação excluída com sucesso."
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: "Ocorreu um problema ao tentar exlcuir notificação."
                        });
                    }
                });
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
