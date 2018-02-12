@extends('ui.maiong_ui.main')

@section('main_content')
<div class="row">
<div class="col-md-12 page-content">
   <div class="inner-box category-content">
      <h2 class="title-2"><i class="icon-user-add"></i> Create New Project </h2>
      <div class="row">
         <div class="col-sm-12">

            @if (count($errors) > 0)
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             @endif

            {!! Form::open(array('route' => 'projects.store', 'id' => 'projects.store', 'files' => true, 'class' => 'form-horizontal row-border')) !!}
               <fieldset>

                  @include('user.projects._create')

                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>
                     <div class="col-md-8">
                        <div style="clear:both"></div>
                        <button type="submit" class="btn btn-primary" >Post Project</button>
                     </div>
                  </div>
               </fieldset>
            {!! Form::close() !!}

            <div class="form-group">
               <label class="col-md-3 control-label"></label>
               <div class="col-md-8">
                  <div class="termbox mb10">
                     <label class="checkbox-inline" for="checkboxes-1">
                        By clicking 'Post Project', you agree to the Terms & Conditions and Privacy Policy
If you decide to award your project we charge a 3% commission (minimum project fees apply).
                     </label>
                  </div>
                  <div style="clear:both"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection

@section('pageJs')
<script>
$('#add_file_input').click(function() {
   $lastFileInput = $('.lastfileinput:last');
   $clone = $lastFileInput.clone();
   $lastFileInput.after($clone);
});
</script>
@stop
