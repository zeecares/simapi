@extends('layouts.default')

@section('content')

         {{ Form::open(array('route'=>'accounts-change-password-post'))}}

    <ul>

     <li>
         {{ Form::label('old_password','Old password:') }}
         {{ Form::password('old_password') }}
		 
		 @if ($errors->has('old_password'))
		 {{  $errors->first('old_password') }}
		 @endif
     </li>
       
     <li>
          
         {{ Form::label('password','New Password:') }}
         {{ Form::password('password') }}
		 @if ($errors->has('password'))
		 {{  $errors->first('password') }}
		 @endif
     </li>
	 <li>
          
         {{ Form::label('password_again','New Password again:') }}
         {{ Form::password('password_again') }}
		 @if ($errors->has('password_again'))
		 {{  $errors->first('password_again') }}
		 @endif
     </li>

     <li>  
         {{ Form::submit('Change password') }}
     </li>
    </ul>

{{ Form::close()  }}
	 
@stop