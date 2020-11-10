<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->string('photo')->default('default.png');
            $table->boolean('status')->default(0);
            $table->rememberToken();
            $table->mediumText('description')->default("description");
            $table->string('position')->default(config('properties.text.staff'));
            $table->string('facebook')->default("");
            $table->string('twitter')->default("");
            $table->string('instagram')->default("");
            $table->timestamps();
        });
        // Insert some stuff
        DB::select("
        INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES " . config('properties.defautuser'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
