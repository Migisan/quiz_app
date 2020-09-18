@extends('layouts.main')

@section('contents')
@include('components.header')
<main>
  <div class="wrap">
    <h2>クイズ一覧画面</h2>
    @if(session('del_message'))
      <div class="del_message">{{ session('del_message') }}</div>
    @endif
    <table class="quiz_list">
      <tr><th>タイトル</th></tr>
      @if(count($quizzes))
        @foreach($quizzes as $quiz)
        <tr><td><a href="/quiz/show?id={{ $quiz->id }}"><?= $quiz->title ?></a></td></tr>
        @endforeach
      @else
        <tr><td>登録されているクイズがありません。</td></tr>
      @endif
    </table>
  </div><!--wrap-->
</main>
@include('components.footer')
@endsection