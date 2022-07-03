{{-- Ajouter Module Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterModule" tabindex="-1" role="dialog"
    aria-labelledby="ajouterModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterModuleLabel">
                    Ajouter Module
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/modules" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="code_module">Code Module *</label>
                    <input type="text" name="code_module" id="code_module" placeholder="Code module"
                        class="form-control mb-1">

                    <label for="libelle_module">Libelle Module</label>
                    <input type="text" class="form-control mb-1" name="libelle_module" id="libelle_module"
                        placeholder="Libelle Module" />

                    <label for="filieres_id_filiere">Filiere</label>
                    <select name="filieres_id_filiere" id="filieres_id_filiere" class="form-control mb-1">
                        <option value="">Filiere du module</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id_filiere }}">{{ $filiere->libelle_filiere }}</option>
                        @endforeach
                    </select>

                    <label for="semestres_id_semestre">Semestre</label>
                    <select name="semestres_id_semestre" id="semestres_id_semestre" class="form-control">
                        <option value="">Semestre du module</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id_semestre }}">{{ $semestre->libelle_semestre }}</option>
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

{{-- Modifier Module Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierModule" tabindex="-1" role="dialog"
    aria-labelledby="modifierModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierModuleModifierLabel">
                    Modifier Module
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/modules/" method="POST" id="modifierModuleForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id_modules" id="idModuleModifierModel" hidden>

                    <label for="code_module">Code Module *</label>
                    <input type="text" name="code_module" id="codeModuleModifierModel" placeholder="Code module"
                        class="form-control mb-1">

                    <label for="libelle_module">Libelle Module</label>
                    <input type="text" name="libelle_module" id="libelleModuleModifierModel"
                        class="form-control mb-1" placeholder="Libelle Module" />

                    <label for="filieres_id_filiere">Filiere</label>
                    <select name="filieres_id_filiere" id="FilieresIdFiliereModuleModifierModel"
                        class="form-control mb-1">
                        <option value="">Filiere du module</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id_filiere }}">{{ $filiere->libelle_filiere }}</option>
                        @endforeach
                    </select>

                    <label for="semestres_id_semestre">Semestre</label>
                    <select name="semestres_id_semestre" id="SemestresIdSemestreModuleModifierModel"
                        class="form-control">
                        <option value="">Semestre du module</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id_semestre }}">{{ $semestre->libelle_semestre }}</option>
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

{{-- Supprimer Module Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerModule" tabindex="-1" role="dialog"
    aria-labelledby="supprimerModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerModuleLabel">
                    Suprimer Module
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette module?</p>
            <form method="POST" action="/modules/" id="supprimerModuleForm">
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
