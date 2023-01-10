<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Deja Realmente excluir?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            Essa exclusão é permanente, tem certeza que deseja excluir?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
            <a href="/remover-profissao?id=<?= $profissao->id; ?>" class="btn btn-danger">Deletar</a>
        </div>
        </div>
    </div>
</div>