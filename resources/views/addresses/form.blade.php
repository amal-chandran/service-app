
<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    {!! Form::label('address','Address',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('address',null, ['class' => 'form-control', 'minlength' => '1', 'placeholder' => 'Enter address here...', ]) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
    {!! Form::label('state','State',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('state',null, ['class' => 'form-control', 'minlength' => '1', 'placeholder' => 'Enter state here...', ]) !!}
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
    {!! Form::label('district','District',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('district',null, ['class' => 'form-control', 'minlength' => '1', 'placeholder' => 'Enter district here...', ]) !!}
        {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pin') ? 'has-error' : '' }}">
    {!! Form::label('pin','Pin',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('pin',null, ['class' => 'form-control', 'minlength' => '1', 'placeholder' => 'Enter pin here...', ]) !!}
        {!! $errors->first('pin', '<p class="help-block">:message</p>') !!}
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

