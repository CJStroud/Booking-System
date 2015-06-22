<?php

use HMCC\Form\RaceEvent\RaceEventForm;
use HMCC\Repository\RaceEvent\RaceClassRepository;
use HMCC\Repository\RaceEvent\RaceEventClassRepository;
use HMCC\Repository\Booking\BookingRepository;

class RaceEventController extends \BaseController {

    /**
     * @var RaceEventForm
     */
    protected $form;

    /**
     * @var RaceEventClassRepository
     */
    protected $raceEventClassRepository;

    /**
     * @var RaceClassRepository
     */
    protected $raceClassRepository;

    /**
     * @var BookingRepository
     */
    protected $bookingRepository;

    public function __construct(
    RaceEventForm $form, RaceEventClassRepository $raceEventClassRepository, RaceClassRepository $raceClassRepository, BookingRepository $bookingRepository) {
        $this->form = $form;
        $this->raceClassRepository = $raceClassRepository;
        $this->raceEventClassRepository = $raceEventClassRepository;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Shows all of the events
     * @returns Event.Index View
     */
    public function index() {
        $timestamp = time();

        $allEvents = $this->form->repository->getAllInDateOrder();

        $events = [];

        $now = time();

        foreach ($allEvents as $event) {
            if ($event->start_time <= $now) {
                $event->isFinished = true;
            } else if ($event->close_time <= $now) {
                $event->isClosed = true;
            }

            $events[] = $event;
        }
        return View::make('event.index')->with('events', $events);
    }

    /**
     * Creates the view for a new event
     * @returns Event.Create View
     */
    public function create() {
        $classes = $this->raceClassRepository->getAllActive();

        return View::make('event.create')
          ->withOptions($classes)
          ->withActive('events');
    }

    /**
     * Stores a new event using form inputs
     * @returns Event.Index View
     */
    public function store() {
        $this->form->store(Input::all());

        return Redirect::route('event.index');
    }

    /**
     * Gets event information using slug
     * @param integer $slug The   slug of the event
     * @returns Event.View View
     */
    public function show($slug) {
        $event = $this->form->repository->getEventBySlug($slug);
        $classes = $event->classes;

        foreach ($classes as $class) {
            $class->bookings = $this->bookingRepository->getBookingsByEventIdAndClassId($event->id, $class->id);
        }

        return View::make('event.view')->with('classes', $classes)->with('event', $event);
    }

    /**
     * Deletes the event using the id
     * @param integer $id The id of the evnt to delete
     */
    public function destroy($id) {
        $this->form->delete($id);

        return Redirect::back();
    }

    /**
     * Locks the event class
     * @param   integer $event_id The id of the event
     * @param   integer$class_idd The id of the class
     * @returns Laravel redirect back
     */
    public function lock($event_id, $class_id) {
        $this->raceEventClassRepository->lock($event_id, $class_id);

        return Redirect::back();
    }

    /**
     * Unlocks the event class
     * @param   integer $event_id The id of the event
     * @param   integer $class_id The id of the class
     * @returns Laravel redirect back
     */
    public function unlock($event_id, $class_id) {
        $this->raceEventClassRepository->unlock($event_id, $class_id);

        return Redirect::back();
    }

    /**
     * Cancels the event.
     *
     * @param integer $event_id
     * @return Redirect
     */
    public function cancel($event_id) {
        $this->form->cancel($event_id);

        return Redirect::back();
    }

    public function edit($event_id) {
        $event = $this->form->repository->find($event_id);
        $storedClasses = $this->raceEventClassRepository->getEventClassesByEventId($event_id);

        $startDateTime = $this->convertToDateTime($event->start_time);
        $closeDateTime = $this->convertToDateTime($event->close_time);

        $event['event-date'] = $startDateTime['date'];
        $event['event-time'] = $startDateTime['time'];

        $event['close-date'] = $closeDateTime['date'];
        $event['close-time'] = $closeDateTime['time'];

        $event['classes'] = json_encode($storedClasses);

        $classes = $this->raceClassRepository->getAllActive();

        return View::make('event.create')
                ->withOptions($classes)
                ->withEdit(true)
                ->withEvent($event)
                ->withActive('events');
    }

    private function convertToDateTime($timestamp) {
        $date = date('j F, Y', $timestamp);
        $time = date('G:i', $timestamp);

        return [ 'date' => $date, 'time' => $time ];
    }

    public function update($id) {
        $input = Input::all();
        $input['cancelled'] = 0;
        $this->form->update($id, $input);

        return Redirect::route('event.index');
    }

}
