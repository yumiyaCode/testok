<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_rw')->unsigned();
            $table->foreign('id_rw')
                    ->references('id')
                    ->on('rws')->onDelete('cascade');
<<<<<<< HEAD
                    $table->integer('positif');
                    $table->integer('sembuh');
                    $table->integer('meninggal');
=======
                    $table->string('positif');
                    $table->string('sembuh');
                    $table->string('meninggal');
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
                    $table->date('tanggal');
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
        Schema::dropIfExists('kasuses');
    }
}
