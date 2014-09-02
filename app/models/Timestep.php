<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Timestep extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Timestep';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idTimestep';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	
	/*
	Fillable 
	*/
	
    protected $fillable = array(
	'date','time');

	/*
	Timestep belongs to Instance
	*/
	
	 public function Instance()
    {
        return $this->belongsTo('Instance','Instance_idInstance','idInstance');
    }

	/*
	Timestep has many Actions
	*/
	
	 public function Actions()
    {
        return $this->hasMany('Actions','Timestep_idTimestep','idTimestep');
    }
	/*
    Timestep has many Sensors
	*/
	
	 public function Sensor()
    {
        return $this->hasMany('Sensor','Timestep_idTimestep','idTimestep');
    }
}
