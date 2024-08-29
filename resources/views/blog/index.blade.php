@extends('layout')

@section('content')
    <h1 class="text-center">Les Articles</h1>
    @foreach ($posts as $post)
        <div class="container py-4">
            <div class="card">
                <div class="row no-gutters">
                    @if ($post->image)
                    <div class="col-md-4">
                        <img src="{{ $post->imageUrl() }}" class="card-img" alt="Image de {{ $post->title }}">
                    </div>
                    @endif
                    <div class="{{ $post->image ? 'col-md-8' : 'col-md-12' }}">
                        <div class="card-body">
                            <h1>{{ $post->title }}</h1>
                            <span class="badge badge-info">Publié {{ $post->getCreatedAt() }}</span>
                            <p>{{ $post->excerptContent() }}</p>
                            <a href="/blog/show/{{$post->id}}" class="btn btn-primary">Lire plus sur l'article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
