{{-- Ce fichier est maintenu par ESSARRAJ Fouad --}}  

@extends('layouts.app')
@section('title', __('app.show') . ' ' . __('PkgBlog::category.singular'))
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-default float-right">
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
                                <label for="name">{{ ucfirst(__('PkgBlog::category.name')) }}:</label>
                                <p>{{ $item->name }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label for="description">{{ ucfirst(__('PkgBlog::category.description')) }}:</label>
                                @if ($item->description)
                                    <p>{!! $item->description !!}</p>
                                @else
                                    <p class="text-secondary">Aucune information disponible</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
