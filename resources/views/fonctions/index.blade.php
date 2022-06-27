@extends('layout.base')
@section('content')
    @include('models.fonction')

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
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(sizeof($fonctions) == 0)
                                    <h3>Commencez par <a href="/fonctions/ajouter">ajouter</a> des fonctions</h3>
                                @else
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
                                                <th id ="{{ $fonction->id_fonction . '-fonction' }}" scope="row">
                                                    {{ $fonction->fonction }}</th>
                                                <td id="{{ $fonction->id_fonction . '-description' }}">
                                                    {{ $fonction->description }}</td>
                                                <td>{{ $fonction->created_at }}</td>
                                                <td class="table-actions">
                                                    <button type="button" class="edit"
                                                        data-toggle="modal"
                                                        onclick="preparerModifierFonctionModel({{ $fonction->id_fonction }})"
                                                        data-target="#modifierFonction">
                                                        <i class="la la-pencil"></i>
                                                    </button>
                                                    <button type="button" class="delete"
                                                        onclick="preparerSuprimerFonctionModel({{ $fonction->id_fonction }})"
                                                        data-toggle="modal" data-target="#supprimerFonction">
                                                        <i class="la la-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
