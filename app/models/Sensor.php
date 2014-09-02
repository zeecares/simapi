<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Sensor extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Sensor';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idSensor';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	
	/*
	Fillable 
	*/
	
    protected $fillable = array(
	'name','room','Timstep_Instance_idInstance',
	'Timestep_idTimestep',
	'TOut','TRoom','idSensor');

	/*
	Actions belongs to Timestep
	*/
	
	 public function Timestep()
    {
        return $this->belongsTo('Timestep','Timestep_idTimestep','idTimestep');
    }
}
