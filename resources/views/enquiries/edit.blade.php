@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($enquiry->name) ? $enquiry->name : 'Enquiry' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('enquiries.enquiry.index') }}" class="btn btn-primary" title="Show All Enquiry">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            @can('create-enquiries')
            <a href="{{ route('enquiries.enquiry.create') }}" class="btn btn-success" title="Create New Enquiry">
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

        {!! Form::model($enquiry, [
        'method' => 'PUT',
        'route' => ['enquiries.enquiry.update', $enquiry->id],
        'class' => 'form-horizontal',
        'name' => 'edit_enquiry_form',
        'id' => 'edit_enquiry_form',

        ]) !!}

        @include ('enquiries.form', ['enquiry' => $enquiry,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection