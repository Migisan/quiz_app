@extends('layouts.main')

@section('contents')
@include('components.header')
<main>
  <div class="wrap">
    <h2>{{ $quiz->title }}</h2>
    <div class="quiz_img">
      <img src="{{ $quiz->img_path }}" alt="{{ $quiz->title }}の画像">
    </div>
    <table class="quiz_table">
      <tr>
        <th>タイトル</th>
        <td>{{ $quiz->title }}</td>
      </tr>
      <tr>
        <th>問題</th>
        <td>{{ $quiz->question }}</td>
      </tr>
      <tr>
        <th>正解</th>
        <td>{{ $quiz->correct }}</td>
      </tr>
      <tr>
        <th>不正解１</th>
        <td>{{ $quiz->incorrect1 }}</td>
      </tr>
      <tr>
        <th>不正解２</th>
        <td>{{ $quiz->incorrect2 }}</td>
      </tr>
      <tr>
        <th>不正解３</th>
        <td>{{ $quiz->incorrect3 }}</td>
      </tr>
      <tr>
        <th>解説文</th>
        <td>{{ $quiz->explanation }}</td>
      </tr>
    </table>
  </div><!--wrap-->
  <div class="button_wrap">
    <a href="/quiz/edit?id={{ $quiz->id }}" class="button">クイズ編集</a>
    <a href="/quiz/delete?id={{ $quiz->id }}" id="delete_btn" class="button">クイズ削除</a>
  </div>
</main>
@include('components.footer')
@endsection