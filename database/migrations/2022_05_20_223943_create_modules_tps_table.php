<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_tps', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_module')->unsigned();
            $table->unsignedBigInteger('id_professeur')->unsigned();
            $table->string('nom_tp')->nullable();
            $table->string('fichier')->nullable();
            $table->string('description')->nullable();

            $table->string('date_limite')->nullable();
            // automacticly deletes the row when product gets deeleted
            $table->foreign('id_professeur')->references('id')->on('professeurs')->onDelete('cascade');
            // automacticly deletes the row when product gets deeleted
            $table->foreign('id_module')->references('id')->on('modules')->onDelete('cascade');
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
        Schema::dropIfExists('modules_tps');
    }
}
