{{-- Ajouter Matiere Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterMatiere" tabindex="-1" role="dialog"
    aria-labelledby="ajouterMatiereLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterMatiereLabel">
                    Ajouter Matiere
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/matieres" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="code_matiere">Code Matiere *</label>
                    <input type="text" name="code_matiere" id="code_matiere" placeholder="Code matiere"
                        class="form-control mb-1">

                    <label for="libelle_matiere">Libelle Matiere</label>
                    <input type="text" class="form-control mb-1" name="libelle_matiere" id="libelle_matiere"
                        placeholder="Libelle Matiere" />

                    <label for="coefficient">Coefficient Matiere</label>
                    <input type="number" name="coefficient" id="coefficientModifierModel" class="form-control mb-1"
                        placeholder="Coefficient Matiere" />

                    <label for="modules_id_modules">Module</label>
                    <select name="modules_id_modules" id="modules_id_modules" class="form-control">
                        <option value="">Module du matiere</option>
                        @foreach ($modules as $module)
                            <option value="{{ $module->id_modules }}">{{ $module->libelle_module }}</option>
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

{{-- Modifier Matiere Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierMatiere" tabindex="-1" role="dialog"
    aria-labelledby="modifierMatiereLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierMatiereModifierLabel">
                    Modifier Matiere
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/matieres/" method="POST" id="modifierMatiereForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <label for="code_matiere">Code Matiere *</label>
                    <input type="text" name="code_matiere" id="codeMatiereModifierModel" placeholder="Code matiere"
                        class="form-control mb-1">

                    <label for="libelle_matiere">Libelle Matiere</label>
                    <input type="text" name="libelle_matiere" id="libelleMatiereModifierModel"
                        class="form-control mb-1" placeholder="Libelle Matiere" />

                    <label for="coefficient">Coefficent Matiere</label>
                    <input type="number" name="coefficient" id="coefficientMatiereModifierModel"
                        class="form-control mb-1" placeholder="Coefficent Matiere" />

                    <label for="modules_id_modules">Module</label>
                    <select name="modules_id_modules" id="ModulesIdModulesMatiereModifierModel" class="form-control">
                        <option value="">Module du matiere</option>
                        @foreach ($modules as $module)
                            <option value="{{ $module->id_modules }}">{{ $module->libelle_module }}</option>
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

{{-- Supprimer Matiere Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerMatiere" tabindex="-1" role="dialog"
    aria-labelledby="supprimerMatiereLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerMatiereLabel">
                    Suprimer Matiere
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette matiere?</p>
            <form method="POST" action="/matieres/" id="supprimerMatiereForm">
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
