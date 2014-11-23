@include('layouts.master')

@section('content')
<div class="container">
<h1>Create Event</h1>

@include('partials.errors')

{{ Form::open(array('action' => 'EventController@store', 'id' => 'create-form')) }}

	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
			{{ Form::label('name', 'Event Name', ['class' => '']) }}
			<input type="text" class="form-control" placeholder="Example Event 2014 Round 1" name="name" value="{{ Input::old('name') }}">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-sm-12'>
			<div class="form-group">
			{{ Form::label('slug', 'Slug', ['class' => '']) }}
			<input type="text" class="form-control" placeholder="example-event-2014-round-1" name='slug' value="{{ Input::old('slug') }}">
		</div>
		</div>
	</div>


	<div class="row">
		<div class='col-md-6 col-sm-12'>
			<div class="form-group">
				{{ Form::label('event-datetimeinput', 'Event Date and Time', ['class' => '']) }}
				<div class='input-group date' id='event-datetimeinput'>
					<input type='text' class="form-control" id='event-datetimepicker' data-date-format='DD/MM/YYYY hh:mm' placeholder='dd/mm/yyyy hh:mm'
					value="@if (Input::old('event-datetime') == null){{date('d/m/Y H:i', strtotime('next friday') + (60 * 60 * 19.5)) }}@else{{Input::old('event-datetime')}}@endif"
						   name='event-datetime'/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>



		<div class='col-md-6 col-sm-12'>
			<div class="form-group">
				{{ Form::label('close-datetimeinput', 'Cut Off Date and Time', ['class' => '']) }}
				<div class='input-group date' id='close-datetimeinput'>
					<input type='text' class="form-control" id='close-datetimepicker' data-date-format='DD/MM/YYYY hh:mm' placeholder='dd/mm/yyyy hh:mm'
						   value="@if (Input::old('close-datetime') == null){{date('d/m/Y H:i', strtotime('next friday') + (60 * 60 * 17)) }}@else{{ Input::old('close-datetime') }}@endif"
						   name='close-datetime'/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
	</div>

	<select id="class-drop-down" class="selectpicker">
		@foreach($options as $option)
		<option id={{$option->id}}>{{$option->name}}</option>
		@endforeach
	</select>


	<button id='btn-add' type='button' class='btn btn-primary'>Add Class</button>
	<div id='class-container'>
		<div class='row row-table-header hidden-xs'>
			<div class='col-sm-4 col-xs-12 row-header-text'>
				Class Name
			</div>
			<div class='col-sm-4 col-xs-12 row-header-text'>
				Limit
			</div>
			<div class='col-sm-4 col-xs-12'>
			</div>
		</div>
		<hr>
	</div>

	<div class='col-sm-12'>
		<input type='hidden' name='classes' id='json-class' value='{{ Input::old("classes") }}'>
		<button type="submit" class="btn btn-primary btn-submit">Create</button>
	</div>
{{ Form::close() }}


{{ HTML::script('js/class.js') }}
{{ HTML::script('js/script.js') }}
