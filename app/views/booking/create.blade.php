@extends('layouts.master')

@section('content')

<div class="container">
	<h2>{{$event->name}}</h2>
	<h3>{{date('d/m/Y H:i', $event->start_time)}}</h3>

	@include('partials.errors')

	{{ Form::open(array('route' => 'booking.store', 'id' => 'create-form')) }}

	<input type="hidden" value="{{$event->id}}" name="event_id">
	<input type="hidden" value="{{Auth::id()}}" name="user_id">

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				{{ Form::label('class_id', 'Class', ['class' => '']) }}
					<select id="class_id" class="drop-down-holder selectpicker id-select form-control">

						@foreach ($classes as $class)
							<option id="{{$class->id}}">@if ($class->locked)&#xf023; @endif{{$class->name}}</option>
						@endforeach
					</select>
					<input name="class_id" type="hidden" class="hidden-text" id="hidden-text" value="{{$classes[0]->id}}">
				</div>
		</div>
	</div>

	<div class="row">
			<div class="col-xs-12">
					<div class="form-group">
							{{ Form::label('transponder', 'Transponder Number', ['class' => '']) }}
					<input type="text" class="form-control" placeholder="E.g 12345678" name='transponder' value="{{ Input::old('transponder') }}">
					</div>
			</div>
	</div>

	<div class="row">
		<div class='col-xs-12'>
			<div class="form-group">
				{{ Form::label('skill_level', 'Skill Level', ['class' => '']) }}
				<select id="skill_level" class="selectpicker id-select form-control">
					<option selected id="1">1 - Low</option>
					<option id="2">2</option>
					<option id="3">3</option>
					<option id="4">4</option>
					<option id="5">5</option>
					<option id="6">6</option>
					<option id="7">7</option>
					<option id="8">8</option>
					<option id="9">9</option>
					<option id="10">10 - High</option>
				</select>
				<input name="skill_level" type="hidden" class="hidden-text" id="skill-input" value="1">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-xs-12'>
			<div class="form-group">
				{{ Form::label('frequencies-input', 'Frequencies', ['class' => '']) }}
				<input name="frequency-names" type="text" placeholder="Select frequencies" class="form-control" id="frequencies-input" data-toggle="modal" data-target="#setFrequencies">
				<input name="frequency-ids" type="hidden" class="hidden-text" id="frequencies-input-hidden">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class='col-xs-12'>
				<button type="submit" class="btn btn-primary">Confirm</button>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>

<div class="modal fade" id="setFrequencies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Choose Frequencies</h4>
			</div>

			<div class="modal-body">
				<div class="col-xs-12">
					<div class="alert alert-warning">Select up to three frequencies and select save</div>
				</div>
				<div class="col-xs-12">
					<div class='col-xs-12 col-sm-6'>

						<div class="form-group">
							<div class="form-control disabled" id="selected-frequencies-text"></div>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3">
						<button type="button" id="frequency-save" class="btn btn-primary btn-with-addon" data-dismiss="modal"><span class="btn-text">Save</span><span class="btn-addon btn-addon-primary"><i class="fa fa-check"></i></span></button>
					</div>
					<div class="col-xs-6 col-sm-3">
						<button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal"><span class="btn-text">Cancel</span><span class="btn-addon btn-addon-primary"><i class="fa fa-close"></i></span></button>
					</div>
				</div>

				@foreach($frequencies as $frequency)
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="frequency-option" data-id="{{$frequency->id}}" value="{{ $frequency->name }}"><p>{{ $frequency->name }}</p></div>
					</div>
				@endforeach

			</div>
			<div class="modal-footer">
				<div class="col-xs-6 col-sm-3 col-sm-offset-6">
					<button type="button" id="frequency-save" class="btn btn-primary btn-with-addon" data-dismiss="modal"><span class="btn-text">Save</span><span class="btn-addon btn-addon-primary"><i class="fa fa-check"></i></span></button>
				</div>
				<div class="col-xs-6 col-sm-3">
					<button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal"><span class="btn-text">Cancel</span><span class="btn-addon btn-addon-primary"><i class="fa fa-close"></i></span></button>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
