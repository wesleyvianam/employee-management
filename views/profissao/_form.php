<form class="p-3 row" method="post">
    <?php if ($profissao != null): ?>
        <input type="hidden" name="id" value="<?= $profissao->id ?>" />
    <?php endif; ?>
    <div class="col-md-6">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" 
            name="nome" 
            id="nome" 
            class="form-control 
            form-control-sm" 
            required
            autofocus
            value="<?= $profissao?->nome; ?>"
            placeholder="nome da profissão">
    </div>
    
    <div class="text-end mt-3 col-md-6 text-end pt-3">
        <a href="/profissoes?pagina=1" class="btn btn-sm btn-danger me-1">
            Cancelar
        </a>
        <button type="submit" class="btn btn-sm btn-cadastrar">
            <?= $profissao ? "Atualizar" : "Cadastrar" ?>
        </button>
    </div>
</form> 