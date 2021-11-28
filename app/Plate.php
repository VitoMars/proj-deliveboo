<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = ["name", "description", "price", "visibility", "menu_category ", "slug", "restaurant_id"];

    public function orders()
    {
        return $this->belongsToMany("App\Order");
    }
}
