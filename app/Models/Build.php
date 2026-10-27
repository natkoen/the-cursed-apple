<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = [

    ];

    public function hero() {
        return $this->belongsTo(Hero::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'build_tag', 'build_id', 'tag_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
