<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('price');
            $table->boolean('featured')->default(false);
            $table->boolean('negotiable')->default(false);
            $table->boolean('ready_to_use')->default(false);
            $table->boolean('assured')->default(false);
            $table->boolean('available')->default(true);
            $table->string('purpose');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('code')->unique();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('living')->nullable();
            $table->integer('kitchen')->nullable();
            $table->string('store_rooms')->nullable();
            $table->string('floors')->nullable();
            $table->integer('parking')->nullable();
            $table->string('city');
            $table->string('city_slug');
            $table->string('address');
            $table->integer('build_year')->nullable();
            $table->string('build_type')->nullable();
            $table->integer('flat_area')->nullable();
            $table->integer('house_area')->nullable();
            $table->string('land_area')->nullable();
            $table->integer('agent_id');
            $table->string('contact_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('alt_contact_number')->nullable();
            $table->text('description');
            $table->string('video')->nullable();
            $table->string('floor_plan')->nullable();
            $table->string('location_latitude')->nullable();
            $table->string('location_longitude')->nullable();
            $table->string('property_face')->nullable();
            $table->string('road_access')->nullable();
            $table->text('nearby')->nullable();
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
