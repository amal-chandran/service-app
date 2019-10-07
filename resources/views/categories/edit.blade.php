@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($category->name) ? $category->name : 'Category' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="Show All Category">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            @can('create-categories')
            <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="Create New Category">
                <span class="fas fa-plus" aria-hidden="true"></span> Create New
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="list-unstyled alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::model($category, [
        'method' => 'PUT',
        'route' => ['categories.category.update', $category->id],
        'class' => 'form-horizontal',
        'name' => 'edit_category_form',
        'id' => 'edit_category_form',

        ]) !!}

        @include ('categories.form', ['category' => $category,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection