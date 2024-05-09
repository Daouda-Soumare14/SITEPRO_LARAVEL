@extends('layout')

@section('content')
    @foreach ($posts as $post)
        <div class="container py-4">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $post->title }}</h1>
                    <span class="badge badge-info">Publié {{ $post->getCreatedAt() }}</span>
                    <p>{{ $post->excerptContent() }}</p>

                    <a href="/blog/show/{{$post->id}}" class="btn btn-primary">Lire plus sur l'article</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection