<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('valorReceita');
            $table->boolean('recebido')->default(false);
            $table->date('dataRecebimento');
            $table->string('descricaoReceita');

            $table->unsignedBigInteger('conta_id');
            $table->foreign('conta_id')->references('id')->on('contas');
            
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
        Schema::dropIfExists('receitas');
    }
}
