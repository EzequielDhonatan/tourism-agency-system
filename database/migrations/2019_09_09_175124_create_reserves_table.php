<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DA RESERVA
            ================================================== */
            $table->bigInteger('user_id')->unsigned()->nullable(); ## USUÁRIO
            $table->bigInteger('flight_id')->unsigned()->nullable(); ## VOO
            $table->date('date_reserved'); ## DATA DA RESERVA
            $table->enum('status', ['reserved', 'canceled', 'paid', 'conclued']); ## STATUS

            ## USUÁRIO
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            ## VOO
            $table->foreign('flight_id')
                    ->references('id')
                    ->on('flights')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('reserves');
    }
}
