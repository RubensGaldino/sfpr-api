<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('valorDespesa');
            $table->boolean('pago')->default(false);
            $table->date('dataPagamento');
            $table->string('descricaoDespesa');

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
        Schema::dropIfExists('despesas');
    }
}
