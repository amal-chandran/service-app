@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Address' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['addresses.address.destroy', $address->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('addresses.address.index') }}" class="btn btn-primary" title="Show All Address">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('addresses.address.create') }}" class="btn btn-success" title="Create New Address">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('addresses.address.edit', $address->id ) }}" class="btn btn-primary" title="Edit Address">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Address',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Address.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Address</dt>
            <dd>{{ $address->address }}</dd>
            <dt>State</dt>
            <dd>{{ $address->state }}</dd>
            <dt>District</dt>
            <dd>{{ $address->district }}</dd>
            <dt>Pin</dt>
            <dd>{{ $address->pin }}</dd>
            <dt>Created By</dt>
            <dd>{{ isset($address->creator->name) ? $address->creator->name : '' }}</dd>
            <dt>Service</dt>
            <dd>{{ isset($address->service->name) ? $address->service->name : '' }}</dd>

</dl>
    </div>
  </div>

@endsection