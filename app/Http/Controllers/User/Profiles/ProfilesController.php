<?php

namespace App\Http\Controllers\User\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Helper;
use DB, Validator, Redirect, Auth, Crypt;

use App\Models\Profile\UserProfile, App\Models\Profile\ProfileImage, App\Models\Profile\ProfileLocation;

use App\Http\Requests\ProfileImageUploadRequest;
class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Helper::getAllCategories($list = true);
        return view('user.profiles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileImageUploadRequest $request)
    {
        //dd($request->all());
        $message = [];
        DB::beginTransaction();
        /* Insert data to profiles table */
        try {
            // Validate, then create if valid
            $data = $request->except('files', '_token');
            $slug = Helper::getUniqueSlug(new UserProfile(), $request->profile_title);
            $data['slug']       = $slug;
            $data['user_id']    = Auth::id();

            $validator = Validator::make($data, UserProfile::$rules);

            if ($validator->fails()) return  Redirect::back()->withErrors($validator)->withInput();
            
            $profile = UserProfile::create( $data );
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }
        try {
            //loop through the items entered

            $files = $request->file('files');

            if(!empty($files)):
                foreach ($files as $photo) {
                    $image_data = [];
                    $filename       = strtolower(md5(uniqid().time())).'.'.$file->getClientOriginalExtension();

                    $destinationPath = config('globals.profile_file_store_path');
                    Storage::disk('uploads')->put($destinationPath . $filename ,file_get_contents($file));

                    $image_data['user_profile_id']  = $profile->id;
                    $image_data['image_path']       = $filename;

                    ProfileImage::create($image_data);
                }
            endif;
            // Validate, then create if valid
        } catch(ValidationException $e)
        {
            // Back to form
            return Redirect::back();
        }

        try {
            //loop through the locations entered

            $localities = $request->localities;

            if($localities):
                $longitudes = $request->longitudes;
                $latitudes  = $request->latitudes;
                foreach ($localities as $k => $locality) {
                    $locality_data = [];

                    $locality_data['user_profile_id']  = $profile->id;

                    $locality_data['latitude']      = $latitudes[$k];
                    $locality_data['longitude']     = $longitudes[$k];
                    $locality_data['name']          = $locality;

                    ProfileLocation::create($locality_data);
                }
            endif;
            // Validate, then create if valid
        } catch(ValidationException $e)
        {
            // Back to form
            return Redirect::back();
        }

        // Commit the queries!
        DB::commit();
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

    public function search(Request $request) {
        $take = 10;
        $skip = 0;

        if($request->take) {
            $take = $request->take;
        }

        if($request->skip) {
            $skip = $request->skip;
        }

        return UserProfile::with('user', 'category', 'profile_images', 'profile_locations')->take($take)->skip($skip)->get();
    }
}
