@extends('layouts.admin-settings')

@section('settings-content')
  <div class="users">
    @foreach ($users as $user)
      <div class="user">
        <h3>
          <span class="user-label">#{{ $user->id }}</span>
          <span>{{ $user->forename }} {{ $user->surname }}</span>
        </h3>

        <h4><span class="user-label">Email</span>{{ $user->email }}</h4>
        <h4><span class="user-label">BRCA</span>#{{ $user->brca }}</h4>
        <h4><span class="user-label">Transponder</span>#{{ $user->transponder }}</h4>
        <h4><span class="user-label">Skill</span>{{ $user->skill }} / 10</h4>

        @if ($user->banned)
          <h4><span class="user-label">Banned</span>{{ date('jS M Y H:i', $user->banned) }}</h4>
          <h4><span class="user-label">Reason</span>{{ $user->banned_reason }}</h4>
          {{ Form::open(array('route' => 'admin.user.unban', 'id' => 'create-form')) }}
            <div class="row">
              <div class="col-xs-12 col-sm-3">
                <button class="btn btn-secondary" type="submit">Unban</button>
              </div>
            </div>
          {{ Form::close() }}
        @else

          {{ Form::open(array('route' => 'admin.user.ban', 'id' => 'create-form')) }}

            <div class="row">
              <div class="col-xs-12">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Reason" name="reason">
                  <span class="input-group-btn">
                    <button class="btn btn-delete" type="button">Ban!</button>
                  </span>
                </div>
              </div>
            </div>

          {{ Form::close() }}

        @endif

      </div>
    @endforeach
  </div>
@stop
