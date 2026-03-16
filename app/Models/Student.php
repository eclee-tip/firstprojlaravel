<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $hidden = [
    //     'name',
    //     'age'
    // ];

    public function scopeMale($query,$age) {
        return $query->where('gender','m')->where('age',$age);
    }

    public function scopeFemale($query,$age) {
        return $query->where('gender','f')->where('age',$age);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images() {
        return $this->morphMany(Images::class,'imageable');
    }
}
