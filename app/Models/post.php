<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\subcategory');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\district');
    }

    public function subdistrict()
    {
        return $this->belongsTo('App\Models\subdistrict');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
