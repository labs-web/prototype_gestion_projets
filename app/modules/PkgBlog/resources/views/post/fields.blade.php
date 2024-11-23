{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

<form action="{{ postsToEdit ? route('posts.update', postsToEdit.id) : route('posts.store') }}" method="POST">
    @csrf
        @method('PUT')

    <div class="card-body">
        <div class="form-group">
            <label for="nom">{{ __('app.nom') }}
                    <span class="text-danger">*</span>
            </label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez nom"
                value="{{ postsToEdit ? postsToEdit.nom : old('nom') }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{ __('app.description') }}
            </label>
            <input name="description" type="text" class="form-control" id="description" placeholder="Entrez Exemple pour description"
                value="{{ postsToEdit ? postsToEdit.description : old('description') }}">
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('posts.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit" class="btn btn-info ml-2">{{ postsToEdit ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>
