<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\models\Bulletin;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function bulletins(){
        return $this->hasMany(Bulletin::class);
    }
}