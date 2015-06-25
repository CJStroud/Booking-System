<div class="panel panel-default">
  <div class="panel-body">
    <div class="col-xs-12">
      <div class="col-xs-12 col-md-6">
        <h3>{{ $booking->raceEvent }}</h3>
        <h4>{{ $booking->raceClass }}</h4>
      </div>
      <div class="col-xs-12 col-md-6 text-right booking-info">
        <h5>Date: <span>{{ date('d/m/Y', $booking->startTime) }}</span></h5>
        <h5>Start Time: <span>{{ date('H:i', $booking->startTime) }}</span></h5>
        <h5>Transponder: #{{ $booking->transponder }}</h5>
        <h5>Skill Level: {{ $booking->skill_level }}</h5>
      </div>
    </div>

      <div class="col-xs-12 col-sm-3 col-sm-offset-9 col-md-2 col-md-offset-10">
        {{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
        <button type="submit" class="btn btn-simple btn-delete-class"><span class="btn-text">Cancel</span><i class="fa fa-remove icon-spacing-left"></i></button>
        {{ Form::close() }}
      </div>
    </div>
</div>
