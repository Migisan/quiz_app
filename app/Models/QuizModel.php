<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizModel extends Model
{
    // テーブル指定
    protected $table = 'quizzes';

    // ブラックリスト
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = array(
        'title'       => 'required | unique:quizzes',
        'question'    => 'required',
        'correct'     => 'required',
        'incorrect1'  => 'required',
        'incorrect2'  => 'required',
        'incorrect3'  => 'required',
        'explanation' => 'required',
        'img'         => 'file | image'
    );

    // バリデーションメッセージ
    public static $errorMessages = array(
        'title.required'       => 'タイトルは必須項目です。',
        'title.unique'         => 'そのタイトルは既に存在します。',
        'question.required'    => '問題は必須項目です。',
        'correct.required'     => '正解は必須項目です。',
        'incorrect1.required'  => '不正解１は必須項目です。',
        'incorrect2.required'  => '不正解２は必須項目です。',
        'incorrect3.required'  => '不正解３は必須項目です。',
        'explanation.required' => '解説文は必須項目です。',
        'img.file'             => 'アップロードできるのはファイル形式のもののみです。',
        'img.image'            => 'アップロードできるのはイメージファイルのみです。'
    );
}
