<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BmiResult extends Model
{
    use SoftDeletes;

    const SCORE = [
        0 => [ 'label' => '　痩せ　', 'class' => 'label-primary', 'mes_class' => 'blue', 'message' => 
        'あなたは痩せ型もしくはモデル体型です。
体重を増やしたいならたんぱく質を多めに
摂取してみましょう。' ],
        1 => [ 'label' => '　標準　', 'class' => 'label-success', 'mes_class' => 'green', 'message' => 
        'いい調子です！
現状維持のために引き続き頑張りましょう！' ],
        2 => [ 'label' => '太り気味', 'class' => 'label-warning', 'mes_class' => 'yellow', 'message' => 
        'あなたは太り気味のようです。
食生活や適度な運動を心がけ、生活リズムを
見直してみましょう。
もしくはただのマッチョです' ],
        3 => [ 'label' => '　肥満　', 'class' => 'label-danger', 'mes_class' => 'red', 'message' => 
        'あなたは太り気味のようです。
食生活や適度な運動を心がけ、生活リズムを
見直してみましょう。
もしくはただのゴリマッチョです。' ],
    ];

    // ラベルの文字を取得
    public function getScoreLabelAttribute()
    {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }

        return self::SCORE[$score]['label'];
    }

    // ラベルの色を適用するクラス名を取得
    public function getScoreClassAttribute()
     {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }

        return self::SCORE[$score]['class'];
    }

    // 結果一覧画面の日付の形式を変更
    public function getFormattedCreatedDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])
            ->format('Y-m-d (D)');
    }

    // BMI結果画面の評価別メッセージを取得
    public function getScoreMessageAttribute()
    {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }
        return self::SCORE[$score]['message'];
    }

    // BMI結果画面の評価別メッセージの枠の色を適用させるクラス名を取得
    public function getMessageBorderAttribute()
    {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }
        return self::SCORE[$score]['mes_class'];
    }
}
