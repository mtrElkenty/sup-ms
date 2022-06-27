{{-- Ajouter Filiere Model --}}
<div
    style="z-index: 10000"
    class="modal fade"
    id="ajouterFiliere"
    tabindex="-1"
    role="dialog"
    aria-labelledby="ajouterFiliereLabel"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5
                    class="modal-title"
                    id="ajouterFiliereLabel">
                    Ajouter Filiere
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
                action="/filieres"
                method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="code_filiere">Code Filiere *</label>
                    <input
                        type="text"
                        name="code_filiere"
                        id="code_filiere"
                        placeholder="Code filiere"
                        class="form-control mb-1">

                    <label for="libelle_filiere">Libelle Filiere</label>
                    <input
                        type="text"
                        class="form-control mb-1"
                        name="libelle_filiere"
                        id="libelle_filiere"
                        placeholder="Libelle Filiere" />

                    <label for="cycles_id_cycle">Cycle</label>
                    <select
                        name="cycles_id_cycle"
                        id="cycles_id_cycle"
                        class="form-control" >
                        <option value="">Cycle du filiere</option>
                        @foreach($cycles as $cycle)
                            <option value="{{$cycle->id_cycle}}">{{$cycle->libelle_cycle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Annuler
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modifier Filiere Model --}}
<div
    style="z-index: 10000"
    class="modal fade" id="modifierFiliere"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modifierFiliereLabel"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5
                    class="modal-title"
                    id="modifierFiliereModifierLabel">
                    Modifier Filiere
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
                action="/filieres/"
                method="POST"
                id="modifierFiliereForm">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input
                        type="text"
                        name="id_filiere"
                        id="idFiliereModifierModel"
                        hidden>

                    <label for="code_filiere">Code Filiere *</label>
                    <input
                        type="text"
                        name="code_filiere"
                        id="codeFiliereModifierModel"
                        placeholder="Code filiere"
                        class="form-control mb-1">

                    <label for="libelle_filiere">Libelle Filiere</label>
                    <input
                        type="text"
                        name="libelle_filiere"
                        id="libelleFiliereModifierModel"
                        class="form-control mb-1"
                        placeholder="Libelle Filiere" />

                    <label for="cycles_id_cycle">Cycle</label>
                    <select
                        name="cycles_id_cycle"
                        id="CyclesIdCycleModifierModel"
                        class="form-control" >
                        <option value="">Cycle du filiere</option>
                        @foreach($cycles as $cycle)
                            <option value="{{$cycle->id_cycle}}">{{$cycle->libelle_cycle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Annuler
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Supprimer Filiere Model --}}
<div
    style="z-index: 10000"
    class="modal fade"
    id="supprimerFiliere"
    tabindex="-1"
    role="dialog"
    aria-labelledby="supprimerFiliereLabel"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5
                    class="modal-title"
                    id="supprimerFiliereLabel">
                    Suprimer Filiere
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de supprimer cette filiere?</p>
            <form
                method="POST"
                action="/filieres/"
                id="supprimerFiliereForm">
                @csrf
                @method('DELETE')
                <div class=" modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Annuler
                    </button>
                    <button
                        type="submit"
                        class="btn btn-danger">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
