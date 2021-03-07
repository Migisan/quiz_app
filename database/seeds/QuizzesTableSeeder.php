<?php

use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quizzes')->delete();
        
        \DB::table('quizzes')->insert(array (
            0 => 
            array (
                'created_at' => '2021-03-07 05:25:33',
                'updated_at' => '2021-03-07 05:25:33',
                'id' => 12,
                'title' => 'PHPのフレームワーク',
                'question' => 'この中でPHPのフレームワークはどれでしょうか？',
                'correct' => 'Laravel',
                'incorrect1' => 'Rails',
                'incorrect2' => 'Vue.js',
                'incorrect3' => 'Bootstrap',
                'explanation' => 'PHPのフレームワークはLaravelです。他にもCakePHPやSymfonyなどが有名です。',
                'img_path' => '/storage/quiz_imgs/PHPのフレームワーク.png',
            ),
            1 => 
            array (
                'created_at' => '2021-03-07 05:32:50',
                'updated_at' => '2021-03-07 05:32:50',
                'id' => 13,
                'title' => '開発言語',
                'question' => 'この中でプログラミング開発言語はどれでしょう？',
                'correct' => 'C言語',
                'incorrect1' => 'XYZ言語',
                'incorrect2' => 'Do言語',
                'incorrect3' => 'D#言語',
                'explanation' => 'C言語です。よく組み込み系の開発で用いられています。その他の選択肢はデタラメです。',
                'img_path' => '/storage/quiz_imgs/開発言語.png',
            ),
            2 => 
            array (
                'created_at' => '2021-03-07 05:42:23',
                'updated_at' => '2021-03-07 05:42:23',
                'id' => 14,
                'title' => 'AWS Lambda',
                'question' => 'AWS Lambdaの特徴はどれでしょうか？',
                'correct' => 'AWSリソースに対してのイベントをトリガーにサーバーレスにコードを実行できるサービス。',
                'incorrect1' => '画像ファイルなどを配置できるストレージサービス。',
                'incorrect2' => '様々なスペックの仮想マシンを作成して実行できるサービス。',
                'incorrect3' => 'Dockerコンテナのクラスター管理サービス。',
                'explanation' => 'LambdaはS3やRDSなどAWSのリソースに対するイベントをトリガーにしてLambdaコンテナが立ち上がり、Lambda関数を実行するサーバーレスなサービスです。',
                'img_path' => '/storage/quiz_imgs/AWS Lambda.png',
            ),
        ));
        
        
    }
}