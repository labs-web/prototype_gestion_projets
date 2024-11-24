{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

<form action="{{ $item->id ? route('posts.update', $item->id) : route('posts.store') }}" method="POST">
    @csrf
    @if ($item->id)
        @method('PUT')
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="nom">{{ ucfirst(__('PkgBlog::post.nom') )  }}
                    <span class="text-danger">*</span>
            </label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez nom"
                value="{{ $item ? $item->nom : old('nom') }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{ ucfirst(__('PkgBlog::post.description')) }}
            </label>
            <input name="description" type="text" class="form-control" id="description" placeholder="Entrez Exemple pour description"
                value="{{ $item ? $item->description : old('description') }}">
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('posts.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit" class="btn btn-info ml-2">{{ $item->id ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>
