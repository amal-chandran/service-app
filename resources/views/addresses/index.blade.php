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
        <h4 class="cards-title mb-0 float-left">Addresses</h4>
        @can('create-addresses')
        <a href="{{ route('addresses.address.create') }}" class="btn btn-success btn-sm float-right"
            title="Create New Address">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Addresses
        </a>
        @endcan
    </div>
    @if(count($addresses) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Addresses Available.</h4>
    </div>
    @else
    <div class="card-body p-0">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>State</th>
                    <th>District</th>
                    <th>Pin</th>
                    <th>Created By</th>
                    <th>Service</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->address }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->district }}</td>
                    <td>{{ $address->pin }}</td>
                    <td>{{ isset($address->creator->name) ? $address->creator->name : '' }}</td>
                    <td>{{ isset($address->service->name) ? $address->service->name : '' }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['addresses.address.destroy', $address->id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            @can('view-addresses')
                            <a href="{{ route('addresses.address.show', $address->id ) }}" class="btn btn-sm btn-info"
                                title="Show Address">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            @endcan
                            @can('edit-addresses')
                            <a href="{{ route('addresses.address.edit', $address->id ) }}"
                                class="btn btn-sm btn-primary" title="Edit Address">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>
                            @endcan
                            @can('delete-addresses')

                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Address',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Address.' . '")'
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

    @if ($addresses->hasPages())
    <div class="card-footer">
        {!! $addresses->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection