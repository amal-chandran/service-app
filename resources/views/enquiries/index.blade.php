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
          <h4 class="cards-title mb-0 float-left">Enquiries</h4>
            <a href="{{ route('enquiries.enquiry.create') }}" class="btn btn-success btn-sm float-right" title="Create New Enquiry">
                <span class="fas fa-plus" aria-hidden="true"></span> Create Enquiries
            </a>
        </div>
        @if(count($enquiries) == 0)
        <div class="card-body p-0 text-center">
            <h4>No Enquiries Available.</h4>
        </div>
        @else
        <div class="card-body p-0">
          <table class="table table-condensed">
                <thead>
                    <tr>
                            <th>Name</th>
                            <th>Created By</th>
                            <th>Service</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($enquiries as $enquiry)
                    <tr>
                            <td>{{ $enquiry->name }}</td>
                            <td>{{ isset($enquiry->creator->name) ? $enquiry->creator->name : '' }}</td>
                            <td>{{ isset($enquiry->service->name) ? $enquiry->service->name : '' }}</td>

                        <td>

                            {!! Form::open([
                                'method' =>'DELETE',
                                'route'  => ['enquiries.enquiry.destroy', $enquiry->id],
                                'style'  => 'display: inline;',
                            ]) !!}
                                <div class="btn-group btn-group-xs float-right" role="group">
                                    <a href="{{ route('enquiries.enquiry.show', $enquiry->id ) }}" class="btn btn-sm btn-info" title="Show Enquiry">
                                        <span class="fas fa-eye" aria-hidden="true"></span> Open
                                    </a>
                                    <a href="{{ route('enquiries.enquiry.edit', $enquiry->id ) }}" class="btn btn-sm btn-primary" title="Edit Enquiry">
                                        <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                    </a>

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-sm btn-danger',
                                            'title'   => 'Delete Enquiry',
                                            'onclick' => 'return confirm("' . 'Click Ok to delete Enquiry.' . '")'
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

@if ($enquiries->hasPages())
<div class="card-footer">
    {!! $enquiries->render() !!}
</div>
@endif
        @endif
      </div>
@endsection