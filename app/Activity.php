<?php

namespace App;

use App\Traits\RecordActiivityTrait;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
//    use RecordActiivityTrait;
    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
