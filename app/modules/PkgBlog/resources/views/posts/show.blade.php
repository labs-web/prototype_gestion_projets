{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

@extends('layouts.app')
@section('title', __('app.show') + ' ' + __('PkgBlog::post.singular'))
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('posts.edit', $fetchedData->id) }}" class="btn btn-default float-right">
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
                                <label for="nom">{{ __('app.nom') }}:</label>
                                <p>{{ $fetchedData.nom }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label for="description">{{ __('app.description') }}:</label>
                                @if ($fetchedData.description)
                                    <p>{!! $fetchedData.description !!}</p>
                                @else
                                    <p class="text-secondary">Aucune information disponible</p>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <label for="tags">{{ __('PkgBlog::tag.plural') }}:</label>
                                <ul>
                                    @foreach ($fetchedData.tags as $item)
                                        <li>{{ $item->nom }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
