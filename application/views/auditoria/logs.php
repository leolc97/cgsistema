

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


<div class="new122" style="margin-top: 0; min-height: 100vh">
  <a href="#modal-excluir" role="button" data-toggle="modal" class="button btn btn-danger tip-top" style="max-width: 250px" title="Excluir Logs">
  <span class="button__icon"><i class='bx bx-trash'></i></span> <span class="button__text2">Remover Logs - 30 dias ou mais</span></a>

<div class="widget-box">
    <div class="widget-title" style="margin: -20px 0 0">
        <span class="icon">
            <i class="fas fa-clock"></i>
        </span>
        <h5>Logs</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <table id="tabela" class="table table-bordered ">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>IP</th>
                    <th>Tarefa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $r) {
    echo '<tr>';
    echo '<td>' . $r->usuario . '</td>';
    echo '<td>' . date('d/m/Y', strtotime($r->data)) . '</td>';
    echo '<td>' . $r->hora . '</td>';
    echo '<td>' . $r->ip . '</td>';
    echo '<td>' . $r->tarefa . '</td>';
    echo '</tr>';
} ?>
                <?php if (!$results) { ?>
                    <tr>
                        <td colspan="5">Nenhum registro encontrado.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo site_url('auditoria/clean') ?>" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5>Limpeza de Logs</h5>
        </div>
        <div class="modal-body">
            <h5 style="text-align: center">Deseja realmente remover os logs mais antigos?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>
</div>
