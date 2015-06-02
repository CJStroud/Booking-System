@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Club Rules</h1>
  <object data="pdf/club-rules.pdf" type="application/pdf" width=100% height=700px>
    alt : <a href="pdf/club-rules.pdf">test.pdf</a>
  </object>
</div>
@stop
