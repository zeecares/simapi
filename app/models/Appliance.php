<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Appliance extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Appliance';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idAppliance';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	
	/*
	Fillable 
	*/
	
    protected $fillable = array('name','room','range','in_use');

	/*
	Appliance belongs to Instance
	*/
	
	 public function Instance()
    {
        return $this->belongsTo('Instance','Instance_idInstance','idInstance');
    }
	
}

