{{-- Ajouter Semestre Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterSemestre" tabindex="-1" role="dialog"
    aria-labelledby="ajouterSemestreLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterSemestreLabel">
                    Ajouter Semestre
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/semestres" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="libelle_semestre">Libelle Semestre</label>
                    <input type="text" class="form-control mb-1" name="libelle_semestre" id="libelle_semestre"
                        placeholder="Libelle Semestre" />

                    <label for="niveaux_id_niveau">Niveau</label>
                    <select name="niveaux_id_niveau" id="niveaux_id_niveau" class="form-control">
                        <option value="">Niveau du semestre</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id_niveau }}">{{ $niveau->libelle_niveau }}</option>
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

{{-- Modifier Semestre Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierSemestre" tabindex="-1" role="dialog"
    aria-labelledby="modifierSemestreLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierSemestreModifierLabel">
                    Modifier Semestre
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/semestres/" method="POST" id="modifierSemestreForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id_semestre" id="idSemestreModifierModel" hidden>

                    <label for="libelle_semestre">Libelle Semestre</label>
                    <input type="text" name="libelle_semestre" id="libelleSemestreModifierModel"
                        class="form-control mb-1" placeholder="Libelle Semestre" />

                    <label for="niveaux_id_niveau">Niveau</label>
                    <select name="niveaux_id_niveau" id="NiveauxIdNiveauModifierModel" class="form-control">
                        <option value="">Niveau du semestre</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id_niveau }}">{{ $niveau->libelle_niveau }}</option>
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

{{-- Supprimer Semestre Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerSemestre" tabindex="-1" role="dialog"
    aria-labelledby="supprimerSemestreLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerSemestreLabel">
                    Suprimer Semestre
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette semestre?</p>
            <form method="POST" action="/semestres/" id="supprimerSemestreForm">
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
