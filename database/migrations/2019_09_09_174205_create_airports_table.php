<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DO AEROPORTO
            ================================================== */
            $table->bigInteger('city_id')->unsigned()->nullable(); ## CIDADE
            
            $table->string('name'); ## NOME
            $table->string('zip_code', 11)->unique()->nullable(); ## CEP
            $table->string('address', 100)->nullable(); ## ENDEREÇO
            $table->integer('number')->nullable(); ## NÚMERO
            $table->string('complement')->nullable(); ## COMPLEMENTO
            $table->string('latitude', 15)->nullable(); ## LATITUDE
            $table->string('longitude', 15)->nullable(); ## LONGITUDE

            ## CIDADE
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
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
        Schema::dropIfExists('airports');
    }
}
