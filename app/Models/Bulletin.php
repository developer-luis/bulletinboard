<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\category;

class Bulletin extends Model
{

    protected $fillable = [
        'title',
        'content',
        'price',
        'image',
    ];
    public const BULLETIN_VALIDATOR =[
        'title' => 'required|max:50|min:5',
        'content' => 'required|min:10',
        'price' => 'required|numeric',
        'image' => 'image',
    ];

    public const BULLETIN_ERROR_MESSAGE = [
        'min' => 'El minimo de caracteres para :attribute debe ser :min',
        'max' => 'El maximo de caracteres para :attribute debe ser :max',
        'required' => 'El :attribute es obligatorio',
        'price.required' => 'El precio es obligatorio',
        'numeric' => 'El :attribute debe ser numerico',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}