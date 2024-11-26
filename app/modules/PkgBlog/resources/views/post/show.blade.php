{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

@extends('layouts.app')
@section('title', __('app.show') . ' ' . __('PkgBlog::post.singular'))
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-default float-right">
                        <i class="far fa-edit"></i>
                        {{ __('app.edit') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <label for="category_id">{{ ucfirst(__('PkgBlog::post.category_id')) }}:</label>
                                <p>{{ $item->category_id }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label for="user_id">{{ ucfirst(__('PkgBlog::post.user_id')) }}:</label>
                                <p>{{ $item->user_id }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label for="title">{{ ucfirst(__('PkgBlog::post.title')) }}:</label>
                                <p>{{ $item->title }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label for="content">{{ ucfirst(__('PkgBlog::post.content')) }}:</label>
                                <p>{{ $item->content }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label for="published_at">{{ ucfirst(__('PkgBlog::post.published_at')) }}:</label>
                                <p>{{ $item->published_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
