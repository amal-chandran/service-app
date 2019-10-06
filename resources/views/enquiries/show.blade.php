@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($enquiry->name) ? $enquiry->name : 'Enquiry' }}</h4>
        <div class="float-right">
            {!! Form::open([
            'method' =>'DELETE',
            'route' => ['enquiries.enquiry.destroy', $enquiry->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('enquiries.enquiry.index') }}" class="btn btn-primary" title="Show All Enquiry">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                @can('create-enquiries')
                <a href="{{ route('enquiries.enquiry.create') }}" class="btn btn-success" title="Create New Enquiry">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
                @endcan
            </div>
            <div class="btn-group btn-group-sm" role="group">
                @can('edit-enquiries')
                <a href="{{ route('enquiries.enquiry.edit', $enquiry->id ) }}" class="btn btn-primary"
                    title="Edit Enquiry">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>
                @endcan

                @can('delete-enquiries')
                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete Enquiry',
                'onclick' => 'return confirm("' . 'Click Ok to delete Enquiry.' . '")'
                ])
                !!}
                @endcan
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $enquiry->name }}</dd>
            <dt>Created By</dt>
            <dd>{{ isset($enquiry->creator->name) ? $enquiry->creator->name : '' }}</dd>
            <dt>Service</dt>
            <dd>{{ isset($enquiry->service->name) ? $enquiry->service->name : '' }}</dd>

        </dl>
    </div>
</div>

@endsection