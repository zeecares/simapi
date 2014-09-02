@extends('layouts.instance')

@section('content')
   
     BEGIN
    {{ Form::open(array('route' => 'instance_begin')) }}
     <ul>

     <li>  
         {{ Form::submit('BEGIN') }}
     </li>
    </ul>
    {{ Form::close() }}
  
@stop