<?php

namespace App\Http\Controllers\REST\Profile\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Message\Message;

use DB, Validator;
class MessageController extends Controller
{
    public function sendMail(Request $request) {
    	$json_return = [];
        DB::beginTransaction();
        /* Insert data to profiles table */
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
