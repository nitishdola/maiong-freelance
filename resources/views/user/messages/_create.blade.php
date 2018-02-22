<div class="form-group required  {{ $errors->has('receiver_id') ? 'has-error' : ''}}">
   <label for="inputEmail3" class="col-md-4 control-label">To
   <sup>*</sup></label>
   <div class="col-md-6">
      <select id="select-repo" class="repositories" placeholder="Pick a repository..."></select>
    <option value="">Type your name ...</option>
  </select>
   </div>
   {!! $errors->first('receiver_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group required  {{ $errors->has('subject') ? 'has-error' : ''}}">
   <label for="inputEmail3" class="col-md-4 control-label">Subject
   <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::text('subject', null, ['class' => 'form-control required', 'id' => 'subject', 'placeholder' => 'Message Subject', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('subject', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group required  {{ $errors->has('message') ? 'has-error' : ''}}">
   <label for="inputEmail3" class="col-md-4 control-label">Message
   <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::textarea('message', null, ['class' => 'form-control required', 'id' => 'message', 'placeholder' => 'Your Message', 'rows' => 7, 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('message', '<span class="help-inline">:message</span>') !!}
</div>
