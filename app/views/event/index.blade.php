@include('layouts.master')

@section('content')
    <h3>Welcome to the event main page</h3>

<div>{{ link_to_route('event.create', 'Create an event', null, ['class="btn btn-default"']) }}</div>
