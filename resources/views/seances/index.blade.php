@extends('layout.base')
@section('content')
    @include('models.seance')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div style="display: flex; justify-content: space-between">
                <h3 class="content-header-title">Emploi Du Temps</h3>
                <button class="btn btn-primary">
                    <i class="la la-print"></i>
                    Imprimer
                </button>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
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
                                <form action="/seances/" method="GET" class="form-inline">
                                    <div class="form-group mb-2">
                                        <select name="niveaux_id_niveau" id="niveaux_id_niveau" class="form-control">
                                            @foreach ($niveaux as $niveau)
                                                <option value="{{ $niveau->id_niveau }}"
                                                    {{ isset($_GET['niveaux_id_niveau']) && $niveau->id_niveau == $_GET['niveaux_id_niveau'] ? 'selected' : '' }}>
                                                    {{ $niveau->libelle_niveau }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <select name="filieres_id_filiere" id="filieres_id_filiere" class="form-control">
                                            @foreach ($filieres as $filiere)
                                                <option value="{{ $filiere->id_filiere }}"
                                                    {{ isset($_GET['filieres_id_filiere']) && $filiere->id_filiere == $_GET['filieres_id_filiere'] ? 'selected' : '' }}>
                                                    {{ $filiere->libelle_filiere }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Filtrer</button>
                                </form>
                                @if (sizeof($seances) == 0)
                                    <h3>
                                        Commencez par
                                        <a href="#" data-toggle="modal" data-target="#ajouterSeance">ajouter</a>
                                        des seances
                                    </h3>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                @foreach ($jours as $jour)
                                                    <th class="align-middle text-center px-0">{{ $jour->jour }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($horaires as $horaire)
                                                <tr>
                                                    <th class="align-middle text-center px-0">
                                                        {{ date('H:i', strtotime($horaire->du)) }} -
                                                        {{ date('H:i', strtotime($horaire->a)) }}
                                                    </th>
                                                    @foreach ($jours as $jour)
                                                        @php
                                                            $found = false;
                                                        @endphp
                                                        @foreach ($seances as $seance)
                                                            @if ($seance->horaires_id_horaire == $horaire->id_horaire && $seance->jours_id_jour == $jour->id_jour)
                                                                @php
                                                                    $found = true;
                                                                @endphp
                                                                <td class="align-middle text-center px-0">
                                                                    {{ $seance->matiere->libelle_matiere }}<br>
                                                                    <b>{{ $seance->professeur->prenom . ' ' . $seance->professeur->nom }}</b>
                                                                    <div class="seance-actions">
                                                                        <button type="button" class="edit"
                                                                            data-toggle="modal"
                                                                            data-target="#modifierSeance"
                                                                            onclick="prepareModifierSeance({{ $seance->id_seance }})">
                                                                            <i class="la la-pencil"></i>
                                                                        </button>
                                                                        <button type="button" class="delete"
                                                                            data-toggle="modal"
                                                                            data-target="#supprimerSeance"
                                                                            onclick="preparerSupprimerSeance({{ $seance->id_seance }})">
                                                                            <i class="la la-trash-o"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                        @if (!$found)
                                                            <td data-toggle="modal" data-target="#ajouterSeance"
                                                                onclick="prepareAddSeanceModel({{ $horaire->id_horaire }} , {{ $jour->id_jour }})">
                                                            </td>
                                                        @endif
                                                    @endforeach
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
