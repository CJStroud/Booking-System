@include('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container">
    <h2>Settings</h2>
    @include('partials.errors')

    <div class="white-panel col-xs-1 col-sm-3">
      <div class="list-group">
        <a href="#" class="list-group-item active">
          Cras justo odio
        </a>
        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item">Morbi leo risus</a>
        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item">Vestibulum at eros</a>
      </div>
    </div>

  </div>
</div>

@stop
