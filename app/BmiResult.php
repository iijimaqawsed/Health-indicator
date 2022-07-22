<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class BmiResult extends Model
{
    const SCORE = [
        0 => [ 'label' => '痩せ', 'class' => 'label-primary' ],
        1 => [ 'label' => '標準', 'class' => 'label-success' ],
        2 => [ 'label' => '太り気味', 'class' => 'label-warning' ],
        3 => [ 'label' => '肥満', 'class' => 'label-danger' ],
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

    // 定義されていなければ空文字を返す
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
}
