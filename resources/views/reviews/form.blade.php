
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

<div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
    {!! Form::label('rating','Rating',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="radio">
            <label for='rating_1'>
                {!! Form::radio('rating', '1',  (old('rating', isset($review->rating) ? $review->rating : null) == '1' ? true : null) , ['id' => 'rating_1', 'class' => '', ]) !!}
                1
            </label>
        </div>
        <div class="radio">
            <label for='rating_2'>
                {!! Form::radio('rating', '2',  (old('rating', isset($review->rating) ? $review->rating : null) == '2' ? true : null) , ['id' => 'rating_2', 'class' => '', ]) !!}
                2
            </label>
        </div>
        <div class="radio">
            <label for='rating_3'>
                {!! Form::radio('rating', '3',  (old('rating', isset($review->rating) ? $review->rating : null) == '3' ? true : null) , ['id' => 'rating_3', 'class' => '', ]) !!}
                3
            </label>
        </div>
        <div class="radio">
            <label for='rating_4'>
                {!! Form::radio('rating', '4',  (old('rating', isset($review->rating) ? $review->rating : null) == '4' ? true : null) , ['id' => 'rating_4', 'class' => '', ]) !!}
                4
            </label>
        </div>
        <div class="radio">
            <label for='rating_5'>
                {!! Form::radio('rating', '5',  (old('rating', isset($review->rating) ? $review->rating : null) == '5' ? true : null) , ['id' => 'rating_5', 'class' => '', ]) !!}
                5
            </label>
        </div>

        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
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

