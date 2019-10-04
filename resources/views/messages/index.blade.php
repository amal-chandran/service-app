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
          <h4 class="cards-title mb-0 float-left">Messages</h4>
            <a href="{{ route('messages.message.create') }}" class="btn btn-success btn-sm float-right" title="Create New Message">
                <span class="fas fa-plus" aria-hidden="true"></span> Create Messages
            </a>
        </div>
        @if(count($messages) == 0)
        <div class="card-body p-0 text-center">
            <h4>No Messages Available.</h4>
        </div>
        @else
        <div class="card-body p-0">
          <table class="table table-condensed">
                <thead>
                    <tr>
                            <th>Enquiry</th>
                            <th>Created By</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                            <td>{{ isset($message->enquiry->name) ? $message->enquiry->name : '' }}</td>
                            <td>{{ isset($message->creator->name) ? $message->creator->name : '' }}</td>

                        <td>

                            {!! Form::open([
                                'method' =>'DELETE',
                                'route'  => ['messages.message.destroy', $message->id],
                                'style'  => 'display: inline;',
                            ]) !!}
                                <div class="btn-group btn-group-xs float-right" role="group">
                                    <a href="{{ route('messages.message.show', $message->id ) }}" class="btn btn-sm btn-info" title="Show Message">
                                        <span class="fas fa-eye" aria-hidden="true"></span> Open
                                    </a>
                                    <a href="{{ route('messages.message.edit', $message->id ) }}" class="btn btn-sm btn-primary" title="Edit Message">
                                        <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                    </a>

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-sm btn-danger',
                                            'title'   => 'Delete Message',
                                            'onclick' => 'return confirm("' . 'Click Ok to delete Message.' . '")'
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

@if ($messages->hasPages())
<div class="card-footer">
    {!! $messages->render() !!}
</div>
@endif
        @endif
      </div>
@endsection