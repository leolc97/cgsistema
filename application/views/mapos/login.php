<!DOCTYPE html>
<html lang="pt-br">
<head>
<title><?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?> - CG Sistema para Lojas de Informática e testes</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/matrix-login.css" />
    <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/uploads/favicon/favicon.png" />
    <script src="<?= base_url() ?>assets/js/jquery-1.12.4.min.js"></script>
</head>
<body>
<div class="main-login">
  <div class="left-login">

<!-- Saudação -->
<h1 class="h-one">
    <?php
    function saudacao($nome = '')
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');
        if ($hora >= 6 && $hora <= 12) {
            return 'Olá! Bom dia' . (empty($nome) ? '' : ', ' . $nome);
        } elseif ($hora > 12 && $hora <=18) {
            return 'Olá! Boa tarde' . (empty($nome) ? '' : ', ' . $nome);
        } else {
            return 'Olá! Boa noite' . (empty($nome) ? '' : ', ' . $nome);
        }
    }
$login = 'Bem-vindos';
echo saudacao($login);

// Irá retornar conforme o horário:
?></h1>

<h2 class="h-two"> CG Sistema para Lojas de Informática - <?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></h2>
    <img src="<?php echo base_url() ?>assets/img/dashboard-animate.svg" class="left-login-image" alt="Map-OS - Versão: <?= $this->config->item('app_version'); ?>">
</div>
<div id="loginbox">
    <form class="form-vertical" id="formLogin" method="post" action="<?= site_url('login/verificarLogin') ?>">
    <?php if ($this->session->flashdata('error') != null) { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $this->session->flashdata('error'); ?>
        </div>
    </div>
  <?php } ?>
  <div class="d-flex flex-column">
      <div class="right-login">
        <div class="container">
          <div class="card">
            <div class="content">
              <div id="newlog">
               
                <div class="title01">
                  <?= $configuration['app_theme'] == 'white' ? '<img src="'. base_url() .'assets\uploads\logo\logo.png">' : '<img src="'. base_url() .'assets\uploads\logo\logo.png">'; ?>
                </div>
              </div>
              <br>
              <form action="index.html" method="post">
                <div class="input-field">
                  <label class="fas fa-user" for="nome"></label>
                  <input id="email" name="email" type="text" placeholder="Email">
                </div>
                <div class="input-field">
                  <label class="fas fa-lock" for="senha"></label>
                <input name="senha" type="password" placeholder="Senha">
              </div>
              <div class="center"><button id="btn-acessar">Acessar</button>
              </div>
              <div class="links-uteis"><a target="_blank" href="https://cgsistema.com.br"><p><?= date('Y'); ?> &copy; Fernando Alcântara <br> CG Sistema Todos direitos Reservados <br> Versão:
      <?= $this->config->item('app_version'); ?></p></a>
              </div>
              <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>
              <div id="notification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                  <h4 id="myModalLabel"><?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></h4>
                </div>
                <div class="modal-body">
                  <h5 style="text-align: center" id="message">Os dados de acesso estão incorretos, por favor tente novamente!</h5>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>
    <div id="notification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <h4 id="myModalLabel"><?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></h4>
      </div>
      <div class="modal-body">
        <h5 style="text-align: center" id="message">Os dados de acesso estão incorretos, por favor tente novamente!</h5>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
      </div>
    </div>

<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/validate.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $('#email').focus();
    $("#formLogin").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true
            }
        },
        messages: {
            email: {
                required: '',
                email: 'Insira Email válido'
            },
            senha: {
                required: 'Campos Requeridos.'
            }
        },
        submitHandler: function(form) {
                    var dados = $(form).serialize();
                    $('#btn-acessar').addClass('disabled');
                    $('#progress-acessar').removeClass('hide');

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('login/verificarLogin?ajax=true'); ?>",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.href = "<?= site_url('mapos'); ?>";
                            } else {


                                $('#btn-acessar').removeClass('disabled');
                                $('#progress-acessar').addClass('hide');

                                $('#message').text(data.message || 'Os dados de acesso estão incorretos, por favor tente novamente!');
                                $('#call-modal').trigger('click');
                            }
                        }
                    });

                    return false;
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



<a href="https://api.whatsapp.com/send?phone=5567993433612&text=Olá,%20Preciso%20de%20ajuda%20aqui%20no%20Sistema%20de%20OS,%20Pode%20me%20ajudar?"
    target="_blank"
    style="position:fixed;bottom:20px;right:30px;">
    <svg enable-background="new 0 0 512 512" width="50" height="50" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
</a>


</body>
</html>
