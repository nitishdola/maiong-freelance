<?php

namespace App\Http\Controllers\REST\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Project\Project;

use Helper;
use DB, Validator, Redirect, Auth, Crypt, Storage;
use App\Models\Project\ProjectImage;
use App\Http\Requests\ProjectImageUploadRequest;

class ProjectsController extends Controller
{
    public function packages() {
      return Project::apiBudgets();
    }

    public function store(ProjectImageUploadRequest $request) {
      $json_return = [];
      DB::beginTransaction();
      /* Insert data to projects table */
      try {
          // Validate, then create if valid
          $data = $request->except('files', '_token');
          $slug = Helper::getUniqueSlug(new Project(), $request->name);
          $data['slug']       = $slug;
          //$data['user_id']    = Auth::id();

          $validator = Validator::make($data, Project::$rules);
          if($validator->fails()) {
              foreach ($validator->messages()->getMessages() as $field_name => $message)
              {
                  $json_return['error'] = true;
                  $json_return['errors'][] = $message;
              }
              return json_encode($json_return);
          }else{
              $project = Project::create( $data );
          }

      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      try {
          //loop through the items enteres

          $imagesize = $request->imagesize;
          if($imagesize > 0){
            for($i=1; $i <= $imagesize; $i++):
                if ($request->hasFile('image'.$i)) {

                    if ($request->file('image'.$i)->isValid()){
                        $file           = $request->file('image'.$i);
                        $filename       = strtolower(md5(uniqid().time())).'.'.$file->getClientOriginalExtension();

                        $destinationPath = config('globals.project_file_store_path');
                        Storage::disk('uploads')->put($destinationPath . $filename ,file_get_contents($file));

                        if(

                            ProjectImage::create([
                                'project_id' => $project->id,
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
          }



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
          $locality = $request->locality;
          if($locality):

              $longitude = $request->longitude;
              $latitude  = $request->latitude;

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

      //send message to users localities

      // Commit the queries!
      DB::commit();

      $json_return['error']   = false;
      $json_return['success'] = true;
      $json_return['msg'][] = 'Project created successfully !';
      return json_encode($json_return);
    }
}
