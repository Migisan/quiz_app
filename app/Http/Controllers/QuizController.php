<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\QuizModel;

class QuizController extends Controller
{
    /* クイズ初期画面の表示 --------------------------------------*/
    public function index(){
        return view('quiz.index');
    }
    
    /* クイズ一覧の表示 --------------------------------------*/
    public function list(){
        $quizzes = QuizModel::orderby('created_at', 'asc')->get();

        $data = [
            'quizzes' => $quizzes,
        ];

        return view('quiz.list', $data);
    }
    
    /* クイズ登録画面の表示 --------------------------------------*/
    public function create(){
        return view('quiz.create');
    }
    
    /* クイズ登録 ------------------------------------------------*/
    public function store(Request $request){
        // 入力値チェック
        $validator = Validator::make($request->all(), QuizModel::$rules, QuizModel::$errorMessages);
        if($validator->fails()){
            return redirect('/quiz/create')
            ->withErrors($validator)
            ->withInput();
        }
        
        // 初期設定
        $quiz = new QuizModel;
        $form = $request->all();
        
        // 画像がアップロードされているとき
        if(isset($request->img)){
            $request->file('img')->storeAs('public/quiz_imgs', $request->title .'.png');
            $form['img_path'] = '/storage/quiz_imgs/' . $request->title .'.png';
            unset($form['_token'], $form['img']);
        }else{  // 画像がアップロードされていないとき
            $form['img_path'] = '/storage/quiz_imgs/no_image.png';
            unset($form['_token']);
        }
        
        // テーブルに保存
        $quiz->fill($form)->save();
        
        return redirect('/quiz/create');
    }
    
    /* クイズ詳細の表示 ------------------------------------------------*/
    public function show(Request $request){
        $quiz = QuizModel::find($request->id);
        
        $data = [
            'quiz' => $quiz,
        ];
        
        return view('quiz.show', $data);
    }

    /* クイズ編集画面の表示 ------------------------------------------------*/
    public function edit(Request $request){
        $quiz = QuizModel::find($request->id);
        
        $data = [
            'quiz' => $quiz,
        ];
        
        return view('quiz.edit', $data);
    }
    
    /* クイズ編集 -------------------------------------------------------*/
    public function update(Request $request){
        // 入力値チェック
        $validator = Validator::make($request->all(), QuizModel::$rules, QuizModel::$errorMessages);
        if($validator->fails()){
            return redirect('/quiz/edit?id=' . $request->id)
            ->withErrors($validator)
            ->withInput();
        }

        // 初期設定
        $quiz = QuizModel::find($request->id);
        $form = $request->all();

        // 画像がアップロードされているとき
        if(isset($request->img)){
            $request->file('img')->storeAs('public/quiz_imgs', $request->title .'.png');
            $form['img_path'] = '/storage/quiz_imgs/' . $request->title .'.png';
            unset($form['_token'], $form['img']);
        }else{  // 画像がアップロードされていないとき
            $form['img_path'] = '/storage/quiz_imgs/no_image.png';
            unset($form['_token']);
        }
        
        // テーブルに保存
        $quiz->fill($form)->save();
        
        return redirect('/quiz/create');
    }

    /* クイズ削除 -------------------------------------------------------*/
    public function delete(Request $request){
        $quiz = QuizModel::find($request->id);
        $del_message = "「" . $quiz->title . "」を削除しました";
        $quiz->delete();
        
        return redirect('/quiz/list')->with('del_message', $del_message);
    }

    /* クイズ挑戦画面 -------------------------------------------------------*/
    public function challenge(){
        return view('/quiz/challenge');
    }
    
    /* JSONデータ取得 -------------------------------------------------------*/
    public function json(){
        return QuizModel::get()->toJson();
    }
}
