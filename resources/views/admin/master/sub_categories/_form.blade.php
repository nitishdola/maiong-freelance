<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="form-line">
        {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'autocomplete' => 'off', 'required' => 'true']) !!}
        {!! Form::label('sub_category_name', '', array('class' => 'form-label')) !!}
    </div>
    {!! $errors->first('name', '<div class="help-info">:message</div>') !!}
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <div class="form-line">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control show-tick', 'id' => 'category_id', 'autocomplete' => 'off', 'required' => 'true', 'placeholder' => 'Select Category']) !!}
        
    </div>
    {!! $errors->first('category_id', '<div class="help-info">:message</div>') !!}
</div>