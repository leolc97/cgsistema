

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




<div class="accordion" id="collapse-group">
    <div class="accordion-group widget-box">
        <div class="accordion-heading">
            <div class="widget-title" style="margin: -20px 0 0">
                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"><br>
                    <h5>Detalhes da Cobrança</h5>
                </a>
            </div>
        </div>
        <div class="collapse in accordion-body">
            <div class="widget-content">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Cliente</strong></td>
                            <td>
                                <?php echo $result->nomeCliente; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Cliente (Documento)</strong></td>
                            <td>
                                <?php echo $result->documento; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Cliente (Telefone)</strong></td>
                            <td>
                                <?php echo $result->telefone; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Cliente (Celular)</strong></td>
                            <td>
                                <?php echo $result->celular; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Cliente (Email)</strong></td>
                            <td>
                                <?php echo $result->email; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Id interno (id)</strong></td>
                            <td>
                                <?php echo $result->idCobranca; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Id externo (charge_id)</strong></td>
                            <td>
                                <?php echo $result->charge_id; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Gateway de Pagamento</strong></td>
                            <td>
                                <?php echo $result->payment_gateway; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Valor da cobrança</strong></td>
                            <td>R$
                                <?php echo number_format($result->total / 100, 2, ',', '.'); ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Status atual</strong></td>
                            <td>
                                <?php
                                    echo getCobrancaTransactionStatus(
    $this->config->item('payment_gateways'),
    $result->payment_gateway,
    $result->status
);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Expiração</strong></td>
                            <td>
                                <?php echo date('d/m/Y', strtotime($result->expire_at)); ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Método de pagamento</strong></td>
                            <td>
                                <?php echo $result->payment_method; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Url de pagamento</strong></td>
                            <td>
                                <?php echo $result->payment_url; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Código de barras</strong></td>
                            <td>
                                <?php echo $result->barcode; ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Link</strong></td>
                            <td>
                                <?php if ($result->link) { ?>
                                    <a href="<?php echo $result->link; ?>" target="_blank">Abrir em nova aba</a>
                                <?php } ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>PDF</strong></td>
                            <td>
                                <?php if ($result->pdf) { ?>
                                    <a href="<?php echo $result->pdf; ?>" target="_blank">Abrir em nova aba</a>
                                <?php } ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right"><strong>Mensagem</strong></td>
                            <td>
                                <?php echo $result->message; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
