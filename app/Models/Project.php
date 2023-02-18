<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'opt_projects';


   public function images()
   {
     return $this->hasMany(Project_image::class);
   }

   public function documents()
   {
     return $this->hasMany(Project_document::class);
   }

   public function location()
   {
     return $this->belongsTo(Location::class, 'location', 'id');
   }

   public function project_locations()
    {
      return $this->hasOne(ProjectLocation::class,  'project_id');
    }

   public function locationss()
   {
     return $this->belongsTo(Location::class, 'location', 'id');
   }

   public function locationz()
   {
     return $this->belongsTo(Location::class, 'location', 'id');
   }

   public function citys()
   {
     return $this->belongsTo(City::class, 'city_id', 'id');
   }

   public function developer()
   {
     return $this->belongsTo(Developer::class, 'agent_id', 'id');
   }

   public function developers()
   {
     return $this->hasMany(Developer::class, 'id', 'agent_id');
   }

   public function project_type()
   {
     return $this->belongsTo(ProjectType::class, 'sub_type_id', 'id');
   }

   public function project_types()
   {
     return $this->hasMany(ProjectType::class, 'id', 'sub_type_id');
   }

   public function features()
   {
     return $this->belongsToMany(Features::class, 'opt_feature_project', 'project_id', 'feature_id');
   }

   public function developer_list_image()
   {
     return $this->hasMany(Project_image::class, 'project_id');
   }

   public function community_list_image()
   {
     return $this->hasMany(Project_image::class, 'project_id');
   }
}
