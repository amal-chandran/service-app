@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($title) ? $title : 'Message' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('messages.message.index') }}" class="btn btn-primary" title="Show All Message">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            @can('create-messages')
            <a href="{{ route('messages.message.create') }}" class="btn btn-success" title="Create New Message">
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

        {!! Form::model($message, [
        'method' => 'PUT',
        'route' => ['messages.message.update', $message->id],
        'class' => 'form-horizontal',
        'name' => 'edit_message_form',
        'id' => 'edit_message_form',

        ]) !!}

        @include ('messages.form', ['message' => $message,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection