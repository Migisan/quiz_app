@extends('layouts.main')

@section('contents')
@include('components.header')
<main>

  <div class="wrap">
    <h2>クイズ編集画面</h2>
    <div class="quiz_img">
      <img src="{{ $quiz->img_path }}" alt="{{ $quiz->title }}の画像">
    </div>
    @if(count($errors) > 0)
    <div class="errors">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="/quiz/edit" method="POST" enctype="multipart/form-data">
      @csrf
      <table class="quiz_table">
        <tr>
          <th><label for="title">タイトル</label></th>
          <td><input type="text" id="title" name="title" placeholder="タイトル" value="{{ $quiz->title }}"></td>
        </tr>
        <tr>
          <th><label for="question">問題</label></th>
          <td><textarea cols="30" rows="3" id="question" name="question" placeholder="問題文" value="{{ old('question') }}">{{ $quiz->question }}</textarea></td>
        </tr>
        <tr>
          <th><label for="correct">正解</label></th>
          <td><textarea cols="30" rows="3" id="correct" name="correct" placeholder="正解" value="{{ old('correct') }}">{{ $quiz->correct }}</textarea></td>
        </tr>
        <tr>
          <th><label for="incorrect1">不正解１</label></th>
          <td><textarea cols="30" rows="3" id="incorrect1" name="incorrect1" placeholder="不正解１" value="{{ old('incorrect1') }}">{{ $quiz->incorrect1 }}</textarea></td>
        </tr>
        <tr>
          <th><label for="incorrect2">不正解２</label></th>
          <td><textarea cols="30" rows="3" id="incorrect2" name="incorrect2" placeholder="不正解２" value="{{ old('incorrect2') }}">{{ $quiz->incorrect2 }}</textarea></td>
        </tr>
        <tr>
          <th><label for="incorrect3">不正解３</label></th>
          <td><textarea cols="30" rows="3" id="incorrect3" name="incorrect3" placeholder="不正解３" value="{{ old('incorrect3') }}">{{ $quiz->incorrect3 }}</textarea></td>
        </tr>
        <tr>
          <th><label for="explanation">解説文</label></th>
          <td><textarea cols="30" rows="3" id="explanation" name="explanation" placeholder="解説文" value="{{ old('explanation') }}">{{ $quiz->explanation }}</textarea></td>
        </tr>
        <tr>
          <th><label for="img">クイズ画像</label></th>
          <td><input type="file" id="img" name="img" value="{{ old('img') }}"></td>
        </tr>
      </table>
      <input type="hidden" name="id" value="{{ $quiz->id }}">
      <div class="button_wrap">
        <input type="submit" value="更新する" class="button">
      </div>
    </form>
  </div><!--wrap-->
</main>
@include('components.footer')
@endsection