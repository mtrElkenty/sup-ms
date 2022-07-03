{{-- Ajouter Seance Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterSeance" tabindex="-1" role="dialog"
    aria-labelledby="ajouterSeanceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterSeanceLabel">
                    Ajouter Seance
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="ajouter_seance_form" action="/seances" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="checkbox" name="seance_rattrapage" id="seance_rattrapage" class="mb-1">
                    <label for="seance_rattrapage">Rattrapage *</label><br>

                    <label for="horaires_id_horaire">Horaire</label>
                    <select name="horaires_id_horaire" id="horaires_id_horaire" class="form-control mb-1">
                        @foreach ($horaires as $horaire)
                            <option value="{{ $horaire->id_horaire }}">
                                {{ date('H:i', strtotime($horaire->du)) }} -
                                {{ date('H:i', strtotime($horaire->a)) }}
                            </option>
                        @endforeach
                    </select>

                    <label for="jours_id_jour">Jour</label>
                    <select name="jours_id_jour" id="jours_id_jour" class="form-control mb-1">
                        @foreach ($jours as $jour)
                            <option value="{{ $jour->id_jour }}">
                                {{ $jour->jour }}
                            </option>
                        @endforeach
                    </select>

                    <label for="professeurs_id_professeur">Professeur</label>
                    <select name="professeurs_id_professeur" id="professeurs_id_professeur" class="form-control mb-1">
                        @foreach ($professeurs as $professeur)
                            <option value="{{ $professeur->id_employe }}">
                                {{ $professeur->prenom }}
                                {{ $professeur->nom }}
                            </option>
                        @endforeach
                    </select>

                    <label for="niveaux_id_niveau">Niveau</label>
                    <select name="niveaux_id_niveau" id="niveaux_id_niveau" class="form-control mb-1">
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id_niveau }}">
                                {{ $niveau->libelle_niveau }}
                            </option>
                        @endforeach
                    </select>

                    <label for="filieres_id_filiere">Filiere</label>
                    <select name="filieres_id_filiere" id="filieres_id_filiere" class="form-control mb-1">
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id_filiere }}">
                                {{ $filiere->libelle_filiere }}
                            </option>
                        @endforeach
                    </select>

                    <label for="matieres_id_matiere">Matiere</label>
                    <select name="matieres_id_matiere" id="matieres_id_matiere" class="form-control mb-1">
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id_matiere }}">
                                {{ $matiere->libelle_matiere }}
                            </option>
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

{{-- Modifier Seance Model --}}
<div style="z-index: 10000" class="modal fade" id="modifierSeance" tabindex="-1" role="dialog"
    aria-labelledby="modifierSeanceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierSeanceModifierLabel">
                    Modifier Seance
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/seances/" method="POST" id="modifierSeanceForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" name="seance_rattrapage" id="seance_rattrapage_modifier_seance"
                        class="mb-1">
                    <label for="seance_rattrapage">Rattrapage *</label><br>

                    <label for="horaires_id_horaire">Horaire</label>
                    <select name="horaires_id_horaire" id="horaires_id_horaire_modifier_seance"
                        class="form-control mb-1">
                        @foreach ($horaires as $horaire)
                            <option value="{{ $horaire->id_horaire }}">
                                {{ date('H:i', strtotime($horaire->du)) }} -
                                {{ date('H:i', strtotime($horaire->a)) }}
                            </option>
                        @endforeach
                    </select>

                    <label for="jours_id_jour">Jour</label>
                    <select name="jours_id_jour" id="jours_id_jour_modifier_seance" class="form-control mb-1">
                        @foreach ($jours as $jour)
                            <option value="{{ $jour->id_jour }}">
                                {{ $jour->jour }}
                            </option>
                        @endforeach
                    </select>

                    <label for="professeurs_id_professeur">Professeur</label>
                    <select name="professeurs_id_professeur" id="professeurs_id_professeur_modifier_seance"
                        class="form-control mb-1">
                        @foreach ($professeurs as $professeur)
                            <option value="{{ $professeur->id_employe }}">
                                {{ $professeur->prenom }}
                                {{ $professeur->nom }}
                            </option>
                        @endforeach
                    </select>

                    <label for="niveaux_id_niveau">Niveau</label>
                    <select name="niveaux_id_niveau" id="niveaux_id_niveau_modifier_seance"
                        class="form-control mb-1">
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id_niveau }}"
                                {{ isset($_GET['niveaux_id_niveau']) && $niveau->id_niveau == $_GET['niveaux_id_niveau'] ? 'selected' : '' }}>
                                {{ $niveau->libelle_niveau }}
                            </option>
                        @endforeach
                    </select>

                    <label for="filieres_id_filiere">Filiere</label>
                    <select name="filieres_id_filiere" id="filieres_id_filiere_modifier_seance"
                        class="form-control mb-1">
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id_filiere }}"
                                {{ isset($_GET['filieres_id_filiere']) && $filiere->id_filiere == $_GET['filieres_id_filiere'] ? 'selected' : '' }}>
                                {{ $filiere->libelle_filiere }}
                            </option>
                        @endforeach
                    </select>

                    <label for="matieres_id_matiere">Matiere</label>
                    <select name="matieres_id_matiere" id="matieres_id_matiere_modifier_seance"
                        class="form-control mb-1">
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id_matiere }}">
                                {{ $matiere->libelle_matiere }}
                            </option>
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

{{-- Supprimer Seance Model --}}
<div style="z-index: 10000" class="modal fade" id="supprimerSeance" tabindex="-1" role="dialog"
    aria-labelledby="supprimerSeanceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerSeanceLabel">
                    Suprimer Seance
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette seance?</p>
            <form method="POST" action="/seances/" id="supprimerSeanceForm">
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
