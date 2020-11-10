<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('address');
            $table->string('coords');
            $table->string('image');
            $table->longText('details');
            $table->integer('category_id');
            $table->integer('district_id')->unsigned();
            $table->integer('statuses_id')->unsigned();
            $table->boolean('status');
            $table->bigInteger('price');
            $table->float('acreage');
            $table->integer('floor_amount')->default(1);
            $table->integer('room_amount')->default(1);
            $table->integer('bathroom_amount')->default(1);
            $table->integer('bed_amount')->default(1);
            $table->string('host_name');
            $table->string('phone_number');
            $table->mediumText('note')->nullable();
            $table->integer('user_id')->default(1);
            $table->integer('view_count')->default(0);
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('news');
    }
}
