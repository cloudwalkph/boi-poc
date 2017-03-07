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
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->date('birthday')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->enum('civil_status', ['single', 'married', 'widowed'])->default('single');
            $table->string('blood_type')->nullable();
            $table->string('certificate')->nullable();
            $table->string('address')->nullable();
            $table->string('visa_type')->nullable();
            $table->enum('visa_status', ['active', 'inactive'])->default('active');
            $table->string('visa_issue_date')->nullable();
            $table->string('visa_expiration')->nullable();
            $table->string('password');
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
