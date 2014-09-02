<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Actions extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Actions';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idActions';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	
	/*
	Fillable 
	*/
	
    protected $fillable = array(
	'action','Timestep_idTimestep','Timstep_Instance_idInstance',
	'TSetHea','TSetCoo');

	/*
	Actions belongs to Timestep
	*/
	
	 public function Timestep()
    {
        return $this->belongsTo('Timestep','Timestep_idTimestep','idTimestep');
    }
	/*
	Actions has one Appliance
	*/
	
	 public function Appliance()
    {
        return $this->hasOne('Appliance','idAppliance','Appliance_idAppliance');
    }
}
