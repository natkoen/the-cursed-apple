<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function builds() {
        return $this->hasMany(Build::class);
    }
}
