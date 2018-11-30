<h3>Editar página</h3>

<form action="" method="POST" >
    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input type="text" name="title" id="pageTitle" placeholder="Título da página"  class="form-control" required value="Página inicial">
    </div>

    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input type="text" name="url" id="pagesUrl" placeholder="Url amigável" class="form-control" required>
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="body" id="pagesBody" required value="<h3>Página inicial</h3><div>Esta é a página inicial do site</div>">
        <trix-editor input="pagesBody"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>
<hr>

<a href="/admin/pages/1" class="btn btn-secondary">Voltar</a>