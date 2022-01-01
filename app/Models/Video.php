<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //Mass Assignment
    protected $fillable = [
        "name"
    ];

    //Polymorphic Many to Many
    public function tags() {
        return $this->morphToMany("App\Models\Tag", "taggable");
    }
}
