<div class="form-group required  {{ $errors->has('profile_title') ? 'has-error' : ''}}">
   <label for="inputEmail3" class="col-md-4 control-label">Profile Title
   <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::textarea('profile_title', null, ['class' => 'form-control required', 'id' => 'profile_description', 'placeholder' => 'Profile Title', 'rows' => 2, 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('profile_title', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group required  {{ $errors->has('profile_description') ? 'has-error' : ''}}">
   <label for="inputEmail3" class="col-md-4 control-label">Description
   <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::textarea('profile_description', null, ['class' => 'form-control required', 'id' => 'profile_description', 'placeholder' => 'Profile Description', 'rows' => 7, 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('profile_description', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group required {{ $errors->has('category_id') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Category <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::select('category_id', $categories, null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Select Category', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('category_id', '<span class="help-inline">:message</span>') !!}
</div> 

<h3 class="profile-section-title">Select  Locality(Upto 5 Cities/Places)</h3>

@for($i = 1; $i <=5; $i++)
<div class="form-group required select-city" id="select_city{{$i}}" >

   <label class="col-md-4 control-label">Locality{{$i}} @if($i==1)<sup>*</sup>@endif</label>
   <div class="col-md-6" id="locationField"> 
      {!! Form::text('localities[]', null, ['class' => 'form-control required gmap_autocomplete', 'id' => 'profile_city'.$i, 'placeholder' => 'Select  Locality', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
</div>
@endfor



<div id="coordinates">
   @for($i = 1; $i <=5; $i++)
   <div class="form-group required">
      <div class="col-md-6"> 
         {!! Form::text('longitudes[]', null, ['class' => 'form-control required', 'id' => 'longitude'.$i, 'autocomplete' => 'off','readonly' => true]) !!}
      </div>
   </div>

   <div class="form-group required">
      <div class="col-md-6"> 
         {!! Form::text('latitudes[]', null, ['class' => 'form-control required', 'id' => 'latitude'.$i, 'autocomplete' => 'off','readonly' => true]) !!}
      </div>
      {!! $errors->first('latitude', '<span class="help-inline">:message</span>') !!}
   </div>
   @endfor
</div>

<h3 class="profile-section-title"> Package Details</h3>
<div class="form-group required {{ $errors->has('package_description') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Package Description <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::textarea('package_description', null, ['class' => 'form-control required', 'id' => 'package_description', 'placeholder' => 'Package Description', 'rows' =>3, 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('package_description', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group required {{ $errors->has('package_amount') ? 'has-error' : ''}}">
   <label class="col-md-4 control-label">Package Amount <sup>*</sup></label>
   <div class="col-md-6">
      {!! Form::number('package_amount', null, ['class' => 'form-control required', 'step' => '0.01', 'id' => 'package_amount', 'placeholder' => 'Package Amount', 'autocomplete' => 'off', 'required' => 'true']) !!}
   </div>
   {!! $errors->first('package_amount', '<span class="help-inline">:message</span>') !!}
</div>
<h3 class="profile-section-title">Profile Images</h3>

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

