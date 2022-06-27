@extends('layout.base')
@section('content')
    @include('models.etudiant')
    @include('models.parents')
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Etudiants</h3>
        </div>
    </div>

    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/etudiants/ajouter" class="btn btn-primary mt-1">
                            Ajouter {{ isset($is_prof_page) ? 'Professeur' : 'Etudiant' }}
                        </a>
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
                                @if(sizeof($etudiants) == 0)
                                    <h3>Commencez par <a href="/etudiants/ajouter">ajouter</a> des etudiants</h3>
                                @else
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom Prenom</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Adress</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($etudiants as $etudiant)
                                        <tr>
                                            <th id="{{ $etudiant->id_etudiant . '-nom' }}" scope="row">
                                                {{ $etudiant->nom . " " . $etudiant->prenom }}</th>
                                            <td id="{{ $etudiant->id_etudiant . '-telephones' }}">
                                                {{ $etudiant->telephone . " " . $etudiant->telephone_2 }}</td>
                                            <td id="{{ $etudiant->id_etudiant . '-email' }}">
                                                {{ $etudiant->email }}</td>
                                            <td id="{{ $etudiant->id_etudiant . '-adress' }}">
                                                {{ $etudiant->pays . " - " . $etudiant->ville . ", " . $etudiant->adress }}</td>
                                            <td class="table-actions">
                                                @if($etudiant->id_etudiant != Auth::user()->etudiants_id_etudiant)
                                                    <a
                                                        href="/etudiants/modifier/{{$etudiant->id_etudiant}}"
                                                        class="edit">
                                                        <i class="la la-pencil"></i>
                                                    </a>
                                                    <button
                                                        type="button"
                                                        class="delete"
                                                        onclick="preparerSuprimerEtudiantModel({{ $etudiant->id_etudiant }})"
                                                        data-toggle="modal" data-target="#supprimerEtudiant">
                                                        <i class="la la-trash-o"></i>
                                                    </button>
                                                @endif
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
