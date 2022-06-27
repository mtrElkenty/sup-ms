@extends('layout.base')

@section('content')
    <div class="col-xl-6 col-md-6">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <img style="width: 450px" src="{{ asset('/images/logo/sup-management.png') }}" alt="login">
                    <h4 class="card-title">Sup'Management System</h4>
                    <h6 class="card-subtitle text-muted">Entrez vos donnees pour connecter</h6>
                    <form class="form" method="POST" action="/auth">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input
                                    type="text"
                                    id="username"
                                    class="form-control"
                                    placeholder="Username"
                                    name="username"
                                    autofocus />
                            </div>

                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Password"
                                    name="password">
                            </div>

                        </div>
                        <div class="form-actions center">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
