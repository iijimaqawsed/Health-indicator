<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PfcResult extends Model
{
    public function getFormattedCreatedDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])
            ->format('Y-m-d (D)');
    }
}
