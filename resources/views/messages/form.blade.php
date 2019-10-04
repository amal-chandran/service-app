
<div class="form-group {{ $errors->has('message_body') ? 'has-error' : '' }}">
    {!! Form::label('message_body','Message Body',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::number('message_body',null, ['class' => 'form-control', 'placeholder' => 'Enter message body here...', ]) !!}
        {!! $errors->first('message_body', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('enquiry_id') ? 'has-error' : '' }}">
    {!! Form::label('enquiry_id','Enquiry',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('enquiry_id',$enquiries,null, ['class' => 'form-control', 'placeholder' => 'Select enquiry', ]) !!}
        {!! $errors->first('enquiry_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    {!! Form::label('created_by','Created By',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('created_by',$creators,null, ['class' => 'form-control', 'placeholder' => 'Select created by', ]) !!}
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

