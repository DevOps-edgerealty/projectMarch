<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    protected $table = 'opt_communities';

    public function images()
    {
      return $this->hasMany(Communities_image::class);
    }

    public function locationss()
    {
      return $this->belongsTo(Location::class, 'location', 'id');
    }

    public function cityss()
    {
      return $this->hasOne(City::class,  'id');
    }

    public function community_list()
    {
      return $this->hasMany(Property::class, 'community_id' , 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'community_id' , 'id');
    }

    public function community_list_image()
    {
      return $this->hasMany(Properties_image::class, 'property_id');
    }

}
