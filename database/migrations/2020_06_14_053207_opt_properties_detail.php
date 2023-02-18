<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OptPropertiesDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opt_properties_detail', function (Blueprint $table) {

            $table->id();
            $table->integer('properties_id');
            $table->string('property_title_en');
            $table->string('property_title_ar');
            $table->string('slug_link');
            $table->string('property_type');
            $table->string('sub_title_en');
            $table->string('sub_title_ar');
            $table->string('address');
            $table->string('city');
            $table->string('agent_id');
            $table->string('property_overview');
            $table->string('Developer');
            $table->string('property_description');
            $table->string('aminities');
            $table->string('embed_map');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opt_properties_detail');
    }
}
