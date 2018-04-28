<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->float('paidPrice');
            //$table->unsignedInteger('user_id');
            //$table->unsignedInteger('room_id');
            $table->timestamps();
            $table->integer('clientAccompanyNumber');
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('room_id')->references('id')->on('rooms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
        $table->dropForeign(['reservation_user_id_foreign']);
        $table->dropColumn('user_id');

        $table->dropForeign(['reservation_room_id_foreign']);
        $table->dropColumn('room_id');

        $table->dropForeign(['reservation_employee_id_foreign']);
        $table->dropColumn('employee_id');
    }

}
