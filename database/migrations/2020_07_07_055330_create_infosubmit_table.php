<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoSubmitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('info_submits')) {
            Schema::create('info_submits', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->text('message')->nullable();
                $table->string('phone')->nullable();
                $table->boolean('status')->default(0);
                $table->string('orders')->nullable();
                $table->dateTime('appoinment')->nullable();
                $table->boolean('star')->default(FALSE);
                $table->mediumText('note')->nullable();
                $table->text('order_code')->nullable();
                $table->string('stage')->default('pending');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_submits');
    }
}
