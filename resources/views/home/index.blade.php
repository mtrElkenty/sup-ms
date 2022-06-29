@extends('layout.base')
@section('content')
    @include('models.cycle')
    @include('models.filiere')
    @include('models.niveau')
    @include('models.semestre')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Dashboard</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cycles</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#ajouterCycle">
                            Ajouter Cycle
                        </button>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p class="card-text"></p>
                            <div class="table-responsive">
                                @if (sizeof($cycles) == 0)
                                    <h3>Commencez par <a href="/cycles/ajouter">ajouter</a> des cycles</h3>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="">Libelle</th>
                                                <th class="w-20">Nombre d'Annees</th>
                                                <th class=""></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cycles as $cycle)
                                                <tr>
                                                    <th id="{{ $cycle->id_cycle . '-libelle_cycle' }}" scope="row">
                                                        {{ $cycle->libelle_cycle }}</th>
                                                    <td id="{{ $cycle->id_cycle . '-nombre_annees' }}">
                                                        {{ $cycle->nombre_annees }}</td>
                                                    <td class="table-actions">
                                                        <button type="button" class="edit" data-toggle="modal"
                                                            onclick="preparerModifierCycleModel({{ $cycle->id_cycle }})"
                                                            data-target="#modifierCycle">
                                                            <i class="la la-pencil"></i>
                                                        </button>
                                                        <button type="button" class="delete"
                                                            onclick="preparerSuprimerCycleModel({{ $cycle->id_cycle }})"
                                                            data-toggle="modal" data-target="#supprimerCycle">
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Niveaux</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <button type="button" class="btn btn-primary mt-1" data-toggle="modal"
                            data-target="#ajouterNiveau">
                            Ajouter Niveau
                        </button>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p class="card-text"></p>
                            <div class="table-responsive">
                                @if (sizeof($niveaux) == 0)
                                    <h3>Commencez par <a href="/niveaux/ajouter">ajouter</a> des niveaux</h3>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Libelle</th>
                                                <th>Cycle</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($niveaux as $niveau)
                                                <tr>
                                                    <td id="{{ $niveau->id_niveau }}-libelle_niveau">
                                                        {{ $niveau->libelle_niveau }}</td>
                                                    <td id="{{ $niveau->id_niveau }}-cycles_id_cycle">
                                                        {{ $niveau->cycle->libelle_cycle }}</td>
                                                    <td class="table-actions">
                                                        <button type="button" class="edit" data-toggle="modal"
                                                            onclick="preparerModifierNiveauModel({{ $niveau->id_niveau }})"
                                                            data-target="#modifierNiveau">
                                                            <i class="la la-pencil"></i>
                                                        </button>
                                                        <button type="button" class="delete"
                                                            onclick="preparerSuprimerNiveauModel({{ $niveau->id_niveau }})"
                                                            data-toggle="modal" data-target="#supprimerNiveau">
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

            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filieres</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <button type="button" class="btn btn-primary mt-1" data-toggle="modal"
                            data-target="#ajouterFiliere">
                            Ajouter Filiere
                        </button>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p class="card-text"></p>
                            <div class="table-responsive">
                                @if (sizeof($filieres) == 0)
                                    <h3>Commencez par <a href="/filieres/ajouter">ajouter</a> des filieres</h3>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Libelle</th>
                                                <th>Cycle</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($filieres as $filiere)
                                                <tr>
                                                    <th id="{{ $filiere->id_filiere }}-code_filiere" scope="row">
                                                        {{ $filiere->code_filiere }}</th>
                                                    <td id="{{ $filiere->id_filiere }}-libelle_filiere">
                                                        {{ $filiere->libelle_filiere }}</td>
                                                    <td id="{{ $filiere->id_filiere }}-cycles_id_cycle">
                                                        {{ $filiere->cycle->libelle_cycle }}
                                                        <small id="{{ $filiere->id_filiere }}-cycles_id_cycle" hidden>
                                                            {{ $filiere->cycles_id_cycle }}</small>
                                                    </td>
                                                    <td class="table-actions">
                                                        <button type="button" class="edit" data-toggle="modal"
                                                            onclick="preparerModifierFiliereModel({{ $filiere->id_filiere }})"
                                                            data-target="#modifierFiliere">
                                                            <i class="la la-pencil"></i>
                                                        </button>
                                                        <button type="button" class="delete"
                                                            onclick="preparerSuprimerFiliereModel({{ $filiere->id_filiere }})"
                                                            data-toggle="modal" data-target="#supprimerFiliere">
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Semestres</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <button type="button" class="btn btn-primary mt-1" data-toggle="modal"
                            data-target="#ajouterSemestre">
                            Ajouter Semestre
                        </button>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p class="card-text"></p>
                            <div class="table-responsive">
                                @if (sizeof($semestres) == 0)
                                    <h3>Commencez par <a href="#" data-toggle="modal"
                                            data-target="#ajouterSemestre">
                                            ajouter</a> des semestres</h3>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Libelle</th>
                                                <th>Niveau</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($semestres as $semestre)
                                                <tr>
                                                    <td id="{{ $semestre->id_semestre }}-libelle_semestre">
                                                        {{ $semestre->libelle_semestre }}</td>
                                                    <td>
                                                        {{ $semestre->niveau->libelle_niveau }}
                                                        <small id="{{ $semestre->id_semestre }}-niveaux_id_niveau"
                                                            hidden>
                                                            {{ $semestre->niveaux_id_niveau }}</small>
                                                    </td>
                                                    <td class="table-actions">
                                                        <button type="button" class="edit" data-toggle="modal"
                                                            onclick="preparerModifierSemestreModel({{ $semestre->id_semestre }})"
                                                            data-target="#modifierSemestre">
                                                            <i class="la la-pencil"></i>
                                                        </button>
                                                        <button type="button" class="delete"
                                                            onclick="preparerSuprimerSemestreModel({{ $semestre->id_semestre }})"
                                                            data-toggle="modal" data-target="#supprimerSemestre">
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
