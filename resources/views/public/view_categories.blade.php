@extends('ui.maiong_ui.main')


@section('main_content')

<div class="col-lg-12 content-box ">
   <div class="row row-featured row-featured-category row-featured-company">
      <div class="col-lg-12  box-title no-border">
         <div class="inner">
            <h2><span>Featured</span>
               Categories
            </h2>
         </div>
      </div>
      @foreach($categories as $ck => $cv)
      <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
         <a href="{{ route('public.view_jobs.categories', $cv->slug) }}">
            <img alt="img" class="img-responsive" src="{{ asset($cv->icon_path) }}">
            <h6> <span class="company-name">{{ $cv->name }}</span> </h6>
         </a>
      </div>
      @endforeach
      
   </div>
</div>
<div style="clear: both"></div>
@endsection
