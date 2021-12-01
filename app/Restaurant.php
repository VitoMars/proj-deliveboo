<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ["name", "city", "address", "description", "delivery_cost", "slug", "user_id"];

    public function categories()
    {
        return $this->belongsToMany("App\Category");
    }

    public function plates()
    {
        return $this->hasMany("App\Plate");
    }
}
