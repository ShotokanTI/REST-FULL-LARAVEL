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
            $table->string('Endereco', 60);
            $table->string('Identificador',11)->unique();
            $table->foreign('Identificador')->references('Cpf')->on('Usuarios');
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
