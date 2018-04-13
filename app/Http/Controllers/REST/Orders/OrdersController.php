<?php

namespace App\Http\Controllers\REST\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Helper;
use DB, Validator, Redirect, Auth, Crypt, Response;
use App\Models\Project\Order\Order;

class OrdersController extends Controller
{
    public function placeOrder(Request $request) {
    	$json_return = [];

    	if($request->buyer_id && $request->seller_id && $request->user_profile_id):
    		$project_cost 	= $request->project_cost;
    		$order_date  	= date('Y-m-d');

    		$data = [];
    		$data['buyer_id'] 			= $request->buyer_id;
    		$data['seller_id'] 			= $request->seller_id;
    		$data['user_profile_id'] 	= $request->user_profile_id;
    		$data['project_cost'] 		= $request->project_cost;
    		$data['order_date'] 		= $order_date;

    		$validator = Validator::make($data, Order::$rules);

    		if($validator->fails()):
    			foreach ($validator->messages()->getMessages() as $field_name => $message):
    				$json_return['error'] 		= true;
			        $json_return['message'][] 	= $message;
			    endforeach;
			else:
				if(Order::create( $data )):
					$json_return['error'] 		= false;
			        $json_return['message'][] 	= 'Order placed successfully !';
			    else:
			    	$json_return['error'] 		= true;
			        $json_return['message'][] 	= 'Something went wrong ! Please try again';
			    endif;
			endif;
		else:
			$json_return['error'] 		= true;
			$json_return['message'][] 	= 'Not enough information provided :(';
		endif;

		return json_encode($json_return);
    }	

    public function myProjects(Request $request) {
    	$json_return = [];

    	if($request->user_id):
    		$my_projects 	= Order::where(['status' => 1, 'seller_id' => $request->user_id])->with('buyer', 'seller', 'userProfile')->get();
    		$my_orders 		= Order::where(['status' => 1, 'buyer_id' 	=> $request->user_id])->with('buyer', 'seller', 'userProfile')->get();

    		$json_return['success'] 	= true;
    		$json_return['my_projects'] = $my_projects;
    		$json_return['my_orders'] 	= $my_orders;
    	else:
    		$json_return['success'] 	= false;
    		$json_return['message'] 	= 'Not enough info provided !';
    	endif;

    	return json_encode($json_return);
    }

    public function acceptOrder(Request $request) {
    	$json_return = [];

    	if($request->user_id && $request->order_id):
    		
    		$order = Order::find($request->order_id);

    		if($order):
    			if($order->seller_id == $request->user_id):
    				$order->expected_delivery_date 	= date('Y-m-d', strtotime($request->expected_delivery_date));
    				$order->order_current_status 	= 'order_accepted';

    				if($order->save()):
    					$json_return['success'] 	= true;
    					$json_return['message'] 	= 'Order accepted !';
    				else:
    					$json_return['success'] 	= false;
    					$json_return['message'] 	= 'Something went wrong ! Please try again';
    				endif;
    			else:
    				$json_return['success'] 	= false;
    				$json_return['message'] 	= 'Not your order mate !';
    			endif;
    		else:
				$json_return['success'] 	= false;
				$json_return['message'] 	= 'Invalid Order!';
			endif;
    	else:
    		$json_return['success'] 	= false;
    		$json_return['message'] 	= 'Not enough info provided !';
    	endif;

    	return json_encode($json_return);
    }


    public function deliverOrderBySeller(Request $request) {
    	$json_return = [];

    	if($request->user_id && $request->order_id):
    		
    		$order = Order::with('userProfile')->where('id', $request->order_id)->first();

    		if($order):
    			if($order->seller_id == $request->user_id):
    				$order->seller_order_confirm 		= 1;
    				$order->seller_order_confirm_date 	= date('Y-m-d H:i:s');

    				if($order->seller_order_confirm && $order->buyer_order_confirm) {
						$order->project_delivered 	= 1;    					
    				}
    				if($order->save()):
    					$json_return['success'] 	= true;
    					if($order->seller_order_confirm && $order->buyer_order_confirm) {
							$json_return['message'] 	= 'Order Delivered  !';   					
	    				}else{
	    					$json_return['message'] 	= 'Order status  updated ! Project will be fully delivered after client ( '. ucfirst($order->userProfile->user->name) .' ) confirms .';
	    				}
    					
    				else:
    					$json_return['success'] 	= false;
    					$json_return['message'] 	= 'Something went wrong ! Please try again';
    				endif;
    			else:
    				$json_return['success'] 	= false;
    				$json_return['message'] 	= 'Not your order mate !';
    			endif;
    		else:
				$json_return['success'] 	= false;
				$json_return['message'] 	= 'Invalid Order!';
			endif;
    	else:
    		$json_return['success'] 	= false;
    		$json_return['message'] 	= 'Not enough info provided !';
    	endif;

    	return json_encode($json_return);
    }


    public function deliverOrderByBuyer(Request $request) {
    	$json_return = [];

    	if($request->user_id && $request->order_id):
    		
    		$order = Order::with('userProfile')->where('id', $request->order_id)->first();

    		if($order):
    			if($order->buyer_id == $request->user_id):
    				$order->buyer_order_confirm 		= 1;
    				$order->buyer_order_confirm_date 	= date('Y-m-d H:i:s');

    				if($order->seller_order_confirm && $order->buyer_order_confirm) {
						$order->project_delivered 	= 1;    					
    				}
    				if($order->save()):
    					$json_return['success'] 	= true;
    					if($order->seller_order_confirm && $order->buyer_order_confirm) {
							$json_return['message'] 	= 'Order Delivered  !';   					
	    				}else{
	    					$json_return['message'] 	= 'Order status  updated ! Project will be fully delivered after Freelancer ( '. ucfirst($order->userProfile->user->name).' ) confirms .';
	    				}
    					
    				else:
    					$json_return['success'] 	= false;
    					$json_return['message'] 	= 'Something went wrong ! Please try again';
    				endif;
    			else:
    				$json_return['success'] 	= false;
    				$json_return['message'] 	= 'Not your order mate !';
    			endif;
    		else:
				$json_return['success'] 	= false;
				$json_return['message'] 	= 'Invalid Order!';
			endif;
    	else:
    		$json_return['success'] 	= false;
    		$json_return['message'] 	= 'Not enough info provided !';
    	endif;

    	return json_encode($json_return);
    }


}
