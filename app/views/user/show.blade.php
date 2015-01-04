@include('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container profile">

    @include('partials.errors')
    <div class="row">
      <div class="col-xs-6 col-sm-3">
        <img src="/img/profile-image.svg" alt="profile image" class="profile-image img-circle">

      </div>
      <div class="col-xs-6 col-sm-9">
        <h1>{{ $user->forename }} {{ $user->surname }}</h1>
      </div>
  </div>
</div>
