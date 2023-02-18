<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OptCommunitiesDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opt_communities_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('community_id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug_link');
            $table->string('image_url');
            $table->longText('description_en');
            $table->longText('description_ar');
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
        Schema::dropIfExists('opt_communities');
    }
}
