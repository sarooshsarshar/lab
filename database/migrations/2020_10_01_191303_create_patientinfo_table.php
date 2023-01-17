<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patientinfo', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 250);
            $table->integer('age');
            $table->tinyInteger('gender');
            $table->string('email', 170)->nullable();
            $table->string('phone_no', 30)->nullable();
            $table->string('referred_by', 300)->nullable();
            $table->string('other_info', 600)->nullable();
            $table->dateTime('registration_date');
            $table->dateTime('creation_date');
            $table->integer('created_by');
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
        Schema::dropIfExists('patientinfo');
    }
}
