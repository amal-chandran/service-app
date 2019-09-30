
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '255', 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description','Description',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '1000', ]) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    {!! Form::label('created_by','Created By',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('created_by',$creators,null, ['class' => 'form-control', 'placeholder' => 'Select created by', ]) !!}
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::label('category_id','Category',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('category_id',$categories,null, ['class' => 'form-control', 'placeholder' => 'Select category', ]) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('is_active','Is Active',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_active_1'>
                {!! Form::checkbox('is_active', '1',  (old('is_active', isset($service->is_active) ? $service->is_active : null) == '1' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

