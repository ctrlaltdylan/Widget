@extends('header')

@section('content')

	<h1>Let's order some Widgets</h1>

{{--This is the generated Confirmation Message when a successful order is placed <p>--}}
@if(isSet($message))
	<p>
		{{$message}}
	</p>
@endif


{{--If the submitted data is invalid the following <ul> will be produced along with each error as an <li>--}}
@if($errors->has())

We encountered the following errors:

<ul>
    @foreach($errors->all() as $message)

    <li>{{ $message }}</li>

    @endforeach
</ul>

@endif


{{--This is the actual Widget order form--}}

	{{Form::open(array(
		'method' => 'POST',
		'id'     => 'widgetForm',
		'action' => 'WidgetController@handleForm'
	))}}

	<div class = 'form-group'>
		{{Form::label('Quantity')}}
		{{Form::text('quantity')}}
	</div>
	<div class = 'form-group'>
		{{Form::label('Color')}}
		{{Form::select('color', array(
			'Red'    => 'Red',
			'Blue' 	 => 'Blue',
			'Yellow' => 'Yellow'
		))}}
	</div>
	<div class = 'form-group'>
		{{Form::label('When do you need it by?')}}
		{{Form::input('date', 'byDate', null, ['class' => 'form-control', 'placeholder' => 'Date']);}}
	</div>
	<div class = 'form-group'>
		{{Form::label('Type')}}
		{{Form::select('type', array(
			'Widget' 			=> 'Widget',
			'Pro'				=> 'Widget Pro',
			'Xtreme' 			=> 'Widget Xtreme'
		))}}
	</div>

		{{Form::submit('Submit Order')}}
	{{Form::close()}}
	
@stop