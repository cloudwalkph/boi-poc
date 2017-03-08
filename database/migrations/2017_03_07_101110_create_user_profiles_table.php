<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->date('birthday')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->enum('civil_status', ['single', 'married', 'widowed'])->default('single');
            $table->string('blood_type')->nullable();
            $table->string('certificate')->nullable();
            $table->string('address')->nullable();
            $table->string('visa_type')->nullable();
            $table->enum('visa_status', ['working', 'permanent'])->default('working');
            $table->string('visa_issue_date')->nullable();
            $table->string('visa_expiration')->nullable();
            $table->string('profile_picture')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
