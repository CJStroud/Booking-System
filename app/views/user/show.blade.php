@extends('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container profile">

    @include('partials.errors')
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3  col-sm-3 col-sm-offset-0">
        <img src="/img/profile-image.svg" alt="profile image" class="profile-image img-circle">

      </div>
      <div class="col-xs-12 col-sm-9 profile-info">
        <h1>{{ $user->forename }} {{ $user->surname }}</h1>
        <h5>BRCA</h5>
        <p>#{{ $user->brca }}</p>
        <h5>Transpoder</h5>
        <p>#{{ $user->transponder }}</p>
        <h5>Skill Level</h5>
        <p class="skill-level"><span class="skill-text">{{ $user->skill }} / 10</span>
          <?php
            if($user->skill > 0){
              $scale = $user->skill / 10;
            }else{
              $scale = 0;
            }
          ?>
          <svg height="30" width="250">
            <g fill="none">
              <path stroke="#ededed" stroke-width="30" stroke-linecap="round" d="M15 15 l220 0" />
              <path stroke="rgb(
                            <?php echo round(219 - ((219 - 172) * $scale));?>,
                            <?php echo round(216 - (216 * $scale));?>,
                            0)"
                    stroke-width="25" stroke-linecap="round" d="M15 15 l<?php echo 220 * $scale ?> 0" />
            </g>
            Sorry, your browser does not support inline SVG.
          </svg>
        </p>
      </div>
    </div>
  </div>
</div>
@stop
