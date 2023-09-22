<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDevmaxTrackerclientLink2 extends Migration
{
    public function up()
    {
        Schema::create('devmax_trackerclient_link', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('link');
            $table->integer('client_id');
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
