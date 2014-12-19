@include('layouts.master')

<div class="container">
	<h2>{{$event->name}}</h2>
	<h3>{{date('d/m/Y H:i', $event->event_datetime)}}</h3>

	@include('partials.errors')

	{{ Form::open(array('action' => 'BookingController@store', 'id' => 'create-form')) }}

	<input type="hidden" value="{{$event->id}}" name="event_id">
	<input type="hidden" value="{{Auth::id()}}" name="user_id">

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				{{ Form::label('class_id', 'Class', ['class' => '']) }}
				<select id="class_id" class="drop-down-holder selectpicker id-select form-control">
					@foreach ($classes as $class)
					<option id="{{$class->id}}">{{$class->name}}</option>
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
				<input type="text" class="form-control" placeholder="E.g 12345678" name='transponder' value="{{ Input::old('trans') }}">
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
					{{ Form::label('frequency1-drop-down', 'Frequency 1', ['class' => '']) }}
					<select id="frequency1-drop-down" class="selectpicker value-select form-control">
						@foreach($frequencies as $frequency)
						<option id="{{$frequency->id}}" value="{{$frequency->name}}">{{$frequency->name}}</option>
						@endforeach
					</select>
					<input name="frequency1-drop-down" type="hidden" class="hidden-text" id="frequency1-input" value="{{$frequencies[0]->name}}">
				</div>
			</div>
		</div>

		<div class="row">
			<div class='col-xs-12'>
				<div class="form-group">
					{{ Form::label('frequency2-drop-down', 'Frequency 2', ['class' => '']) }}
					<select id="frequency2-drop-down" class="selectpicker value-select form-control">
						@foreach($frequencies as $frequency)
						<option id="{{$frequency->id}}" value="{{$frequency->name}}">{{$frequency->name}}</option>
						@endforeach
					</select>
					<input name="frequency2-drop-down" type="hidden" class="hidden-text" id="frequency2-input" value="{{$frequencies[0]->name}}">
				</div>
			</div>
		</div>

		<div class="row">
			<div class='col-xs-12'>
				<div class="form-group">
					{{ Form::label('frequency3-drop-down', 'Frequency 3', ['class' => '']) }}
					<select name="frequency3-drop-down" class="selectpicker value-select form-control">
						@foreach($frequencies as $frequency)
						<option id="{{$frequency->id}}" value="{{$frequency->name}}">{{$frequency->name}}</option>
						@endforeach
					</select>

					<input name="frequency3-drop-down" type="hidden" class="hidden-text" id="frequency3-input" value="{{$frequencies[0]->name}}">
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
	</div>
	{{ Form::close() }}
</div>
