<?php

namespace App\Http\Controllers\REST\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Helper;
use DB, Validator, Redirect, Auth, Crypt,Storage;

use App\Models\Profile\UserProfile, App\Models\Profile\ProfileImage, App\Models\Profile\ProfileLocation;

use App\Http\Requests\ProfileImageUploadRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileImageUploadRequest $request)
    {
        $json_return = [];
        DB::beginTransaction();
        /* Insert data to profiles table */
        try {
            // Validate, then create if valid
            $data = $request->except('files', '_token');
            $slug = Helper::getUniqueSlug(new UserProfile(), $request->profile_title);
            $data['slug']       = $slug;
            //$data['user_id']    = Auth::id();

            $validator = Validator::make($data, UserProfile::$rules);
            if($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $message)
                {
                    $json_return['error'] = true;
                    $json_return['errors'][] = $message;
                }
                return json_encode($json_return);
            }else{
                $profile = UserProfile::create( $data );
            }

        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        try {
            //loop through the items enteres

            $imagesize = $request->imagesize;
            for($i=1; $i <= $imagesize; $i++):
                if ($request->hasFile('image'.$i)) {

                    if ($request->file('image'.$i)->isValid()){
                        $file           = $request->file('image'.$i);




                        $filename       = strtolower(md5(uniqid().time())).'.'.$file->getClientOriginalExtension();

                        $destinationPath = config('globals.profile_file_store_path');
                        Storage::disk('uploads')->put($destinationPath . $filename ,file_get_contents($file));

                        if(

                            ProfileImage::create([
                                'user_profile_id' => $profile->id,
                                'image_path' => $filename,
                            ])
                        )
                        {
                          //
                        }else{
                            $json_return['error'] = true;
                            $json_return['errors'][] = 'Unable to upload file !';
                        }
                    }
                }else{
                    if($i == 1):
                        $json_return['error'] = true;
                        $json_return['errors'][] = 'No file selected !';
                    endif;
                }
            endfor;



            // Validate, then create if valid
        } catch(ValidationException $e)
        {
            // Back to form
            //return Redirect::back();
            $json_return['error'] = true;
            $json_return['errors'][] = 'Unexpected error occurred!';
            return json_encode($json_return);
        }

        try {
            //loop through the locations entered
            //return $request;
            $localities = json_decode($request->localities);
            //dd(json_decode($localities));
            if($localities):
                $longitudes = $request->longitudes;
                $latitudes  = $request->latitudes;

                foreach ($localities as $k => $locality) {
                    $locality_data = [];

                    $locality_data['user_profile_id']  = $profile->id;

                    $longitudes = json_decode($request->longitudes);
                    $latitudes  = json_decode($request->longitudes);

                    $locality_data['latitude']      = $latitudes[$k];
                    $locality_data['longitude']     = $longitudes[$k];
                    $locality_data['name']          = $locality;

                    ProfileLocation::create($locality_data);
                }
            else:
                $json_return['error'] = true;
                $json_return['errors'][] = 'No Locality Selected !';
                return json_encode($json_return);
            endif;

            // Validate, then create if valid
        } catch(ValidationException $e)
        {
            // Back to form
            //return Redirect::back();
            $json_return['error'] = true;
            $json_return['errors'][] = 'Unexpected error occurred!';
            return json_encode($json_return);
        }

        // Commit the queries!
        DB::commit();

        $json_return['error']   = false;
        $json_return['success'] = true;
        $json_return['msg'][] = 'Profile created successfully !';
        return json_encode($json_return);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
