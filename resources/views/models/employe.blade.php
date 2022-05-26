{{-- Supprimer Employe Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerEmploye" tabindex="-1" role="dialog"
     aria-labelledby="supprimerEmployeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerEmployeLabel">Suprimer Employe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette employe?</p>
            <form method="POST" action="/employes/" id="supprimerEmployeForm">
                @csrf
                @method('DELETE')
                <input type="text" name="id" id="idEmployeSupprimerModel" hidden>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
