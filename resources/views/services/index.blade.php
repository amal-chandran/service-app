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
        <h4 class="cards-title mb-0 float-left">Services</h4>
        @can('create-services')
        <a href="{{ route('services.service.create') }}" class="btn btn-success btn-sm float-right"
            title="Create New Service">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Services
        </a>
        @endcan
    </div>
    @if(count($services) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Services Available.</h4>
    </div>
    @else
    <div class="card-body p-0">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created By</th>
                    <th>Category</th>
                    <th>Is Active</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ isset($service->creator->name) ? $service->creator->name : '' }}</td>
                    <td>{{ isset($service->category->name) ? $service->category->name : '' }}</td>
                    <td>{{ ($service->is_active) ? 'Yes' : 'No' }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['services.service.destroy', $service->id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            @can('view-services')
                            <a href="{{ route('services.service.show', $service->id ) }}" class="btn btn-sm btn-info"
                                title="Show Service">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            @endcan
                            @can('edit-services')
                            <a href="{{ route('services.service.edit', $service->id ) }}" class="btn btn-sm btn-primary"
                                title="Edit Service">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>
                            @endcan

                            @can('delete-services')
                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Service',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Service.' . '")'
                            ])
                            !!}
                            @endcan
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($services->hasPages())
    <div class="card-footer">
        {!! $services->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection