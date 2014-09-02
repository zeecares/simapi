<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
  
Route::get('/',['as' => 'home', function()
{  
   return View::make('hello');
}]);


Route::post('/',['as' => 'home', function()
{
    return "Hello!";
}]);

Route::get('/document',['as' => 'document', function()
{   
   return View::make('layouts/document');
}]);

/*
Authenticated group
*/
Route::group(array('before'=>'auth'),function(){
      /*
      CSRF protection group
      */
      Route::group(array('before' =>'csrf'),function(){
	     
         /*
        Change password(post)
        */
	     Route::post('/accounts/change-password',array(
	       'as'=>'accounts-change-password-post',
		   'uses'=>'AccountsController@postChangePassword'
	     ));
		 	  
	  });
	  /*
      Change password(get)
      */
	  Route::get('/accounts/change-password',array(
	       'as'=>'accounts-change-password',
		   'uses'=>'AccountsController@getChangePassword'
	  ));
	  /*
      logout(get) for the test web
      */
	  Route::get('/accounts/logout',array(
	       'as'=>'accounts-logout',
		   'uses'=>'AccountsController@getlogout'
	  ));  
	  /*
      logout(get) 
      */
	  Route::get('/logout',array(
	       'as'=>'logout',
		   'uses'=>'AccountsController@logout'
	  )); 
});

/*
Unauthenticated group
*/

Route::group(array('before' =>'guest'),function(){
      /*
      CSRF protection group
      */
      Route::group(array('before' =>'csrf'),function(){	  
		 /*
         Login (POST) for the test web
        */
	    Route::post('/accounts/login',array(
	       'as' => 'accounts-login-post',	
		   'uses' => 'AccountsController@postlogin'
	    ));

		 /*
         Forgot (POST)
        */
	    Route::post('/accounts/forgot',array(
	       'as' => 'accounts-forgot-post',	
		   'uses' => 'AccountsController@postForgotPassword'
	    ));
			     /*
        Create account (POST)
        */
	    Route::post('/accounts/webcreate',array(
	       'as' => 'accounts-store',	
		   'uses' => 'AccountsController@webpostcreate'
	    ));
	 });
	 	 /*
         Login (POST)
        */
	    Route::post('/login',array(
	       'as' => 'login',	
		   'uses' => 'AccountsController@login'
	    ));
	 /*
     Login (GET) for web test
     */
	 Route::get('/accounts/login',array(
	       'as' => 'accounts-login',	
		   'uses' => 'AccountsController@getlogin'
	 ));
	 
	 /*
     Create account (GET)
     */
	 Route::get('/accounts/create',array(
	       'as' => 'accounts-create',	
		   'uses' => 'AccountsController@getcreate'
	 ));
	 
	  /*
     Forgot password (GET)
     */
	 Route::get('/accounts/forgot',array(
	    'as' =>'accounts-forgot',
	    'uses'=>'AccountsController@getForgotPassword'
	 ));
	 /*
	 Recover password (GET)
	 */
	  Route::get('/accounts/recover/{code}',array(
	    'as' =>'accounts-recover',
	    'uses'=>'AccountsController@getRecover'
	 ));
	  Route::get('/accounts/activate/{code}',array(
       'as'  =>'activate',
	   'uses'=>'AccountsController@getActivate'
       ));	
});
       	
	
		


/*
 API testing
*/		
		/*
        create instance(post)
        */
	    Route::post('/{user_id}/create_instance',array(
	       'as'=>'create-instance-post',
		   'uses'=>'InstanceController@postCreate'
	    ));
		/*
        create action(post)
        */
	    Route::post('/{instance_id}/{timestep_id}/setTem',array(
	       'as'=>'setTem',
		   'uses'=>'ActionController@postSetTem'
	    ));
	 
		/*
        begin instance(post)
        */
	    Route::post('/{instance_id}/begin',array(
	       'as'=>'postbegin',
		   'uses'=>'InstanceController@postBegin'
	    ));
		/*
        get instance begin status(get)
        */
	    Route::get('/{instance_id}/get_begin',array(
	       'as'=>'getbegin',
		   'uses'=>'InstanceController@getBegin'
	    ));

	     /*
        Create account (POST)
        */
	    Route::post('/accounts/create',array(
	       'as' => 'accounts-store',	
		   'uses' => 'AccountsController@postcreate'
	    ));
		
		/*
        Get Sensor (GET)
        */
	    Route::get('/{instance_id}/{sensor_id}/{timestep_id}/get_sensor',array(
	       'as' => 'getSensor',	
		   'uses' => 'SensorController@getSensor'
	    ));
	 /*
      create instance(get)
      
	  Route::get('/{user_id}/create_instance',array(
	       'as'=>'create-instance-get',
		   'uses'=>'InstanceController@getCreate'
	  ));*/
Route::resource('accounts','AccountsController');

