<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');

            $table->unsignedBigInteger('role_id')->default(0);
            $table->foreign('role_id')->references('role_id')->on('role');
            $table->unsignedBigInteger('gender_id')->default(0);
            $table->foreign('gender_id')->references('gender_id')->on('gender');

            $table->string('first_name', 25)->nullable(false);
            $table->string('middle_name', 25)->nullable(true);
            $table->string('last_name', 25)->nullable(false);

            $table->string('email', 50)->nullable(false)->unique();
            $table->string('password', 255)->nullable(false);

            $table->string('display_picture_link', 255)->nullable(false);
            $table->integer('delete_flag')->default(0);

            $table->timestamp('modified_at')->nullable(true);
            $table->string('modified_by', 255)->nullable(true);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
