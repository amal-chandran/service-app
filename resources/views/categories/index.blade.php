@extends('layouts.dashboard')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fas fa-check"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">
        <div class="card-header">
          <h4 class="cards-title mb-0 float-left">Categories</h4>
            <a href="{{ route('categories.category.create') }}" class="btn btn-success btn-sm float-right" title="Create New Category">
                <span class="fas fa-plus" aria-hidden="true"></span> Create Categories
            </a>
        </div>
        @if(count($categories) == 0)
        <div class="card-body p-0 text-center">
            <h4>No Categories Available.</h4>
        </div>
        @else
        <div class="card-body p-0">
          <table class="table table-condensed">
                <thead>
                    <tr>
                            <th>Name</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                            <td>{{ $category->name }}</td>

                        <td>

                            {!! Form::open([
                                'method' =>'DELETE',
                                'route'  => ['categories.category.destroy', $category->id],
                                'style'  => 'display: inline;',
                            ]) !!}
                                <div class="btn-group btn-group-xs float-right" role="group">
                                    <a href="{{ route('categories.category.show', $category->id ) }}" class="btn btn-sm btn-info" title="Show Category">
                                        <span class="fas fa-eye" aria-hidden="true"></span> Open
                                    </a>
                                    <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-sm btn-primary" title="Edit Category">
                                        <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                    </a>

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-sm btn-danger',
                                            'title'   => 'Delete Category',
                                            'onclick' => 'return confirm("' . 'Click Ok to delete Category.' . '")'
                                        ])
                                    !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
          </table>
        </div>

@if ($categories->hasPages())
<div class="card-footer">
    {!! $categories->render() !!}
</div>
@endif
        @endif
      </div>
@endsection