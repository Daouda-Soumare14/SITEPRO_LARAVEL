@extends('layout')

@section('content')
<h1 class="text-center text-white p-3 bg-dark bg-gradient my-3">Administration des articles</h1>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="success-message" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive my-3">
    <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">Créer un nouvel article</a>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr class="table-dark table-active text-uppercase">
                <th>#</th>
                <th>Titre</th>
                <th>Publié le</th>
                <th>Mis à jour le</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                <td>{{ $post->updated_at->format('d/m/Y') }}</td>
                <td>
                    @if ($post->image)
                        <img src="{{ $post->imageUrl() }}" class="img-fluid" style="max-width: 100px; height: 50px;" alt="Image de {{ $post->title }}">
                    @else
                        <span class="text-muted">Pas d'image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.edit', ['post' => $post->id]) }}" class="btn btn-warning mb-2">Modifier</a>
                    <form action="{{ route('admin.destroy', ['post' => $post->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-info text-center">Aucun résultat</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{{ $posts->links() }}

<script>
    function closeSuccessMessage() {
        document.getElementById('success-message').style.display = 'none';
    }
</script>
@endsection
