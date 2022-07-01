

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



<?php $totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-book"></i>
                </span>
                <h5>Termo de Garantia</h5>
                <div class="buttons">
                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eGarantia')) {
    echo '<a title="Editar Termo de Garantia" class="button btn btn-mini btn-success" href="' . base_url() . 'index.php/garantias/editar/' . $result->idGarantias . '">
    <span class="button__icon"><i class="bx bx-edit"></i> </span> <span class="button__text">Editar</span></a>';
} ?>
 <a target="_blank" title="Imprimir A4" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/garantias/imprimirA4/<?php echo $result->idGarantias; ?>">
                      <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir A4</span></a>
                
                    <a target="_blank" title="Imprimir Térmica" class="button btn btn-mini btn-inverse" href="<?php echo site_url() ?>/garantias/imprimirTermica/<?php echo $result->idGarantias; ?>">
                      <span class="button__icon"><i class="bx bx-printer"></i></span> <span class="button__text">Imprimir Térmica </span></a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head">
                        <table class="table">
                            <tbody>
                                <?php if ($emitente == null) { ?>
                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr> <?php
                                                            } else { ?> <tr>
                                         <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?>  " style="max-height: 200px" class="center-visualizar"></td>

<td>

<span style="font-size: 15px"><b><?php echo $emitente[0]->nome; ?></b></span></br>

<span style="font-size: 13px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>

<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>

<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>

<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo 'Cep: ' . $emitente[0]->cep; ?></span><br>

<span style="font-size: 13px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>

<span style="font-size: 13px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo 'Whatsapp: ' . $emitente[0]->telefone; ?></span>

</td>
                                        <td style="width: 18%; text-align: center"><span>
                                                <?php echo $result->idVendas ?></span></br> </br> <span>
                                                <b>Emissão: </b><?php echo date('d/m/Y H:i:s'); ?></span>
                                            <?php if ($result->faturado) : ?>
                                                <br>
                                                Vencimento:
                                                <?php echo date('d/m/Y H:i:s', strtotime($result->data_vencimento)); ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 40%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span>
                                                 <h5><b>Responsável</b></h5>
                                                </span>
                                                <span>
                                                    <?php echo $result->nome ?></span> <br />
                                                <span>Telefone:
                                                    <?php echo $result->telefone ?></span><br />
                                                <span>Email:
                                                    <?php echo $result->email ?></span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td style="width: 30%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span>
                                                <h5><b>Data de Criação</b></h5>
                                                </span>
                                                <span> <?php echo date('d/m/Y', strtotime($result->dataGarantia)); ?></span> <br />

                                            </li>
                                        </ul>
                                    </td>
                                    <td style="width: 30%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span>
                                                <h5><b>Ref. Termo</b></h5>
                                                </span>
                                                <span><?php echo $result->refGarantia ?> </span>
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

                                                <span>
                                                    <h5><b>Texto da Garantia</b></h5>
                                                </span><br />
                                                <span><?php echo htmlspecialchars_decode($result->textoGarantia) ?></span><br />
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
