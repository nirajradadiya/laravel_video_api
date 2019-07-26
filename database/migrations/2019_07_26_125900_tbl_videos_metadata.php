<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblVideosMetadata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_videos_metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_size_in_mb')->comment = "Video Size In MB";
            $table->integer('viewers_count')->comment = "Total Viewer Count";
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_videos_metadata');
    }
}
