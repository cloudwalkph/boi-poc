<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('purpose_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->date('appointment_date');
            $table->enum('appointment_time', ['am', 'pm'])->default('am');
            $table->string('payment_method');
            $table->string('reference_number');
            $table->tinyInteger('is_overstaying')->default(0);
            $table->tinyInteger('avail_acr_card')->default(0);
            $table->enum('status', ['pending', 'paid', 'expired'])->default('pending');
            $table->double('paid_amount')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
