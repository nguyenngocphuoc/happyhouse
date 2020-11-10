<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('site_logo')->default('logo.png');
            $table->string('site_favicon')->default('favicon.ico');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('behance')->nullable();
            $table->string('dribbble')->nullable();
            $table->string('youtube')->nullable();
            $table->longText('about_us')->nullable();
            $table->longText('address')->nullable();
            $table->longText('contract_flow')->nullable();
            $table->mediumText('messenger')->nullable();
            $table->string('feeds_embed')->nullable();
            $table->string('coords')->nullable();
            $table->string('video')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('map_api_key')->nullable();
            $table->mediumText('footer_left')->nullable();
            $table->mediumText('footer_right')->nullable();
            $table->longText('meta_description')->default("this is description");
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
        Schema::dropIfExists('settings');
    }
}
