
<div class="card-body my-4">
    <form action="" method="post" class="form-group">
        @csrf
        @method($post->id ? "PATCH" : "POST")

        <div>
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            @error('title')
                {{ $message }}
            @enderror
        </div>

        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="8" class="form-control">{{ old('content', $post->content) }}</textarea>
            @error('content')
                {{ $message }}
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                @if ($post->id)
                    Modifier l'article
                @else 
                    Creer un nouvel article
                @endif
                Creer un nouvel article
            </button>
        </div>
    </form>