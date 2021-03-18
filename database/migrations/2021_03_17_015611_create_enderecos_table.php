<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Enderecos', function (Blueprint $table) {
            $table->id();
            $table->char('Estado', 2);
            $table->string('Cidade', 60);
            $table->string('Rua', 60);
            $table->string('Usuario_Cpf',11);
            $table->foreign('Usuario_Cpf')->references('Cpf')->on('Usuarios')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
