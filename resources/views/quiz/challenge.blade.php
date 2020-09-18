@extends('layouts.main')

@section('contents')
@include('components.header')
<main>
  <div class="wrap">
    <div id="app">
      <quiz-component></quiz-component>
    </div>
  </div><!--wrap-->
</main>
@include('components.footer')
@endsection