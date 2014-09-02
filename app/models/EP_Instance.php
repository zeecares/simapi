<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class EP_Instance extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'EP_Instance';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idEP_Instance';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	

	/*
	EP_Instance belongs to Instance
	*/
	
	 public function Instance()
    {
        return $this->belongsTo('Instance','idInstance','Instance_idInstance');
    }
	
	/*
	EP_Instance has many Electric_Price
	*/
	
	 public function Electric_Price()
    {
        return $this->hasMany('Electric_Price','idElectric_Price','Electric_Price_idElectric_Price');
    }
}