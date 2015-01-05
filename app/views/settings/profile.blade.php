@extends('layouts.settings')


@section('settings-content')
  <div class="panel panel-default panel-settings">
    <div class="panel-heading">Public profile</div>
    <div class="panel-body">
      {{ Form::model($user, ['route' => ['user.update', $user->id], 'role' => 'form', 'id' => 'form', 'method' => 'PUT' ] ) }}
        <div class="form-group ">
          <div class="col-xs-12">
            <label for="name">Name</label>
          </div>
          <div class="col-xs-12 col-sm-6">
            <input type="text" class="form-control" id="forename" placeholder="Forename">
          </div>
          <div class="col-xs-12 col-sm-6">
            <input type="text" class="form-control" id="surname" placeholder="Surname">
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email">
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="brca">BRCA Number</label>
            <input type="text" class="form-control" id="brca" placeholder="BRCA">
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="transponder">Transponder Number</label>
            <input type="text" class="form-control" id="transponder" placeholder="Transponder">
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="skill">Skill Level</label>
            <input type="number" class="form-control" id="skill" placeholder="Skill">
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
