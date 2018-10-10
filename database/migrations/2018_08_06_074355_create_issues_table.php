<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('descrption')->nullable();

            $table->tinyInteger('priority')->unsigned()->default(0);	
            $table->tinyInteger('risk')->unsigned()->default(0);	
            $table->tinyInteger('storyPoints')->unsigned()->default(0);	

            $table->integer('timeSpend')->unsigned()->default(0);	
            $table->integer('estimatedTime')->unsigned()->default(0);	

            $table->date('closeDate')->nullable();	
            $table->date('due_date')->nullable();	


            $table->integer('user_story_group_id')->unsigned()->index()->nullable();
            $table->foreign('user_story_group_id')->references('id')->on('user_story_groups')->onDelete('cascade');

            $table->integer('creator_user_id')->unsigned()->index()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');

            //

            $table->timestamps(); // erstellt created_at und updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
