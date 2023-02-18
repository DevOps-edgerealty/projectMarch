<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    //
    protected $table = 'opt_project_agents';

    public function images()
    {
      return $this->hasMany(Developer_image::class);
    }
}
