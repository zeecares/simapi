<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Electric_Price extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Electric_Price';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idElectric_Price';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	

	/*
	EP_Instance belongs to Instance
	*/
	
	 public function EP_Instance()
    {
        return $this->belongsTo('EP_Instance','Electric_Price_idElectric_Price','idElectric_Price');
    }
}