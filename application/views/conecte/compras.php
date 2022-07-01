<center><b><h4>Compras - Sistema <?php $configuracoes = $this->db->get('configuracoes')->result();
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

if (!$results) { ?>
    <div class="widget-box">
        <div class="widget-title" style="margin: -20px 0 0">
            <span class="icon">
                <i class="fas fa-tags"></i>
            </span>
            <h5>Compras</h5>

        </div>

        <div class="widget-content nopadding tab-content">


            <table id="tabela" class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data da Compra</th>
                        <th>Responsável</th>
                        <th>Faturado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td colspan="6">Nenhuma compra cadastrada</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
} else { ?>


    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <h5>Compras</h5>

        </div>

        <div class="widget-content nopadding tab-content">


            <table id="tabela" class="table table-bordered ">
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
                    <?php foreach ($results as $r) {
    $dataVenda = date(('d/m/Y'), strtotime($r->dataVenda));
    if ($r->faturado == 1) {
        $faturado = 'Sim';
    } else {
        $faturado = 'Não';
    }
         echo '<tr>';
                        echo '<td>' . $r->idVendas . '</td>';
                        echo '<td>' . $dataVenda . '</td>';
                        echo '<td>' . "R$: " .  number_format($r->valorTotal,2,',','.') . '</td>';             
                        echo '<td>' . $faturado . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/mine/visualizarCompra/' . $r->idVendas . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>
                                        <a target="_blank" href="' . base_url() . 'index.php/mine/imprimirCompra/' . $r->idVendas . '" class="btn-nwe6" title="Imprimir"><i class="bx bx-printer"></i></a>

                  </td>';
        echo '</tr>';
} ?>
                </tbody>
            </table>
        </div>
    </div>

<?php echo $this->pagination->create_links();
} ?>
