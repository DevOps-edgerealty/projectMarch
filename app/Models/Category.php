<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Category extends Model
{
    //
    protected $table = 'opt_categories';

    public function property() {
        return $this->belongsTo(App\Category::class);
    }

   

}
