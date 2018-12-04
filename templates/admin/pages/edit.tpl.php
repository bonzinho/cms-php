<h3>Editar página</h3>

<form action="" method="POST" >
    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input type="text" name="title" id="pageTitle" placeholder="Título da página"  class="form-control" required value="<?php echo $data['pages']['title'] ?>">
    </div>

    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input type="text" name="url" id="pagesUrl" placeholder="Url amigável" class="form-control" required value="<?php echo $data['pages']['url'] ?>">
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="body" id="pagesBody" required value='<?php echo htmlentities($data['pages']['body']) ?>'>
        <trix-editor input="pagesBody"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>
<hr>

<a href="/admin/pages/<?php echo $data['pages']['id'] ?>" class="btn btn-secondary">Voltar</a>