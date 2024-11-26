{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

<form action="{{ $item->id ? route('posts.update', $item->id) : route('posts.store') }}" method="POST">
    @csrf

    @if ($item->id)
        @method('PUT')
    @endif

    <div class="card-body">
        
        <div class="form-group">
            <label for="category_id">
                {{ ucfirst(__('PkgBlog::post.category_id')) }}
                
                    <span class="text-danger">*</span>
                
            </label>
            <input name="category_id" type="input" class="form-control" id="category_id" placeholder="Entrez category_id"
                value="{{ $item ? $item->category_id : old('category_id') }}">
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="user_id">
                {{ ucfirst(__('PkgBlog::post.user_id')) }}
                
                    <span class="text-danger">*</span>
                
            </label>
            <input name="user_id" type="input" class="form-control" id="user_id" placeholder="Entrez user_id"
                value="{{ $item ? $item->user_id : old('user_id') }}">
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="title">
                {{ ucfirst(__('PkgBlog::post.title')) }}
                
                    <span class="text-danger">*</span>
                
            </label>
            <input name="title" type="input" class="form-control" id="title" placeholder="Entrez title"
                value="{{ $item ? $item->title : old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="content">
                {{ ucfirst(__('PkgBlog::post.content')) }}
                
                    <span class="text-danger">*</span>
                
            </label>
            <input name="content" type="input" class="form-control" id="content" placeholder="Entrez content"
                value="{{ $item ? $item->content : old('content') }}">
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="published_at">
                {{ ucfirst(__('PkgBlog::post.published_at')) }}
                
            </label>
            <input name="published_at" type="input" class="form-control" id="published_at" placeholder="Entrez published_at"
                value="{{ $item ? $item->published_at : old('published_at') }}">
            @error('published_at')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
    </div>

    <div class="card-footer">
        <a href="{{ route('posts.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit" class="btn btn-info ml-2">{{ $item->id ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>
