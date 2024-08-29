@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $post->id ? 'Modification de l\'article' : 'Création d\'un nouvel article' }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ $post->id ? route('admin.update', $post->id) : route('admin.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method($post->id ? 'PATCH' : 'POST')

                            <!-- Champ Titre -->
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    name="title" id="title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Champ Contenu -->
                            <div class="form-group">
                                <label for="content">Contenu</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" rows="10" name="content" id="content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Champ Image -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bouton Soumettre -->
                            <button type="submit" class="btn btn-primary my-3">
                                {{ $post->id ? 'Mettre à jour l\'article' : 'Créer un nouvel article' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
