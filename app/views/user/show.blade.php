@include('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container">

    @include('partials.errors')
    <div class="row">
      <div class="col-xs-6 col-sm-4">
        <img src="/img/profile-image.svg" alt="profile image" class="profile-image img-circle">

      </div>
      <div class="col-xs-6 col-sm-4">
        <h3>{{ $user->forename }} {{ $user->surname }}</h3>
      </div>
  </div>
</div>
