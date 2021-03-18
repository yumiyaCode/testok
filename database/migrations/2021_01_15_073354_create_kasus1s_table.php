<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasus1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus1s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_negara')->unsigned();
            $table->foreign('id_negara')
                    ->references('id')
                    ->on('negaras')->onDelete('cascade');
                    $table->string('positif');
                    $table->string('sembuh');
                    $table->string('meninggal');
                    $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus1s');
    }
}
