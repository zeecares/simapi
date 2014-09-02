<?php

class InstanceController extends BaseController {

     public function getCreate($user_id){
	 
	    $user = User::find($user_id);
		return Response::make($user);

	   // return View::make('instance.create_instance',array('user'=>$user));
	 }
     public function postCreate($user_id){
	 
	 	/*$user = User::find($username);
		$user_id = Auth::user()->idUser;
		$name = Input::get('name');
		
		$create = Instance::create(array(
		 
		           'name' =>$name,
				   'User_idUser'=>$user_id
		   ));
        //$instance = Instance::find($)
        $response=array($name);		   
	    return $response;*/
		 $input = Input::get();
		 $create = Instance::create(array(
		           'name' =>$input['name'],
				   'User_idUser'=>$user_id,
				   'begin'=>0
		   ));
          $response=$create->idInstance;
	    return Response::json(array('instance_id' => $response));
	 }
	 
	 public function postbegin($instance_id){
	    $id=(int)$instance_id;
	    $instance = Instance::find($id);
		$instance->begin=1;
		$instance->save();
		return Response::json(array(
		'Instance id' => $id,
		'begin status'=>$instance->begin));
	}
	
	public function getbegin($instance_id){
	    $id=(int)$instance_id;
	    $instance = Instance::find($id);
		return $instance->begin;	
	}
}
