<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = ["name", "description", "menu_category", "price", "visibility", "rating", "cover", "slug", "restaurant_id"];

    public function orders()
    {
        return $this->belongsToMany("App\Order");
    }
}
