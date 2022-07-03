{{-- Ajouter Niveau Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterNiveau" tabindex="-1" role="dialog"
    aria-labelledby="ajouterNiveauLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterNiveauLabel">
                    Ajouter Niveau
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/niveaux" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="libelle_niveau">Libelle Niveau</label>
                    <input type="text" class="form-control mb-1" name="libelle_niveau" id="libelle_niveau"
                        placeholder="Libelle Niveau" />

                    <label for="cycles_id_cycle">Cycle</label>
                    <select name="cycles_id_cycle" id="cycles_id_cycle" class="form-control">
                        <option value="">Cycle du niveau</option>
                        @foreach ($cycles as $cycle)
                            <option value="{{ $cycle->id_cycle }}">{{ $cycle->libelle_cycle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modifier Niveau Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierNiveau" tabindex="-1" role="dialog"
    aria-labelledby="modifierNiveauLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierNiveauModifierLabel">
                    Modifier Niveau
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/niveaux/" method="POST" id="modifierNiveauForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id_niveau" id="idNiveauModifierModel" hidden>

                    <label for="libelle_niveau">Libelle Niveau</label>
                    <input type="text" name="libelle_niveau" id="libelleNiveauModifierModel"
                        class="form-control mb-1" placeholder="Libelle Niveau" />

                    <label for="cycles_id_cycle">Cycle</label>
                    <select name="cycles_id_cycle" id="CyclesIdCycleNiveauModifierModel" class="form-control">
                        <option value="">Cycle du niveau</option>
                        @foreach ($cycles as $cycle)
                            <option value="{{ $cycle->id_cycle }}">{{ $cycle->libelle_cycle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Supprimer Niveau Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerNiveau" tabindex="-1" role="dialog"
    aria-labelledby="supprimerNiveauLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerNiveauLabel">
                    Suprimer Niveau
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette niveau?</p>
            <form method="POST" action="/niveaux/" id="supprimerNiveauForm">
                @csrf
                @method('DELETE')
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
