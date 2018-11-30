<h3 class="mb-5">Detalhes da página</h3>

<div class="row">
    <div class="col-3">
        <dl class="row">
            <dt class="col-sm-4">Título</dt>
            <dd class="col-sm-8"><?php echo $data['pages']['title'] ?></dd>

            <dt class="col-sm-4"><?php echo $data['pages']['url'] ?></dt>
            <dd class="col-sm-8">/ - <a href="/<?php echo $data['pages']['url'] ?>" target="_blank">Abrir</a></dd>

            <dt class="col-sm-4">Criado em </dt>
            <dd class="col-sm-8"><?php echo $data['pages']['created'] ?></dd>

            <dt class="col-sm-4">Atualizado em</dt>
            <dd class="col-sm-8"><?php echo $data['pages']['updated'] ?></dd>
        </dl>
    </div>
    <div class="col bg-light">
        <h3><?php echo $data['pages']['title'] ?></h3>
        <div><?php echo $data['pages']['body'] ?></div>
    </div>
</div>
<p>
    <a href="/admin/pages/<?php echo $data['pages']['id'] ?>/edit" class="btn btn-primary">Editar</a>
    <a href="/admin/pages/<?php echo $data['pages']['id'] ?>/delete" class="btn btn-danger confirm">Remover</a>
</p>

<hr>

<a href="/admin/pages" class="btn btn-secondary">Voltar</a>