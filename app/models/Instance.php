<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Instance extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Instance';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idInstance';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	
	/*
	Fillable 
	*/
	
    protected $fillable = array(
	'name','building','step_longth',
	'start_time','end_time','weather_file',
	'begin','occupants','temp_min','temp_max',
	'User_idUser','Result_idResult');

	/*
	Instance belongs to User
	*/
	
	 public function User()
    {
        return $this->belongsTo('User','User_idUser','idUser');
    }
	/*
	Instance has one Result
	*/
	
	 public function Result()
    {
        return $this->hasOne('Result','idResult','Result_idResult');
    }
	/*
	Instance has many EP_Instances
	*/
	
	 public function EP_Instance()
    {
        return $this->hasMany('EP_Instance','Instance_idInstance','idInstance');
    }
	/*
	Instance has many Appliances
	*/
	
	 public function Appliance()
    {
        return $this->hasMany('Appliance','Instance_idInstance','idInstance');
    }
	/*
	Instance has many Timestep
	*/
	
	 public function Timestep()
    {
        return $this->hasMany('Timestep','Instance_idInstance','idInstance');
    }

}
