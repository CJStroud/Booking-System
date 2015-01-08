@extends('layouts.user-settings')


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
        {{ Form::label('new-password_confirmation', 'Repeat Password') }}

        {{ Form::password($name = 'new-password_confirmation', $attributes = ['class' => 'form-control']) }}
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
    <div class="form-group">
      <div class="col-xs-12">
        <p>Once the account is deleted, it is gone. There is no going back. Please make sure this is what you want to do.</p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-2">
        <button type="submit" class="btn btn-primary btn-with-addon" data-toggle="modal" data-target="#deleteAccount"><span class="btn-text">Delete</span><span class="btn-addon btn-addon-delete"><i class="fa fa-trash"></i></span></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-delete-account" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="Delete account" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['settings.account.delete'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Account</h4>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li class="list-group-item list-group-item-warning">Warning! This will remove you from all events that you are booked on.</li>
          </ul>
          <div class="form-group">
            <div class="col-xs-12">
              <p>Please type in your account password to confirm you definitely want to delete this account.</p>
              <input class="form-control" name="delete-password" id="delete-password" type="password" placeholder="Password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-xs-6 col-sm-3 col-sm-offset-6">
              <button type="submit" class="btn btn-delete">Delete</button>
          </div>
          <div class="col-xs-6 col-sm-3">
            <button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal"><span class="btn-text">Close</span><span class="btn-addon btn-addon-primary"><i class="fa fa-close"></i></span></button>
          </div>
        </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop
