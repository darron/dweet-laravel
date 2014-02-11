<?php

class DweetController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getIndex()
	{
    // Get all the pieces.
    $input = Input::all();
    $date = new DateTime('NOW');
    $date_time = $date->format(DateTime::ISO8601);
    $name = new Thing();
    $random_name = $name->generateName();
    
    // Build the dweet.
    if (is_array($input)) {
      $with = array("thing" => $random_name, "created" => $date_time, "content" => $input);
    } else {
      $with = array("thing" => $random_name, "created" => $date_time);
    }
    $json = array("this" => "succeeded", "by" => "dweeting", "the" => "dweet", "with" => $with);
    
    // Save the Dweet
    $dweet = new Dweet();
    $dweet->add($json);
    
    // Send the response.
    return Response::json($json);
	}
  
  public function getLatest($thing)
  {
    $dweet = new Dweet();
    $last_dweet = $dweet->getLast($thing);
    return Response::json($last_dweet);
  }

}