<h3 class="mb-5">Administração de utilizadores</h3>

<dl class="rol">
    <dr class="col-sm-3">Email</dr>
    <dd class="col-sm-9"><?php echo $data['user']['email']; ?></dd>

    <dr class="col-sm-3">Criado em </dr>
    <dd class="col-sm-9"><?php echo $data['user']['created']; ?></dd>

    <dr class="col-sm-3">Actualizado em</dr>
    <dd class="col-sm-9"><?php echo $data['user']['updated']; ?></dd>
</dl>

<p>
    <a href="/admin/users/<?php echo $data['user']['id']; ?>/edit" class="btn btn-primary">Editar</a>
    <a href="/admin/users/<?php echo $data['user']['id']; ?>/delete" class="btn btn-danger confirm">Remover</a>
</p>

<a href="/admin/users" class="btn btn-secondary">Voltar</a>