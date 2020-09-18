@extends('layouts.main')

@section('contents')
@include('components.header')
<main>
  <div class="wrap">
    <h2>クイズ登録画面</h2>
    @if(count($errors) > 0)
    <div class="errors">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="/quiz/create" method="POST" enctype="multipart/form-data">
      @csrf
      <table class="quiz_table">
        <tr>
          <th><label for="title">タイトル</label></th>
          <td><input type="text" id="title" name="title" placeholder="タイトル" value="{{ old('title') }}"></td>
        </tr>
        <tr>
          <th><label for="question">問題</label></th>
          <td><textarea cols="30" rows="3" id="question" name="question" placeholder="問題文" value="{{ old('question') }}"></textarea></td>
        </tr>
        <tr>
          <th><label for="correct">正解</label></th>
          <td><textarea cols="30" rows="3" id="correct" name="correct" placeholder="正解" value="{{ old('correct') }}"></textarea></td>
        </tr>
        <tr>
          <th><label for="incorrect1">不正解１</label></th>
          <td><textarea cols="30" rows="3" id="incorrect1" name="incorrect1" placeholder="不正解１" value="{{ old('incorrect1') }}"></textarea></td>
        </tr>
        <tr>
          <th><label for="incorrect2">不正解２</label></th>
          <td><textarea cols="30" rows="3" id="incorrect2" name="incorrect2" placeholder="不正解２" value="{{ old('incorrect2') }}"></textarea></td>
        </tr>
        <tr>
          <th><label for="incorrect3">不正解３</label></th>
          <td><textarea cols="30" rows="3" id="incorrect3" name="incorrect3" placeholder="不正解３" value="{{ old('incorrect3') }}"></textarea></td>
        </tr>
        <tr>
          <th><label for="explanation">解説文</label></th>
          <td><textarea cols="30" rows="3" id="explanation" name="explanation" placeholder="解説文" value="{{ old('explanation') }}"></textarea></td>
        </tr>
        <tr>
          <th><label for="img">クイズ画像</label></th>
          <td><input type="file" id="img" name="img" value="{{ old('img') }}"></td>
        </tr>
      </table>
      <div class="button_wrap">
        <input type="submit" value="登録する" class="button">
      </div>
    </form>
  </div><!--wrap-->
</main>
@include('components.footer')
@endsection