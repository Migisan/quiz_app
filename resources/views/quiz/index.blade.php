@extends('layouts.main')

@section('contents')
@include('components.header')
<main>
  <div class="quiz_view">
    <div class="wrap">
      <ul class="quiz_menu">
        <li><a href="/quiz/challenge" class="button">クイズに挑戦</a></li>
        <li><a href="/quiz/list" class="button">クイズの一覧</a></li>
        <li><a href="/quiz/create" class="button">クイズを登録</a></li>
      </ul>
    </div><!--wrap-->
  </div><!--quiz_view-->
</main>
@include('components.footer')
@endsection