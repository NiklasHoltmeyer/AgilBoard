<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStoryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_story_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('group_id')->unsigned()->index()->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            
            $table->timestamps();
        });

        /*
        liste an userstories?
        sizeLimited?
        limit?
        addable?
        deleteable?        
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_story_groups');
    }
}
