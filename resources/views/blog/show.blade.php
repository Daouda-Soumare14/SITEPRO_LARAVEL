@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h1>{{ $posts->title}}</h1>
                <span class="badge badge-info">Publié le {{ $posts->getCreatedAt() }}</span>
                <p>{{ $posts->content }}</p>
                <a href="/blog/index" class="btn btn-secondary">Retourner en arrière</a>
            </div>
        </div>
    </div>
@endsection