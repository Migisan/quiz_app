<template>
    <div id="vue_wrap">
        <section class="quiz_callenge" v-if="showQuiz">
            <div class="quiz_do" v-if="notShowResult">
                <h2>{{quizzes[quizNum - 1].title}}</h2>
                <div class="quiz_img">
                    <img :src="quizzes[quizNum - 1].img_path" :alt="quizzes[quizNum - 1].title">
                </div><!--quiz_img-->
                <div class="question">
                    問題{{quizNum}}<br>
                    {{ quizzes[quizNum - 1].question }}
                </div><!--question-->
                <div class="quiz_answer">
                    <ul>
                        <li v-for="(choice, key) in choices" :key="key">
                            <button class="quiz_choice" @click="showAnswer(choice)" :disabled=answerBtn>{{ choice }}</button>
                        </li>
                    </ul>
                </div><!--quiz_answer-->
                <div class="quiz_explain" v-if="showExplain">
                    <div class="is_correct" v-if="judgment">
                        <i class="far fa-circle"></i>正解！
                    </div>
                    <div class="is_incorrect" v-else>
                        <i class="fas fa-times"></i>不正解
                    </div>
                    <p>
                        {{ quizzes[quizNum - 1].explanation }}
                    </p>
                    <div class="button_wrap">
                        <button @click="next()" class="button">次へ</button>
                    </div>
                </div>
            </div><!--quiz_do-->
            <div class="quiz_result" v-else>
                <p>正解は、{{ totalQuizNum }}問中{{ totalCorrectNum }}です。</p>
                <div class="button_wrap">
                    <a href="/quiz/challenge" class="button">リトライ</a>
                    <a href="/quiz" class="button">トップへ</a>
                </div>
            </div><!--quiz_result-->
        </section><!--quiz_challenge-->
        <section class="no_quizzes" v-else>
            <p>クイズはまだ登録されていません。</p>
            <div class="button_wrap">
                <a href="/quiz" class="button">トップへ</a>
            </div>
        </section><!--no_quizzes-->
    </div><!--vue_wrap-->
</template>

<script>
    const axios = require('axios');
    export default {
        name: "QuizComponent",
        // components: {
        //     QuizResult
        // },
        data: function(){
            return {
                quizNum: 1,         // 現在クイズ番号
                totalQuizNum: 0,    // クイズ総数
                totalCorrectNum: 0, // クイズ正解数
                quizzes: [{         // クイズ配列
                    title: "",      // クイズタイトル
                    question: "",   // 問題文
                    correct: "",    // 正解
                    incorrect1: "", // 不正解１
                    incorrect2: "", // 不正解２
                    incorrect3: "", // 不正解３
                    img_path: "",   // クイズ画像パス
                    explanation: "" // 解説文
                }],
                choices: [],        // 選択肢
                showQuiz: false,    // クイズ表示フラグ
                showExplain: false, // 解説文表示フラグ
                notShowResult: true,// 結果表示フラグ
                judgment: "",       // 正誤判定
                answerBtn: false    // 解答ボタンの活性状態
            };
        },
        created(){
            this.getQuizzes();
        },
        methods: {
            /* クイズ取得メソッド */
            getQuizzes: function(){
                axios.get('/quiz/json').then(res => {
                    this.quizzes = res.data;
                    this.quizzes = this.shuffleAry(this.quizzes);
                    console.log(this.quizzes);
                    this.totalQuizNum = this.quizzes.length;
                    if(this.totalQuizNum){
                        this.showQuiz = true;
                    }else{
                        this.showQuiz = false;
                    }
                    this.getChoices(this.quizNum - 1);
                }).catch(error => {
                    console.log(error);
                });
            },
            /* クイズシャッフルメソッド */
            shuffleAry: function(array){
                const ary = array.slice();
                for(let i = ary.length - 1;i > 0;i--){
                    let r = Math.floor(Math.random() * (i + 1));
                    [ary[i], ary[r]] = [ary[r], ary[i]];
                }
                return ary;
            },
            /* 選択肢取得メソッド */
            getChoices: function(index){
                // 選択肢を初期化
                this.choices = [];
                // 選択肢を格納
                this.choices.push(
                    this.quizzes[index].correct,
                    this.quizzes[index].incorrect1,
                    this.quizzes[index].incorrect2,
                    this.quizzes[index].incorrect3,
                );
                // 選択肢をシャッフル
                this.choices = this.shuffleAry(this.choices);
            },
            /* 解答表示メソッド */
            showAnswer: function(choice){
                // 解答ボタン非活性
                this.answerBtn = true;
                // 解説文を表示
                this.showExplain = !this.showExplain;

                // 正解を格納
                let answer = this.quizzes[this.quizNum - 1].correct;
                // 正解の場合
                if(choice === answer){
                    this.judgment = true;
                    this.totalCorrectNum++;
                    this.$refs.totalCorrectNum;
                }else{  // 不正解の場合
                    this.judgment = false;
                }
            },
            /* 次の問題表示メソッド */
            next: function(){
                // まだ問題がある時
                if(this.quizNum < this.totalQuizNum){
                    // 解答ボタンを活性
                    this.answerBtn = false;
                    // 解説文を非表示
                    this.showExplain = false;
                    this.quizNum++;
                    this.getChoices(this.quizNum - 1);
                }else{  // 最後の問題後の結果表示
                    this.notShowResult = false;
                }
            }
        },
    }
</script>
