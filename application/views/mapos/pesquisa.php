

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



<div class="span12" style="margin-left: 0; margin-top: 0">
    <div class="span12" style="margin-left: 0">
        <form action="<?php echo current_url() ?>">
            <div class="span10" style="margin-left: 0">
                <input type="text" class="span12" name="termo" placeholder="Digite o termo a pesquisar"/>
            </div>
            <div class="span2">
                <button class="button btn btn-mini btn-warning">
                  <span class="button__icon"><i class='bx bx-search-alt'></i></span> <span class="button__text2">Pesquisar</span></button>
            </div>
        </form>
    </div>
    <div class="span12" style="margin-left: 0; margin-top: 0">
        <!--Produtoss-->
        <div class="span6" style="margin-left: 0; margin-top: 0">
            <div class="widget-box" style="min-height: 200px">
                <div class="widget-title" style="margin: -20px 0 0">
                    <span class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </span>
                    <h5>Produtos</h5>
                </div>
                <div class="widget-content nopadding tab-content">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($produtos == null) {
                            echo '<tr><td colspan="4">Nenhum produto foi encontrado.</td></tr>';
                        }
                        foreach ($produtos as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idProdutos . '</td>';
                            echo '<td>' . $r->descricao . '</td>';
                            echo '<td>' . $r->precoVenda . '</td>';
                            echo '<td>' . $r->estoque . '</td>';
                            echo '<td>';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/produtos/visualizar/' . $r->idProdutos . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) {
                                echo '<a href="' . base_url() . 'index.php/produtos/editar/' . $r->idProdutos . '" class="btn-nwe3" title="Editar produto"><i class="bx bx-edit"></i></a>';
                            }
                            echo '</td>';
                            echo '</tr>';
                        } ?>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Clientes-->
        <div class="span6">
            <div class="widget-box" style="min-height: 200px">
                <div class="widget-title" style="margin: -20px 0 0">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <h5>Clientes</h5>
                </div>
                <div class="widget-content nopadding tab-content">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>CPF/CNPJ</th>
                            <th>Cliente / Fornecedor</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($clientes == null) {
                            echo '<tr><td colspan="4">Nenhum cliente foi encontrado.</td></tr>';
                        }
                        foreach ($clientes as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idClientes . '</td>';
                            echo '<td>' . $r->nomeCliente . '</td>';
                            echo '<td>' . $r->documento . '</td>';
                            $cor = ($r->fornecedor ? '#CDB380' : '#CD0000');
                            echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . ($r->fornecedor ? 'Fornecedor' : 'Cliente') . '</span> </td>';
                            echo '<td>';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
                                echo '<a href="' . base_url() . 'index.php/clientes/editar/' . $r->idClientes . '" class="btn btn-info tip-top" title="Editar Cliente"><i class="fas fa-edit"></i></a>';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--Serviços-->
    <div class="span6" style="margin-left: 0">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-wrench"></i>
                </span>
                <h5>Serviços</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($servicos == null) {
                        echo '<tr><td colspan="4">Nenhum serviço foi encontrado.</td></tr>';
                    }
                    foreach ($servicos as $r) {
                        echo '<tr>';
                        echo '<td>' . $r->idServicos . '</td>';
                        echo '<td>' . $r->nome . '</td>';
                        echo '<td>' . $r->preco . '</td>';
                        echo '<td>';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eServico')) {
                            echo '<a href="' . base_url() . 'index.php/servicos/editar/' . $r->idServicos . '" class="btn btn-info tip-top" title="Editar Serviço"><i class="fas fa-edit"></i></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Ordens de Serviço-->
    <div class="span6">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordens de Serviço</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Data Inicial</th>
                        <th>Tipo Eq.</th>
                        <th>Marca</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($os == null) {
                        echo '<tr><td colspan="4">Nenhuma os foi encontrado.</td></tr>';
                    }
                    foreach ($os as $r) {
                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                        $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                        
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

                        echo '<tr>';
                        echo '<td>' . $r->idOs . '</td>';
                        echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                        echo '<td>' . $dataInicial . '</td>';
                        echo '<td>' . $r->tipoeq . '</td>';
                        echo '<td>' . $r->marca . '</td>';
                        echo '<td>';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                            echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn-nwe3" title="Editar OS"><i class="bx bx-edit"></i></a>';
                        }

                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
