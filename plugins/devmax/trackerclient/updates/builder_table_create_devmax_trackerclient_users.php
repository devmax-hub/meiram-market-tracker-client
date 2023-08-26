<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDevmaxTrackerclientUsers extends Migration
{
    public function up()
    {
        Schema::create('devmax_trackerclient_users', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('bonus')->nullable();
            $table->integer('depth')->nullable();
            $table->integer('parent_id')->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('devmax_trackerclient_users');
    }
}
