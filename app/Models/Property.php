<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $table = 'opt_properties';

    public function images()
    {
      return $this->hasMany(Properties_image::class);
    }

    public function locationss()
    {
      return $this->belongsTo(Location::class, 'location', 'id', 'property_id');
    }

    public function project_typess()
    {
      return $this->belongsTo(PropertyType::class,  'id');
    }

    public function agentss()
    {
      return $this->belongsTo(Agents::class, 'agent_id', 'id');
    }

    public function property_locations()
    {
      return $this->hasOne(PropertyLocation::class,  'property_id');
    }


    public function cityss()
    {
      return $this->hasOne(City::class,  'id');
    }

    public function aminity()
    {
      return $this->belongsToMany(Aminities::class, 'opt_aminity_property', 'property_id', 'aminety_id');
    }

    public function properties_list_image()
    {
      return $this->hasMany(Properties_image::class, 'property_id');
    }

    public function property_type()
    {
      return $this->belongsTo(Category::class, 'cat_id', 'id');
    }



}
