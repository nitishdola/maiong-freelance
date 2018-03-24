<?php

namespace App\Http\Controllers\REST\Profile\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Message\Message;

use DB, Validator, Storage;
class MessageController extends Controller
{
    public function sendMail(Request $request) { //dd($request);
    	$json_return = [];
        DB::beginTransaction();
        /* Insert data to messages table */
        try {
            // Validate, then create if valid
            $data = $request->except('files', '_token');
            $data['message_date'] = date('Y-m-d H:i:s');


            $receiver_ids = json_decode($request->receiver_ids);

            foreach($receiver_ids as $receiver_id):

            	$data['receiver_id'] = $receiver_id;

	            $validator = Validator::make($data, Message::$rules);
	            if($validator->fails()) {
	                foreach ($validator->messages()->getMessages() as $field_name => $message)
	                {
	                    $json_return['error'] = true;
	                    $json_return['errors'][] = $message;
	                }
	                return json_encode($json_return);
	            }else{
	                $message = Message::create( $data );
	            }
        	endforeach;

        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        try {
            //loop through the items enteres

            $filesize = $request->filesize;
            if($filesize):
              for($i=1; $i <= $filesize; $i++):
                  if ($request->hasFile('file'.$i)) {

                      if ($request->file('file'.$i)->isValid()){
                          $file           = $request->file('file'.$i);

                          $filename       = strtolower(md5(uniqid().time())).'.'.$file->getClientOriginalExtension();

                          $destinationPath = config('globals.message_file_store_path');
                          Storage::disk('uploads')->put($destinationPath . $filename ,file_get_contents($file));

                          if(

                              MessageAttachement::create([
                                  'message_id'  => $message->id,
                                  'file_path'   => $destinationPath . $filename,
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
        $json_return['msg'][] 	= 'Message sent successfully !';
        return json_encode($json_return);
    }

    public function mailBox(Request $request) {
        $user_id    = $request->user_id;
        return Message::with('sender', 'receiver', 'profile', 'reply')->where('sender_id', $user_id)->where('deleted_from_receiver',0)->where('status', 1)->get();
    }

    public function sentBox(Request $request) {
        $user_id    = $request->user_id;
        return Message::with('sender', 'receiver', 'profile', 'reply')->where('receiver_id', $user_id)->where('status', 1)->get();
    }

    public function trashBox(Request $request) {
        $user_id    = $request->user_id;
        return Message::with('sender', 'receiver', 'profile', 'reply')->where('sender_id', $user_id)->where('status', 2)->get();
    }

    public function makeRead(Request $request) {
        $json_return = [];
        $message_id = $request->message_id;
        $msg = Message::find($message_id);
        $msg->is_read = 1;
        if($msg->save()) {

        $json_return['success'] = true;
        }else{

        $json_return['success'] = false;
        }
        return json_encode($json_return);
    }

    public function sendToTrash(Request $request) {
        $json_return = [];
        $message_id = $request->message_id;
        $delete_type    = $request->delete_type;

        $msg = Message::find($message_id);

        if($delete_type == 'sender_del') {
            $msg->deleted_from_sender = 1;
        }elseif($delete_type == 'receiver_del'){
            $msg->deleted_from_receiver = 1;
        }else{
            $json_return['success'] = false;
            return json_encode($json_return);
        }

        if($msg->save()) {

          $json_return['success'] = true;
        }else{

          $json_return['success'] = false;
        }
        return json_encode($json_return);
    }
}
