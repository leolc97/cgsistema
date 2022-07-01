<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>


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

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                
                <h5>Cadastro de OS</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">

                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <?php if ($custom_error == true) { ?>
                                    <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente, responsável e garantia.<br />Ou se tem um cliente e um termo de garantia cadastrado.</div>
                                <?php
                                } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <div class="span12" style="padding: 1%">
                                        <div class="span6">

                                        
                                            <!--  Cliente -->

                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="" placeholder="Obs: Nome do cliente já cadastrado"/>
                                            <input id="clientes_id" class="span11" type="hidden" name="clientes_id" value="" />
                                            
                                            <!--  Fim Cliente -->

                                            <!--  Data de Entrada -->

                                            <label for="dataInicial">Data de Entrada<span class="required">*</span></label>
                                            <input id="dataInicial" autocomplete="off" class="span6 datetime" readonly type="text" name="dataInicial" value="<?php echo date('d/m/Y H:i:s'); ?>" />
                        
                                            <!-- Fim Data de Entrada -->

                                            <!--  Status -->

                                        
                                            <label for="status">Status<span class="required">*</span></label>
                                            <select class="span11" name="status" id="status" value="">
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
                                       
                                            <!--  Fim Status -->

                                              <!--  Cor -->
                                            
                                            <label for="marca">Cor</label>

                                            <input id="cor" type="text" class="span11" name="cor" maxlength="100" value="<?php echo $result->cor ?>" placeholder="Ex: Preto, Branco..." />

                                            <!--  Fim Cor -->


                                            <!--  Senha -->

                                            <label for="secu">Senha</label>

                                            <input id="secu" type="text" class="span11" name="secu" maxlength="100" value="<?php echo $result->secu ?>" placeholder="Ex: PIN, @Tgsd5656...." />

                                            <!--  Fim Senha -->

                                              <!--  Com / Sem Periféricos -->

                                              <label for="perife">Com / Sem Periféricos</label>

                                            <select class="span11" name="perife" id="perife" value="">

                                            <option <?php if($result->perife == 'Sem Periférico'){echo 'selected';} ?> value="Sem Periférico">Sem Periférico</option>

                                            <option <?php if($result->perife == 'Com Periférico'){echo 'selected';} ?> value="Com Periférico">Com Periférico</option>

                                            </select>


                                            <!--  Fim Com / Sem Periféricos -->


                                            <!--  Rastreio -->

                                            <label for="rastreio">Rastreio</label>

                                            <input id="rastreio" type="text" class="span11" name="rastreio" maxlength="100" value="<?php echo $result->rastreio ?>" placeholder="Ex: BR3458683..." />

                                            <!--  Fim Rastreio -->

                                        </div>



                                    <div class="span6">

                                    
                                            <!--  Atendente -->

                                            <label for="tecnico">Atendente<span class="required">*</span></label>

                                            <input id="$usuario" class="span11" readonly type="text" name="$usuario" value="<?= $this->session->userdata('nome'); ?>" />

                                            <input id="usuarios_id" class="span11" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
                                            
                                            <!--  Fim Atendente -->
                                       

                                            <!--  Data Final do Orçamento -->

                                            <label for="dataFinal">Data Final do Orçamento<span class="required">*</span></label>
                                            <input id="dataFinal" autocomplete="off" class="span6 datepicker" type="text" name="dataFinal" value="" placeholder="Ex: Prazo de orçamento para o cliente.."/>
                                        
                                            <!--  Fim Data Final do Orçamento -->

                                            
                                            <!--  Tipo do Equipamento -->

                                            <label for="tipoeq">Tipo do Equipamento</label>

                                            <input id="tipoeq" type="text" class="span11" name="tipoeq" maxlength="100" value="<?php echo $result->tipoeq ?>" placeholder="Ex. Notebook, Computador..." />

                                            <!--  Fim Tipo do Equipamento -->

                                            
                                            <!--  Marca do Equipamento -->

                                            <label for="marca">Marca</label>

                                            <input id="marca" type="text" class="span11" name="marca" maxlength="100" value="<?php echo $result->marca ?>" placeholder="Ex. Asus, Pichau, XFX..." />

                                            <!--  Fim Marca do Equipamento -->

                                            
                                            <!--  Modelo do Equipamento -->

                                            <label for="modeloeq">Modelo</label>

                                            <input id="modeloeq" type="text" class="span11" name="modeloeq" maxlength="100" value="<?php echo $result->modeloeq ?>" placeholder="Ex. X515JA, GADIT X, RX550 4GB..." />

                                            <!--  Fim Marca do Equipamento -->

                                            <!--  Nº Série -->
                                            
                                            <label for="marca">Nº Série</label>

                                            <input id="serial" type="text" class="span11" name="serial" maxlength="100" value="<?php echo $result->serial ?>" placeholder="Ex. 782348770, HBSDYFG74YR..." />

                                            <!--  Fim Nº Série -->


                                            
                                          

                                        </div>

                                      
                                    </div>

                                    <br><br>
                                   
                                   <div class="row-fluid" style="margin-top:0">
                                   
                                   <div class="span12">
                                   
                                   <div class="widget-box">
                                   
                                   <div class="widget-title">
                                   
                                   
                                   
<br>
    <center><span style="font-size: 15px"><b>Descrição do Produto / Serviço / Problema Informado / Anotações</b></span></center>
    <br>
                                   </div>
                                   </div>
                                   </div>
                                   </div>


                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                        <center><span style="font-size: 15px"><b>Descrição do Produto / Serviço</b></span></center> 
                                        </label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5" placeholder="Ex. caso for um computador: Computador usado, Sem lacres de garantia, faltando tampa lateral, arranhado na parte frontal... Ex. caso for um notebook: Notebook Usado, Sem lacres de garantia, Com tela quebrada, faltando parafusos, com fonte carregador..."></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                        <center><span style="font-size: 15px"><b>Problema Informado</b></span></center> 
                                        </label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5" placeholder="Ex. caso for um computador: Cliente informou que o computador não esta apresentando imagens, fazer analise geral para orçamento... Ex. caso for um notebook: Cliente quer trocar a tela e fazer manutenção preventiva e Formatação, fazer analise geral para orçamento..."></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                        <center><span style="font-size: 15px"><b>Anotações</b></span></center> 
                                         </label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5" placeholder="Ex. Aqui pode ser colocado obs. da qual o cliente tem acesso: Exemplo: Fotos em anexo no link da OS... Exemplo: Cliente deixou valor pago pré aprovado R$ 50 reais no dia 10/06/2022... Exemplo: Foi feito pedido da peça (tal) para o reparo. Data do pedido 11/06/2022 previsto chegar no dia 17/06/2022..."></textarea>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="display:flex">
                                            <button class="button btn btn-success" id="btnContinuar">
                                              <span class="button__icon"><i class='bx bx-chevrons-right'></i></span><span class="button__text2">Continuar</span></button>
                                            <a href="<?php echo base_url() ?>index.php/os" class="button btn btn-mini btn-warning" style="max-width: 160px">
                                              <span class="button__icon"><i class="bx bx-undo"></i></span><span class="button__text2">Voltar</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                .
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 1,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
            minLength: 1,
            select: function(event, ui) {
                $("#garantias_id").val(ui.item.id);
            }
        });

        $("#formOs").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataInicial: {
                    required: true
                },
                dataFinal: {
                    required: true
                }

            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                tecnico: {
                    required: 'Campo Requerido.'
                },
                dataInicial: {
                    required: 'Campo Requerido.'
                },
                dataFinal: {
                    required: 'Campo Requerido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
