@extends('layout.base')

@section('content')
    <div style="margin: 60px 100px">
        <div class="row match-height">
            <div class="col-xl-6 col-md-12" style="">
                <div class="login-left-content">
                    <h1>Connectez-vous<br>a SupMS.</h1>
                    <img src="{{ asset('/images/2.png') }}" alt="login">
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Connectez-Vous</h4>
                            <h6 class="card-subtitle text-muted">Entrez vos donnees pour connecter</h6>
                        </div>
                        <div class="card-body">
                            <form class="form" method="POST" action="/auth">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="sr-only">Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="Username"
                                            name="username">
                                    </div>

                                    <div class="form-group">
                                        <label for="donationinput4" class="sr-only">Password</label>
                                        <input type="password" id="password" class="form-control" placeholder="Password"
                                            name="password">
                                    </div>

                                </div>
                                <div class="form-actions center">
                                    <button type="submit" class="btn mb-1 btn-primary btn-lg btn-block">Connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Back Wrapper End Here =================-->
@endsection
