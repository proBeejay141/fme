<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phOrder_id');
            $table->integer('ghOrder_id');
            $table->string('ph_username');
            $table->integer('phUser_id');
            $table->string('gh_username');
            $table->integer('ghUser_id');
            $table->float('amount');
            $table->text('confirm')->nullable();
            $table->text('confirm_thumb')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
