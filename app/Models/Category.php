<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function courses(){
        return $this->hasMany(Courses::class, "category_id", "id")->with("category");
    }

    public function events(){
        return $this->hasMany(Events::class, "category_id", "id")->with("category");
    }
}
