<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('SYS_RENTAL_DATA', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'RENTAL_NO');
            $table->string(column: 'RENTAL_DATE');
            $table->string(column: 'RENTAL_TIME');
            $table->string(column: 'RENTAL_DIV');
            $table->string(column: 'PLANT_CD');
            $table->string(column: 'USER_ID');
            $table->string('USER_NM');
            $table->string('USER_EMPID');
            $table->string('USER_DEPT_CD');
            $table->string('USER_DEPT_NM');
            $table->string('RENTAL_TYPE_CD');
            $table->string('RENTAL_ACTIVITY_CD');
            $table->string('RENTAL_PLACE_CD');
            $table->string('RENTAL_PLACE_DESC');
            $table->integer('RENTAL_EMP_QTY');
            $table->string('RENTAL_APPROV_YN');
            $table->dateTime('PLAN_START_TIME');
            $table->dateTime('PLAN_END_TIME');
            $table->integer('PLAN_DURATION_HH');
            $table->string('PREPARED_YN');
            $table->string('OUTGOING_YN');
            $table->string('CANCEL_YN');
            $table->string('FINISH_YN');
            $table->string('RENTAL_STATUS');
            $table->string('DATA_MEMO');
            $table->string('EXTRA1_FLD');
            $table->string('EXTRA2_FLD');
            $table->string('EXTRA3_FLD');
            $table->string('EXTRA4_FLD');
            $table->string('EXTRA5_FLD');
            $table->string('CREATOR');
            $table->dateTime('CREATE_DT');
            $table->string('CREATE_PC');
            $table->string('UPDATER');
            $table->dateTime('UPDATE_DT');
            $table->string('UPDATE_PC');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SYS_RENTAL_DATA');
    }
};
