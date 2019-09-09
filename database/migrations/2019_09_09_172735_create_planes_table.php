<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DO AVIÃO
            ================================================== */
            $table->bigInteger('brand_id')->unsigned()->nullable(); ## MARCA

            $table->string('qty_passengers'); ## QUANTIDADE DE PASSAGEIROS
            $table->enum('class', ['Economy', 'Luxury']); ## CLASSE


            ## MARCA
            $table->foreign('brand_id')
                    ->references('id')
                    ->on('brands')
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
        Schema::dropIfExists('planes');
    }
}
