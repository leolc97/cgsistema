<?php if ($emitente[0]): ?>
    <div>
        <br>
        <div style="width: 50%; float: left" class="float-left col-md-3">
            <img style="width: 210px" src="<?= convertUrlToUploadsPath($emitente[0]->url_logo) ?>" alt=""><br><br>
        </div>
        <div style="float: right">
            <?= $emitente[0]->nome ?> <br>
            <?= $emitente[0]->cnpj ?><br>
            <?= $emitente[0]->rua ?>, <?= $emitente[0]->numero ?>, <?= $emitente[0]->bairro ?><br>
            <?= $emitente[0]->cidade ?> - 
            <?= $emitente[0]->uf ?> <br>
            <?= $emitente[0]->email ?> <br>
            <?= $emitente[0]->telefone ?> <br><br><br>

            <?php if (isset($title)): ?>
               <b> <?= $title ?></b><br>
            <?php endif ?>
            <br><br>
            <?php if (isset($dataInicial)): ?>
                <b>DATA INICIAL: </b> <?= $dataInicial ?>
            <?php endif ?>

            <?php if (isset($dataFinal)): ?>
                <b>DATA FINAL: </b> <?= $dataFinal ?>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>
