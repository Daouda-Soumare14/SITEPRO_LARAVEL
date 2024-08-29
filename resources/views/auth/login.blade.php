@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Se connecter</h1>
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>

                            <button class="btn btn-primary" type="submit">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
