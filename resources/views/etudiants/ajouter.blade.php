@extends('layout.base')
@section('content')
    @include('models.parents')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Ajouter Etudiants</h3>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form action="/etudiants" method="POST" id="ajouterEtudiantForm">
                                @csrf
                                @error('matricule')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="matricule" value="{{old('matricule')}}" placeholder="Matricule" class="form-control mb-1 @error('matricule') is-invalid @enderror">

                                @error('nom')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="nom" value="{{old('nom')}}" placeholder="Nom" class="form-control mb-1 @error('nom') is-invalid @enderror">

                                @error('prenom')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="prenom" value="{{old('prenom')}}" placeholder="Prenom" class="form-control mb-1 @error('prenom') is-invalid @enderror">

                                @error('NNI')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="number" name="NNI" value="{{old('NNI')}}" placeholder="NNI" class="form-control mb-1 @error('NNI') is-invalid @enderror">

                                @error('telephone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="number" name="telephone" value="{{old('telephone')}}" placeholder="Telephone" class="form-control mb-1 @error('telephone') is-invalid @enderror">

                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Email" class="form-control mb-1 @error('email') is-invalid @enderror">

                                @error('adress')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="adress" value="{{old('adress')}}" placeholder="Adress" class="form-control mb-1 @error('adress') is-invalid @enderror">

                                @error('ville')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="ville" value="{{old('ville')}}" placeholder="Ville" class="form-control mb-1 @error('ville') is-invalid @enderror">

                                @error('pays')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="pays" value="{{old('pays')}}" placeholder="Pays" class="form-control mb-1 @error('pays') is-invalid @enderror">

                                @error('sexe')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <select name="sexe" class="form-control mb-1 @error('sexe') is-invalid @enderror">
                                    <option value=''>sexe</option>
                                    <option value='homme' {{old('sexe') == 'homme' ? 'selected' : ''}}>Homme</option>
                                    <option value='femme' {{old('sexe') == 'femme' ? 'selected' : ''}}>Femme</option>
                                </select>

                                @error('date_naissance')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-1 " inline="true">
                                    <input name="date_naissance" type="date" value="{{date('Y-m-d', strtotime(old('date_naissance')))}}" class="form-control @error('date_naissance') is-invalid @enderror">
                                    <i class="fas fa-calendar input-prefix"></i>
                                </div>

                                @error('lieu_naissance')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <input type="text" name="lieu_naissance" value="{{old('lieu_naissance')}}" placeholder="Lieu de Naissance" class="form-control mb-1 @error('lieu_naissance') is-invalid @enderror">

                                @error('situation_famille')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <select name="situation_famille" class="form-control mb-1 @error('situation_famille') is-invalid @enderror">
                                    <option>Situation Famille</option>
                                    <option value="marie(e)" {{old('situation_famille') == 'marie(e)' ? 'selected' : ''}}>Marie(e)</option>
                                    <option value="celibataire" {{old('situation_famille') == 'celibataire' ? 'selected' : ''}}>Celibataire</option>
                                </select>

                                @error('niveaux_id_niveau')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <select name="niveaux_id_niveau" class="form-control mb-1 @error('niveaux_id_niveau') is-invalid @enderror">
                                    <option>Niveau</option>
                                    @foreach($niveaux as $niveau)
                                    <option value="{{$niveau->id_niveau}}" {{old('niveaux_id_niveau') == $niveau->id_niveau ? 'selected' : ''}}>{{$niveau->libelle_niveau}}</option>
                                    @endforeach
                                </select>

                                @error('filieres_id_filiere')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <select name="filieres_id_filiere" class="form-control mb-1 @error('filieres_id_filiere') is-invalid @enderror">
                                    <option>Filiere</option>
                                    @foreach($filieres as $filiere)
                                        <option value="{{$filiere->id_filiere}}" {{old('filieres_id_filiere') == $filiere->id_filiere ? 'selected' : ''}}>{{$filiere->libelle_filiere}}</option>
                                    @endforeach
                                </select>

                                @error('parents_infos_id_parent')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <select name="parents_infos_id_parent" class="form-control mb-1 @error('parents_infos_id_parent') is-invalid @enderror">
                                    <option>Parent</option>
                                    @foreach($parents as $parent)
                                        <option value="{{$parent->id_parent}}" {{old('parents_infos_id_parent') == $parent->id_parent ? 'selected' : ''}}>{{$parent->prenom_pere}} {{$parent->nom_pere}} et {{$parent->prenom_mere}} {{$parent->nom_mere}}</option>
                                    @endforeach
                                </select>
                                <a href="#" data-toggle="modal" data-target="#ajouterParents">Ajouter Parents</a>
                                <br><br>

                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
