@extends('layouts.dashboard')

@section('content')


<div class="card">
        <div class="card-header">
          <h3 class="float-left mb-0">Create New Category</h3>
          <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="Show All Category">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
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

            {!! Form::open([
                'route' => 'categories.category.store',
                'class' => 'form-horizontal',
                'name' => 'create_category_form',
                'id' => 'create_category_form',
                
                ])
            !!}

            @include ('categories.form', ['category' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection