@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($title) ? $title : 'Address' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('addresses.address.index') }}" class="btn btn-primary" title="Show All Address">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            @can('create-addresses')
            <a href="{{ route('addresses.address.create') }}" class="btn btn-success" title="Create New Address">
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

        {!! Form::model($address, [
        'method' => 'PUT',
        'route' => ['addresses.address.update', $address->id],
        'class' => 'form-horizontal',
        'name' => 'edit_address_form',
        'id' => 'edit_address_form',

        ]) !!}

        @include ('addresses.form', ['address' => $address,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection