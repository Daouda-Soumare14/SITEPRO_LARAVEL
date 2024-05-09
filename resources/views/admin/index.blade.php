@extends('layout')

@section('content')
<h1 class="text-center text-white p2 bg-dark bg-gradient my-3">Administration des articles</h1>

@if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
        <button type="button" class="close" onclick="closeSuccessMessage()">
            <span>&times;</span>
        </button>
    </div>
@endif


<div class="table table-responsive">
    <a href="{{ route('admin.create')}}" class="btn btn-success my-2">Creer un nouvel article</a>
    <table class="table-bordered border-dark table-hover text-center col-md-12">
        <thead >
            <tr class="table-dark table-active text-uppercase text-white">
                <th>#</th>
                <th>Title</th>
                <th>Publié le</th>
                <th>Mise a jour le</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <form action="{{ route('admin.destroy', ['post' => $post->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">Supprimer</button>
                    </form>
                    <a href="{{ route('admin.edit', ['post' => $post->id]) }}" class="btn btn-warning">Modifier</a>
                </td>
            </tr>

            @empty
                <p class="text-info text-center">Aucun resultat</p>
                
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
