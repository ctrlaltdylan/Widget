<?php

class WidgetController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Widget Controller
	|--------------------------------------------------------------------------
	|
	| index() -> creates the Widget form view
	| 
	| handleForm() -> handles the POST data to store in the database
	|
	|	
	|
	*/

	public function index()
	{
		//returning the Widget Form View
		return View::make('index');
	}

	public function handleForm()
	{
		////////////////////////
		// Validating Inputs //
		//////////////////////

		// $minimumDate is set to be 7 days ahead from today so the customer can't expect a nonfeasible date
		$today = new DateTime();
		$minimumDate = $today->add(new DateInterval('P7D'));

		// The validation rules for the form inputs
		$rules = array(
	        'quantity' => array('required', 'numeric'),
	        'color'    => array('required', 'alpha'),
	        'byDate' => array('required', 'after:' . $minimumDate->format('Y-m-d h:m:s')),
	        'type'   => array('required', 'alpha')
    	);

		//Passing off the submitted form data to the validator
		$validation = Validator::make(Input::all(), $rules);


		if ($validation->fails())
    	{
        	 // Validation has failed.
       		 return Redirect::to('widget')->withInput()->withErrors($validation);
    	}
    	else
    	{
    		// Validation is successful and we can go ahead a create and save this new widget order

			//////////////////////////
			//  Storing the Order  //
			////////////////////////

	    	$widget = new Widget;

				$widget->quantity		= Input::get('quantity');
				$widget->color 			= Input::get('color');
				$widget->byDate 		= Input::get('byDate');
				$widget->type 			= Input::get('type');

			$widget->save();

			return View::make('index')
				->with('message', 'Your Order has been placed! Order #' . $widget->id)
				->with('order_id', $widget->id);
    	}

	}

}
