<!-- New Bem-vindos -->
<div id="content-bemv">
    <div class="bemv"><?php $configuracoes = $this->db->get('configuracoes')->result();
                        echo $configuracoes[0]->valor ?></div>
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


<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-wrench"></i>
                </span>
                <h5>Configurações do Sistema</h5>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Gerais</a></li>
                <li><a data-toggle="tab" href="#menu1">Financeiro</a></li>
                <li><a data-toggle="tab" href="#menu2">Produtos</a></li>
                <li><a data-toggle="tab" href="#menu3">Config. Whatsapp</a></li>
                <li><a data-toggle="tab" href="#menu4">Termos de Uso</a></li>
                <li><a data-toggle="tab" href="#menu5">Status OS</a></li>
                <li><a data-toggle="tab" href="#menu6">Logos</a></li>
                <li><a data-toggle="tab" href="#menu7">Envio de E-Mail</a></li>
                <li><a data-toggle="tab" href="#menu8">Atualizar Sistema</a></li>
            </ul>
            <form action="<?php echo current_url(); ?>" id="formConfigurar" method="post" class="form-horizontal">
                <div class="widget-content nopadding tab-content">
                    <?php echo $custom_error; ?>
                    <!-- Menu Gerais -->
                    <div id="home" class="tab-pane fade in active">
                        <div class="control-group">
                            <label for="app_name" class="control-label">Nome do Sistema</label>
                            <div class="controls">
                                <input type="text" required name="app_name" value="<?= $configuration['app_name'] ?>">
                                <span class="help-inline">Nome do sistema</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="app_theme" class="control-label">Tema do Sistema</label>
                            <div class="controls">
                                <select name="app_theme" id="app_theme">
                                    <option value="default">Escuro</option>
                                    <option value="white" <?= $configuration['app_theme'] == 'white' ? 'selected' : ''; ?>>Claro</option>
                                </select>
                                <span class="help-inline">Selecione o tema que que deseja usar no sistema</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="control_datatable" class="control-label">Visualização em DataTables</label>
                            <div class="controls">
                                <select name="control_datatable" id="control_datatable">
                                    <option value="1">Sim</option>
                                    <option value="0" <?= $configuration['control_datatable'] == '0' ? 'selected' : ''; ?>>Não</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar a visualização em tabelas dinâmicas</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="button btn btn-primary">
                                        <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Menu logos -->

                    <div id="menu6" class="tab-pane fade">
                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <label for="descricaoProduto">
                                <h5>Logo Menu</h5>
                            </label>
                            <img style="max-width: 250px" src=" <?= $dados[0]->logo; ?> "></td>
                            <div style="display:flex">
                                <a href="#modalLogo" data-toggle="modal" role="button" class="button btn btn-inverse"><span class="button__icon"><i class='bx bx-upload'></i></span> <span class="button__text2">Alterar Logo</span></a>
                            </div>

                        </div>
                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <label for="descricaoProduto">
                                <h5>Favicon</h5>
                            </label>
                            <img style="max-width: 250px" src=" <?= $dados[0]->favicon; ?> "></td>
                            <div style="display:flex">
                                <a href="#modalLogoIcon" data-toggle="modal" role="button" class="button btn btn-inverse"><span class="button__icon"><i class='bx bx-upload'></i></span> <span class="button__text2">Alterar Logo icon</span></a>
                            </div>


                        </div>
                    </div>

                    <!-- Menu Envio de E-Mail -->

                    <div id="menu7" class="tab-pane fade">
                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <div class="control-group">
                                <label for="protocol">Enviar e-mail usando</label>
                                <select name="protocol" id="protocol">
                                    <option value="phpmail" selected="selected">PHP mail</option>
                                    <option value="smtp" selected="selected">SMTP</option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="smtp_host">Servidor SMTP</label>
                                <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?= $configuration['smtp_host'] ?>">
                            </div>

                            <div class="control-group">
                                <label for="smtp_user">Usuário SMTP</label>
                                <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="<?= $configuration['smtp_user'] ?>">
                            </div>

                            <div class="control-group">
                                <label for="smtp_password">Senha SMTP</label>
                                <input type="password" class="form-control" id="smtp_password" name="smtp_password" value="<?= $configuration['smtp_password'] ?>">
                            </div>

                            <div class="control-group">
                                <label for="smtp_port">Porta SMTP</label>
                                <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="<?= $configuration['smtp_port'] ?>">
                            </div>

                            <div class="control-group">
                                <label for="smtp_crypto">Segurança SMTP</label>
                                <select name="smtp_crypto" id="smtp_crypto" >
                                    <option value="<?= $configuration['smtp_crypto'] ?>" selected hidden><?= $configuration['smtp_crypto'] == "tls" ? "TLS": "SSL" ?></option>
                                    <option value="tls">TLS</option>
                                    <option value="ssl">SSL</option>
                                </select>
                            </div>

                            <br>
                            <div class="form-actions">
                                <div class="span8">
                                    <div class="span9">
                                        <button type="submit" class="button btn btn-primary">
                                            <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Menu Atualizar Sistema -->

                    <div id="menu8" class="tab-pane fade">
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9" style="display:flex">
                                    <button href="#modal-confirmabanco" data-toggle="modal" type="button" class="button btn btn-warning">
                                        <span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Banco de Dados</span></button>
                                    <button href="#modal-confirmaratualiza" data-toggle="modal" type="button" class="button btn btn-danger">
                                        <span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar Site</span></button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Menu Notificações -->
                    <div id="menu3" class="tab-pane fade">
                        <div class="control-group">
                            <label for="app_name" class="control-label">Mensagem WhatsApp</label>

                            <div class="controls">
                                <input class="span5" name="whats_app2" type="text" value="<?= $configuration['whats_app2'] ?>" size="50">
                                <span class="help-inline">Nome da Loja</span>
                            </div>
                        </div>
                        <div class="controls">
                            <input class="span5 telefone1" name="whats_app3" type="text" id="telefone" value="<?= $configuration['whats_app3'] ?>" size="50">
                            <span class="help-inline">Telefone / Whatsapp da Loja</span>
                        </div>
                        <div class="controls">
                            <input class="span5" name="whats_app4" type="text" value="<?= $configuration['whats_app4'] ?>">
                            <span class="help-inline">URL Area do Cliente</span>
                        </div>

                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="button btn btn-primary">
                                        <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Financeiro -->
                    <div id="menu1" class="tab-pane fade">
                        <div class="control-group">
                            <label for="control_baixa" class="control-label">Controle de baixa retroativa</label>
                            <div class="controls">
                                <select name="control_baixa" id="control_baixa">
                                    <option value="1">Ativar</option>
                                    <option value="0" <?= $configuration['control_baixa'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar o controle de baixa financeira, com data retroativa.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="control_editos" class="control-label">Controle de edição de OS</label>
                            <div class="controls">
                                <select name="control_editos" id="control_editos">
                                    <option value="1" <?= $configuration['control_editos'] == '0' ? 'selected' : ''; ?>>Ativar</option>
                                    <option value="0" <?= $configuration['control_editos'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar a permissão para alterar ou excluir OS faturada e/ou cancelada.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="control_edit_vendas" class="control-label">Controle de edição de Vendas</label>
                            <div class="controls">
                                <select name="control_edit_vendas" id="control_edit_vendas">
                                    <option value="1" <?= $configuration['control_edit_vendas'] == '0' ? 'selected' : ''; ?>>Ativar</option>
                                    <option value="0" <?= $configuration['control_edit_vendas'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar a permissão para alterar ou excluir vendas faturada.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="pix_key" class="control-label">Chave Pix para Recebimento de Pagamentos</label>
                            <div class="controls">
                                <input type="text" name="pix_key" value="<?= $configuration['pix_key'] ?>">
                                <span class="help-inline">Chave Pix para Recebimento de Pagamentos</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="button btn btn-primary">
                                        <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Produtos -->
                    <div id="menu2" class="tab-pane fade">
                        <div class="control-group">
                            <label for="control_estoque" class="control-label">Controlar Estoque</label>
                            <div class="controls">
                                <select name="control_estoque" id="control_estoque">
                                    <option value="1">Ativar</option>
                                    <option value="0" <?= $configuration['control_estoque'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar o controle de estoque.</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="button btn btn-primary">
                                        <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Termos de Uso -->
                    <div id="menu4" class="tab-pane fade">
                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <label for="descricaoProduto">
                                <center>
                                    <h5>Termo ordem de Serviço A4</h5>
                                </center>
                            </label>
                            <textarea class="span12 editor" name="termo_uso" cols="25" rows="15"><?php echo $configuration['termo_uso'] ?></textarea>
                        </div>
                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <label for="descricaoProduto">
                                <center>
                                    <h5>Termo de Vendas A4</h5>
                                </center>
                            </label>
                            <textarea class="span12 editor" name="termo_venda" cols="25" rows="15"><?php echo $configuration['termo_venda'] ?></textarea>
                        </div>

                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <label for="descricaoProduto">
                                <center>
                                    <h5>Termo ordem de Serviço Térmica</h5>
                                </center>
                            </label>
                            <textarea class="span12 editor" name="termo_uso_Termica" cols="25" rows="15"><?php echo $configuration['termo_uso_Termica'] ?></textarea>
                        </div>
                        <div class="span6" style="padding: 1%; margin-left: 0">
                            <label for="descricaoProduto">
                                <center>
                                    <h5>Termos de Vendas Térmica</h5>
                                </center>
                            </label>
                            <textarea class="span12 editor" name="termo_venda_Termica" cols="25" rows="15"><?php echo $configuration['termo_venda_Termica'] ?></textarea>
                        </div>


                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="button btn btn-primary">
                                        <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Menu OS -->
                    <div id="menu5" class="tab-pane fade">
                        <div class="control-group">
                            <div class="span8">
                                <span6 class="span10" style="margin-left: 1em;"> Defina a vizualização padrão, onde o que ficar checado será exibida na listagem de OS por padrão. </span6>
                                <div class="span10">
                                    <label> <input <?= @in_array("Aguardando Análise Técnica", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Análise Técnica"> <span class="lbl">Aguardando Análise Técnica</span> </label>
                                    <label> <input <?= @in_array("Aguardando aprovação do cliente", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando aprovação do cliente"> <span class="lbl">Aguardando aprovação do cliente</span> </label>
                                    <label> <input <?= @in_array("Aguardando Peças", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Peças"> <span class="lbl">Aguardando Peças</span> </label>
                                    <label> <input <?= @in_array("Em Andamento", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Em Andamento"> <span class="lbl">Em Andamento</span> </label>
                                    <label> <input <?= @in_array("Pronto - Aguardando Retirada", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Pronto - Aguardando Retirada"> <span class="lbl">Pronto - Aguardando Retirada</span> </label>
                                    <label> <input <?= @in_array("Cancelado - Aguardando Retirada", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Cancelado - Aguardando Retirada"> <span class="lbl">Cancelado - Aguardando Retirada</span> </label>
                                    <label> <input <?= @in_array("Aguardando Retirada - Cliente já Informado(a)", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Retirada - Cliente já Informado(a)"> <span class="lbl">Aguardando Retirada - Cliente já Informado(a)</span> </label>
                                    <label> <input <?= @in_array("Enviado via Correio", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Enviado via Correio"> <span class="lbl">Enviado via Correio</span> </label>
                                    <label> <input <?= @in_array("Aguardando Receber via Correio", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Receber via Correio"> <span class="lbl">Aguardando Receber via Correio</span> </label>
                                    <label> <input <?= @in_array("Entregue - A Receber", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Entregue - A Receber"> <span class="lbl">Entregue - A Receber</span> </label>
                                    <label> <input <?= @in_array("Garantia", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Garantia"> <span class="lbl">Garantia</span> </label>
                                    <label> <input <?= @in_array("Abandonado - Sem resposta", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Abandonado - Sem resposta"> <span class="lbl">Abandonado - Sem resposta</span> </label>
                                    <label> <input <?= @in_array("Comprado pela Loja", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Comprado pela Loja"> <span class="lbl">Comprado pela Loja</span> </label>
                                    <label> <input <?= @in_array("Entregue - Faturado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Entregue - Faturado"> <span class="lbl">Entregue - Faturado</span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="button btn btn-primary">
                                        <span class="button__icon"><i class='bx bx-save'></i></span><span class="button__text2">Salvar Alterações</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="modal-confirmaratualiza" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Atualização de sistema - Cuidado!</h5>
        </div>
        <div class="modal-body">
            <h5 style="text-align: left">Cuidado! Deseja realmente fazer a atualização de sistema?</h5>
            <h7 style="text-align: left">Recomendamos que faça um backup antes de prosseguir!</h7>
            <h7 style="text-align: left"><br>Faça o backup dos seguintes arquivos pois os mesmo serão excluídos:</h7>
            <h7 style="text-align: left"><br>* ./assets/anexos</h7>
            <h7 style="text-align: left"><br>* ./assets/arquivos</h7>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="button btn btn-mini btn-danger" data-dismiss="modal" aria-hidden="true"><span class="button__icon"><i class='bx bx-x'></i></span> <span class="button__text2">Cancelar</span></button>
            <button id="update-mapos" type="button" class="button btn btn-warning"><span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>
        </div>
    </form>
</div>
<!-- Modal -->
<div id="modal-confirmabanco" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Atualização de sistema - Cuidado!</h5>
        </div>
        <div class="modal-body">
            <h5 style="text-align: left">Cuidado! Deseja realmente fazer a atualização do banco de dados?</h5>
            <h7 style="text-align: left">Recomendamos que faça um backup antes de prosseguir!
                <a target="_blank" title="Fazer Bakup" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/mapos/backup">Fazer Backup</a>
            </h7>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="button btn btn-mini btn-danger" data-dismiss="modal" aria-hidden="true"><span class="button__icon"><i class='bx bx-x'></i></span> <span class="button__text2">Cancelar</span></button>
            <button id="update-database" type="button" class="button btn btn-warning"><span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>
        </div>
    </form>
</div>



<div id="modalLogo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= site_url('mapos/editarLogos'); ?>" id="formLogo" enctype="multipart/form-data" method="post" class="form-horizontal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="">Atualizar Logotipo</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info">Selecione uma nova imagem da logotipo. Tamanho indicado (130 X 130).</div>
            <div class="control-group">
                <label for="logo" class="control-label"><span class="required">Logotipo*</span></label>
                <div class="controls">
                    <input type="file" name="userfile" value="" />
                    <input id="nome" type="hidden" name="id" value="<?= $dados[0]->id; ?>" />
                </div>
            </div>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="button btn btn-mini btn-danger" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir"><span class="button__icon"><i class='bx bx-x'></i></span> <span class="button__text2">Cancelar</span></button>
            <button class="button btn btn-primary"><span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>
        </div>
    </form>
</div>


<div id="modalLogoIcon" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= site_url('mapos/editarLogosIcon'); ?>" id="formLogo" enctype="multipart/form-data" method="post" class="form-horizontal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="">Atualizar Favicon</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info">Selecione uma nova imagem da Favicon. Tamanho indicado (130 X 130).</div>
            <div class="control-group">
                <label for="logo" class="control-label"><span class="required">Logotipo*</span></label>
                <div class="controls">
                    <input type="file" name="userfile" value="" />
                    <input id="nome" type="hidden" name="id" value="<?= $dados[0]->id; ?>" />
                </div>
            </div>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
            <button class="button btn btn-mini btn-danger" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir"><span class="button__icon"><i class='bx bx-x'></i></span> <span class="button__text2">Cancelar</span></button>
            <button class="button btn btn-primary"><span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span></button>
        </div>
    </form>
</div>

<script>
    $('#update-database').click(function() {
        window.location = "<?= site_url('mapos/atualizarBanco') ?>"
    });
    $('#update-mapos').click(function() {
        window.location = "<?= site_url('mapos/atualizarMapos') ?>"
    });
    $(document).ready(function() {
        $('#notifica_whats_select').change(function() {
            if ($(this).val() != "0")
                document.getElementById("notifica_whats").value += $(this).val();
            $(this).prop('selectedIndex', 0);
        });
    });
</script>