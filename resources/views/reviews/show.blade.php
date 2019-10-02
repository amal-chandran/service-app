@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($review->name) ? $review->name : 'Review' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['reviews.review.destroy', $review->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('reviews.review.index') }}" class="btn btn-primary" title="Show All Review">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('reviews.review.create') }}" class="btn btn-success" title="Create New Review">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('reviews.review.edit', $review->id ) }}" class="btn btn-primary" title="Edit Review">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Review',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Review.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Name</dt>
            <dd>{{ $review->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $review->description }}</dd>
            <dt>Rating</dt>
            <dd>{{ $review->rating }}</dd>
            <dt>Created By</dt>
            <dd>{{ isset($review->creator->name) ? $review->creator->name : '' }}</dd>
            <dt>Service</dt>
            <dd>{{ isset($review->service->name) ? $review->service->name : '' }}</dd>

</dl>
    </div>
  </div>

@endsection