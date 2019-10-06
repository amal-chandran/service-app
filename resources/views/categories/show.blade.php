@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($category->name) ? $category->name : 'Category' }}</h4>
        <div class="float-right">
            {!! Form::open([
            'method' =>'DELETE',
            'route' => ['categories.category.destroy', $category->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="Show All Category">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                @can('create-categories')
                <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="Create New Category">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
                @endcan
            </div>
            <div class="btn-group btn-group-sm" role="group">
                @can('edit-categories')
                <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary"
                    title="Edit Category">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>
                @endcan

                @can('delete-categories')
                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete Category',
                'onclick' => 'return confirm("' . 'Click Ok to delete Category.' . '")'
                ])
                !!}
                @endcan
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $category->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $category->description }}</dd>

        </dl>
    </div>
</div>

@endsection