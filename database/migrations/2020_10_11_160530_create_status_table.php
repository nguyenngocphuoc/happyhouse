<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->boolean('status')->default(TRUE);
            $table->string('color')->default("#20f807");
            $table->timestamps();
        });
        // Insert some stuff
        DB::select("
            INSERT INTO `status` (`name`) VALUES
            ('Sold'),
            ('Avaialble');
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
