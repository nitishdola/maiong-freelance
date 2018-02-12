@extends('ui.maiong_ui.main')

@section('main_content')
<div class="row">
<div class="col-md-12 page-content">
   <div class="inner-box category-content">
      <h2 class="title-2"><i class="icon-user-add"></i> Login to your account </h2>
      <div class="row">
         <div class="col-sm-12">

            {!! Form::open(array('route' => 'process.user.login', 'id' => 'process.user.login', 'class' => 'form-horizontal row-border')) !!}
               <fieldset>
                  <div class="form-group required">
                     <label for="inputEmail3" class="col-md-4 control-label">Email
                     <sup>*</sup></label>
                     <div class="col-md-6">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                     </div>
                  </div>
                  <div class="form-group required">
                     <label for="inputPassword3" class="col-md-4 control-label">Password* </label>
                     <div class="col-md-6">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>
                     <div class="col-md-8">
                        <div style="clear:both"></div>
                        <button type="submit" class="btn btn-primary"> Login</button>
                     </div>
                  </div>
               </fieldset>
            {!! Form::close() !!}
         </div>
      </div>
   </div>
</div>
</div>
@endsection
