@include('layouts.master')

@section('content')
<div class="container">
  <h1>Sign Up</h1>

  @include('partials.errors')

  <div class="row">
    <div class="col-xs-12">
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        Already have an account? <a href="login" class="alert-link">Login here</a>!
      </div>
    </div>
  </div>

  {{ Form::open(array('action' => 'UserController@store', 'id' => 'create-form')) }}

  <div class="row">
    <div class='col-xs-12'>
      <div class="form-group">
        {{ Form::label('forename', 'Forename', ['class' => '']) }}
        <input type="text" class="form-control" name="forename" value={{Input::old('forename')}}>
      </div>
    </div>
  </div>

  <div class="row">
    <div class='col-xs-12'>
      <div class="form-group">
        {{ Form::label('surname', 'Surname', ['class' => '']) }}
        <input type="text" class="form-control" name="surname" value={{Input::old('surname')}}>
      </div>
    </div>
  </div>

  <div class="row">
    <div class='col-xs-12'>
      <div class="form-group">
        {{ Form::label('email', 'Email', ['class' => '']) }}
        <input type="text" class="form-control" name="email" value={{Input::old('email')}}>
      </div>
    </div>
  </div>

  <div class="row">
    <div class='col-xs-12'>
      <div class="form-group">
        {{ Form::label('password', 'Password', ['class' => '']) }}
        <input type="password" class="form-control" name="password" value={{Input::old('password')}}>
      </div>
    </div>
  </div>

  <div class="row">
    <div class='col-xs-12'>
      <div class="form-group">
        {{ Form::label('password_confirmation', 'Password Confirmation', ['class' => '']) }}
        <input type="password" class="form-control" name="password_confirmation" value={{Input::old('password-confirmation')}}>
      </div>
    </div>
  </div>

  <div class="row">
    <div class='col-xs-12'>
      <div class="form-group">
        {{ Form::label('brca', 'BRCA Number', ['class' => '']) }}
        <input type="text" class="form-control" name="brca" value={{Input::old('brca')}}>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-2 col-sm-offset-10">
          <button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Create Account</span><span class="btn-addon"><i class="fa fa-pencil fa-inverse"></i></span></button>
    </div>
  </div>

  {{Form::close()}}

</div>

@stop
