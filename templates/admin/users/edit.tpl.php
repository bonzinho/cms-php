<h3 class="mb-5">Administração de utilizadores</h3>

<form method="post">
    <div class="form-group">
        <label for="usersEmail">Email</label>
        <input type="email" id="usersEmail" name="email" placeholder="Email de acesso" value="<?php echo $data['user']['email']; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="usersPassword">Password</label>
        <input type="password" id="usersPassword" name="password" placeholder="Senha de acesso" class="form-control" value="">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<hr>
<a href="/admin/users/<?php echo $data['user']['id']; ?>" class="btn btn-secondary">Voltar</a>