{{-- Ajouter Cycle Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterCycle" tabindex="-1" role="dialog"
     aria-labelledby="ajouterCycleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterCycleLabel">Ajouter Cycle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/cycles" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="libelle_cycle">Libelle Cycle *</label>
                    <input type="text" name="libelle_cycle" id="libelle_cycle" placeholder="Libelle" class="form-control mb-1" />
                    <label for="nombre_annees">Nombre d'Annees</label>
                    <input type="number" class="form-control" name="nombre_annees" id="nombre_annees" placeholder="nombre d'annees" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modifier Cycle Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierCycle" tabindex="-1" role="dialog"
     aria-labelledby="modifierCycleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierCycleModifierLabel">Modifier Cycle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/cycles/" method="POST" id="modifierCycleForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id_cycle" id="idCycleModifierModel" hidden>
                    <input type="text" name="libelle_cycle" id="libelleCycleModel" placeholder="Libelle" class="form-control mb-1">
                    <input type="number" name="nombre_annees" id="NombreAnneeCycleModel" placeholder="nombre d'annees" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Supprimer Cycle Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerCycle" tabindex="-1" role="dialog"
     aria-labelledby="supprimerCycleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerCycleLabel">Suprimer Cycle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cet cycle?</p>
            <form method="POST" action="/cycles/" id="supprimerCycleForm">
                @csrf
                @method('DELETE')
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
