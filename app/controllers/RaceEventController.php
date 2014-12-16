<?php

use HMCC\Form\RaceEventForm;

class RaceEventController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * @var RaceEventForm
	 */
	protected $form;

	/**
	 * @var RaceEventClassRepository
	 */
	protected $raceEventClassRepository;

	protected $raceClassRepository;

	public function __construct(RaceEventForm $form, RaceEventClassRepository $raceEventClassRepository, RaceClassRepository $raceClassRepository)
	{
		$this->form = $form;
		$this->raceClassRepository = $raceClassRepository
		$this->raceEventClassRepository = $raceEventClassRepository;
	}

	public function index()
	{
		$timestamp = time();

		$events = $this->form->repository->getEventsBeforeClose($timestamp);

		$oldevents = $this->form->repository->getEventsAfterClose($timestamp);

		return $this->layout->content = View::make('event.index')->with('events', $events)->with('old_events', $oldevents);
	}

	/**
	 * Creates the view for a new event
	 * @returns Laravel View
	 */
	public function create()
	{
		$classes = $this->raceClassRepository->getAllActive();

		return $this->layout->content = View::make('event.create')->withOptions($classes);
	}

	public function store()
	{
		$this->form->store(Input::all());

		return Redirect::route('event.index');
	}

	public function show($slug)
	{
		$event = $this->form->repository->getEventBySlug($slug);
		$classes = $event->classes;

		return $this->layout->content = View::make('event.view')->with('classes', $classes)->with('event', $event);
	}

	public function lock($classId, $eventId)
	{
		$this->eventClassRepository->lock($eventId, $classId);

		return Redirect::back();
	}

	public function unlock($classId, $eventId)
	{
		$this->eventClassRepository->unlock($eventId, $classId);

		return Redirect::back();
	}


}
