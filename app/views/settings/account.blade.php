@extends('layouts.settings')


@section('settings-content')
<div class="panel panel-default panel-settings">
  <div class="panel-heading">Change password</div>
  <div class="panel-body">
    {{ Form::open(['route' => ['settings.account.password.update'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
    <div class="form-group">
      <div class="col-xs-12">
        {{ Form::label('old-password', 'Old Password') }}

        {{ Form::password($name = 'old-password', $attributes = ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        {{ Form::label('new-password', 'New Password') }}

        {{ Form::password($name = 'new-password', $attributes = ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        {{ Form::label('new-password-confirmation', 'Repeat Password') }}

        {{ Form::password($name = 'new-password-confirmation', $attributes = ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12 col-sm-4 col-md-2">
        <button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Change</span><span class="btn-addon btn-addon-primary"><i class="fa fa-arrow-right"></i></span></button>
      </div>
    </div>

    {{ Form::close() }}
  </div>
</div>

<div class="panel panel-danger panel-settings">
  <div class="panel-heading">Delete account</div>
  <div class="panel-body">
    {{ Form::open(['route' => ['settings.account.delete'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
      <div class="form-group">
        <div class="col-xs-12 col-sm-4 col-md-2">
          <button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Delete</span><span class="btn-addon btn-addon-delete"><i class="fa fa-trash"></i></span></button>
        </div>
      </div>
    {{ Form::close() }}
  </div>
</div>

@stop
