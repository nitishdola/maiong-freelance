@extends('ui.maiong_ui.main')

@section('main_content')
<div class="row">
   <div class="col-md-12 page-content">
      <div class="inner-box category-content">
         <h2 class="title-2"><i class="icon-user-add"></i> Create New Profile </h2>
         <div class="row">
            <div class="col-sm-12">

               


                @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif

               {!! Form::open(array('route' => 'profile.store', 'id' => 'profile.store', 'files' => true, 'class' => 'form-horizontal row-border')) !!}
                  <fieldset>

                     @include('user.profiles._create')

                     <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-8">
                           <div style="clear:both"></div>
                           <button type="submit" class="btn btn-primary" >Create Profile</button>
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

@section('pageJs')
<script>
   citycounter = 1;
   filecounter = 1;

$('#add_file_input').click(function() {
   if(filecounter < 3) {
      $lastFileInput = $('.lastfileinput:last');
      $clone = $lastFileInput.clone();
      $lastFileInput.after($clone);

      filecounter++;
   }else{
      alert('Maximum 3 files can be selected !');
   }
});

$('#addMoreCity').click(function() {
   citycounter++;
   if(citycounter < 4) {
      $lastCityInput = $('div[id^="select_city"]:last'); console.log($lastCityInput);
      $cityClone = $lastCityInput.clone().prop('id', 'select_city'+citycounter)

      $cityClone.find('input').val('');

      $cityClone.find('[id^="profile_city"]').prop('id', 'profile_city'+citycounter)

      $lastCityInput.after($cityClone)
      
   }else{
      alert('Maximum 5 cities can be selected !');
   }
})



var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.

   var options = {
     types: ['(cities)'],
     componentRestrictions: {country: "in"}
   };

   var acInputs = document.getElementsByClassName("gmap_autocomplete");

   autocomplete1 = new google.maps.places.Autocomplete(
         /** @type {!HTMLInputElement} */(document.getElementById('profile_city1')),
         {types: ['geocode']});

   //autocomplete1.addListener('place_changed', GetLatlong(1));

   autocomplete1.addListener('place_changed', 
                                function(){getCityLatLng(1)});

   


   autocomplete2 = new google.maps.places.Autocomplete(
         /** @type {!HTMLInputElement} */(document.getElementById('profile_city2')),
         {types: ['geocode']});

   autocomplete2.addListener('place_changed', 
                                function(){getCityLatLng(2)});

   autocomplete3 = new google.maps.places.Autocomplete(
         /** @type {!HTMLInputElement} */(document.getElementById('profile_city3')),
         {types: ['geocode']});

   autocomplete3.addListener('place_changed', 
                                function(){getCityLatLng(3)});

   autocomplete4 = new google.maps.places.Autocomplete(
         /** @type {!HTMLInputElement} */(document.getElementById('profile_city4')),
         {types: ['geocode']});
   autocomplete4.addListener('place_changed', 
                                function(){getCityLatLng(4)});

   autocomplete5 = new google.maps.places.Autocomplete(
         /** @type {!HTMLInputElement} */(document.getElementById('profile_city5')),
         {types: ['geocode']});
   autocomplete5.addListener('place_changed', 
                                function(){getCityLatLng(5)});

}


getCityLatLng = function (v) {
      var geocoder = new google.maps.Geocoder();
      var address = document.getElementById('profile_city'+v).value;

      geocoder.geocode({ 'address': address }, function (results, status) {

         if (status == google.maps.GeocoderStatus.OK) {
             var latitude = results[0].geometry.location.lat();
             var longitude = results[0].geometry.location.lng();

             //$('#coordinates').fadeIn('slow');

             $('#longitude'+v).val(longitude);
             $('#latitude'+v).val(latitude);
         }  
      });
};

function GetLatlong(x)
{
   alert(x);
var geocoder = new google.maps.Geocoder();
var address = document.getElementById('profile_city').value;

geocoder.geocode({ 'address': address }, function (results, status) {

   if (status == google.maps.GeocoderStatus.OK) {
       var latitude = results[0].geometry.location.lat();
       var longitude = results[0].geometry.location.lng();

       $('#coordinates').fadeIn('slow');

       $('#longitude').val(longitude);
       $('#latitude').val(latitude);
   }  
});
}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBClpgXMwu2Pl_w8ozI5Ti4AU71u3UJtlE&libraries=places&callback=initAutocomplete"
        async defer></script>

@stop

@section('pageCss')
<style>
#map {
  height: 100%;
}
#locationField, #controls {
  position: relative;
  width: 480px;
}
#autocomplete {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 99%;
}
.label {
  text-align: right;
  font-weight: bold;
  width: 100px;
  color: #303030;
}
#address {
  border: 1px solid #000090;
  background-color: #f0f0ff;
  width: 480px;
  padding-right: 2px;
}
#address td {
  font-size: 10pt;
}
.field {
  width: 99%;
}
.slimField {
  width: 80px;
}
.wideField {
  width: 200px;
}
#locationField {
  height: 20px;
  margin-bottom: 2px;
}
#coordinates {
   display: none;
}
.profile-section-title {
   text-align: center;
   color: #555;
   text-decoration: underline;
   padding: 20px 0;
}
</style>
@stop

