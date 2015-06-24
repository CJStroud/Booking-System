@extends('layouts.master')

@section('content')
<div class="banner">
    <div class="container">
        <div class="col-sm-6">
            <h1>Halesowen Model Car Club</h1>
            <h2>Booking system</h2>
        </div>
        <div class="col-sm-6">
            <img src="img/banner.svg">
        </div>
    </div>
</div>

<div class="container">

    <div class="col-sm-4 col-xs-12">
        <div class="panel panel-home">
            <div class="panel-body">
                <h2 class="text-secondary">Doors open at <b>6.30pm</b></h2>
                <p>
                    Most events will start at 6.30pm and will close at 10.30pm.
                    When you come to book an event it will say if there are any
                    changes to these times.
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="panel panel-home">
            <div class="panel-body">
                <h2 class="text-secondary">Race fee of only <b>£7</b></h2>
                <p>
                    If you are a member of the HMCC (Halesowen Model Car Club)
                    then you will only have to pay £6.
                </p>
                <p>
                    <small><i>
                        BRCA cover is a requirement to be allowed to race at our club and new members will be checked.
                    </i></small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="panel panel-home">
            <div class="panel-body">
                <h2 class="text-secondary">We are a <b>friendly</b> club</h2>
                <p>
                    We are a friendly club and race every friday at Haden Hill
                    Leisure Centre.<br> Visit our <a href="{{ route('about') }}">about us page
                    </a> to know more.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="tint band" style="height: 400px; background-image: url('/img/band.jpg'); width: 100%; background-position:center;background-size:cover;display:table;">
    <h2>
</div>
@stop
