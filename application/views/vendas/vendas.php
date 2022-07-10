

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
    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aVenda')) { ?>
    <a href="<?php echo base_url(); ?>index.php/vendas/adicionar" class="button btn btn-mini btn-success" style="max-width: 160px">
      <span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Nova Venda</span></a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title" style="margin: -20px 0 0">
        <span class="icon">
            <i class="fas fa-cash-register"></i>
        </span>
        <h5>Vendas</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <table id="tabela" class="table table-bordered ">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Data / Hora</th>
                    <th>Cliente</th>
                    <th>Valor da Venda + Desconto</th>
                    <th>Faturado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhuma Venda Cadastrada</td>
                            </tr>';
                    }
                    foreach ($results as $r) {
                        $dataVenda = date(('d/m/Y H:i:s'), strtotime($r->dataVenda));
                        if ($r->faturado == 1) {
                            $faturado = 'Sim';
                        } else {
                            $faturado = 'Não';
                        }
                        echo '<tr>';
                        echo '<td>' . $r->idVendas . '</td>';
                        echo '<td>' . $dataVenda . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '">' . $r->nomeCliente . '</a></td>';
                        echo '<td>' . "R$: " .  number_format($r->valorTotalComDesconto,2,',','.') . '</td>';


                        /*<div align="center"><strong>R$: <?php echo number_format($total, 2, ',', '.'); ?></strong></div> <input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>">
                        echo '<td>' . "R$: " .  number_format($total,2,',','.') . '</td>'; */                

                        echo '<td>' . $faturado . '</td>';
                        echo '<td>';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/visualizar/' . $r->idVendas . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show bx-xs"></i></a>';
                            }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/editar/' . $r->idVendas . '" class="btn-nwe3" title="Editar venda"><i class="bx bx-edit bx-xs"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dVenda')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" venda="' . $r->idVendas . '" class="btn-nwe4" title="Excluir Venda"><i class="bx bx-trash-alt bx-xs"></i></a>';
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
    <form action="<?php echo base_url() ?>index.php/vendas/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Venda</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idVenda" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir esta Venda?</h5>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="button btn btn-warning" data-dismiss="modal" aria-hidden="true">
              <span class="button__icon"><i class="bx bx-x"></i></span><span class="button__text2">Cancelar</span></button>
            <button class="button btn btn-danger"><span class="button__icon"><i class='bx bx-trash'></i></span> <span class="button__text2">Excluir</span></button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var venda = $(this).attr('venda');
            $('#idVenda').val(venda);
        });
    });
</script>
