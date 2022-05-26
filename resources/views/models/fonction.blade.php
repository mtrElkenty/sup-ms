{{-- Ajouter Fonction Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterFonction" tabindex="-1" role="dialog"
    aria-labelledby="ajouterFonctionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterFonctionLabel">Ajouter Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/fonctions" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="fonction">Titre Fonction *</label>
                    <input type="text" name="fonction" id="fonction" placeholder="Titre" class="form-control mb-1">
                    <label for="description">Description Fonction</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Une petite description du fonction"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modifier Fonction Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierFonction" tabindex="-1" role="dialog"
    aria-labelledby="modifierFonctionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierFonctionModifierLabel">Modifier Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/fonctions/" method="POST" id="modifierFonctionForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" id="idFonctionModel" hidden>
                    <input type="text" name="fonction" id="fonctionFonctionModel" placeholder="Titre" class="form-control mb-1">
                    <textarea class="form-control" name="description" id="descriptionFonctionModel" rows="3" placeholder="Une petite description du fonction"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Supprimer Fonction Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerFonction" tabindex="-1" role="dialog"
    aria-labelledby="supprimerFonctionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerFonctionLabel">Suprimer Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette fonction?</p>
            <form method="POST" action="/fonctions/" id="supprimerFonctionForm">
                @csrf
                @method('DELETE')
                <input type="text" name="id" id="idFonctionSupprimerModel" hidden>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
