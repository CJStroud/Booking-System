@include('layouts.master')

<div class="container">
	<h1>Create Booking</h1>
	<hr>
	<h2>{{$event->name}}</h2>
	<h3>{{date('d/m/Y H:i', $event->event_datetime)}}</h3>

	@include('partials.errors')

	{{ Form::open(array('action' => 'BookingController@store', 'id' => 'create-form')) }}

	<input type="hidden" value="{{$event->id}}" name="event-id">

	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
				{{ Form::label('class-drop-down', 'Class', ['class' => '']) }}
				<select id="class-drop-down" class="drop-down-holder selectpicker">
					@foreach ($classes as $class)
						<option id="{{$class->id}}">{{$class->name}}</option>
					@endforeach
				</select>

				<input name="class-drop-down" type="hidden" class="hidden-text" id="class-input" value="{{$classes[0]->id}}">
			</div>
		</div>
	</div>


	<div class="row">
		<div class='col-sm-6 col-xs-12'>
			<div class="form-group">
				{{ Form::label('transponder', 'Transponder Number', ['class' => '']) }}
				<input type="text" class="form-control" placeholder="E.g 12345678" name='transponder' value="{{ Input::old('trans') }}">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
				{{ Form::label('skill-drop-down', 'Skill Level', ['class' => '']) }}
				<select id="skill-drop-down" class="selectpicker">
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
				<input name="skill-drop-down" type="hidden" class="hidden-text" id="skill-input" value="1">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
				{{ Form::label('frequency1-drop-down', 'Frequency 1', ['class' => '']) }}
				<select id="frequency1-drop-down" class="selectpicker">
					<option selected id="1">Frequency 1</option>
					<option id="2">Frequency 2</option>
					<option id="3">Frequency 3</option>
					<option id="4">Frequency 4</option>
					<option id="5">Frequency 5</option>
				</select>
				<input name="frequency1-drop-down" type="hidden" class="hidden-text" id="frequency1-input" value="1">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
				{{ Form::label('frequency2-drop-down', 'Frequency 2', ['class' => '']) }}
				<select id="frequency2-drop-down" class="selectpicker">
					<option selected id="1">Frequency 2</option>
					<option id="2">Frequency 2</option>
					<option id="3">Frequency 3</option>
					<option id="4">Frequency 4</option>
					<option id="5">Frequency 5</option>
				</select>
				<input name="frequency2-drop-down" type="hidden" class="hidden-text" id="frequency2-input" value="1">
			</div>
		</div>
	</div>
	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
				{{ Form::label('frequency3-drop-down', 'Frequency 3', ['class' => '']) }}
				<select name="frequency3-drop-down" class="selectpicker">
					<option selected id="1">Frequency 1</option>
					<option id="2">Frequency 2</option>
					<option id="3">Frequency 3</option>
					<option id="4">Frequency 4</option>
					<option id="5">Frequency 5</option>
				</select>

				<input name="frequency3-drop-down" type="hidden" class="hidden-text" id="frequency3-input" value="1">
			</div>
		</div>
	</div>

	<div class="row">
		<button type="submit" class="btn btn-primary col-xs-12 col-sm-6 btn-standard">Confirm</button>
	</div>
	{{ Form::close() }}


</div>
