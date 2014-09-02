<?php

class ActionController extends BaseController {
public function postSetTem($instance_id,$timestep_id)
	{
		 $input = Input::get();
		 $action = Actions::create(array(
		           'Timestep_idTimestep' =>$timestep_id,
				   'Timestep_Instance_idInstance'=>$instance_id,
				   'TSetHea'=>$input['TSetHea'],
				   'TSetCoo'=>$input['TSetCoo']
		   ));
          $response=$action->idActions;
	    return Response::json(array('Action_id' => $response));
	}
}