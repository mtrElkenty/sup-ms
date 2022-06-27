{{-- Ajouter Parents Model --}}
<div style="z-index: 10000" class="modal fade" id="ajouterParents" tabindex="-1" role="dialog"
     aria-labelledby="ajouterParentsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterParentsLabel">Ajouter Parents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/parents" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="nom_pere">Nom Pere *</label>
                    <input type="text" name="nom_pere" id="nom_pere" placeholder="Nom du pere" class="form-control mb-1" />

                    <label for="prenom_pere">Prenom Pere</label>
                    <input type="text" class="form-control" name="prenom_pere" id="prenom_pere" placeholder="Prenom du pere" />

                    <label for="nom_mere">Nom Mere</label>
                    <input type="text" class="form-control" name="nom_mere" id="nom_mere" placeholder="Nom du mere" />

                    <label for="prenom_mere">Prenom Mere</label>
                    <input type="text" class="form-control" name="prenom_mere" id="prenom_mere" placeholder="Prenom du mere" />

                    <label for="contact">Contact</label>
                    <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact parent" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
