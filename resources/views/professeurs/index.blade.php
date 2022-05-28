@extends('layout.base')
@section('content')
    @include('models.employe')
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Professeurs</h3>
        </div>
    </div>

    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/professeurs/ajouter?prof=true" class="btn btn-primary mt-1">
                            Ajouter Professeur
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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom Prenom</th>
                                        <th>Telehones</th>
                                        <th>Email</th>
                                        <th>Adress</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($professeurs as $professeur)
                                        <tr>
                                            <th id="{{ $professeur->id_employe . '-nom' }}" scope="row">
                                                {{ $professeur->nom . " " . $professeur->prenom }}</th>
                                            <td id="{{ $professeur->id_employe . '-telephones' }}">
                                                {{ $professeur->telephone_1 . " " . $professeur->telephone_2 }}</td>
                                            <td id="{{ $professeur->id_employe . '-email' }}">
                                                {{ $professeur->email }}</td>
                                            <td id="{{ $professeur->id_employe . '-adress' }}">
                                                {{ $professeur->pays . " - " . $professeur->ville . ", " . $professeur->adress }}</td>
                                            <td style="display: flex; border: none">
                                                <a href="/professeurs/modifier/{{$professeur->id_employe}}" class="btn btn-primary px-1 mr-1">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger px-1"
                                                        onclick="preparerSuprimerEmployeModel({{ $professeur->id_employe }})"
                                                        data-toggle="modal" data-target="#supprimerProfesseur">
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
