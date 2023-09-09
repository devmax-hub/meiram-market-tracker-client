<?php namespace Devmax\TrackerClient\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDevmaxTrackerclientClients extends Migration
{
    public function up()
    {
        Schema::create('devmax_trackerclient_clients', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('refer_id');
            $table->string('phone');
            $table->string('name')->nullable();
            $table->dateTime('sms')->nullable();
            $table->dateTime('webinar')->nullable();
            $table->dateTime('invited')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('devmax_trackerclient_clients');
    }
}
