<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class BmiResult extends Model
{
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

    public function getScoreLabelAttribute()
    {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }

        return self::SCORE[$score]['label'];
    }

    public function getScoreClassAttribute()
     {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }

        return self::SCORE[$score]['class'];
    }

    public function getFormattedCreatedDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])
            ->format('Y-m-d (D)');
    }

    public function getScoreMessageAttribute()
    {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }
        return self::SCORE[$score]['message'];
    }

    public function getMessageBorderAttribute()
    {
        $score = $this->attributes['score'];

        if (!isset(self::SCORE[$score])) {
            return '';
        }
        return self::SCORE[$score]['mes_class'];
    }
}
