

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



<div class="span12" style="margin-left: 0">
    <form action="<?php echo base_url(); ?>index.php/permissoes/adicionar" id="formPermissao" method="post">
        <div class="span12" style="margin-left: 0">
            <div class="widget-box">
                <div class="widget-title" style="margin: -20px 0 0">
               <span class="icon">
               <i class="fas fa-lock"></i>
               </span>
                    <h5>Cadastro de Permiss??o</h5>
                </div>
                <div class="widget-content">
                    <div class="span6">
                        <label>Nome da Permiss??o</label>
                        <input name="nome" type="text" id="nome" class="span12" />
                    </div>
                    <div class="span6">
                        <br />
                        <label>
                            <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                            <span class="lbl"> Marcar Todos</span>
                        </label>
                        <br />
                    </div>
                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                      <span><i class='bx bx-group icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Clientes</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseGOne">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vCliente" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Cliente</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                      <span><i class='bx bx-package icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Produtos</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGTwo">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vProduto" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Produto</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                      <span><i class='bx bx-stopwatch icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Servi??os</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Servi??o</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Servi??o</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Servi??o</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Servi??o</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree3" data-toggle="collapse">
                                      <span><i class='bx bx-spreadsheet icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Ordem de Servi??os - OS</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree3">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir OS</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree33" data-toggle="collapse">
                                      <span><i class='bx bx-cart-alt icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Vendas</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree33">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Venda</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333" data-toggle="collapse">
                                      <span><i class='bx bx-credit-card-front icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Cobran??as</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vCobranca" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Cobran??as</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Cobran??as</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Cobran??as</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Cobran??as</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree3333" data-toggle="collapse">
                                      <span><i class='bx bx-receipt icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Garantias</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree3333">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vGarantia" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Garantia</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree33333" data-toggle="collapse">
                                      <span><i class='bx bx-box icon-cli'></i></span>
                                      <h5 style="padding-left: 28px">Arquivos</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree33333">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Arquivo</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333343" data-toggle="collapse">
                                      <span><i class="bx bx-bar-chart-square icon-cli"></i></span>
                                      <h5 style="padding-left: 28px">Financeiro</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333343">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vPagamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aPagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="ePagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dPagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Pagamento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Lan??amento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Lan??amento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Lan??amento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Lan??amento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333335" data-toggle="collapse">
                                      <span><i class="bx bx-chart icon-cli"></i></span>
                                      <h5 style="padding-left: 28px">Relat??rios</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333335">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="rCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relat??rio Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relat??rio Servi??o</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relat??rio OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relat??rio Produto</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="rVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relat??rio Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relat??rio Financeiro</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333338" data-toggle="collapse">
                                      <span><i class="bx bx-cog icon-cli"></i></span>
                                      <h5 style="padding-left: 28px">Configura????es e Sistema</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333338">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Usu??rio</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Emitente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Permiss??o</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Backup</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cAuditoria" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Auditoria</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cEmail" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Emails</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cSistema" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Sistema</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3" style="display:flex;justify-content: center">
                                <button type="submit" class="button btn btn-success"><span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Confirmar</span></button>
                                <a title="Voltar" class="button btn btn-mini btn-warning" href="<?php echo site_url() ?>/permissoes">
                                  <span class="button__icon"><i class="bx bx-undo"></i></span> <span class="button__text2">Voltar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#marcarTodos").change(function() {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
        $("#formPermissao").validate({
            rules: {
                nome: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: 'Campo obrigat??rio'
                }
            }
        });
    });
</script>
