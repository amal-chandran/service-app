
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '255', 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    {!! Form::label('created_by','Created By',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('created_by',$creators,null, ['class' => 'form-control', 'placeholder' => 'Select created by', ]) !!}
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
    {!! Form::label('service_id','Service',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('service_id',$services,null, ['class' => 'form-control', 'placeholder' => 'Select service', ]) !!}
        {!! $errors->first('service_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

