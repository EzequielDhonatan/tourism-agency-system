<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DA CIDADE
            ================================================== */
            $table->bigInteger('state_id')->unsigned()->nullable(); ## ESTADO
            
            $table->string('name'); ## NOME
            $table->string('zip_code', 11)->unique()->nullable(); ## NOME

            ## ESTADO
            $table->foreign('state_id')
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
        Schema::dropIfExists('cities');
    }
}
