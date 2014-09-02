@extends('layouts.default')

@section('content')
 
     {{ Form::open(array('route'=>'accounts-login'))}}
    <ul>

     <li>
         {{ Form::label('username','Username:') }}
         {{ Form::text('username') }}
		 
		 @if ($errors->has('username'))
		 {{  $errors->first('username') }}
		 @endif
     </li>
       
     <li>
          
         {{ Form::label('password','Password:') }}
         {{ Form::password('password') }}
		 @if ($errors->has('password'))
		 {{  $errors->first('password') }}
		 @endif
     </li>
     <div class="field">
	     <input type="checkbox" name="remeber" id="remember">
	     <label for="remember">
		       Remember me
		 </label>
	</div>
    <li>  
         {{ Form::submit('Login') }}
     </li>
    </ul>

{{ Form::close()  }}

@stop