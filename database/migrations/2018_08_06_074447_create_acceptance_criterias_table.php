<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptanceCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptance_criterias', function (Blueprint $table) {
            $table->increments('id');

            $table->text('precondition');	
            $table->text('action');	
            $table->text('result');	

            $table->integer('issue_id')->unsigned()->index()->nullable();
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');

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
        Schema::dropIfExists('acceptance_criterias');
    }
}
