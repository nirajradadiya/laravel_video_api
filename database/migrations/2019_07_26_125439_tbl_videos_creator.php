<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblVideosCreator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_videos_creator', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id')->comment = "Video ID of Vidoes Meta Data Table";
            $table->string('user_name', 255)->comment = "Name Of User";
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_videos_creator');
    }
}
