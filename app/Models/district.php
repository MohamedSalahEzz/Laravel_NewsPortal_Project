<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subdistricts()
    {
        return $this->hasMany(subdistrict::class);
    }

    public function posts()
    {
        return $this->hasMany('App\Models\post');
    }
}
