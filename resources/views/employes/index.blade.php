@extends('layout.base')
@section('content')
    @include('models.employe')
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Employes</h3>
        </div>
    </div>

    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/{{ isset($is_prof_page) ? 'professeurs' : 'employes' }}/ajouter" class="btn btn-primary mt-1">
                            Ajouter {{ isset($is_prof_page) ? 'Professeur' : 'Employe' }}
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
                                @if(sizeof($employes) == 0)
                                    <h3>Commencez par <a href="/{{ isset($is_prof_page) ? 'professeurs' : 'employes' }}/ajouter">ajouter</a> des employes</h3>
                                @else
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom Prenom</th>
                                            <th>Telehones</th>
                                            <th>Email</th>
                                            <th>Fonction</th>
                                            <th>Adress</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($employes as $employe)
                                        @if(isset($is_prof_page) && strpos(strtolower($employe->fonction->fonction), 'rofesseur'))
                                        <tr>
                                            <th id="{{ $employe->id_employe . '-nom' }}" scope="row">
                                                {{ $employe->nom . " " . $employe->prenom }}</th>
                                            <td id="{{ $employe->id_employe . '-telephones' }}">
                                                {{ $employe->telephone_1 . " " . $employe->telephone_2 }}</td>
                                            <td id="{{ $employe->id_employe . '-email' }}">
                                                {{ $employe->email }}</td>
                                            <td id="{{ $employe->id_employe . '-adress' }}">
                                                {{ $employe->pays . " - " . $employe->ville . ", " . $employe->adress }}</td>
                                            <td id="{{ $employe->id_employe . '-fonction' }}">
                                                {{ $employe->fonction->fonction }}</td>
                                            <td class="table-actions">
                                                <a href="/{{ isset($is_prof_page) ? 'professeurs' : 'employes' }}/modifier/{{$employe->id_employe}}" class="edit">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                                @if($employe->id_employe != Auth::user()->employes_id_employe)
                                                <button type="button" class="delete"
                                                        onclick="preparerSuprimerEmployeModel({{ $employe->id_employe }})"
                                                        data-toggle="modal" data-target="#supprimerEmploye">
                                                    <i class="la la-trash-o"></i>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <th id="{{ $employe->id_employe . '-nom' }}" scope="row">
                                                {{ $employe->nom . " " . $employe->prenom }}</th>
                                            <td id="{{ $employe->id_employe . '-telephones' }}">
                                                {{ $employe->telephone_1 . " " . $employe->telephone_2 }}</td>
                                            <td id="{{ $employe->id_employe . '-email' }}">
                                                {{ $employe->email }}</td>
                                            <td id="{{ $employe->id_employe . '-adress' }}">
                                                {{ $employe->pays . " - " . $employe->ville . ", " . $employe->adress }}</td>
                                            <td id="{{ $employe->id_employe . '-fonction' }}">
                                                {{ $employe->fonction->fonction }}</td>
                                            <td class="table-actions">
                                                <a href="/{{ isset($is_prof_page) ? 'professeurs' : 'employes' }}/modifier/{{$employe->id_employe}}" class="edit">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                                @if($employe->id_employe != Auth::user()->employes_id_employe)
                                                    <button type="button" class="delete"
                                                            onclick="preparerSuprimerEmployeModel({{ $employe->id_employe }})"
                                                            data-toggle="modal" data-target="#supprimerEmploye">
                                                        <i class="la la-trash-o"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
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
