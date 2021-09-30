<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_users', function (Blueprint $table) {
            $table->id();
            $table->string('u_name')->nullable();
            $table->string('u_email')->nullable();
            $table->string('u_phone')->nullable();
            $table->string('u_organization')->nullable();
            $table->string('u_address')->nullable();
            $table->string('u_thana')->nullable();
            $table->string('u_zila')->nullable();
            $table->string('u_zip')->nullable();
            $table->string('u_plan')->nullable();
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
        Schema::dropIfExists('requested_users');
    }
}
