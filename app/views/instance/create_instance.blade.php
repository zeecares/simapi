@extends('layouts.instance')

@section('content')

    Hello there
	
    {{ Form::open(array('route' => 'create-instance-put')) }}
     <ul>

     <li>
         {{ Form::label('name','Instance name:') }}
         {{ Form::text('name') }}
		 
		 @if ($errors->has('name'))
		 {{  $errors->first('name') }}
		 @endif
     </li>
       
     <li>  
         {{ Form::submit('Next') }}
     </li>
    </ul>
    {{ Form::close() }}
@stop