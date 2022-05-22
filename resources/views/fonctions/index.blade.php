@extends('layout.base')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Fonctions</h3>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary mt-1" data-toggle="modal"
                            data-target="#ajouterFonction">
                            Ajouter Fonction
                        </button>
                        <div class="modal fade" id="ajouterFonction" tabindex="-1" role="dialog"
                            aria-labelledby="ajouterFonctionLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ajouterFonctionLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/fonctions" method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            <input type="text" name="fonction" id="fonction" placeholder="Titre *"
                                                class="form-control mb-1">
                                            <textarea class="form-control" name="description" id="description" rows="3"
                                                placeholder="Une petite description du fonction"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annler</button>
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <p class="card-text">
                                Page Description
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Date Ajout</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fonctions as $fonction)
                                            <tr>
                                                <th id="{{ $fonction->id_fonction . '-fonction' }}" scope="row">
                                                    {{ $fonction->fonction }}</th>
                                                <td id="{{ $fonction->id_fonction . '-description' }}">
                                                    {{ $fonction->description }}</td>
                                                <td>{{ $fonction->created_at }}</td>
                                                <td style="display: flex; border: none">
                                                    <button type="button" class="btn btn-primary px-1 mr-1"
                                                        data-toggle="modal"
                                                        onclick="preparerModifierFonctionModel({{ $fonction->id_fonction }})"
                                                        data-target="#modifierFonction">
                                                        <i class="la la-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger px-1"
                                                        onclick="preparerSuprimerFonctionModel({{ $fonction->id_fonction }})"
                                                        data-toggle="modal" data-target="#supprimerFonction">
                                                        <i class="la la-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Ajouter Fonction Model --}}
<div class="modal fade" id="ajouterFonction" tabindex="-1" role="dialog" aria-labelledby="ajouterFonctionLabel"
    aria-hidden="true">
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
                    <input type="text" name="fonction" id="fonction" placeholder="Titre *" class="form-control mb-1">
                    <textarea class="form-control" name="description" id="description" rows="3"
                        placeholder="Une petite description du fonction"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modifier Fonction Model --}}
<div class="modal fade" id="modifierFonction" tabindex="-1" role="dialog" aria-labelledby="modifierFonctionLabel"
    aria-hidden="true">
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
                    <input type="text" name="fonction" id="fonctionFonctionModel" placeholder="Titre *"
                        class="form-control mb-1">
                    <textarea class="form-control" name="description" id="descriptionFonctionModel" rows="3"
                        placeholder="Une petite description du fonction"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Supprimer Fonction Model --}}
<div class="modal fade" id="supprimerFonction" tabindex="-1" role="dialog" aria-labelledby="supprimerFonctionLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimerFonctionLabel">Suprimer Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="container">Etez-vous sure de suppprimer cette fonction?</p>
            <form method="POST" action="/fonctions/" id="supprimerFonctionForm">
                @csrf
                @method('DELETE')
                <input type="text" name="id" id="idFonctionSupprimerModel" hidden>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
