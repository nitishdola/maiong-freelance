<div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Project Name <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Project Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group required  {{ $errors->has('email') ? 'has-error' : ''}}">
   <label for="inputEmail3" class="col-md-4 control-label">Description
   <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::textarea('description', null, ['class' => 'form-control required', 'id' => 'description', 'placeholder' => 'Description', 'rows' => 7, 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('description', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group required {{ $errors->has('category_id') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Category <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::select('category_id', $categories, null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Select Category', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('category_id', '<span class="help-inline">:message</span>') !!}
</div> 
<div class="form-group required {{ $errors->has('budget') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Project Budget <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::select('budget', $project_budgets, null, ['class' => 'form-control required', 'id' => 'budget', 'placeholder' => 'Select Budget', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('budget', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group required {{ $errors->has('contact_number') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Contact Number <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::text('contact_number', null, ['class' => 'form-control required', 'id' => 'contact_number', 'placeholder' => 'Contact Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('contact_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group required">
   <label class="col-md-4 control-label">Upload Files <sup>*</sup></label>
   
</div>

<div class="form-group required lastfileinput">
   <label class="col-md-4 control-label"></label>
   <div class="col-md-6 ">
      {!! Form::file('files[]', null, ['class' => 'form-control required', 'id' => 'files', 'required' => 'true']) !!}
   </div>
</div>

<div class="form-group required">
   <label class="col-md-4 control-label"> </label>
   

   <div class="col-md-6"> <a href="javascript:void(0)" id="add_file_input">ADD </a></div>
</div>

