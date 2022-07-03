@extends('layout.base')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h6 class="content-header-title">Modifier {{ isset($is_prof_page) ? 'le professeur' : 'l\'employe' }}</h6>
            <h3 class="content-header-title">{{ $employe->nom . ' ' . $employe->prenom }}</h3>
        </div>
    </div>

    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form
                                action="/{{ isset($is_prof_page) ? 'professeurs' : 'employes' }}/{{ $employe->id_employe }}"
                                method="POST" id="modifierEmployeForm">
                                <div class="modal-body">
                                    @csrf
                                    @method('PUT')
                                    @error('fonctions_id_fonction')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="row mb-1">
                                        <div class="col-auto">
                                            <select name="fonctions_id_fonction"
                                                class="form-control @error('fonctions_id_fonction') is-invalid @enderror">
                                                @if (isset($is_prof_page))
                                                    @foreach ($fonctions as $fonction)
                                                        @if (str_contains(strtolower($fonction->fonction), 'professeur'))
                                                            <option value="{{ $fonction->id_fonction }}"
                                                                {{ old('fonctions_id_fonction') == $fonction->id_fonction ? 'selected' : '' }}>
                                                                {{ $fonction->fonction }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="">Fonction</option>
                                                    @foreach ($fonctions as $fonction)
                                                        <option value="{{ $fonction->id_fonction }}"
                                                            {{ $employe->fonctions_id_fonction == $fonction->id_fonction ? 'selected' : '' }}>
                                                            {{ $fonction->fonction }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if (!isset($is_prof_page))
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#ajouterFonction">
                                                    Ajouter Fonction
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="nom" value="{{ $employe->nom }}" placeholder="Nom"
                                        class="form-control mb-1 @error('nom') is-invalid @enderror">

                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="prenom" value="{{ $employe->prenom }}"
                                        placeholder="Prenom"
                                        class="form-control mb-1 @error('prenom') is-invalid @enderror">

                                    @error('NNI')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="number" name="NNI" value="{{ $employe->NNI }}" placeholder="NNI"
                                        class="form-control mb-1 @error('NNI') is-invalid @enderror">

                                    @error('telephone_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="number" name="telephone_1" value="{{ $employe->telephone_1 }}"
                                        placeholder="Telephone (1)"
                                        class="form-control mb-1 @error('telephone_1') is-invalid @enderror">

                                    @error('telephone_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="number" name="telephone_2" value="{{ $employe->telephone_2 }}"
                                        placeholder="Telephone (2)"
                                        class="form-control mb-1 @error('telephone_2') is-invalid @enderror">

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="email" name="email" value="{{ $employe->email }}" placeholder="Email"
                                        class="form-control mb-1 @error('email') is-invalid @enderror">

                                    @error('adress')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="adress" value="{{ $employe->adress }}"
                                        placeholder="Adress"
                                        class="form-control mb-1 @error('adress') is-invalid @enderror">

                                    @error('ville')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="ville" value="{{ $employe->ville }}" placeholder="Ville"
                                        class="form-control mb-1 @error('ville') is-invalid @enderror">

                                    @error('pays')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="pays" value="{{ $employe->pays }}" placeholder="Pays"
                                        class="form-control mb-1 @error('pays') is-invalid @enderror">

                                    @error('sexe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <select name="sexe" class="form-control mb-1 @error('sexe') is-invalid @enderror">
                                        <option value=''>sexe</option>
                                        <option value='homme' {{ $employe->sexe == 'homme' ? 'selected' : '' }}>Homme
                                        </option>
                                        <option value='femme' {{ $employe->sexe == 'femme' ? 'selected' : '' }}>Femme
                                        </option>
                                    </select>

                                    @error('date_naissance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="date-picker-example"
                                        class="md-form md-outline input-with-post-icon datepicker mb-1 " inline="true">
                                        <input name="date_naissance" type="date"
                                            value="{{ date('Y-m-d', strtotime($employe->date_naissance)) }}"
                                            class="form-control @error('date_naissance') is-invalid @enderror">
                                        <i class="fas fa-calendar input-prefix"></i>
                                    </div>

                                    @error('lieu_naissance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="lieu_naissance" value="{{ $employe->lieu_naissance }}"
                                        placeholder="Lieu Naissance"
                                        class="form-control mb-1 @error('lieu_naissance') is-invalid @enderror">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
