@extends('layouts.user-settings')

@section('title')
<h2>Settings</h2>
@stop

@section('settings-content')
  <div class="panel panel-default panel-settings">
    <div class="panel-heading">Public profile</div>
    <div class="panel-body">
      {{ Form::model($user, ['route' => ['settings.profile.update'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
        <div class="form-group ">
          <div class="col-xs-12">
            {{ Form::label('forename', 'Name') }}
          </div>
          <div class="col-xs-12 col-sm-6">
            {{ Form::text('forename', Input::old('forename'), ['class' => 'form-control']) }}
          </div>
          <div class="col-xs-12 col-sm-6">
            {{ Form::text('surname', Input::old('surname'), ['class' => 'form-control']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            {{ Form::label('email', 'Email') }}

            {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            {{ Form::label('brca', 'BRCA Number') }}

            {{ Form::text('brca', Input::old('brca'), ['class' => 'form-control']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            {{ Form::label('transponder', 'Transponder Number') }}

            {{ Form::text('transponder', Input::old('transponder'), ['class' => 'form-control']) }}
          </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group">
                {{ Form::label('skill', 'Skill Level', ['class' => '']) }}
                <select id="skill-dropdown" class="selectpicker id-select form-control">
                    <option id="1">1 - Low</option>
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
                <input name="skill" type="hidden" class="hidden-text" id="skill-input" value="{{ Input::old('skill') ?: Auth::user()->skill ?: 1}}">
            </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12 col-sm-4 col-md-2">
            <button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Submit</span><span class="btn-addon btn-addon-primary"><i class="fa fa-arrow-right"></i></span></button>
          </div>
        </div>


      {{ Form::close() }}
    </div>
  </div>

@stop
