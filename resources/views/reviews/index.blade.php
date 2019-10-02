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
          <h4 class="cards-title mb-0 float-left">Reviews</h4>
            <a href="{{ route('reviews.review.create') }}" class="btn btn-success btn-sm float-right" title="Create New Review">
                <span class="fas fa-plus" aria-hidden="true"></span> Create Reviews
            </a>
        </div>
        @if(count($reviews) == 0)
        <div class="card-body p-0 text-center">
            <h4>No Reviews Available.</h4>
        </div>
        @else
        <div class="card-body p-0">
          <table class="table table-condensed">
                <thead>
                    <tr>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Created By</th>
                            <th>Service</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ isset($review->creator->name) ? $review->creator->name : '' }}</td>
                            <td>{{ isset($review->service->name) ? $review->service->name : '' }}</td>

                        <td>

                            {!! Form::open([
                                'method' =>'DELETE',
                                'route'  => ['reviews.review.destroy', $review->id],
                                'style'  => 'display: inline;',
                            ]) !!}
                                <div class="btn-group btn-group-xs float-right" role="group">
                                    <a href="{{ route('reviews.review.show', $review->id ) }}" class="btn btn-sm btn-info" title="Show Review">
                                        <span class="fas fa-eye" aria-hidden="true"></span> Open
                                    </a>
                                    <a href="{{ route('reviews.review.edit', $review->id ) }}" class="btn btn-sm btn-primary" title="Edit Review">
                                        <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                    </a>

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-sm btn-danger',
                                            'title'   => 'Delete Review',
                                            'onclick' => 'return confirm("' . 'Click Ok to delete Review.' . '")'
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

@if ($reviews->hasPages())
<div class="card-footer">
    {!! $reviews->render() !!}
</div>
@endif
        @endif
      </div>
@endsection