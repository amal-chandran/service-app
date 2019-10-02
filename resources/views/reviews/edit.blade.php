@extends('layouts.dashboard')

@section('content')

<div class="card">
        <div class="card-header">
            <h4 class="float-left">{{ !empty($review->name) ? $review->name : 'Review' }}</h4>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('reviews.review.index') }}" class="btn btn-primary" title="Show All Review">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>

                <a href="{{ route('reviews.review.create') }}" class="btn btn-success" title="Create New Review">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
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

            {!! Form::model($review, [
                'method' => 'PUT',
                'route' => ['reviews.review.update', $review->id],
                'class' => 'form-horizontal',
                'name' => 'edit_review_form',
                'id' => 'edit_review_form',
                
            ]) !!}

            @include ('reviews.form', ['review' => $review,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection