@extends('ui.maiong_ui.main')

@section('main_content')
<div class="row">
<div class="col-md-8 page-content">
   <div class="inner-box category-content">
      <h2 class="title-2"><i class="icon-user-add"></i> Create your account, Its free </h2>
      <div class="row">
         <div class="col-sm-12">
            {!! Form::open(array('route' => 'save.user.register', 'id' => 'save.user.register', 'class' => 'form-horizontal row-border')) !!}
               <fieldset>

                  <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
                     <label class="col-md-4 control-label">Full Name <sup>*</sup></label>
                     <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Full Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
                     </div>
                     {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
                  </div>

                  <div class="form-group required  {{ $errors->has('email') ? 'has-error' : ''}}">
                     <label for="inputEmail3" class="col-md-4 control-label">Email
                     <sup>*</sup></label>
                     <div class="col-md-6">
                        {!! Form::text('email', null, ['class' => 'form-control required', 'id' => 'email', 'placeholder' => 'Email', 'autocomplete' => 'off', 'required' => 'true']) !!}
                     </div>
                     {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
                  </div>
                  <div class="form-group required {{ $errors->has('password') ? 'has-error' : ''}}">
                     <label for="inputPassword3" class="col-md-4 control-label">Password </label>
                     <div class="col-md-6">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <p class="help-block">At least 5 characters</p>
                     </div>
                     {!! $errors->first('password', '<span class="help-inline">:message</span>') !!}
                  </div> 

                  <div class="form-group required {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                     <label for="inputPassword3" class="col-md-4 control-label">Confirm Password </label>
                     <div class="col-md-6">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password">
                        <p class="help-block">At least 5 characters</p>
                     </div>
                     {!! $errors->first('password_confirmation', '<span class="help-inline">:message</span>') !!}
                  </div>

                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>
                     <div class="col-md-8">
                        <div class="termbox mb10">
                           <label class="checkbox-inline" for="checkboxes-1">
                           <input name="checkboxes" id="checkboxes-1" value="1" type="checkbox">
                           I have read and agree to the <a href="terms-conditions.html">Terms
                           & Conditions</a> </label>
                        </div>
                        <div style="clear:both"></div>
                        <button type="submit" class="btn btn-primary" >Register</button>
                     </div>
                  </div>
               </fieldset>
            {!! Form::close() !!}
         </div>
      </div>
   </div>
</div>
<div class="col-md-4 reg-sidebar">
   <div class="reg-sidebar-inner text-center">
      <div class="promo-text-box">
         <i class=" icon-briefcase fa fa-4x icon-color-1"></i>
         <h3><strong>Post a Job </strong></h3>
         <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. 
         </p>
      </div>
      <div class="promo-text-box">
         <i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>
         <h3><strong>Create and Manage Jobs</strong></h3>
         <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
            Praesent tristique elit pharetra magna efficitur laoreet.
         </p>
      </div>
      <div class="promo-text-box">
         <i class="  icon-heart-2 fa fa-4x icon-color-3"></i>
         <h3><strong>Create your Favorite Jobs list.</strong></h3>
         <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
            Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.
         </p>
      </div>
   </div>
</div>
</div>
@endsection
