<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DO USUÁRIO
            ================================================== */
            $table->string('name'); ## NOME
            $table->string('email')->unique(); ## E-MAIL
            $table->timestamp('email_verified_at')->nullable(); ## E-MAIL VERIFICADO
            $table->string('password'); ## SENHA
            $table->rememberToken(); ## LEMBRAR TOKEN
            $table->string('image', 200); ## IMAGEM
        
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
        Schema::dropIfExists('users');
    }
}
