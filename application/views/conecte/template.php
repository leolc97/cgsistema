<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Área do Cliente - <?php $configuracoes = $this->db->get('configuracoes')->result();
echo $configuracoes[0]->valor?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $this->config->item('app_name') . ' - ' . $this->config->item('app_subname') ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/uploads/favicon/favicon.png">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--Header-part-->
  
    <!--close-Header-part-->

    <!--top-Header-menu-->
    
<!--sidebar-menu-->
<nav id="sidebar">
    <br>
    <div id="newlog">
       
        <div class="title1">
            <?= $configuration['app_theme'] == 'white' ? '<img src="' . base_url() . 'assets\uploads\logo\logo.png">' : '<img src="' . base_url() . 'assets\uploads\logo\logo.png">'; ?>
        </div>
    </div>
    <a href="#" class="visible-phone">
        <div class="mode">
            <div class="moon-menu">
                <i class='bx bx-menu iconX open-2'></i>
                <i class='bx bx-x iconX close-2'></i>
            </div>
        </div>
    </a>
    <br>
    <br>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links" style="position: relative;">
                    <li class="<?php if (isset($menuPainel)) {
    echo 'active';
}; ?>"><a class="tip-bottom" title="" href="<?php echo base_url() ?>index.php/mine/painel"><i class='bx bx-home-alt iconX'></i> <span class="title">Painel</span></a></li>
                    <li class="<?php if (isset($menuConta)) {
    echo 'active';
}; ?>"><a class="tip-bottom" title="" href="<?php echo base_url() ?>index.php/mine/conta"><i class="bx bx-user-circle iconX"></i> <span class="title">Minha Contas</span></a></li>
                    <li class="<?php if (isset($menuOs)) {
    echo 'active';
}; ?>"><a class="tip-bottom" title="" href="<?php echo base_url() ?>index.php/mine/os"><i class='bx bx-spreadsheet iconX'></i> <span class="title">Ordens de Serviço</span></a></li>
                    <li class="<?php if (isset($menuVendas)) {
    echo 'active';
}; ?>"><a class="tip-bottom" title="" href="<?php echo base_url() ?>index.php/mine/compras"><i class='bx bx-cart-alt iconX'></i> <span class="title">Compras</span></a></li>
                    <li class="<?php if (isset($menuCobrancas)) {
    echo 'active';
}; ?>"><a class="tip-bottom" title="" href="<?php echo base_url() ?>index.php/mine/cobrancas"><i class='bx bx-credit-card-front iconX'></i> <span class="title">Cobranças</span></a></li>
                </ul>
            </div>

            <div class="botton-content">
                <li class="">
                    <a class="tip-bottom" title="" href="<?= site_url('login/sair'); ?>">
                        <i class='bx bx-log-out-circle iconX'></i>
                        <span class="title">Sair</span></a>
                </li>
            </div>

        </div>
    </nav>

    <div style="background: #f3f4f6" id="content">
        <div class="content-header" id="content-header">
            </div>

        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span12">
                    <?php if ($var = $this->session->flashdata('success')) : ?><script>
                            swal("Sucesso!", "<?php echo str_replace('"', '', $var); ?>", "success");
                        </script><?php endif; ?>
                    <?php if ($var = $this->session->flashdata('error')) : ?><script>
                            swal("Falha!", "<?php echo str_replace('"', '', $var); ?>", "error");
                        </script><?php endif; ?>
                    <?php if (isset($output)) {
    $this->load->view($output);
} ?>

                </div>
            </div>

        </div>
    </div>
    <!--Footer-part-->
    <div class="row-fluid">
    <div id="footer" class="span12"> <a class="pecolor" href="https://cgsistema.com.br" target="_blank">
            <?= date('Y'); ?> &copy; Fernando Alcântara - CG Sistema Todos direitos Reservados - Versão:
      <?= $this->config->item('app_version'); ?></a></div>
</div>
    </div>

    <!-- javascript
================================================== -->
<?php $configuracoes = $this->db->get('configuracoes')->result();
$ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
$isMob = is_numeric(strpos($ua, "mobile"));
$test;
$isMob ? $test = 'https://api.whatsapp.com/send?phone=55' : $test = 'https://web.whatsapp.com/send?phone=55';
echo '<a target="_blank" style="position:fixed;bottom:20px;right:30px;" href="'. $test . $configuracoes[17]->valor . '&text=Olá,%20Preciso%20de%20ajuda%20aqui%20na%20área%20do%20cliente,%20Pode%20me%20ajudar?">'?>
    <svg enable-background="new 0 0 512 512" width="50" height="50" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
</a>

    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/matrix.js"></script>
</body>
</html>
