<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('role_id')->default(2)->comment('1=admin,2=student');
            $table->string('name');
            $table->string('userType');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fName')->nullable();
            $table->string('mName')->nullable();
            $table->string('roll')->nullable();
            $table->string('gender')->nullable();
            $table->string('deptId')->nullable();
            $table->string('religion')->nullable();
            $table->string('admissionYear')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active');
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
