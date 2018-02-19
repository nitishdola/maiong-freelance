@extends('ui.maiong_ui.main')

@section('main_content')
<div class="row">
   <div class="col-sm-9 page-content col-thin-right">
      <div class="inner inner-box ads-details-wrapper">
         <h2> {{ $project_data->name }} </h2>
         <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> Posted: {{ date('D, d M Y ', strtotime($project_data->created_at)) }} </span> </span>
         <div class="Ads-Details ">
            <div class="row">
               <div class="ads-details-info jobs-details-info col-md-8">
                  <p>{{ $project_data->description }}
                  </p>
               </div>
               <div class="col-md-4">
                  <aside class="panel panel-body panel-details job-summery">
                     <ul>
                        <li>
                           <p class=" no-margin "><strong>Category:</strong> {{ $project_data->category }} </p>
                        </li>
                        <li>
                           <p class=" no-margin "><strong>Budget:</strong> {{ $project_data->budget }} </p>
                        </li>
                        <li>
                           <p class=" no-margin "><strong>Contact Number:</strong> {{ $project_data->contact_number }} </p>
                        </li>
                        
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-3  page-sidebar-right">
      <aside>
         <div class="panel sidebar-panel panel-contact-seller">
            <div class="panel-heading">Related Projects</div>
            <div class="panel-content user-info">
               <div class="panel-body text-center">
                  <div class="seller-info">
                     <div class="company-logo-thumb">
                        <a><img alt="img" class="img-responsive img-circle" src="images/jobs/company-logos/17.jpg"> </a>
                     </div>
                     <h3 class="no-margin"> Data Systems Ltd</h3>
                     <p>Location: <strong>New York</strong></p>
                     <p> Web: <strong>www.demoweb.com</strong></p>
                  </div>
               </div>
            </div>
         </div>
      </aside>
   </div>
</div>

   
@endsection

