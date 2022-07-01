<style>
    /* Hiding the checkbox, but allowing it to be focused */
    .badgebox {
        opacity: 0;
    }

    .badgebox+.badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
    }

    .badgebox:focus+.badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */

        /* Adding a light border */
        box-shadow: inset 0px 0px 5px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked+.badge {
        /* Move the check mark back when checked */
        text-indent: 0;
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
            <div class="widget-title" style="margin: -20px 0 0">
                <span class="icon">
                    <i class="fas fa-shopping-bag"></i>
                </span>
                <h5>Cadastro de Produto</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formProduto" method="post" class="form-horizontal">
                    <div class="control-group">
                        <label for="codDeBarra" class="control-label" >Código de Barra<span class=""></span></label>
                        <div class="controls">
                            
                        <?php function gerar_cod_barras($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
  $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  $nu = "0123456789"; // $nu contem os números
  $si = "!@#$%¨&*()_+="; // $si contem os símbolos 

  if ($maiusculas){
        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($ma);
  }

    if ($minusculas){
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($mi);
    }

    if ($numeros){
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($nu);
    }

    if ($simbolos){
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($si);
    }

    // retorna a cod_barras embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($cod_barras),0,$tamanho);
}
?>
                       
                       <input id="codDeBarra" type="text" name="codDeBarra" maxlength="13" value="<?php echo gerar_cod_barras(10, false, false, true, false); ?><?php echo gerar_cod_barras(2, false, false, true, false); ?>" placeholder="Ex. 52745749577..." />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label">Nome Do Produto<span class="required">*</span></label>
                        <div class="controls">
                            <input id="descricao" class="span8" type="text" name="descricao" value="<?php echo set_value('descricao'); ?>" placeholder="Ex. Computador Gamer Pichau, Ryzen 5 3600..." />
                        </div>
                    </div>
                    <div class="control-group">
                    <label for="descricaoproduto" class="control-label">Descrição do Produto <span class="required"> * </span></label>
                    <div class="controls">
                    <textarea id="descricaoproduto" class="span8 editor" name="descricaoproduto" placeholder="Ex. Configuração: Processador Ryzen 5 3600, 6 núcleo 12 threads 32mb cache, 16Gb de memória ram, SSD 120gb, HD 1000gb velocidade 7200RPM, Fonte 600watts 80 plus, RX 570 4gb 256bits, Placa de rede 10/1000 GigaLan, Gabinete Gamer camuflado porta de vidro temperado com 4 fan!" rows="6" ></textarea>        
                    </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tipo de Movimento</label>
                        <div class="controls">
                            <label for="entrada" class="btn btn-default" style="margin-top: 5px;">Entrada
                                <input type="checkbox" id="entrada" name="entrada" class="badgebox" value="1" checked>
                                <span class="badge">&check;</span>
                            </label>
                            <label for="saida" class="btn btn-default" style="margin-top: 5px;">Saída
                                <input type="checkbox" id="saida" name="saida" class="badgebox" value="1" checked>
                                <span class="badge">&check;</span>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="precoCompra" class="control-label">Preço de Compra<span class="required">*</span></label>
                        <div class="controls">
                            <input style="width: 9em;" id="precoCompra" class="money" data-affixes-stay="true" data-thousands="" data-decimal="." type="text" name="precoCompra" value="<?php echo set_value('precoCompra'); ?>" placeholder="Ex. 3.780,00" />
                            Margem <input style="width: 3em;" id="margemLucro" name="margemLucro" type="text" placeholder="%" maxlength="3" size="2" />
                            <strong><span style="color: red" id="errorAlert"></span><strong>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="precoVenda" class="control-label">Preço de Venda<span class="required">*</span></label>
                        <div class="controls">
                            <input id="precoVenda" class="money" data-affixes-stay="true" data-thousands="" data-decimal="." type="text" name="precoVenda" value="<?php echo set_value('precoVenda'); ?>" placeholder="Ex. 4.220,00" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="unidade" class="control-label">Unidade<span class="required">*</span></label>
                        <div class="controls">
                            <select id="unidade" name="unidade" style="width: 16em;"></select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="estoque" class="control-label">Estoque<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estoque" type="text" name="estoque" value="<?php echo set_value('estoque'); ?>" placeholder="Ex. 10" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="estoqueMinimo" class="control-label">Estoque Mínimo</label>
                        <div class="controls">
                            <input id="estoqueMinimo" type="text" name="estoqueMinimo" value="<?php echo set_value('estoqueMinimo'); ?>" placeholder="Ex. 1" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3" style="display: flex;justify-content: center">
                                <button type="submit" class="button btn btn-mini btn-success" style="max-width: 160px"><span class="button__icon"><i class='bx bx-plus-circle'></i></span><span class="button__text2">Adicionar</span></button>
                                <a href="<?php echo base_url() ?>index.php/produtos" id="" class="button btn btn-mini btn-warning"><span class="button__icon"><i class="bx bx-undo"></i></span><span class="button__text2">Voltar</span></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    function calcLucro(precoCompra, margemLucro) {
        var precoVenda = (precoCompra * margemLucro / 100 + precoCompra).toFixed(2);
        return precoVenda;
    }
    $("#precoCompra").focusout(function() {
        if ($("#precoCompra").val() == '0.00' && $('#precoVenda').val() != '') {
            $('#errorAlert').text('Você não pode preencher valor de compra e depois apagar.').css("display", "inline").fadeOut(6000);
            $('#precoVenda').val('');
            $("#precoCompra").focus();
        } else {
            $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
        }
    });

    $("#margemLucro").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
        if ($("#precoCompra").val() == null || $("#precoCompra").val() == '') {
            $('#errorAlert').text('Preencher valor da compra primeiro.').css("display", "inline").fadeOut(5000);
            $('#margemLucro').val('');
            $('#precoVenda').val('');
            $("#precoCompra").focus();

        } else if (Number($("#margemLucro").val()) >= 0) {
            $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
        } else {
            $('#errorAlert').text('Não é permitido número negativo.').css("display", "inline").fadeOut(5000);
            $('#margemLucro').val('');
            $('#precoVenda').val('');
        }
    });

    $('#precoVenda').focusout(function () {
        if (Number($('#precoVenda').val()) < Number($("#precoCompra").val())) {
            $('#errorAlert').text('Preço de venda não pode ser menor que o preço de compra.').css("display", "inline").fadeOut(6000);
            $('#precoVenda').val('');
            if ($("#margemLucro").val() != "" || $("#margemLucro").val() != null) {
                $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
            }
        }

    });

    $(document).ready(function() {
        $(".money").maskMoney();
        $.getJSON('<?php echo base_url() ?>assets/json/tabela_medidas.json', function(data) {
            for (i in data.medidas) {
                $('#unidade').append(new Option(data.medidas[i].descricao, data.medidas[i].sigla));
            }
        });
        $('#formProduto').validate({
            rules: {
                descricao: {
                    required: true
                },
                unidade: {
                    required: true
                },
                precoCompra: {
                    required: true
                },
                precoVenda: {
                    required: true
                },
                estoque: {
                    required: true
                }
            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                unidade: {
                    required: 'Campo Requerido.'
                },
                precoCompra: {
                    required: 'Campo Requerido.'
                },
                precoVenda: {
                    required: 'Campo Requerido.'
                },
                estoque: {
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
    });
</script>
