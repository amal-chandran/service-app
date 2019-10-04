@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Message' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['messages.message.destroy', $message->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('messages.message.index') }}" class="btn btn-primary" title="Show All Message">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('messages.message.create') }}" class="btn btn-success" title="Create New Message">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('messages.message.edit', $message->id ) }}" class="btn btn-primary" title="Edit Message">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Message',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Message.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Message Body</dt>
            <dd>{{ $message->message_body }}</dd>
            <dt>Enquiry</dt>
            <dd>{{ isset($message->enquiry->name) ? $message->enquiry->name : '' }}</dd>
            <dt>Created By</dt>
            <dd>{{ isset($message->creator->name) ? $message->creator->name : '' }}</dd>

</dl>
    </div>
  </div>

@endsection