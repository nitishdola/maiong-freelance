@extends('ui.maiong_ui.main')

@section('intro')
<div class="intro jobs-intro hasOverly" style="background-image: url( {{ asset('public-assets/bg.jpg') }} ); background-position: center center;">
   <div class="dtable hw100">
      <div class="dtable-cell hw100">
         <div class="container text-center">
            <h1 class="intro-title animated fadeInDown"> Find the Right Job </h1>
            <p class="sub animateme fittext3 animated fadeIn"> Find the latest jobs available in your area. </p>
            <div class="row search-row animated fadeInUp">
               <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                  <i class="icon-location-2 icon-append"></i>
                  <input type="text" name="country" id="autocomplete-ajax" class="form-control locinput input-rel searchtag-input has-icon" placeholder="city, state, or zip" value="">
               </div>
               <div class="col-lg-4 col-sm-4 search-col relative"><i class="icon-docs icon-append"></i>
                  <input type="text" name="ads" class="form-control has-icon" placeholder="job title, keywords or company" value="">
               </div>
               <div class="col-lg-4 col-sm-4 search-col">
                  <button class="btn btn-primary btn-search btn-block"><i class="icon-search"></i><strong>Find
                  Jobs</strong></button>
               </div>
            </div>
            <div class="resume-up">
               <a><i class="icon-doc-4"></i></a> <a><b>Upload your CV</b></a> and easily apply to jobs from any
               device!
            </div>
         </div>
      </div>
   </div>
</div>
@stop

@section('main_content')
<div class="col-lg-12 content-box ">
   <div class="row row-featured row-featured-category row-featured-company">
      <div class="col-lg-12  box-title no-border">
         <div class="inner">
            <h2><span>Featured</span>
               Categories <!-- <a class="sell-your-item" href="job-list.html"> See all companies <i class="  icon-th-list"></i> </a> -->
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
