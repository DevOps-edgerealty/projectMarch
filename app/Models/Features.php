<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    //
    protected $table = 'opt_features';

    public function projects()
   {
     return $this->belongsToMany(Project::class, 'opt_feature_project', 'feature_id', 'project_id');
   }

}
