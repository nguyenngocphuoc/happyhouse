<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        // Insert some stuff
        DB::select("
            INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
            (1, 'Admin', 'admin', NULL, NULL),
            (2, 'Editor', 'editor', NULL, NULL),
            (3, 'User', 'user', NULL, NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
