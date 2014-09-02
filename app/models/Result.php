<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Result extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Result';
	/*
	* Set primary Key
	*/
	protected $primaryKey = 'idResult';
	

	/*
	*  Disable timestamps
	*/
	public $timestamps = false;
	
	/*
	Fillable 
	*/
	
    protected $fillable = array('title','idResult');

	/*
	Results has one Instance
	*/
	
	 public function Instance()
    {
        return $this->hasOne('Instance','Result_idResult','idResult');
    }
	
}

