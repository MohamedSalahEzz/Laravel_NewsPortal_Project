<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategories()
    {
        return $this->hasMany('App\Models\subcategory');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\post');
    }
}
