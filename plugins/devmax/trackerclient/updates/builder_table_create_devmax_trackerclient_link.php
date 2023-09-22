<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDevmaxTrackerclientLink extends Migration
{
    public function up()
    {
        Schema::create('devmax_trackerclient_link', function($table)
        {
            $table->bigIncrements('id')->unsigned();
            $table->string('link');
            $table->integer('client_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('devmax_trackerclient_link');
    }
}
