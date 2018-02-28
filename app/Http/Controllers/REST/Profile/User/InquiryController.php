<?php

namespace App\Http\Controllers\REST\Profile\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\Inquiry, App\Models\Profile\InquiryAttachement;

use App\Http\Requests\InquiryFileUploadRequest;

use Helper;
use DB, Validator, Redirect, Auth, Crypt,Storage;

class InquiryController extends Controller
{
    public function send(InquiryFileUploadRequest $request) {
      $json_return = [];
      DB::beginTransaction();
      /* Insert data to profiles table */
      try {
          // Validate, then create if valid
          $data = $request->except('files', '_token');

          $validator = Validator::make($data, Inquiry::$rules);
          if($validator->fails()) {
              foreach ($validator->messages()->getMessages() as $field_name => $message)
              {
                  $json_return['error'] = true;
                  $json_return['errors'][] = $message;
              }
              return json_encode($json_return);
          }else{
              $profile = Inquiry::create( $data );
          }

      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      try {
          //loop through the items enteres

          $filesize = $request->filesize;
          for($i=1; $i <= $filesize; $i++):
              if ($request->hasFile('file'.$i)) {

                  if ($request->file('file'.$i)->isValid()){
                      $file           = $request->file('file'.$i);

                      $filename       = strtolower(md5(uniqid().time())).'.'.$file->getClientOriginalExtension();

                      $destinationPath = config('globals.inquiry_file_store_path');
                      Storage::disk('uploads')->put($destinationPath . $filename ,file_get_contents($file));

                      if(

                          InquiryAttachement::create([
                              'inquiry_id' => $profile->id,
                              'file_path' => $filename,
                          ])
                      )
                      {
                        //
                      }else{
                          $json_return['error'] = true;
                          $json_return['errors'][] = 'Unable to upload file !';
                      }
                  }
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
      // Commit the queries!
      DB::commit();

      $json_return['error']   = false;
      $json_return['success'] = true;
      $json_return['msg'][] = 'Inquiry submitted successfully !';
      return json_encode($json_return);
    }

    public function viewAll(Request $request) {
      $user_id = $request->user_id;
      return Inquiry::with(
        ['profile.user' => function($query) use($user_id) {
            $query->where('id', $user_id);
        }],
        'sender', 'attached_files')->get();
    }
}
