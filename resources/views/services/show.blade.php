@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($service->name) ? $service->name : 'Service' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['services.service.destroy', $service->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('services.service.index') }}" class="btn btn-primary" title="Show All Service">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('services.service.create') }}" class="btn btn-success" title="Create New Service">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('services.service.edit', $service->id ) }}" class="btn btn-primary" title="Edit Service">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Service',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Service.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Name</dt>
            <dd>{{ $service->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $service->description }}</dd>
            <dt>Created By</dt>
            <dd>{{ isset($service->creator->name) ? $service->creator->name : '' }}</dd>
            <dt>Category</dt>
            <dd>{{ isset($service->category->name) ? $service->category->name : '' }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($service->is_active) ? 'Yes' : 'No' }}</dd>

</dl>
    </div>
  </div>

@endsection