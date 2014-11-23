<?php

class EventController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->layout->content = View::make('event.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->layout->content = View::make('event.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
			'slug' => 'required|alpha_num',
			'event-datetime' => 'required|date_format:"d/m/Y H:i"',
			'close-datetime' => 'required|date_format:"d/m/Y H:i"',
		);

		$validator = Validator::make(
			Input::all(),
			$rules
		);

		//$json_classes = JSON_decode(JSON_encode(Input::get('classes')));
		$json_classes = JSON_decode(Input::get('classes'), true);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		else if (empty($json_classes))
		{
			return Redirect::back()->withInput()->withErrors(['Event requires at least one class']);
		}
		else
		{
			// convert from string to datetime
			$event_date = DateTime::createFromFormat('d/m/Y H:i', Input::get('event-datetime'));
			$close_date = DateTime::createFromFormat('d/m/Y H:i', Input::get('close-datetime'));


			$name = Input::get('name');
			$slug = Input::get('slug');
			$event_datetime = $event_date->getTimestamp();
			$close_datetime = $close_date->getTimestamp();

			$sql_insert_event = "INSERT INTO event (`name`, `slug`, `datetime`, `close_datetime`) VALUES ('". $name ."', '". $slug ."', ".  $event_datetime .", ". $close_datetime .")";

			DB::statement($sql_insert_event);

			//add each class to the event_class table
			foreach($json_classes as $class)
			{

				print "id = " . $class['id'];
			}


			return Redirect::route('event.index');
		}
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
