@extends('layouts.default')

@section('content')

<h1>Create Account</h1>
 {{ Form::open(array('action' =>'AccountsController@webpostcreate'))}}
   <ul>
     <li> 
         {{ Form::label('username','Username:') }}
         {{ Form::text('username') }}
		 
		 @if ($errors->has('username'))
		 {{  $errors->first('username') }}
		 @endif
     </li>      
     <li>          
         {{ Form::label('email','Email:') }}
         {{ Form::text('email') }}
		 @if ($errors->has('email'))
		 {{  $errors->first('email') }}
		 @endif
     </li>
     <li>          
         {{ Form::label('password','Password:') }}
         {{ Form::password('password') }}
		 @if ($errors->has('password'))
		 {{  $errors->first('password') }}
		 @endif
     </li>
	 <li>         
         {{ Form::label('password_again','Password Again:') }}
         {{ Form::password('password_again') }}
		 @if ($errors->has('password_again'))
		 {{  $errors->first('password_again') }}
		 @endif
     </li>
     <li>  
         {{ Form::submit('Submit') }}
     </li>
    </ul>
{{ Form::close()}}
@stop