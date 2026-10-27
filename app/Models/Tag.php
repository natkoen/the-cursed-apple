<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function builds() {
        return $this->belongsToMany(Build::class, 'build_tag', 'tag_id', 'build_id');
    }
}
