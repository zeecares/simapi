<?php

class AccountsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /accounts
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('accounts.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /accounts/create
	 *
	 * @return Response
	 */
	public function create()
	{   
	    return View::make('accounts.create'); 
	}
	/**
	 * Store a newly created resource in storage.
	 * POST /accounts
	 *
	 * @return Response
	 */
    public function postcreate()
	{
	    $input = Input::get();
	    $code = str_random(70);
		   $create = User::create(array(
		           'email' =>$input['email'],
				   'username' => $input['username'],
				   'password' => Hash::make($input['password']),
				   'code'=> $code,
				   'active'=>0
		   ));
		
		return Response::json(array('user_id' => $create->idUser));
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /accounts
	 * For the website
	 */
	 public function webpostcreate()
	{
		$validator = Validator::make(Input::all(),
		    array(
			     'email'         =>'required|max:50|email|unique:users',
				 'username'      =>'required|max:20|min:3|unique:users',
				 'password'      =>'required|min:6',
			     'password_again'=>'required|same:password'
			)
		);
		
		if($validator->fails()){
		    return Redirect::route('accounts-create')
			->withErrors($validator)
			->withInput();
		}else{
		
		   $email    = Input::get('email');
		   $username = Input::get('username');
		   $password = Input::get('password');
		   
		   //Activation code
		   
		   $code = str_random(70);
		   
		   $create = User::create(array(
		           'email' => $email,
				   'username' => $username,
				   'password' => Hash::make($password),
				   'code'=> $code,
				   'active'=> 0
		   ));
		   if($create){		   
			 Mail::send('accounts.activate',array('link'=>URL::route('activate',$code),'username'=>$username),function ($message) use ($create) {
			    $message->to($create->email,$create->username)->subject('Activate your account');
			 });			
		   return Redirect::route('home')
                  ->with('flash_message','Congratulations!	 You have successfully created your account!We have sent you an email');
		}
	  }
	}
	
	public function getlogin(){
	    
		return View::make('accounts.login');
	
	}
	
	public function postlogin(){
	    $validator = Validator::make(Input::all(),
		    array(
				 'username'      =>'required',
				 'password'      =>'required',
			)
		);
		
		if($validator->fails()){
		    return Redirect::route('accounts-login')
			->withErrors($validator)
			->withInput();
		}else{
		
		   $remember = (Input::has('remember'))? true :false;   
		   $attempt = Auth::attempt(array(
            'username'=>Input::get('username'),
            'password'=>Input::get('password'),
			'active' => 1
        ),$remember);
		
		 if($attempt){
		
		   //Redirect to the intended page
		   
		    return Redirect::intended('/')->with('flash_message','You have been logged in!');
			 }else{
			 return Redirect::back()->with('flash_message','Email/password wrong ,or inactive account')->withInput();
			 }
		   }
		   return Redirect::back()->with('flash_message','Invalid credentials')->withInput();
		}
    
	public function getlogout(){
	     Auth::logout();
		 return Redirect::route('home')
		 ->with('flash_message','You have logged out');
	}

	
	/*
	Email Activation
	*/
	public function getActivate($code){
	
	     $user=User::where('code','=',$code)->where('active','=',0);
		 if($user->count()){
		 
		    $user = $user->first();
			
			//Update user to active state
			
			$user->active   =1;
			$user->code     ='';
			if($user->save()){
			   return Redirect::route('home')
			   ->with('flash_message','Activated! You can now sign in!');
			}
		    
		 }
	    return Redirect::route('home')
		    ->with('flash_message','Could not activate your account.Please try again later.	');
	}
	
    public function getChangePassword(){
	    return View::make('accounts.password');
	}
	
	
	public function postChangePassword(){
	    $validator = Validator::make(Input::all(),
		    array(
				 'old_password'  =>'required|min:6',
				 'password'      =>'required|min:6',
			     'password_again'=>'required|same:password'
			)
		);
		
		if($validator->fails()){
		    return Redirect::route('accounts-change-password')
			->withErrors($validator);
		}else{
		     $user         = User::find(Auth::user()->idUser);
		     $old_password = Input::get('old_password');
		     $password     = Input::get('password');
			 if(Hash::check($old_password,$user->getAuthPassword())){
			   
			    $user->password = Hash::make($password);
				
				if($user->save()){
				   return Redirect::route('home')
				      ->with('flash_message','Your password has been successfully changed');
				}			 
			  }		 
	         }
		return Redirect::route('accounts-change-password')
		->with('flash_message','You may not change your password now');
	}
	
	/**
	 * Forgot password
	 */
	public function getForgotPassword()
	{
		return View::make('accounts.forgot');
	}
	public function postForgotPassword()
	{
	   $validator =  Validator::make(Input::all(),array(
	       'email'=>'required|email'
	   ));
       if($validator->fails()){
	        return Redirect::route('accounts-forgot')
			   ->withErrors($validator)->withInput();
	   }else{
	        $user=User::where('email','=',Input::get('email'));
			
			if($user->count()){
			   $user=$user->first();
			   //Generate a new code and password
			   $code = str_random(60);
			   $password =str_random(6);
			   $user->code=$code;
			   $user->password_temp = Hash::make($password);
			   if($user->save()){
			         Mail::send('emails.auth.forgot',array('link'=>URL::route('accounts-recover',$code),'username'=>$user->username,'password'=>$password),function ($message) use ($user) {
			    $message->to($user->email,$user->username)->subject('Your new password');
			    });
					return Redirect::route('home')->with('flash_message','We have send you a new password.');
			   }
			}
	   }	
        return Redirect::route('accounts-forgot')	
         ->with('flash_message','Could not request new password.');	
	}
	
	public function getRecover($code)
	
	{
		$user=User::where('code','=',$code)
		  ->where('password_temp','!=','');
		 if($user->count()){
		    $user=$user->first();
			$user->password=$user->password_temp;
			$user->password_temp='';
			$user->code='';
			if($user->save()){
			return Redirect::route('home')
			->with('flash_message','Your account has been recovered and you can now sign in with your new account!');
			}
		 }
		 return Redirect::route('home')->with('flash_message','Could not recover your accunt');
	}
	/**
	 * Login
     * 
	 */
		public function login(){
	       $input = Input::get();			
		 if(Auth::attempt(array(
            'username'=>Input::get('username'),
            'password'=>Input::get('password'),
        ))){	
            $user= User::where('username','=',Input::get('username'))->first();	
   		
			return Response::json(array('user_id' => $user->idUser,'username'=>$user->username));
			 }
             $returnData = array(
             'status' => 'error',
             'message' => 'Unauthenticated'
             );
           return Response::json($returnData, 401);			 		   
	}
	
	public function logout(){
	      Auth::logout();
		  $returnData = array(
             'status' => 'logout',
             'message' => 'You have logged out'
             );
           return Response::json($returnData);
	}
	
	/**
	 * Display the specified resource.
	 * GET /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 * GET /sessions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		
        return Redirect::home()->with('flash_message','You have been logged out');
	}

}