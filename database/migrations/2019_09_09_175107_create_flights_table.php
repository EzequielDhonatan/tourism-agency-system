<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DO VOO
            ================================================== */
            $table->bigInteger('plane_id')->unsigned()->nullable(); ## AVIÃO
            $table->bigInteger('airport_origin_id')->unsigned()->nullable(); ## AEROPOTO DE ORIGEM
            $table->bigInteger('airport_destination_id')->unsigned()->nullable(); ## AEROPOTO DE DESTINO

            $table->date('date'); ## DATA
            $table->time('time_duration'); ## TEMPO DE DURAÇÃO
            $table->time('hour_output'); ## HORA DE SAÍDA
            $table->time('arrival_time'); ## HORA DE CHEGADA
            $table->double('old_price', 10, 2); ## PREÇO ANTIGO
            $table->double('price', 10, 2); ## PREÇO
            $table->integer('total_plots'); ## TOTAL DE PARCELAS
            $table->boolean('is_promotion')->default(false); ## É PROMOÇÃO?
            $table->string('image', 200)->nullable(); ## IMAGEM
            $table->integer('qty_stops')->default(0); ## QUANTIDADE DE PARADAS
            $table->text('description')->nullable(); ## DESCRIÇÃO

            ## AVIÃO
            $table->foreign('plane_id')
                    ->references('id')
                    ->on('planes')
                    ->onDelete('cascade');

            ## AEROPORTO DE ORIGEM
            $table->foreign('airport_origin_id')
                    ->references('id')
                    ->on('airports')
                    ->onDelete('cascade');

            ## AEROPORTO DE DESTINO
            $table->foreign('airport_destination_id')
                    ->references('id')
                    ->on('airports')
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
        Schema::dropIfExists('flights');
    }
}
