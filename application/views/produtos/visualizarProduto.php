

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
                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                    <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                    <h5>Dados do Produto</h5>
                </a>
            </div>
        </div>
        <div class="collapse in accordion-body">
            <div class="widget-content">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                        <td style="text-align: right; width: 30%"><strong>Código de Barra</strong></td>
                            <td>
                                <?php echo $result->codDeBarra ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Nome do Produto</strong></td>
                            <td>
                                <?php echo $result->descricao ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Descrição do Produto</strong></td>
                            <td>
                                <?php echo $result->descricaoproduto ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Unidade</strong></td>
                            <td>
                                <?php echo $result->unidade ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Preço de Compra</strong></td>
                            <td>R$
                                <?php echo $result->precoCompra; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Preço de Venda</strong></td>
                            <td>R$
                                <?php echo $result->precoVenda; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Estoque</strong></td>
                            <td>
                                <?php echo $result->estoque; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Estoque Mínimo</strong></td>
                            <td>
                                <?php echo $result->estoqueMinimo; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
