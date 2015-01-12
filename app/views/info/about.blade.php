@extends('layouts.master')

@section('content')
<div class="container">
<h1>About Us</h1>
	<div class="panel panel-default panel-settings">
		<div class="panel-heading">Club Info</div>
			<div class="panel-body">
			<p>We are a friendly club and race every friday at Haden Hill Leisure Centre 18.30-22:30pm.</p>
			<p>Our Attendance is always good and we have various abilities of drivers through out the club. The atmosphere is always very friendly so if you want a good nights racing then come along and join us.
			</p>
			<p>Doors open at 18:30, we have lots of tables, chairs and power points available!</p>
			<p>Any help we get putting the track out will get you racing quicker!!</p>
		</div>
	</div>

	<div class="panel panel-default panel-settings">
		<div class="panel-heading">Address</div>
		<div class="panel-body">
			<div class="col-xs-12">Haden Hill Leisure Centre</div>
			<div class="col-xs-12">Barrs Road</div>
			<div class="col-xs-12">Cradley Heath</div>
			<div class="col-xs-12">B64 7HA</div>
		</div>
	</div>

	<div class="panel panel-default panel-settings">
		<div class="panel-heading">Map</div>
		<div id="map-canvas"></div>
	</div>
</div>
@stop
