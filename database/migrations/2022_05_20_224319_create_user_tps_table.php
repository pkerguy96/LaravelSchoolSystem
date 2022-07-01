<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->unsigned();
            $table->unsignedBigInteger('id_module_tp')->unsigned();
            $table->string('date_depot');
            $table->string('fichier');
            $table->text('note');
            $table->text('commentaire');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // automacticly deletes the row when product gets deeleted
            $table->foreign('id_module_tp')->references('id')->on('modules_tps')->onDelete('cascade');

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
        Schema::dropIfExists('user_tps');
    }
}
